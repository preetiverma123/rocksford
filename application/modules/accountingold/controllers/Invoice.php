<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/* * *****************Invoice.php**********************************
 * @product name    : Global School Management System Pro
 * @type            : Class
 * @class name      : Invoice
 * @description     : Manage invoice for all type of student payment.  
 * @author          : Codetroopers Team 	
 * @url             : https://themeforest.net/user/codetroopers      
 * @support         : yousuf361@gmail.com	
 * @copyright       : Codetroopers Team	 	
 * ********************************************************** */

class Invoice extends MY_Controller {

    public $data = array();    
     public $st = array(); 
    function __construct() {
        
        parent::__construct();
         $this->load->model('Invoice_Model', 'invoice', true);
         $this->load->model('Payment_Model', 'payment', true);
         $this->load->model('Ledger_Model', 'ledger', true);
         
          $this->data['page_name'] = 'accounting'; 
    }

    
    
    /*****************Function index**********************************
    * @type            : Function
    * @function name   : index
    * @description     : Load "Invoice List" user interface                 
    *                        
    * @param           : null
    * @return          : null 
    * ********************************************************** */
    public function index() {
        
        check_permission(VIEW);
        
        $this->data['classes'] = $this->invoice->get_list('classes', array('status'=> 1));        
        $this->data['income_heads'] = $this->invoice->get_list('income_heads', array('status'=> 1, 'is_default'=>1));        
        $this->data['invoices'] = $this->invoice->get_invoice_list();  
         
        $this->data['list'] = TRUE;
        $this->layout->title($this->lang->line('manage_invoice'). ' | ' . SMS);
        $this->layout->view('invoice/index', $this->data);            
       
    }
    public function get_filter_data() {

        check_permission(VIEW);
        if ($_POST) {

            
            $date = $this->input->post('date');
            $class_id = !empty($this->input->post('class_id'))?($this->input->post('class_id')):'';
            $section_id = !empty($this->input->post('section_id'))?($this->input->post('section_id')):'';
            
            $month = substr($date,0,2);

            $year = substr($date,3,6);
            

           
            $this->data['invoices'] =  $this->invoice->get_invoice_list_where('',$month,$year,$class_id,$section_id);

           
            $this->data['day'] = date('d', strtotime($this->input->post('date')));
            ;
            $this->data['month'] = date('m', strtotime($this->input->post('date')));
            ;
            $this->data['year'] = date('Y', strtotime($this->input->post('date')));
            ;
            
            $this->data['date'] = $date;
            $this->data['class_id'] = $class_id;
            $this->data['section_id'] = $section_id;
            //print_r($this->data['date']);die;
        }
        

        $this->data['classes'] = $this->invoice->get_list('classes', array('status'=> 1));        
        $this->data['income_heads'] = $this->invoice->get_list('income_heads', array('status'=> 1, 'is_default'=>1));        
        $this->data['list'] = TRUE;
        $this->layout->title($this->lang->line('manage_invoice'). ' | ' . SMS);
        $this->layout->view('invoice/index', $this->data);
    }

    
    
    
    
    /*****************Function view**********************************
    * @type            : Function
    * @function name   : view
    * @description     : Load user interface with specific invoice data                 
    *                       
    * @param           : $id integer value
    * @return          : null 
    * ********************************************************** */
    public function view($id = null) {
        
        check_permission(VIEW);
        
        if(!is_numeric($id)){
            error($this->lang->line('unexpected_error'));
            redirect('accounting/invoice/index');
        }
        
        $this->data['classes'] = $this->invoice->get_list('classes', array('status'=> 1));        
        $this->data['income_heads'] = $this->invoice->get_list('income_heads', array('status'=> 1, 'is_default'=>1));        
        $this->data['invoices'] = $this->invoice->get_invoice_list();  
         
        $this->data['settings'] = $this->invoice->get_single('settings', array('status'=>1));
        $invoice                = $this->payment->get_invoice_amount($id);
        
        $this->data['paid_amount'] = $invoice->paid_amount;
        $this->data['invoice'] = $this->invoice->get_single_invoice($id);
        $this->data['invoice_logs'] = $this->invoice->get_invoice_log_list($id); 
        $this->data['list'] = TRUE;
        $this->layout->title($this->lang->line('view'). ' ' . $this->lang->line('invoice'). ' | ' . SMS);
        $this->layout->view('invoice/view', $this->data);            
       
    }
    
    
     /*****************Function due**********************************
    * @type            : Function
    * @function name   : due
    * @description     : Load "Due Invoice List" user interface                 
    *                        
    * @param           : null
    * @return          : null 
    * ***********************************************************/
    public function due() {    
        
        check_permission(VIEW);
              
        $this->data['invoices'] = $this->invoice->get_invoice_list('due');  

        foreach($this->data['invoices'] as $key => $value){

            $invoice = $this->payment->get_invoice_amount($value->id);
            $this->data['invoices'][$key]->paid_amount = !empty($invoice->paid_amount)?$invoice->paid_amount:'0.00';
            
        }
        $this->data['classes'] = $this->invoice->get_list('classes', array('status'=> 1));        
        $this->data['income_heads'] = $this->invoice->get_list('income_heads', array('status'=> 1, 'is_default'=>1));
        $this->data['list'] = TRUE;
        $this->layout->title($this->lang->line('due_invoice'). ' | ' . SMS);
        $this->layout->view('invoice/due', $this->data);            
       
    }

