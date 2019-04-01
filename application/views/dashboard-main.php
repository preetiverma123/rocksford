<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta charset="ISO-8859-15">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title><?php echo $this->session->userdata('school_name'); ?></title>
        <link rel="icon" href="<?php echo IMG_URL; ?>favicon.ico" type="image/x-icon" />
        <!-- Bootstrap -->
        <link href="<?php echo VENDOR_URL; ?>bootstrap/bootstrap.min.css" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="<?php echo VENDOR_URL; ?>font-awesome/css/font-awesome.min.css" rel="stylesheet">
    
        <!-- Custom Theme Style -->
        <link href="<?php echo CSS_URL; ?>custom.css" rel="stylesheet">
        
        <?php if($this->session->userdata('theme')){ ?>
            <link href="<?php echo CSS_URL; ?>theme/<?php echo $this->session->userdata('theme'); ?>.css" rel="stylesheet">
        <?php }else{ ?>
            <link href="<?php echo CSS_URL; ?>theme/dodger-blue.css" rel="stylesheet">
        <?php } ?>
        
        <!-- jQuery -->
        <script src="<?php echo JS_URL; ?>jquery-1.11.2.min.js"></script>
        <script src="<?php echo JS_URL; ?>jquery.validate.js"></script>
        <!-- <script src="<?php echo JS_URL; ?>custom.js"></script>    -->
        <style type="text/css">
            
            .navbar-nav .open .dropdown-menu.msg_list{
                 display: none;
            }
        </style>
    </head>
<body class="main-dashboard">

  <div class="top_nav">
    <div class="nav_menu">
        <nav>
            <!--<div class="col-md-3">
                <div class="nav toggle">
                    <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                </div>
            </div>-->
            <?php 
                    $this->db->select('*');
                    $this->db->from('settings');
                    $this->db->where('id', 1 );
                    $query = $this->db->get();

                    if ( $query->num_rows() > 0 )
                    {
                        $row = $query->row_array();

                        
                    }

                ?>


            <div class="col-md-6">
                <div class="school-name"><?php  echo $row['school_name']; ?><!-- <?php echo $this->session->userdata('school_name'); ?> --></div>
            </div>
            <div class="col-md-6">
                <ul class="nav navbar-nav navbar-right">
                    <li class="navtoggle">
                        <a href="javascript:void(0);" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            <?php
                                $photo = $this->session->userdata('photo');
                                $role_id = $this->session->userdata('role_id');
                                $path = '';
                                if($role_id == STUDENT){ $path = 'student'; }
                                elseif($role_id == GUARDIAN){ $path = 'guardian'; }
                                elseif($role_id == TEACHER){ $path = 'teacher'; }
                                else{ $path = 'employee'; }
                            ?>
                            <?php if ($photo != '') { ?>                                        
                                <img src="<?php echo UPLOAD_PATH; ?>/<?php echo $path; ?>-photo/<?php echo $photo; ?>" alt="" width="60" /> 
                            <?php } else { ?>
                                <img src="<?php echo IMG_URL; ?>/default-user.png" alt="" width="60" /> 
                            <?php } ?>                            
                            <?php echo $this->session->userdata('name'); ?>
                            <span class=" fa fa-angle-down"></span>
                        </a>
                        <ul class="dropdown-menu dropdown-usermenu pull-right">
                            <li><a href="<?php echo site_url('profile/index'); ?>"> <?php echo $this->lang->line('profile'); ?></a></li>
                            <li><a href="<?php echo site_url('profile/password'); ?>"><?php echo $this->lang->line('reset_password'); ?></a></li>
                            <li><a href="<?php echo site_url('auth/logout'); ?>"><i class="fa fa-sign-out pull-right"></i> <?php echo $this->lang->line('logout'); ?></a></li>
                        </ul>
                    </li>
                    <?php $messages = get_inbox_message(); ?>
                    <?php if(isset($messages) && !empty($messages)){ ?>
                    <li role="presentation" class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-envelope-o"></i>
                            <span class="badge bg-green"><?php echo count($messages); ?></span>
                        </a>
                        <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                            
                           <?php foreach($messages as $obj){ ?> 
                            <li>
                                <?php $user = get_user_by_id($obj->sender_id);  ?>
                                <a>
                                    <span class="image"><img src="<?php echo IMG_URL; ?>default-user.png" alt="Profile Image" /></span>
                                    <span>
                                        <span><?php echo $user->name; ?></span>
                                        <span class="time"><?php echo get_nice_time($obj->created_at); ?></span>
                                    </span>
                                    <span class="message">
                                        <?php echo $obj->subject; ?>
                                    </span>
                                </a>
                            </li>                    
                            <?php } ?>
                            <li>
                                <div class="text-center">
                                    <a href="<?php echo site_url('message/inbox'); ?>">
                                        <strong>See All</strong>
                                        <i class="fa fa-angle-right"></i>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <?php } ?>
                    <li>
                        <a href="<?php echo site_url(); ?>"><i class="fa fa-globe"></i> Web</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>
