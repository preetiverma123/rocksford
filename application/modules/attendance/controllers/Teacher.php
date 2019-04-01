<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/* * *****************Teacher.php**********************************
 * @product name    : Global School Management System Pro
 * @type            : Class
 * @class name      : Teacher
 * @description     : Manage teacher daily attendance.  
 * @author          : Codetroopers Team 	
 * @url             : https://themeforest.net/user/codetroopers      
 * @support         : yousuf361@gmail.com	
 * @copyright       : Codetroopers Team	 	
 * ********************************************************** */

class Teacher extends MY_Controller {

    public $data = array();

    function __construct() {
        parent::__construct();
        $this->load->model('Teacher_Model', 'teacher', true);
        $this->data['page_name'] = 'attendance'; 
    }

    
    /*****************Function index**********************************
    * @type            : Function
    * @function name   : index
    * @description     : Load "Teacher Attendance" user interface                 
    *                    and Process to manage daily Teacher attendance    
    * @param           : null
    * @return          : null 
    * ********************************************************** */ 
    public function index() {

        check_permission(VIEW);

        if ($_POST) {

            $date = $this->input->post('date');
            $month = date('m', strtotime($this->input->post('date')));
            $year = date('Y', strtotime($this->input->post('date')));
            $academic_year_id = $this->academic_year_id;

            $this->data['teachers'] = $this->teacher->get_teacher_list();


            $condition = array(
                'month' => $month,
                'year' => $year
            );

            $data = $condition;
            if (!empty($this->data['teachers'])) {

                foreach ($this->data['teachers'] as $obj) {

                    $condition['teacher_id'] = $obj->id;

                    $attendance = $this->teacher->get_single('teacher_attendances', $condition);

                    if (empty($attendance)) {
                        $data['academic_year_id'] = $academic_year_id;
                        $data['teacher_id'] = $obj->id;
                        $data['status'] = 1;
                        $data['created_at'] = date('Y-m-d H:i:s');
                        $data['created_by'] = logged_in_user_id();
                        $this->teacher->insert('teacher_attendances', $data);
                    }
                }
            }

            $this->data['academic_year_id'] = $academic_year_id;
            $this->data['day'] = date('d', strtotime($this->input->post('date')));
            $this->data['month'] = date('m', strtotime($this->input->post('date')));
            $this->data['year'] = date('Y', strtotime($this->input->post('date')));

            $this->data['date'] = $date;
        }

        $this->layout->title($this->lang->line('teacher') . ' ' . $this->lang->line('attendance') . ' | ' . SMS);
        $this->layout->view('teacher/index', $this->data);
    }



    /*****************Function update_single_attendance**********************************
    * @type            : Function
    * @function name   : update_single_attendance
    * @description     : Process to update single teacher attendance status               
    *                        
    * @param           : null
    * @return          : null 
    * ********************************************************** */ 
    public function update_single_attendance() {

        $status = $this->input->post('status');
        $condition['teacher_id'] = $this->input->post('teacher_id');
        ;
        $condition['month'] = date('m', strtotime($this->input->post('date')));
        $condition['year'] = date('Y', strtotime($this->input->post('date')));
        $condition['academic_year_id'] = $this->academic_year_id;

        $field = 'day_' . abs(date('d', strtotime($this->input->post('date'))));
        if ($this->teacher->update('teacher_attendances', array($field => $status), $condition)) {
            echo TRUE;
        } else {
            echo FALSE;
        }
    }

    
    
    /*****************Function update_all_attendance**********************************
    * @type            : Function
    * @function name   : update_all_attendance
    * @description     : Process to update all teacher attendance status                 
    *                        
    * @param           : null
    * @return          : null 
    * ********************************************************** */
    public function update_all_attendance() {

        $status = $this->input->post('status');

        $condition['month'] = date('m', strtotime($this->input->post('date')));
        $condition['year'] = date('Y', strtotime($this->input->post('date')));
        $condition['academic_year_id'] = $this->academic_year_id;

        $field = 'day_' . abs(date('d', strtotime($this->input->post('date'))));
        if ($this->teacher->update('teacher_attendances', array($field => $status), $condition)) {
            echo TRUE;
        } else {
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
        ////Sending Messages to thye Present Teachers
        if(!empty($presentData)){
            foreach($presentData as $key => $value){
                $teacherDetails = $this->teacher->get_single('teachers', array('id' => $value));
           
                if(!empty($teacherDetails->phone)){
                  
                    $message="Hello, Mr. ".$teacherDetails->name." .Your attendance has been marked as present for ".$this->input->post('date');
            
                    $url="skycon.bulksms5.com/sendmessage.php?user=".urlencode($username)."&password=".urlencode($password)."
                    &mobile=".urlencode($teacherDetails->phone)."&message=".urlencode($message)."&sender=".urlencode($sender)."&type=3";

                    $pingurl = "skycon.bulksms5.com/sendmessage.php";

                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_URL, $pingurl);
                    curl_setopt($ch, CURLOPT_POST, 1);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, 'user=' . $username . '&password=' . $password . '&mobile=' . $teacherDetails->phone . '&message=' . urlencode($message) . '&sender=' . $sender . '&type=3');
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    $result = curl_exec($ch);
                    print_r($result);
                    curl_close($ch);
                } 
                
            }
        }
        if(!empty($absentData)){
            foreach($absentData as $key => $value){
                 $teacherDetails = $this->teacher->get_single('teachers', array('id' => $value));

                

                 if(!empty($teacherDetails->phone))
                {
                    
                    $message="Hello, Mr. ".$teacherDetails->name." .Your attendance has been marked as absent for ".$this->input->post('date');
            
                    $url="skycon.bulksms5.com/sendmessage.php?user=".urlencode($username)."&password=".urlencode($password)."
                    &mobile=".urlencode($teacherDetails->phone)."&message=".urlencode($message)."&sender=".urlencode($sender)."&type=3";

                    $pingurl = "skycon.bulksms5.com/sendmessage.php";

                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_URL, $pingurl);
                    curl_setopt($ch, CURLOPT_POST, 1);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, 'user=' . $username . '&password=' . $password . '&mobile=' . $teacherDetails->phone . '&message=' . urlencode($message) . '&sender=' . $sender . '&type=3');
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    $result = curl_exec($ch);
                     print_r($result);
                    curl_close($ch);
                    
                }
            }
        }
        if(!empty($lateData)){
            foreach($lateData as $key => $value){
                $teacherDetails = $this->teacher->get_single('teachers', array('id' => $value));

                
                  if(!empty($teacherDetails->phone))
                {
                    
                     $message="Hello, Mr. ".$teacherDetails->name." .Your attendance has been marked as late for ".$this->input->post('date');
            
                    $url="skycon.bulksms5.com/sendmessage.php?user=".urlencode($username)."&password=".urlencode($password)."
                    &mobile=".urlencode($teacherDetails->phone)."&message=".urlencode($message)."&sender=".urlencode($sender)."&type=3";

                    $pingurl = "skycon.bulksms5.com/sendmessage.php";

                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_URL, $pingurl);
                    curl_setopt($ch, CURLOPT_POST, 1);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, 'user=' . $username . '&password=' . $password . '&mobile=' . $teacherDetails->phone . '&message=' . urlencode($message) . '&sender=' . $sender . '&type=3');
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    $result = curl_exec($ch);
                    print_r($result);
                    curl_close($ch);
                    
                }
            }
        }
        
        
       
    }

}