    public function ledger() {    
        
        check_permission(VIEW);
              
        
        
        $this->data['list'] = TRUE;
        $this->layout->title('Student Ledger'. ' | ' . SMS);
        $this->layout->view('invoice/ledger', $this->data);            
       
    }

    public function get_filter_ledger() {

        check_permission(VIEW);
        if ($_POST) {

            $reg_no = $this->input->post('reg_no');

            $this->data['ledgers'] =  $this->ledger->get_ledger_list_where($reg_no);

            
            if(!empty($this->data['ledgers'])){

                $this->data['student_name'] =  $this->data['ledgers'][0]->student_name;
                $this->data['class_name']   =  $this->data['ledgers'][0]->class_name;
                $this->data['section_name'] =  $this->data['ledgers'][0]->section_name;
            }
            /*$this->data['guardian_name'] = $query->row();
           
            $this->db->select('*');
            $this->db->from('guardians');
            $this->db->where('id',$this->data['studentDetails']->guardian_id);
            $this->db->order_by('created_at','desc');
            $query = $this->db->get();

            if ( $query->num_rows() > 0 )
            {
               $this->data['guardianDetails'] = $query->row();

                
            }*/
           
            
            $this->data['reg_no'] = $reg_no;
            
            
       
        }
        

        
        $this->data['list'] = TRUE;
        $this->layout->title('Student Ledger'. ' | ' . SMS);
        $this->layout->view('invoice/ledger', $this->data);
    }