<div class="dashboard-wrap">
    <div class="container">
        <div class="row">
          <!--  <div class="school-name"><?php echo $this->session->userdata('school_name'); ?></div> -->
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="dashboardHead">
                    <h2>Choose Your Options</h2>
                </div>

              <!--   <div class="buttonSignout">
                    <button class="btn btn-primary">Sign out</button>
                </div> -->
            </div>

        </div>
    </div>
</div>
<?php $classes = get_classes(); ?>
<div class="container">
<div class="row tile_count">
     <?php if(has_permission(VIEW, 'setting', 'setting') || has_permission(VIEW, 'setting', 'payment') || has_permission(VIEW, 'setting', 'sms')){ ?>
    <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
        <div class="stats-count-inner">
            <span class="count_top"><a href="<?php echo site_url('setting'); ?>"><img  src="<?php echo IMG_URL; ?>settingicon.png"><!-- <i class="fa fa-group"></i>  --><?php echo $this->lang->line('setting'); ?> </a>
         
        </div>
    </div>
     <?php } ?>

     <!-- <?php if(has_permission(VIEW, 'theme', 'theme')){ ?>
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <div class="stats-count-inner">

            <span class="count_top"><a href="<?php echo site_url('theme'); ?>"><i class="fa fa-group"></i><?php echo $this->lang->line('theme'); ?> </a>
         
        </div>
    </div>
     <?php } ?> -->

      <?php if(has_permission(VIEW, 'language', 'language')){ ?>
    <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
        <div class="stats-count-inner">
            <span class="count_top"><a href="<?php echo site_url('language'); ?>"><!-- <i class="fa fa-group"></i> --><img  src="<?php echo IMG_URL; ?>langicon.png"><?php echo $this->lang->line('language'); ?> </a>
         
        </div>
    </div>
     <?php } ?>

    <?php if(has_permission(VIEW, 'administrator', 'year') || has_permission(VIEW, 'administrator', 'role') || has_permission(VIEW, 'administrator', 'permission') || has_permission(VIEW, 'administrator', 'user') || has_permission(EDIT, 'administrator', 'password') || has_permission(VIEW, 'administrator', 'backup')){ ?>
    <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
        <div class="stats-count-inner">
            <span class="count_top"><a href="<?php echo site_url('administrator/year'); ?>"><!-- <i class="fa fa-group"></i> --> <img  src="<?php echo IMG_URL; ?>admin.png"><?php echo $this->lang->line('administrator'); ?></a>
         
        </div>
    </div>
     <?php } ?>

      <?php if(has_permission(VIEW, 'hrm', 'designation') || has_permission(VIEW, 'hrm', 'employee')){ ?>   
    <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
        <div class="stats-count-inner">
            <span class="count_top"><a href="<?php echo site_url('hrm/designation'); ?>"><!-- <i class="fa fa-group"></i> -->  <img  src="<?php echo IMG_URL; ?>humanres.png"><?php echo $this->lang->line('human_resource'); ?></a>
         
        </div>
    </div>
     <?php } ?>
     
     <?php if(has_permission(VIEW, 'facility', 'facility')){ ?>
    <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
        <div class="stats-count-inner">
            <span class="count_top"><a href="<?php echo site_url('facility'); ?>"><!-- <i class="fa fa-group"></i> --><img  src="<?php echo IMG_URL; ?>facility.png">  <?php echo 'Facility'; ?></a>
         
        </div>
    </div>
     <?php } ?>

     <?php if(has_permission(VIEW, 'teacher', 'teacher')){ ?>
    <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
        <div class="stats-count-inner">
            <span class="count_top"><a href="<?php echo site_url('teacher'); ?>"><!-- <i class="fa fa-group"></i> --><img  src="<?php echo IMG_URL; ?>teacher.png">  <?php echo $this->lang->line('teacher'); ?></a>
         
        </div>
    </div>
     <?php } ?>

     <?php if(has_permission(VIEW, 'academic', 'classes')){ ?>
    <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
        <div class="stats-count-inner">
            <span class="count_top"><a href="<?php echo site_url('academic/classes/index'); ?>"><!-- <i class="fa fa-group"></i> --><img  src="<?php echo IMG_URL; ?>class.png"> <?php echo $this->lang->line('class'); ?></a>
         
        </div>
    </div>
     <?php } ?>

     <?php if(has_permission(VIEW, 'academic', 'section')){ ?> 
    <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
        <div class="stats-count-inner">
            <span class="count_top"><a href="<?php echo site_url('Dashboard/customMenu?page_name=section'); ?>"><!-- <i class="fa fa-group"></i> --><img  src="<?php echo IMG_URL; ?>section.png"> <?php echo $this->lang->line('section'); ?></a>
         
        </div>
    </div>
     <?php } ?>

     <?php if(has_permission(VIEW, 'academic', 'subject')){ ?>
    <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
        <div class="stats-count-inner">
            <span class="count_top"><a href="<?php echo site_url('Dashboard/customMenu?page_name=subject'); ?>"><!-- <i class="fa fa-group"></i> --><img  src="<?php echo IMG_URL; ?>subject.png"><?php echo $this->lang->line('subject'); ?></a>
         
        </div>
    </div>
     <?php } ?>

     <?php if(has_permission(VIEW, 'academic', 'syllabus')){ ?>
    <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
        <div class="stats-count-inner">
            <span class="count_top"><a href="<?php echo site_url('Dashboard/customMenu?page_name=syllabus'); ?>"><!-- <i class="fa fa-group"></i> --> <img  src="<?php echo IMG_URL; ?>syllabus.png"><?php echo $this->lang->line('syllabus'); ?></a>
         
        </div>
    </div>
     <?php } ?>

      <?php if(has_permission(VIEW, 'academic', 'routine')){ ?>
    <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
        <div class="stats-count-inner">
            <span class="count_top"><a href="<?php echo site_url('Dashboard/customMenu?page_name=class_routine'); ?>"><!-- <i class="fa fa-group"></i>  --><img  src="<?php echo IMG_URL; ?>routine.png"><?php echo $this->lang->line('class'); ?> <?php echo $this->lang->line('routine'); ?></a>
         
        </div>
    </div>
     <?php } ?>
    
    <?php if(has_permission(VIEW, 'guardian', 'guardian')){ ?> 
        <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
            <div class="stats-count-inner">
                <span class="count_top"><a href="<?php echo site_url('guardian/index/'); ?>"><!-- <i class="fa fa-group"></i> --> <img  src="<?php echo IMG_URL; ?>guardian.png"><?php echo $this->lang->line('guardian'); ?></a>
             
            </div>
        </div>
     <?php } ?>


   <?php if(has_permission(VIEW, 'student', 'student') || has_permission(ADD, 'student', 'student')){ ?>
    <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
        <div class="stats-count-inner">
            <span class="count_top"><a href="<?php echo site_url('Dashboard/customMenu?page_name=student'); ?>"><!-- <i class="fa fa-group"></i>  --><img  src="<?php echo IMG_URL; ?>student.png"><?php echo $this->lang->line('student'); ?></a>
         
        </div>
    </div>
     <?php } ?>

     <?php if(has_permission(VIEW, 'attendance', 'student') || has_permission(VIEW, 'attendance', 'teacher') || has_permission(VIEW, 'attendance', 'employee')){ ?>
    <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
        <div class="stats-count-inner">
            <span class="count_top"><a href="<?php echo site_url('Dashboard/customMenu?page_name=attendance'); ?>"><!-- <i class="fa fa-group"></i> --><img  src="<?php echo IMG_URL; ?>attendance.png"> <?php echo $this->lang->line('attendance'); ?></a>
         
        </div>
    </div>
     <?php } ?>

      <?php if(has_permission(VIEW, 'assignment', 'assignment')){ ?>
    <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
        <div class="stats-count-inner">
            <span class="count_top"><a href="<?php echo site_url('Dashboard/customMenu?page_name=assignment'); ?>"><!-- <i class="fa fa-group"></i> --><img  src="<?php echo IMG_URL; ?>assignment.png"> <?php echo $this->lang->line('assignment'); ?> </a>
         
        </div>
    </div>
     <?php } ?>

     <?php if(has_permission(VIEW, 'exam', 'grade') || has_permission(VIEW, 'exam', 'exam') || has_permission(VIEW, 'exam', 'schedule') || has_permission(VIEW, 'exam', 'suggestion') || has_permission(VIEW, 'exam', 'attendance')){ ?> 
    <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
        <div class="stats-count-inner">
            <span class="count_top"><a href="<?php echo site_url('Dashboard/customMenu?page_name=exam'); ?>"><!-- <i class="fa fa-group"></i> --> <img  src="<?php echo IMG_URL; ?>grade.png"><?php echo $this->lang->line('exam'); ?> </a>
         
        </div>
    </div>
     <?php } ?>

    <?php if(has_permission(VIEW, 'exam', 'schedule')){ ?>
    <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
        <div class="stats-count-inner">
            <span class="count_top"><a href="<?php echo site_url('Dashboard/customMenu?page_name=exam_schedule'); ?>"><!-- <i class="fa fa-group"></i> --><img  src="<?php echo IMG_URL; ?>schedule.png"> <?php echo $this->lang->line('exam'); ?> <?php echo $this->lang->line('schedule'); ?></a>
         
        </div>
    </div>
     <?php } ?>

     <?php if(has_permission(VIEW, 'exam', 'suggestion')){ ?>
    <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
        <div class="stats-count-inner">
            <span class="count_top"><a href="<?php echo site_url('Dashboard/customMenu?page_name=exam_suggestion'); ?>"><!-- <i class="fa fa-group"></i> --><img  src="<?php echo IMG_URL; ?>suggestion.png"><?php echo $this->lang->line('exam'); ?> <?php echo $this->lang->line('suggestion'); ?></a>
         
        </div>
    </div>
     <?php } ?>

     <?php if(has_permission(VIEW, 'exam', 'attendance')){ ?>
    <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
        <div class="stats-count-inner">
            <span class="count_top"><a href="<?php echo site_url('Dashboard/customMenu?page_name=attendance'); ?>"><!-- <i class="fa fa-group"></i> --><img  src="<?php echo IMG_URL; ?>examattendance.png"><?php echo $this->lang->line('exam'); ?> <?php echo $this->lang->line('attendance'); ?></a>
         
        </div>
    </div>
     <?php } ?>

      <?php if(has_permission(VIEW, 'exam', 'mark') || has_permission(VIEW, 'exam', 'marksheet') || has_permission(VIEW, 'exam', 'result') || has_permission(VIEW, 'exam', 'sms') || has_permission(VIEW, 'exam', 'mail')){ ?> 
    <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
        <div class="stats-count-inner">
            <span class="count_top"><a href="<?php echo site_url('Dashboard/customMenu?page_name=exam_mark'); ?>"><!-- <i class="fa fa-group"></i>  --><img  src="<?php echo IMG_URL; ?>mark.png"><?php echo $this->lang->line('exam_mark'); ?> </a>
         
        </div>
    </div>
     <?php } ?>

     <?php if(has_permission(VIEW, 'academic', 'promotion')){ ?>
    <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
        <div class="stats-count-inner">
            <span class="count_top"><a href="<?php echo site_url('academic/promotion'); ?>"><!-- <i class="fa fa-group"></i> --> <img  src="<?php echo IMG_URL; ?>promotion.png"><?php echo $this->lang->line('promotion'); ?> </a>
         
        </div>
    </div>
     <?php } ?>

      <?php if(has_permission(VIEW, 'certificate', 'certificate') || has_permission(VIEW, 'certificate', 'type')){ ?>
    <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
        <div class="stats-count-inner">
            <span class="count_top"><a href="<?php echo site_url('Dashboard/customMenu?page_name=certificate'); ?>"><!-- <i class="fa fa-group"></i> --><img  src="<?php echo IMG_URL; ?>certificate.png"><?php echo $this->lang->line('certificate'); ?></a>
         
        </div>
    </div>
     <?php } ?>

   <?php if(has_permission(VIEW, 'library', 'book') || has_permission(VIEW, 'library', 'member') || has_permission(VIEW, 'library', 'issue')){ ?> 
    <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
        <div class="stats-count-inner">
            <span class="count_top"><a href="<?php echo site_url('Dashboard/customMenu?page_name=library'); ?>"><!-- <i class="fa fa-group"></i> --><img  src="<?php echo IMG_URL; ?>library.png"> <?php echo $this->lang->line('library'); ?> </a>
         
        </div>
    </div>
     <?php } ?>

     <?php if(has_permission(VIEW, 'transport', 'vehicle') || has_permission(VIEW, 'transport', 'route') || has_permission(VIEW, 'transport', 'member')){ ?> 
    <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
        <div class="stats-count-inner">
            <span class="count_top"><a href="<?php echo site_url('Dashboard/customMenu?page_name=transport'); ?>"><!-- <i class="fa fa-group"></i> --> <img  src="<?php echo IMG_URL; ?>transport.png"> <?php echo $this->lang->line('transport'); ?> </a>
         
        </div>
    </div>
     <?php } ?>

      <?php if(has_permission(VIEW, 'hostel', 'hostel') || has_permission(VIEW, 'hostel', 'room') || has_permission(VIEW, 'hostel', 'member')){ ?>  
    <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
        <div class="stats-count-inner">
            <span class="count_top"><a href="<?php echo site_url('Dashboard/customMenu?page_name=hostel'); ?>"><!-- <i class="fa fa-group"></i>  --> <img  src="<?php echo IMG_URL; ?>hostel.png"><?php echo $this->lang->line('hostel'); ?> </a>
         
        </div>
    </div>
     <?php } ?>


     <?php if(has_permission(VIEW, 'message', 'message')){ ?>
    <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
        <div class="stats-count-inner">
            <span class="count_top"><a href="<?php echo site_url('message/inbox'); ?>"><!-- <i class="fa fa-group"></i> --><img  src="<?php echo IMG_URL; ?>message.png"> <?php echo $this->lang->line('message'); ?></a>
         
        </div>
    </div>
     <?php } ?>

    <?php if(has_permission(VIEW, 'message', 'mail') || has_permission(VIEW, 'message', 'text')){ ?>
        <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
            <div class="stats-count-inner">
                <span class="count_top"><a href="<?php echo site_url('Dashboard/customMenu?page_name=mail_and_sms'); ?>"><!-- <i class="fa fa-group"></i> --><img  src="<?php echo IMG_URL; ?>mail.png"><?php echo $this->lang->line('mail_and_sms'); ?> </a>
             
            </div>
        </div>
    <?php } ?>

      <?php if(has_permission(VIEW, 'announcement', 'notice') || has_permission(VIEW, 'announcement', 'news') || has_permission(VIEW, 'announcement', 'holiday')){ ?>
    <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
        <div class="stats-count-inner">
            <span class="count_top"><a href="<?php echo site_url('Dashboard/customMenu?page_name=announcement'); ?>"><!-- <i class="fa fa-group"></i> --><img  src="<?php echo IMG_URL; ?>announcement.png"><?php echo $this->lang->line('announcement'); ?> </a>
         
        </div>
    </div>
     <?php } ?>

      <?php if(has_permission(VIEW, 'event', 'event')){ ?>   
    <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
        <div class="stats-count-inner">
            <span class="count_top"><a href="<?php echo site_url('event/index/'); ?>"><!-- <i class="fa fa-group"></i> --> <img  src="<?php echo IMG_URL; ?>event.png"><?php echo $this->lang->line('event'); ?> </a>
         
        </div>
    </div>
     <?php } ?>

     <?php if(has_permission(VIEW, 'payroll', 'grade') || has_permission(VIEW, 'payroll', 'payment')){ ?>
    <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
        <div class="stats-count-inner">
            <span class="count_top"><a href="<?php echo site_url('Dashboard/customMenu?page_name=payroll'); ?>"><!-- <i class="fa fa-group"></i> --><img  src="<?php echo IMG_URL; ?>payroll.png"><?php echo $this->lang->line('payroll'); ?></a>
         
        </div>
    </div>
     <?php } ?>

       <?php if(has_permission(VIEW, 'accounting', 'invoice') || has_permission(VIEW, 'accounting', 'exphead') || has_permission(VIEW, 'accounting', 'expenditure') || has_permission(VIEW, 'accounting', 'incomehead') || has_permission(VIEW, 'accounting', 'income')){ ?> 
    <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
        <div class="stats-count-inner">
            <span class="count_top"><a href="<?php echo site_url('Dashboard/customMenu?page_name=accounting'); ?>"><!-- <i class="fa fa-group"></i> --><img  src="<?php echo IMG_URL; ?>invoice.png"> <?php echo $this->lang->line('accounting'); ?> </a>
         
        </div>
    </div>
     <?php } ?>

      <?php if(has_permission(VIEW, 'report', 'report')){ ?>
    <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
        <div class="stats-count-inner">
            <span class="count_top"><a href="<?php echo site_url('Dashboard/customMenu?page_name=report'); ?>"><!-- <i class="fa fa-group"></i>  --><img  src="<?php echo IMG_URL; ?>report.png"> <?php echo $this->lang->line('report'); ?> </a>
         
        </div>
    </div>
     <?php } ?>

       <?php if(has_permission(VIEW, 'gallery', 'gallery') || has_permission(VIEW, 'gallery', 'image')){ ?>       
    <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
        <div class="stats-count-inner">
            <span class="count_top"><a href="<?php echo site_url('Dashboard/customMenu?page_name=gallery'); ?>"><img  src="<?php echo IMG_URL; ?>gallery.png"><!-- <i class="fa fa-group"></i> --><?php echo $this->lang->line('media_gallery'); ?>  </a>
         
        </div>
    </div>
     <?php } ?>

     <?php if(has_permission(VIEW, 'frontend', 'frontend') || has_permission(VIEW, 'frontend', 'slider')){ ?>
    <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
        <div class="stats-count-inner">
            <span class="count_top"><a href="<?php echo site_url('Dashboard/customMenu?page_name=frontend'); ?>"><!-- <i class="fa fa-group"></i>  --><img  src="<?php echo IMG_URL; ?>frontend.png"><?php echo $this->lang->line('frontend'); ?> </a>
         
        </div>
    </div>
     <?php } ?>

         
    <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
        <div class="stats-count-inner">
            <span class="count_top"><a href="<?php echo site_url('Dashboard/customMenu?page_name=profile'); ?>"><!-- <i class="fa fa-group"></i> --><img  src="<?php echo IMG_URL; ?>profile.png"> <?php echo $this->lang->line('profile'); ?> </a>
         
        </div>
    </div>


     
