<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/* * *****************Employee.php**********************************
 * @product name    : Global School Management System Pro
 * @type            : Class
 * @class name      : Employee
 * @description     : Manage employee daily attendance.  
 * @author          : Codetroopers Team 	
 * @url             : https://themeforest.net/user/codetroopers      
 * @support         : yousuf361@gmail.com	
 * @copyright       : Codetroopers Team	 	
 * ********************************************************** */

class Employee extends MY_Controller {

    public $data = array();    
    
    function __construct() {
        parent::__construct();
         $this->load->model('Employee_Model', 'employee', true);
         $this->data['page_name'] = 'attendance'; 
    }

    
    
    /*****************Function index**********************************
    * @type            : Function
    * @function name   : index
    * @description     : Load "Employee Attendance" user interface                 
    *                    and Process to manage daily Employee attendance    
    * @param           : null
    * @return          : null 
    * ********************************************************** */    
    public function index() { 
        
          check_permission(VIEW);
        
        if($_POST){ 
            $date       = $this->input->post('date');            
            $month      = date('m', strtotime($this->input->post('date')));
            $year       = date('Y', strtotime($this->input->post('date')));            
            
            $this->data['employees'] = $this->employee->get_employee_list();            
            
            $condition = array(              
                'month'=>$month,
                'year'=>$year
            );
            
            $data = $condition;
            if(!empty($this->data['employees'])){
                
                foreach($this->data['employees'] as $obj){
                    
                    $condition['employee_id'] = $obj->id;                    
                    $attendance = $this->employee->get_single('employee_attendances', $condition);
                  
                    if(empty($attendance)){
                       $data['academic_year_id'] = $this->academic_year_id; 
                       $data['employee_id'] = $obj->id; 
                       $data['status'] = 1;
                       $data['created_at'] = date('Y-m-d H:i:s');
                       $data['created_by'] = logged_in_user_id();
                       $this->employee->insert('employee_attendances', $data);
                    }                    
                }
            }
            
            $this->data['academic_year_id'] = $this->academic_year_id;
            $this->data['day'] = date('d', strtotime($this->input->post('date')));
            $this->data['month'] = date('m', strtotime($this->input->post('date')));
            $this->data['year'] = date('Y', strtotime($this->input->post('date')));

            $this->data['date'] = $date;
            
        }
        
        $this->layout->title($this->lang->line('employee'). ' ' . $this->lang->line('attendance'). ' | ' . SMS);
        $this->layout->view('employee/index', $this->data);  
    }

 

    /*****************Function update_single_attendance**********************************
    * @type            : Function
    * @function name   : update_single_attendance
    * @description     : Process to update single employee attendance status               
    *                        
    * @param           : null
    * @return          : null 
    * ********************************************************** */  
    public function update_single_attendance(){        
        
        $status     = $this->input->post('status');
        $condition['employee_id'] = $this->input->post('employee_id');;        
        $condition['month']      = date('m', strtotime($this->input->post('date')));
        $condition['year']       = date('Y', strtotime($this->input->post('date')));
        $condition['academic_year_id'] = $this->academic_year_id;
        
        $field = 'day_'.abs(date('d', strtotime($this->input->post('date'))));
        if($this->employee->update('employee_attendances', array($field=>$status), $condition)){
            echo TRUE;
        }else{
            echo FALSE;
        }  
    }
    
    
    /*****************Function update_all_attendance**********************************
    * @type            : Function
    * @function name   : update_all_attendance
    * @description     : Process to update all employee attendance status                 
    *                        
    * @param           : null
    * @return          : null 
    * ********************************************************** */ 
     public function update_all_attendance(){        
        
        $status     = $this->input->post('status');        
        $condition['month']      = date('m', strtotime($this->input->post('date')));
        $condition['year']       = date('Y', strtotime($this->input->post('date')));
        $condition['academic_year_id'] = $this->academic_year_id;
        
        $field = 'day_'.abs(date('d', strtotime($this->input->post('date'))));
        if($this->employee->update('employee_attendances', array($field=>$status), $condition)){
            echo TRUE;
        }else{
            echo FALSE;
        }       
    }

    public function send_message() {

        $username="AMREESH@25"; 
        $password="AMREESH@25";
        $sender="AMRESH";

        $presentData = $this->input->post('presentData');
        $absentData = $this->input->post('absentData');
        $lateData = $this->input->post('lateData');
     
        $present="";$absent="";$late="";
        ////Sending Messages to thye Present employees
        if(!empty($presentData)){
            foreach($presentData as $key => $value){
                $employeeDetails = $this->employee->get_single('employees', array('id' => $value));
                if(!empty($employeeDetails->phone)){
                  
                    $message="Hello, Mr. ".$employeeDetails->name." .Your attendance has been marked as present for ".$this->input->post('date');
            
                    $url="skycon.bulksms5.com/sendmessage.php?user=".urlencode($username)."&password=".urlencode($password)."
                    &mobile=".urlencode($employeeDetails->phone)."&message=".urlencode($message)."&sender=".urlencode($sender)."&type=3";

                    $pingurl = "skycon.bulksms5.com/sendmessage.php";

                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_URL, $pingurl);
                    curl_setopt($ch, CURLOPT_POST, 1);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, 'user=' . $username . '&password=' . $password . '&mobile=' . $employeeDetails->phone . '&message=' . urlencode($message) . '&sender=' . $sender . '&type=3');
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    $result = curl_exec($ch);
                    print_r($result);
                    curl_close($ch);
                } 
                
            }
        }
        if(!empty($absentData)){
            foreach($absentData as $key => $value){
                $employeeDetails = $this->employee->get_single('employees', array('id' => $value));

                if(!empty($employeeDetails->phone))
                {
                    
                    $message="Hello, Mr. ".$employeeDetails->name." .Your attendance has been marked as absent for ".$this->input->post('date');
            
                    $url="skycon.bulksms5.com/sendmessage.php?user=".urlencode($username)."&password=".urlencode($password)."
                    &mobile=".urlencode($employeeDetails->phone)."&message=".urlencode($message)."&sender=".urlencode($sender)."&type=3";

                    $pingurl = "skycon.bulksms5.com/sendmessage.php";

                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_URL, $pingurl);
                    curl_setopt($ch, CURLOPT_POST, 1);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, 'user=' . $username . '&password=' . $password . '&mobile=' . $employeeDetails->phone . '&message=' . urlencode($message) . '&sender=' . $sender . '&type=3');
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    $result = curl_exec($ch);
                     print_r($result);
                    curl_close($ch);
                    
                }
            }
        }
        if(!empty($lateData)){
            foreach($lateData as $key => $value){
                $employeeDetails = $this->employee->get_single('employees', array('id' => $value));

                
                if(!empty($employeeDetails->phone))
                {
                    
                    $message="Hello, Mr. ".$employeeDetails->name." .Your attendance has been marked as late for ".$this->input->post('date');
            
                    $url="skycon.bulksms5.com/sendmessage.php?user=".urlencode($username)."&password=".urlencode($password)."
                    &mobile=".urlencode($employeeDetails->phone)."&message=".urlencode($message)."&sender=".urlencode($sender)."&type=3";

                    $pingurl = "skycon.bulksms5.com/sendmessage.php";

                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_URL, $pingurl);
                    curl_setopt($ch, CURLOPT_POST, 1);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, 'user=' . $username . '&password=' . $password . '&mobile=' . $employeeDetails->phone . '&message=' . urlencode($message) . '&sender=' . $sender . '&type=3');
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    $result = curl_exec($ch);
                    print_r($result);
                    curl_close($ch);
                    
                }
            }
        }
         
    }

    
}