    public function get_filter_due_data() {

        check_permission(VIEW);
        if ($_POST) {

            
            $date = $this->input->post('date');
            $class_id = !empty($this->input->post('class_id'))?($this->input->post('class_id')):'';
            $section_id = !empty($this->input->post('section_id'))?($this->input->post('section_id')):'';
            
            $month = substr($date,0,2);

            $year = substr($date,3,6);
            

           
            $this->data['invoices'] =  $this->invoice->get_invoice_list_where('due',$month,$year,$class_id,$section_id);

           
            $this->data['day'] = date('d', strtotime($this->input->post('date')));
            ;
            $this->data['month'] = date('m', strtotime($this->input->post('date')));
            ;
            $this->data['year'] = date('Y', strtotime($this->input->post('date')));
            ;
            
            $this->data['date'] = $date;
            $this->data['class_id'] = $class_id;
            $this->data['section_id'] = $section_id;
            //print_r($this->data['date']);die;
            foreach($this->data['invoices'] as $key => $value){

                $invoice = $this->payment->get_invoice_amount($value->id);
                $this->data['invoices'][$key]->paid_amount = !empty($invoice->paid_amount)?$invoice->paid_amount:'0.00';
                
            }
       
        }
        

        $this->data['classes'] = $this->invoice->get_list('classes', array('status'=> 1));        
        $this->data['income_heads'] = $this->invoice->get_list('income_heads', array('status'=> 1, 'is_default'=>1));        
        $this->data['list'] = TRUE;
        $this->layout->title($this->lang->line('due_invoice'). ' | ' . SMS);
        $this->layout->view('invoice/due', $this->data);
    }

    
    /*****************Function add**********************************
    * @type            : Function
    * @function name   : add
    * @description     : Load "Create new Invoice" user interface                 
    *                    and store "Invoice" data into database 
    * @param           : null
    * @return          : null 
    * ********************************************************** */
    public function add() {

        check_permission(ADD);
        
        if ($_POST) {
         
            $this->_prepare_invoice_validation();
            if ($this->form_validation->run() === TRUE) {
                $data = $this->_get_posted_invoice_data();

                $insert_id = $this->invoice->insert('invoices', $data);
                if ($insert_id) {   
                    
                    success($this->lang->line('insert_success'));
                    redirect('accounting/invoice/index');
                } else {
                    error($this->lang->line('insert_failed'));
                    redirect('accounting/invoice/add');
                }
            } else {
                $this->data['post'] = $_POST;
            }
        }

        $this->data['classes'] = $this->invoice->get_list('classes', array('status'=> 1));        
        $this->data['income_heads'] = $this->invoice->get_list('income_heads', array('status'=> 1, 'is_default'=>1));        
        $this->data['invoices'] = $this->invoice->get_invoice_list();  
        
        $this->data['add'] = TRUE;
        $this->layout->title($this->lang->line('create'). ' ' . $this->lang->line('invoice'). ' | ' . SMS);
        $this->layout->view('invoice/index', $this->data);
    }

        
    /*****************Function bulk**********************************
    * @type            : Function
    * @function name   : bulk
    * @description     : Load "Create new bulk Invoice" user interface                 
    *                    and store "Invoice" data into database 
    * @param           : null
    * @return          : null 
    * ********************************************************** */
    public function bulk() {
     
        check_permission(ADD);
        
        if ($_POST) {

            $this->_prepare_invoice_validation();           
            if ($this->form_validation->run() === TRUE) {
               
                $status = $this->_get_create_bulk_invoice();

                if ($status) {

                    if($status=='print'){
                        $var = json_encode($this->data);
                        $urll = urlencode($var);
                        $this->session->set_userdata("st",$urll);
                       
                        redirect('accounting/invoice/print');
                        //$this->load->view('accounting/invoice/print');
                    }else{

                        success($this->lang->line('insert_success'));
                        redirect('accounting/invoice/index');
                    }
                    
                } else {                  
                    error($this->lang->line('insert_failed'));
                    redirect('accounting/invoice/bulk');
                }
            } else {
                $this->data['post'] = $_POST;
            }
        }

        $this->data['classes'] = $this->invoice->get_list('classes', array('status'=> 1));        
        $this->data['income_heads'] = $this->invoice->get_list('income_heads', array('status'=> 1, 'is_default'=>1));        
        $this->data['invoices'] = $this->invoice->get_invoice_list();  
        
        $this->data['bulk'] = TRUE;
        $this->layout->title($this->lang->line('create'). ' ' . $this->lang->line('invoice'). ' | ' . SMS);
        $this->layout->view('invoice/index', $this->data);
    }

    
    /*****************Function edit**********************************
    * @type            : Function
    * @function name   : edit
    * @description     : Load Update "Invoice" user interface                 
    *                    with populated "Invoice" value 
    *                    and update "Invoice" database    
    * @param           : $id integer value
    * @return          : null 
    * ********************************************************** */
    public function edit($id = null) {       
       
        check_permission(EDIT);
        
        if(!is_numeric($id)){
            error($this->lang->line('unexpected_error'));
             redirect('accounting/invoice/index');
        }
        
        if ($_POST) {
            $this->_prepare_invoice_validation();
            if ($this->form_validation->run() === TRUE) {
                $data = $this->_get_posted_invoice_data();
                $updated = $this->invoice->update('invoices', $data, array('id' => $this->input->post('id')));

                if ($updated) {
                    success($this->lang->line('update_success'));
                    redirect('accounting/invoice/index');                   
                } else {
                    error($this->lang->line('update_failed'));
                    redirect('accounting/invoice/edit/' . $this->input->post('id'));
                }
            } else {
                 $this->data['invoice'] = $this->invoice->get_single('invoices', array('id' => $this->input->post('id')));
            }
        }
        
        if ($id) {
            $this->data['invoice'] = $this->invoice->get_single('invoices', array('id' => $id));

            if (!$this->data['invoice']) {
                 redirect('accounting/invoice/index');
            }
        }
        
        $this->data['classes'] = $this->invoice->get_list('classes', array('status'=> 1));        
        $this->data['income_heads'] = $this->invoice->get_list('income_heads', array('status'=> 1));        
        $this->data['invoices'] = $this->invoice->get_invoice_list();  

        $this->data['edit'] = TRUE;       
        $this->layout->title($this->lang->line('edit'). ' ' . $this->lang->line('invoice'). ' | ' . SMS);
        $this->layout->view('invoice/index', $this->data);
    }