</div>
</div>
<!-- <div class="row">
    <div class="col-md-8 col-sm-8 col-xs-12">
        <div class="col-md-12 col-sm-12 col-xs-12">

            <div class="x_panel tile overflow_hidden">
                <div class="x_title">
                    <h3 class="head-title"><?php echo $this->lang->line('calendar'); ?></h3>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>                                
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div id="calendar"></div>
                    <link rel='stylesheet' href='<?php echo VENDOR_URL; ?>fullcalendar/lib/cupertino/jquery-ui.min.css' />
                    <link rel='stylesheet' href='<?php echo VENDOR_URL; ?>fullcalendar/fullcalendar.css' />
                    <script type="text/javascript" src='<?php echo VENDOR_URL; ?>fullcalendar/lib/jquery-ui.min.js'></script>
                    <script type="text/javascript" src='<?php echo VENDOR_URL; ?>fullcalendar/lib/moment.min.js'></script>
                    <script type="text/javascript" src='<?php echo VENDOR_URL; ?>fullcalendar/fullcalendar.min.js'></script> 
                    <script type="text/javascript">
                        $(function () {
                            $('#calendar').fullCalendar({
                                header: {
                                    left: 'prev,next today',
                                    center: 'title',
                                    right: 'month,agendaWeek,agendaDay'
                                },
                                buttonText: {
                                    today: 'today',
                                    month: 'month',
                                    week: 'week',
                                    day: 'day'
                                },

                                events: [
                                    <?php if(isset($events) && !empty($events)){ ?>
                                        <?php foreach($events as $obj){ ?>
                                        {
                                            title: "<?php echo $obj->title; ?>",
                                            start: '<?php echo date('Y-m-d', strtotime($obj->event_from)); ?>T<?php echo date('H:i:s', strtotime($obj->event_from)); ?>',
                                            end: '<?php echo date('Y-m-d', strtotime($obj->event_to)); ?>T<?php echo date('H:i:s', strtotime($obj->event_to)); ?>',
                                            backgroundColor: '<?php echo $theme->color_code; ?>', //red
                                            url: '<?php echo site_url('event/view/'.$obj->id); ?>', //red
                                            color: '#ffffff' 
                                        },
                                        <?php } ?> 
                                    <?php } ?> 
                                    <?php if(isset($holidays) && !empty($holidays)){ ?>
                                        <?php foreach($holidays as $obj){ ?>
                                        {
                                            title: "<?php echo $obj->title; ?>",
                                            start: '<?php echo date('Y-m-d', strtotime($obj->date_from)); ?>T<?php echo date('H:i:s', strtotime($obj->date_from)); ?>',
                                            end: '<?php echo date('Y-m-d', strtotime($obj->date_to)); ?>T<?php echo date('H:i:s', strtotime($obj->date_to)); ?>',
                                            backgroundColor: '<?php echo $theme->color_code; ?>', //red
                                            url: '<?php echo site_url('announcement/holiday/view/'.$obj->id); ?>', 
                                            color: '#ffffff' 
                                        },
                                        <?php } ?> 
                                    <?php } ?>                                     
                                ]
                            });
                        });
                    </script>

                </div>                
            </div>          
        </div>          

     

    </div>

    <div class="col-md-4 col-sm-4 col-xs-12">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel tile fixed_height_320 overflow_hidden">
                    <div class="x_title">
                        <h4 class="head-title"><?php echo $this->lang->line('student'); ?> <?php echo $this->lang->line('statistics'); ?></h4>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>                                
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <script type="text/javascript">

                            $(function () {
                                $('#student-stats').highcharts({
                                    chart: {
                                        type: 'pie',
                                        options3d: {
                                            enabled: true,
                                            alpha: 45,
                                            beta: 0
                                        }
                                    },
                                    title: {
                                        text: '<?php echo $this->lang->line('class'); ?> <?php echo $this->lang->line('statistics'); ?>'
                                    },
                                    tooltip: {
                                        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                                    },
                                    plotOptions: {
                                        pie: {
                                            allowPointSelect: true,
                                            cursor: 'pointer',
                                            depth: 35,
                                            dataLabels: {
                                                enabled: true,
                                                format: '{point.name}'
                                            }
                                        }
                                    },
                                    series: [{
                                            type: 'pie',
                                            name: '<?php echo $this->lang->line('student'); ?>',
                                            data: [
                                                <?php if(isset($students) && !empty($students)){ ?>
                                                    <?php foreach($students as $obj){ ?>
                                                    ['<?php echo $this->lang->line('class'); ?> <?php echo $obj->class_name; ?>', <?php echo $obj->total_student; ?>],
                                                    <?php } ?>
                                                <?php } ?>                                                
                                            ]
                                        }],
                                    credits: {
                                        enabled: false
                                    }
                                });
                            });
                        </script>
                        <div id="student-stats" style=" width: 99%; vertical-align: top; height:250px; "></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel tile fixed_height_320">
                    <div class="x_title">
                        <h4 class="head-title"><?php echo $this->lang->line('message'); ?></h4>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>                                
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <script type="text/javascript">
                            $(function () {
                                $('#private-message').highcharts({
                                    chart: {
                                        type: 'column'
                                    },
                                    title: {
                                        text: ''
                                    },
                                    xAxis: {
                                        type: 'category'
                                    },
                                    yAxis: {
                                        title: {
                                            text: '<?php echo $this->lang->line('private_messaging'); ?>'
                                        }
                                    },
                                    legend: {
                                        enabled: false
                                    },
                                    plotOptions: {
                                        series: {
                                            borderWidth: 0,
                                            dataLabels: {
                                                enabled: true,
                                                format: '{point.y:.1f}%'
                                            }
                                        }
                                    },
                                    tooltip: {
                                        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                                        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
                                    },
                                    series: [{
                                            name: '<?php echo $this->lang->line('message'); ?>',
                                            colorByPoint: true,
                                            data: [{
                                                    name: '<?php echo $this->lang->line('new'); ?>',
                                                    y: <?php echo count($new); ?>,
                                                    drilldown: null
                                                },{
                                                    name: '<?php echo $this->lang->line('inbox'); ?>',
                                                    y: <?php echo count($inboxs); ?>,
                                                    drilldown: null
                                                },{
                                                    name: '<?php echo $this->lang->line('send'); ?>',
                                                    y: <?php echo count($sents); ?>,
                                                    drilldown: null
                                                }, {
                                                    name: '<?php echo $this->lang->line('draft'); ?>',
                                                    y: <?php echo count($drafts); ?>,
                                                    drilldown: null
                                                }, {
                                                    name: '<?php echo $this->lang->line('trash'); ?>',
                                                    y: <?php echo count($trashs); ?>,
                                                    drilldown: null
                                                }]
                                        }],
                                    credits: {
                                        enabled: false
                                    }
                                });
                            });
                        </script>
                        <div id="private-message" style=" width: 99%; vertical-align: top;height: 260px;"></div>

                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h4 class="head-title"><?php echo $this->lang->line('user'); ?></h4>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a> </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <script type="text/javascript">

                            $(function () {
                                $('#system-users').highcharts({
                                    chart: {
                                        type: 'pie',
                                        options3d: {
                                            enabled: true,
                                            alpha: 45
                                        }
                                    },
                                    title: {
                                        text: ''
                                    },
                                    tooltip: {
                                        pointFormat: '{series.name}: <b>{point.percentage:.2f}%</b>'
                                    },
                                    subtitle: {
                                        text: ''
                                    },
                                    plotOptions: {
                                        pie: {
                                            allowPointSelect: true,
                                            innerSize: 100,
                                            depth: 30,
                                            dataLabels: {
                                                format: '<b>{point.name}</b>'
                                            }
                                        }
                                    },
                                    credits: {
                                        enabled: false
                                    },
                                    series: [{
                                            name: '<?php echo $this->lang->line('user'); ?>',
                                            data: [
                                                <?php if(isset($users) && !empty($users)){ ?>
                                                    <?php foreach($users as $obj){ ?>
                                                    ['<?php echo $obj->name; ?>', <?php echo $obj->total_user; ?>],
                                                    <?php } ?>
                                                <?php } ?>
                                            ]
                                        }]
                                });
                            });

                        </script>
                        <div id="system-users" style=" width: 100%; vertical-align: top; height:260px; "></div>
                    </div>
                </div>
            </div>
        </div>  
    </div>
</div> -->
</body>
<script src="<?php echo VENDOR_URL; ?>/chart/js/highcharts.js"></script>
<script src="<?php echo VENDOR_URL; ?>/chart/js/highcharts-3d.js"></script>
<script src="<?php echo VENDOR_URL; ?>/chart/js/modules/exporting.js"></script>
<script type="text/javascript">
    // $(document).ready(function(){
    //     $(".navtoggle").click(function(){
    //         $(".dropdown-usermenu").toggle();
    //     });
    // });
    $(document).ready(function(){
        $(".navbar-nav").click(function(){
            $(this).children().toggleClass("open");
        });
    });
</script>
</html>