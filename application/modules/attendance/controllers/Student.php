<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/* * *****************Student.php**********************************
 * @product name    : Global School Management System Pro
 * @type            : Class
 * @class name      : Student
 * @description     : Manage student daily attendance.  
 * @author          : Codetroopers Team 	
 * @url             : https://themeforest.net/user/codetroopers      
 * @support         : yousuf361@gmail.com	
 * @copyright       : Codetroopers Team	 	
 * ********************************************************** */

class Student extends MY_Controller {

    public $data = array();
    
    function __construct() {
        parent::__construct();
        
        $this->load->helper('report');
        $this->load->model('Student_Model', 'student', true);
        $this->data['classes'] = $this->student->get_list('classes', array('status' => 1), '', '', '', 'id', 'ASC');
        $this->data['page_name'] = 'attendance'; 
         //ex:INVITE

       

        

    }

    
    
    /*****************Function index**********************************
    * @type            : Function
    * @function name   : index
    * @description     : Load "Student Attendance" user interface                 
    *                    and Process to manage daily Student attendance    
    * @param           : null
    * @return          : null 
    * ********************************************************** */ 
    public function index() {

        check_permission(VIEW);
        if ($_POST) {

            $class_id = $this->input->post('class_id');
            $section_id = $this->input->post('section_id');
            $date = $this->input->post('date');
            $month = date('m', strtotime($this->input->post('date')));
            $year = date('Y', strtotime($this->input->post('date')));
            $academic_year_id = $this->academic_year_id;

            $this->data['students'] = $this->student->get_student_list($class_id, $section_id, $academic_year_id);

            $condition = array(
                'class_id' => $class_id,
                'section_id' => $section_id,
                'academic_year_id' => $academic_year_id,
                'month' => $month,
                'year' => $year
            );

            $data = $condition;
            if (!empty($this->data['students'])) {

                foreach ($this->data['students'] as $obj) {

                    $condition['student_id'] = $obj->id;
                    $attendance = $this->student->get_single('student_attendances', $condition);

                    if (empty($attendance)) {
                        $data['student_id'] = $obj->id;
                        $data['status'] = 1;
                        $data['created_at'] = date('Y-m-d H:i:s');
                        $data['created_by'] = logged_in_user_id();
                        $this->student->insert('student_attendances', $data);
                    }
                }
            }

            $this->data['academic_year_id'] = $academic_year_id;
            $this->data['day'] = date('d', strtotime($this->input->post('date')));
            ;
            $this->data['month'] = date('m', strtotime($this->input->post('date')));
            ;
            $this->data['year'] = date('Y', strtotime($this->input->post('date')));
            ;
            $this->data['class_id'] = $class_id;
            $this->data['section_id'] = $section_id;
            $this->data['date'] = $date;
        }

        $this->layout->title($this->lang->line('student') . ' ' . $this->lang->line('attendance') . ' | ' . SMS);
        $this->layout->view('student/index', $this->data);
    }

   
        
    /*****************Function guardian**********************************
    * @type            : Function
    * @function name   : guardian
    * @description     : Load "Student Attendance for guardian" user interface                 
    *                    and Process to manage daily Student attendance    
    * @param           : null
    * @return          : null 
    * ********************************************************** */ 
    public function guardian() {

        check_permission(VIEW);

        $this->data['month_number'] = 1;
        $session = $this->student->get_single('academic_years', array('is_running' => 1));

        if ($_POST) {

            $academic_year_id = $this->input->post('academic_year_id');
            $class_id = $this->input->post('class_id');
            $section_id = $this->input->post('section_id');
            $month = $this->input->post('month');


            $this->data['academic_year_id'] = $academic_year_id;
            $this->data['class_id'] = $class_id;
            $this->data['section_id'] = $section_id;
            $this->data['month'] = $month;
            $this->data['month_number'] = date('m', strtotime($this->data['month']));
            $session = $this->student->get_single('academic_years', array('id' => $academic_year_id));
            $this->data['students'] = $this->student->get_student_attendance_list($academic_year_id, $class_id, $section_id);
           
        }

        
        $this->data['academic_years'] = $this->student->get_list('academic_years', array('status' => 1));

        
        $this->data['year'] = substr($session->session_year, 7);
        $this->data['days'] = cal_days_in_month(CAL_GREGORIAN, $this->data['month_number'], $this->data['year']);

        $this->data['classes'] = $this->student->get_list('classes', array('status' => 1));

        $this->layout->title($this->lang->line('student') . ' ' . $this->lang->line('attendance') . ' ' . $this->lang->line('report') . ' | ' . SMS);
        $this->layout->view('student/attendance', $this->data);
    }