     public function print(){
        
        /*$this->data = $this->input->post('st');*/
        
        $this->data = array();
        if(!empty($this->session->userdata("st"))){
           
            $this->data['settings'] = json_decode(urldecode($this->session->userdata("st")))->settings;
            $this->data['st'] = json_decode(urldecode($this->session->userdata("st")))->st;
            $this->data['month'] = json_decode(urldecode($this->session->userdata("st")))->month;
        }
       
        $this->layout->title($this->lang->line('print') .' ' . $this->lang->line('invoice') .' | ' . SMS);

        $this->load->view('accounting/invoice/print',$this->data ); 
        
    }

    
    /*****************Function _prepare_invoice_validation**********************************
    * @type            : Function
    * @function name   : _prepare_invoice_validation
    * @description     : Process "Invoice" user input data validation                 
    *                       
    * @param           : null
    * @return          : null 
    * ********************************************************** */
    private function _prepare_invoice_validation() {
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="error-message" style="color: red;">', '</div>');
        
        $this->form_validation->set_rules('class_id', $this->lang->line('class'), 'trim|required');               
        $this->form_validation->set_rules('student_id', $this->lang->line('student_id'), 'trim|required');  
        $this->form_validation->set_rules('is_applicable_discount', $this->lang->line('is_applicable_discount'), 'trim|required');   
        $this->form_validation->set_rules('month', $this->lang->line('month'), 'trim|required');   
        
       
        $status = FALSE;
        
        if($this->input->post('hostel_fee')){
             $status = TRUE;
        }
        if($this->input->post('transport_fee')){
             $status = TRUE;
        }
        if($this->input->post('certificate_fee')){
             $status = TRUE;
        }
        if($this->input->post('exam_fee')){
             $status = TRUE;
        }
        if($this->input->post('monthly_fee')){
             $status = TRUE;
        }
        if($this->input->post('admission_fee')){
             $status = TRUE;
        }
        
        if(!$status){
            $this->form_validation->set_rules('student_fee', '','required', array('required' => $this->lang->line('check_at_least_one')));
        }
        
    }


    
    /*****************Function _get_posted_invoice_data**********************************
     * @type            : Function
     * @function name   : _get_posted_invoice_data
     * @description     : Prepare "Invoice" user input data to save into database                  
     *                       
     * @param           : null
     * @return          : $data array(); value 
     * ********************************************************** */
    private function _get_posted_invoice_data() {

        $items = array();
        $items[] = 'income_head_id';
        $items[] = 'class_id';
        $items[] = 'student_id';
        $items[] = 'is_applicable_discount';        
        $items[] = 'amount';        
        $items[] = 'month';        
        $items[] = 'note';
        $data = elements($items, $_POST);          
        
        $data['date'] = date('Y-m-d');
    
        if ($this->input->post('id')) {
            $data['modified_at'] = date('Y-m-d H:i:s');
            $data['modified_by'] = logged_in_user_id();
        } else {
            $data['custom_invoice_id'] = $this->invoice->get_custom_id('invoices', 'INV');
            $data['paid_status'] = 'unpaid';
            $data['status'] = 1;
            $data['invoice_type'] = 'academic';
            $data['academic_year_id'] = $this->academic_year_id;
            $data['created_at'] = date('Y-m-d H:i:s');
            $data['created_by'] = logged_in_user_id();                       
        }

        return $data;
    }

        /*****************Function _get_create_bulk_invoice**********************************
     * @type            : Function
     * @function name   : _get_create_bulk_invoice
     * @description     : Prepare "Invoice" user input data to save into database                  
     *                       
     * @param           : null
     * @return          : $data array(); value 
     * ********************************************************** */
    private function _get_create_bulk_invoice() {

        if(!empty($this->input->post('print')) && $this->input->post('print')=='print'){

            $this->data = array();
            $this->data['settings'] = $this->invoice->get_single('settings', array('status'=>1));

            $this->data['paid_status'] = 'unpaid';
            $this->data['status'] = 1;
            $this->data['invoice_type'] = 'academic';
            $this->data['academic_year_id'] = $this->academic_year_id;
            $this->data['month'] = $this->input->post('month');
            
            $this->data['created_at'] = date('Y-m-d H:i:s');
            $this->data['created_by'] = logged_in_user_id();            
            $this->data['date'] = date('Y-m-d');
          /*  $this->data['invoice_logs'] = $this->invoice->get_invoice_log_list($id);*/
        
             // need to get student list by class id 
               $is_applicable_discount = $this->input->post('is_applicable_discount') ? $this->input->post('is_applicable_discount') : 0;       
               $hostel_fee      = $this->input->post('hostel_fee') ? $this->input->post('hostel_fee') : '';       
               $transport_fee   = $this->input->post('transport_fee ') ? $this->input->post('transport_fee ') : ''; 
               
               $certificate_fee = $this->input->post('certificate_fee') ? $this->input->post('certificate_fee') : ''; 
               $exam_fee        = $this->input->post('exam_fee') ? $this->input->post('exam_fee') : ''; 
               $monthly_fee     = $this->input->post('monthly_fee') ? $this->input->post('monthly_fee') : ''; 
               $admission_fee   = $this->input->post('admission_fee') ? $this->input->post('admission_fee') : ''; 
               
               $class_id = $this->input->post('class_id');       
               $student_id = $this->input->post('student_id');   
               
               $class = $this->invoice->get_single('classes', array('id' => $class_id));
               $students = $this->invoice->get_student_list($class_id, $student_id);
               
            if(!empty($students)){
                    
                foreach($students as $key => $obj){
                   
                    $discount = 0.00;
                    $total_amount = 0.00;
                   
                    // save invoice data
                    $this->data['st'][$key] = array();

                    $this->data['st'][$key]['month'] =  $this->input->post('payment_month');
                    $this->data['st'][$key]['custom_invoice_id'] = $this->invoice->get_custom_id('invoices', 'INV');
                    $this->data['st'][$key]['student_id'] = $obj->id;
                   
                    ////Guardian Details
                    $this->data['st'][$key]['student_details'] = $this->get_student($obj->id,$class_id);
                    $this->data['st'][$key]['class_id'] = $class_id;
                    $this->data['st'][$key]['discount'] = $discount;
                    $this->data['st'][$key]['gross_amount'] = $total_amount;
                    $this->data['st'][$key]['net_amount'] = $total_amount;
                    $this->data['st'][$key]['is_applicable_discount'] = $is_applicable_discount;
                       ////$invoice_id = $this->invoice->insert('invoices', $this->data);
                       
                       /*$logs = array();
                       $logs['invoice_id'] = $invoice_id;
                       $logs['created_at'] = $this->data['created_at'];
                       $logs['created_by'] = $this->data['created_by'];
                       $logs['status'] = $this->data['status'];*/

                   
                   
                    if($hostel_fee != '' && $obj->is_hostel_member == 1){ 
                     
                        $hostel_cost = $this->invoice->get_student_hostel_cost($obj->user_id);
                        $total_amount +=  $hostel_cost->cost;  
                        $this->data['st'][$key]['hostel_feeamount'] = $hostel_cost->cost;
                        $this->data['st'][$key]['income_head'] = 'hostel_fee';
                       // $this->invoice->insert('invoice_logs', $logs);
                    }
                    
                    if($transport_fee != '' && $obj->is_transport_member == 1){
                      
                        $transport_fare = $this->invoice->get_student_transport_fare($obj->user_id);
                        $total_amount +=  $transport_fare->fare;  
                        $this->data['st'][$key]['transport_feeamount'] = $transport_fare->fare;
                        $this->data['st'][$key]['income_head_id'] = $transport_fee;
                        //$this->invoice->insert('invoice_logs', $logs);
                    }
                   
                    if($certificate_fee != '' ){
                       
                        $total_amount +=  $class->certificate_fee;  
                        $this->data['st'][$key]['certificate_feeamount'] = $class->certificate_fee;
                        $this->data['st'][$key]['income_head_id'] = $certificate_fee;
                       // $this->invoice->insert('invoice_logs', $logs);
                    } 
                   
                    if($exam_fee != '' ){
                       
                        $total_amount +=  $class->exam_fee;
                        $this->data['st'][$key]['exam_feeamount'] = $class->exam_fee;
                        $this->data['st'][$key]['income_head_id'] = $exam_fee;
                        //$this->invoice->insert('invoice_logs', $this->data['st'][$obj]);
                    }
                   
                    if($monthly_fee != ''){
                       
                        $total_amount +=  $class->monthly_tution_fee;
                        $this->data['st'][$key]['monthly_tution_feeamount'] = $class->monthly_tution_fee;
                        $this->data['st'][$key]['income_head_id'] = $monthly_fee;
                        //$this->invoice->insert('invoice_logs', $this->data['st'][$obj]);
                    }
                   
                    if($admission_fee != ''){
                       
                        $total_amount +=  $class->admission_fee;
                        $this->data['st'][$key]['admission_feeamount'] = $class->admission_fee;
                        $this->data['st'][$key]['income_head_id'] = $admission_fee;
                        //$this->invoice->insert('invoice_logs', $logs);
                    }
                   
                    if($is_applicable_discount == 1){
                        $discount =  $obj->discount/100*$total_amount;
                    }
                    $this->data['st'][$key]['discount'] =  $discount;
                       
                    $this->data['st'][$key]['gross_amount'] = $total_amount;
                    $this->data['st'][$key]['net_amount'] =  $total_amount - $discount;
                    
                }
            }
            /*$this->layout->title($this->lang->line('print').' | ' . SMS);
            $this->load->view('accounting/invoice/print', $this->data);*/
            
            return 'print';
            /*echo '<pre>';print_r($this->load);die;*/

        }else if(!empty($this->input->post('print')) && $this->input->post('print')=='form'){
            
            $data = array();
       
            $data['paid_status'] = 'unpaid';
            $data['status'] = 1;
            $data['invoice_type'] = 'academic';
            $data['academic_year_id'] = $this->academic_year_id;
            $data['month'] = $this->input->post('payment_month');
            $data['created_at'] = date('Y-m-d H:i:s');
            $data['created_by'] = logged_in_user_id();            
            $data['date'] = date('Y-m-d');
            
            
            // need to get student list by class id 
           $is_applicable_discount = $this->input->post('is_applicable_discount') ? $this->input->post('is_applicable_discount') : 0;       
           $hostel_fee      = $this->input->post('hostel_fee') ? $this->input->post('hostel_fee') : '';       
           $transport_fee   = $this->input->post('transport_fee ') ? $this->input->post('transport_fee ') : ''; 
           
           $certificate_fee = $this->input->post('certificate_fee') ? $this->input->post('certificate_fee') : ''; 
           $exam_fee        = $this->input->post('exam_fee') ? $this->input->post('exam_fee') : ''; 
           $monthly_fee     = $this->input->post('monthly_fee') ? $this->input->post('monthly_fee') : ''; 
           $admission_fee   = $this->input->post('admission_fee') ? $this->input->post('admission_fee') : ''; 
           
           $class_id = $this->input->post('class_id');       
           $student_id = $this->input->post('student_id');   
           
           $class = $this->invoice->get_single('classes', array('id' => $class_id));
           $students = $this->invoice->get_student_list($class_id, $student_id);
           
           if(!empty($students)){
                        
               foreach($students as $obj ){
                   
                   $discount = 0.00;
                   $total_amount = 0.00;
                   
                   // save invoice data
                   $data['custom_invoice_id'] = $this->invoice->get_custom_id('invoices', 'INV');
                   $data['student_id'] = $obj->id;
                   $data['class_id'] = $class_id;
                   $data['discount'] = $discount;
                   $data['gross_amount'] = $total_amount;
                   $data['net_amount'] = $total_amount;
                   $data['is_applicable_discount'] = $is_applicable_discount;
                   $invoice_id = $this->invoice->insert('invoices', $data);
                   
                   $logs = array();
                   $logs['invoice_id'] = $invoice_id;
                   $logs['created_at'] = $data['created_at'];
                   $logs['created_by'] = $data['created_by'];
                   $logs['status'] = $data['status'];

                   
                   
                   if($hostel_fee != '' && $obj->is_hostel_member == 1){ 
                     
                        $hostel_cost = $this->invoice->get_student_hostel_cost($obj->user_id);
                        $total_amount +=  $hostel_cost->cost;  
                        $logs['amount'] = $hostel_cost->cost;
                        $logs['income_head_id'] = $hostel_fee;
                        $this->invoice->insert('invoice_logs', $logs);
                   }
                   
                   if($transport_fee != '' && $obj->is_transport_member == 1){
                       
                        $transport_fare = $this->invoice->get_student_transport_fare($obj->user_id);
                        $total_amount +=  $transport_fare->fare;  
                        $logs['amount'] = $transport_fare->fare;
                        $logs['income_head_id'] = $transport_fee;
                        $this->invoice->insert('invoice_logs', $logs);
                   }
                   
                   if($certificate_fee != '' ){
                       
                        $total_amount +=  $class->certificate_fee;  
                        $logs['amount'] = $class->certificate_fee;
                        $logs['income_head_id'] = $certificate_fee;
                        $this->invoice->insert('invoice_logs', $logs);
                   }
                   
                   if($exam_fee != '' ){
                       
                        $total_amount +=  $class->exam_fee;
                        $logs['amount'] = $class->exam_fee;
                        $logs['income_head_id'] = $exam_fee;
                        $this->invoice->insert('invoice_logs', $logs);
                   }
                   
                   if($monthly_fee != ''){
                       
                        $total_amount +=  $class->monthly_tution_fee;
                        $logs['amount'] = $class->monthly_tution_fee;
                        $logs['income_head_id'] = $monthly_fee;
                        $this->invoice->insert('invoice_logs', $logs);
                   }
                   
                   if($admission_fee != ''){
                       
                        $total_amount +=  $class->admission_fee;
                        $logs['amount'] = $class->admission_fee;
                        $logs['income_head_id'] = $admission_fee;
                        $this->invoice->insert('invoice_logs', $logs);
                   }
                   
                   if($is_applicable_discount == 1){
                      $discount =  $obj->discount/100*$total_amount;
                   }
                   
                   // update invoice amount and discount data after calculate 
                   $update = array();
                   $update['discount'] = $discount;
                   $update['gross_amount']   = $total_amount;
                   $update['net_amount']   = $total_amount - $discount;
                   $this->invoice->update('invoices', $update, array('id' => $invoice_id));

                   ////Create Ledger Entry : First Entry

                   //Check if previous row is present
                    $this->db->select('*');
                    $this->db->from('students');
                    $this->db->where('id', $obj->id);
                    $this->db->order_by('created_at','desc');
                    $query = $this->db->get();

                    if ( $query->num_rows() > 0 )
                    {
                        $studentDetails = $query->row();

                        
                    }
                    

                    $this->db->select('*');
                    $this->db->from('ledger');
                    $this->db->where('registration_no',$studentDetails->registration_no);
                    $this->db->order_by('created_at','desc');
                    $query = $this->db->get();

                    if ( $query->num_rows() > 0 )
                    {
                        $ledger_prev = $query->result();

                        
                    }

                    $ledger = array();

                    if(!empty($ledger_prev)){


                       $ledger['invoice_id'] = $invoice_id;
                       $ledger['student_id'] = $obj->id;
                       $ledger['class_id'] = $class_id;
                       /*$ledger['discount'] = $discount;
                       $ledger['gross_amount'] = $total_amount;
                       $ledger['net_amount'] = $total_amount;*/
                      /* $ledger['is_applicable_discount'] = $is_applicable_discount; */
                       $ledger['academic_year_id'] = $this->academic_year_id;        
                       $ledger['invoice_type'] = 'academic';
                       
                       $ledger['registration_no'] = $studentDetails->registration_no;
                       $ledger['fee_due'] = $update['net_amount'];
                       $ledger['previous_due'] = $ledger_prev[0]->balance;
                       $ledger['total'] = $ledger['fee_due'] + $ledger['previous_due'];
                       $ledger['payment'] = 0.0;
                       $ledger['date'] = '';
                       $ledger['created_at'] = date('Y-m-d H:i:s');

                       $ledger['balance'] = $ledger['total'] + $ledger_prev[0]->balance;
                       $ledger['month'] =  $this->input->post('month');
                    }
                   else{
                        $ledger['invoice_id'] = $invoice_id;
                        $ledger['student_id'] = $obj->id;
                        $ledger['class_id'] = $class_id;
                        /*$ledger['discount'] = $discount;
                        $ledger['gross_amount'] = $total_amount;
                        $ledger['net_amount'] = $total_amount;*/
                        /* $ledger['is_applicable_discount'] = $is_applicable_discount; */
                        $ledger['academic_year_id'] = $this->academic_year_id;        
                        $ledger['invoice_type'] = 'academic';
                        $studentDetails = $this->invoice->get_single('students', array('id' => $obj->id));
                        $ledger['registration_no'] = $studentDetails->registration_no;
                        $ledger['fee_due'] = $update['net_amount'];
                        $ledger['previous_due'] = 0.0;
                        $ledger['total'] = $ledger['fee_due'];
                        $ledger['payment'] = 0.0;
                        $ledger['date'] = '';
                        $ledger['balance'] = $ledger['total'];
                        $ledger['month'] =  $this->input->post('month');
                        $ledger['created_at'] = date('Y-m-d H:i:s');

                   }

                   $this->ledger->insert('ledger',$ledger);
                }
            }
            return 'form';

        }
        
    }

    
    /*****************Function delete**********************************
    * @type            : Function
    * @function name   : delete
    * @description     : delete "Invoice" from database                  
    *                       
    * @param           : $id integer value
    * @return          : null 
    * ********************************************************** */
    public function delete($id = null) {
        
        check_permission(DELETE);
        if(!is_numeric($id)){
            error($this->lang->line('unexpected_error'));
             redirect('accounting/invoice/index');
        } 
                
        if ($this->invoice->delete('invoices', array('id' => $id))) {  
            
            $this->invoice->delete('invoice_logs', array('invoice_id' => $id));
            success($this->lang->line('delete_success'));
        } else {
            error($this->lang->line('delete_failed'));
        }
        
        redirect('accounting/invoice/index');
    }