    /*****************Function update_single_attendance**********************************
    * @type            : Function
    * @function name   : update_single_attendance
    * @description     : Process to update single student attendance status               
    *                        
    * @param           : null
    * @return          : null 
    * ********************************************************** */ 
    public function update_single_attendance() {

        $status = $this->input->post('status');
        $condition['student_id'] = $this->input->post('student_id');
        $condition['class_id'] = $this->input->post('class_id');
        $condition['section_id'] = $this->input->post('section_id');
        $condition['month'] = date('m', strtotime($this->input->post('date')));
        $condition['year'] = date('Y', strtotime($this->input->post('date')));
        $condition['academic_year_id'] = $this->academic_year_id;

        $field = 'day_' . abs(date('d', strtotime($this->input->post('date'))));
        if ($this->student->update('student_attendances', array($field => $status), $condition)) {
            echo TRUE;
        } else {
            echo FALSE;
        }
    }

    
    /*****************Function update_all_attendance**********************************
    * @type            : Function
    * @function name   : update_all_attendance
    * @description     : Process to update all student attendance status                 
    *                        
    * @param           : null
    * @return          : null 
    * ********************************************************** */
    public function update_all_attendance() {

        $status = $this->input->post('status');

        $condition['class_id'] = $this->input->post('class_id');
        $condition['section_id'] = $this->input->post('section_id');
        $condition['month'] = date('m', strtotime($this->input->post('date')));
        $condition['year'] = date('Y', strtotime($this->input->post('date')));
        $condition['academic_year_id'] = $this->academic_year_id;

        $field = 'day_' . abs(date('d', strtotime($this->input->post('date'))));
        if ($this->student->update('student_attendances', array($field => $status), $condition)) {
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
        ////Sending Messages to thye Present Students
        if(!empty($presentData)){
            foreach($presentData as $key => $value){
                $studentDetails = $this->student->get_single('students', array('id' => $value));

                $this->db->select('*')->from('guardians')->where('id',$studentDetails->guardian_id);
                $query = $this->db->get();

                if ( $query->num_rows() > 0 )
                {
                    $guardianDetails = $query->row_array();
                    $message="Hello, Mr. ".$guardianDetails['name']." .Your ward ".$studentDetails->name." was present on ".date('Y-m-d');
            
                    $url="skycon.bulksms5.com/sendmessage.php?user=".urlencode($username)."&password=".urlencode($password)."
                    &mobile=".urlencode($guardianDetails['phone'])."&message=".urlencode($message)."&sender=".urlencode($sender)."&type=3";

                    $pingurl = "skycon.bulksms5.com/sendmessage.php";

                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_URL, $pingurl);
                    curl_setopt($ch, CURLOPT_POST, 1);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, 'user=' . $username . '&password=' . $password . '&mobile=' . $guardianDetails['phone'] . '&message=' . urlencode($message) . '&sender=' . $sender . '&type=3');
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    $result = curl_exec($ch);
                    print_r($result);
                    curl_close($ch);
                    
                }
            }
        }
        if(!empty($absentData)){
            foreach($absentData as $key => $value){
                $studentDetails = $this->student->get_single('students', array('id' => $value));

                $this->db->select('*')->from('guardians')->where('id',$studentDetails->guardian_id);
                $query = $this->db->get();

                if ( $query->num_rows() > 0 )
                {
                    $guardianDetails = $query->row_array();
                    $message="Hello, Mr. ".$guardianDetails['name']." .Your ward ".$studentDetails->name." was absent on ".date('Y-m-d');
            
                    $url="skycon.bulksms5.com/sendmessage.php?user=".urlencode($username)."&password=".urlencode($password)."
                    &mobile=".urlencode($guardianDetails['phone'])."&message=".urlencode($message)."&sender=".urlencode($sender)."&type=3";

                    $pingurl = "skycon.bulksms5.com/sendmessage.php";

                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_URL, $pingurl);
                    curl_setopt($ch, CURLOPT_POST, 1);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, 'user=' . $username . '&password=' . $password . '&mobile=' . $guardianDetails['phone'] . '&message=' . urlencode($message) . '&sender=' . $sender . '&type=3');
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    $result = curl_exec($ch);
                     print_r($result);
                    curl_close($ch);
                    
                }
            }
        }
        if(!empty($lateData)){
            foreach($lateData as $key => $value){
                $studentDetails = $this->student->get_single('students', array('id' => $value));

                $this->db->select('*')->from('guardians')->where('id',$studentDetails->guardian_id);
                $query = $this->db->get();

                if ( $query->num_rows() > 0 )
                {
                    $guardianDetails = $query->row_array();
                    $message="Hello, Mr. ".$guardianDetails['name']." .Your ward ".$studentDetails->name."'s attendance has been marked late on ".date('Y-m-d');
            
                    $url="skycon.bulksms5.com/sendmessage.php?user=".urlencode($username)."&password=".urlencode($password)."
                    &mobile=".urlencode($guardianDetails['phone'])."&message=".urlencode($message)."&sender=".urlencode($sender)."&type=3";

                    $pingurl = "skycon.bulksms5.com/sendmessage.php";

                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_URL, $pingurl);
                    curl_setopt($ch, CURLOPT_POST, 1);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, 'user=' . $username . '&password=' . $password . '&mobile=' . $guardianDetails['phone'] . '&message=' . urlencode($message) . '&sender=' . $sender . '&type=3');
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    $result = curl_exec($ch);
                    print_r($result);
                    curl_close($ch);
                    
                }
            }
        }
        
        
       
    }

}