    public function status_change($id = null) {
        
        check_permission(DELETE);
        if(!is_numeric($id)){
            error($this->lang->line('unexpected_error'));
             redirect('accounting/invoice/index');
        } 

        $this->db->select('paid_status');
        $this->db->from('invoices');
        $this->db->where('id',$id);
        $query = $this->db->get();

        if ( $query->num_rows() > 0 )
        {
            $employees = $query->row_array();

            
        }
        

        if($employees['paid_status']=='paid'){
             $updated = $this->invoice->update('invoices', array('paid_status'=>'unpaid'), array('id' => $id));
        }else{
             $updated = $this->invoice->update('invoices',  array('paid_status'=>'paid'), array('id' => $id));
        }
       
        if ($updated) {  
            
           
            success($this->lang->line('update_success'));
        } else {
            error($this->lang->line('update_failed'));
        }
        
        redirect('accounting/invoice/index');
    }

    public function get_student($student_id = null, $class_id = null) {

            $this->db->select('S.*, U.email, U.role_id, U.status AS login_status,G.id as guardian_id,G.name as guardian_name ,G.phone as guardian_phone, C.name AS class_name, SE.name AS section,E.roll_no');
            $this->db->from('enrollments AS E');
            $this->db->join('students AS S', 'S.id = E.student_id', 'left');
            $this->db->join('guardians AS G', 'S.guardian_id = G.id', 'left');
            $this->db->join('users AS U', 'U.id = S.user_id', 'left');
            $this->db->join('classes AS C', 'C.id = E.class_id', 'left');
            $this->db->join('sections AS SE', 'SE.id = E.section_id', 'left');
            $this->db->where('E.academic_year_id', $this->academic_year_id);
            $this->db->where('S.id', $student_id);
            $this->db->where('E.class_id', $class_id);
                   
             
            return $this->db->get()->row();
    }

    public function send_message($id) {    
        
        check_permission(VIEW);
        $username="AMREESH@25"; 
        $password="AMREESH@25";
        $sender="AMRESH";

        $invoiceDetails = $this->invoice->get_single_invoice($id);

        $this->db->select('*')->from('guardians')->where('id',$invoiceDetails->guardian_id);
        $query = $this->db->get();

        if ( $query->num_rows() > 0 )
        {
            $guardianDetails = $query->row_array();
        }
        if(!empty($guardianDetails)){
            

            $invoice = $this->payment->get_invoice_amount($id);
            $paid_amount = !empty($invoice->paid_amount)?$invoice->paid_amount:'0.00';
            $due_amount = $invoiceDetails->net_amount - $paid_amount;
            $message="Hello, Mr. ".$guardianDetails['name']." .Your ward ".$invoiceDetails->name." has submitted Rs.".$paid_amount ."as his school fees and his due fees amount is Rs." .$due_amount;

            $pingurl = "skycon.bulksms5.com/sendmessage.php";

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $pingurl);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, 'user=' . $username . '&password=' . $password . '&mobile=' . $guardianDetails['phone'] . '&message=' . urlencode($message) . '&sender=' . $sender . '&type=3');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $result = curl_exec($ch);
           
            curl_close($ch);

        }
        
       
                 
       
    }
   
}
