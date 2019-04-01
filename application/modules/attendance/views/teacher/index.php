<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h3 class="head-title"><i class="fa fa-check-square-o"></i><small> <?php echo $this->lang->line('teacher'); ?> <?php echo $this->lang->line('attendance'); ?></small></h3>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>                    
                </ul>
                <div class="clearfix"></div>
            </div>

            <div class="x_content quick-link">
                <?php echo $this->lang->line('quick_link'); ?>:
                <?php if(has_permission(VIEW, 'attendance', 'student')){ ?>
                    <a href="<?php echo site_url('attendance/student'); ?>"><?php echo $this->lang->line('student'); ?> <?php echo $this->lang->line('attendance'); ?></a>
                <?php } ?>
                 <?php if(has_permission(VIEW, 'attendance', 'teacher')){ ?>
                   | <a href="<?php echo site_url('attendance/teacher'); ?>"><?php echo $this->lang->line('teacher'); ?> <?php echo $this->lang->line('attendance'); ?></a>
                <?php } ?>
                <?php if(has_permission(VIEW, 'attendance', 'employee')){ ?>
                   | <a href="<?php echo site_url('attendance/employee'); ?>"><?php echo $this->lang->line('employee'); ?> <?php echo $this->lang->line('attendance'); ?></a>                    
                <?php } ?>
            </div>
            
            <div class="x_content"> 
                <?php echo form_open_multipart(site_url('attendance/teacher/index'), array('name' => 'teacher', 'id' => 'teacher', 'class' => 'form-horizontal form-label-left'), ''); ?>
                <div class="row"> 
                    <div class="col-md-3 col-sm-3 col-xs-12 col-sm-offset-4">
                        <div class="item form-group">  
                            <div><?php echo $this->lang->line('date'); ?> <span class="required">*</span></div>
                            <input  class="form-control col-md-7 col-xs-12"  name="date"  id="date" value="<?php if(isset($date)){ echo $date;} ?>" placeholder="<?php echo $this->lang->line('date'); ?>" required="required" type="text">
                            <div class="help-block"><?php echo form_error('date'); ?></div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-12">
                        <div class="form-group"><br/>
                            <button id="send" type="submit" class="btn btn-success"><?php echo $this->lang->line('find'); ?></button>
                        </div>
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>

           <?php  if (isset($teachers) && !empty($teachers)) { ?> 
            <div class="x_content">             
                <div class="row">
                    <div class="col-sm-4  col-sm-offset-4 layout-box">
                        <p>
                            <h4><?php echo $this->lang->line('teacher'); ?> <?php echo $this->lang->line('attendance'); ?></h4>
                            <?php echo $this->lang->line('day'); ?> : <?php echo date('l', strtotime($date)); ?><br/>
                            <?php echo $this->lang->line('date'); ?> : <?php echo date('jS F Y', strtotime($date)); ?>
                            <!-- <?php 
                                    $this->db->select('*');
                                    $this->db->from('teacher_attendances');
                                    $this->db->where(['academic_year_id'=>$academic_year_id,'year'=>$year,'month'=>$month]);
                                    $query = $this->db->get();

                                    if ( $query->num_rows() > 0 )
                                    {
                                        $at = $query->row_array();

                                        
                                    }
                                   
                           
                            if(!empty($at) && strtotime($at['modified_at'])==0){ 
                              if(!empty($at) && strtotime($at['created_at'])!=0){
                                echo $this->lang->line('time'); ?> (Updated On): <?php echo date('jS F Y g:i A', strtotime($at['created_at']));
                              }
                           }elseif(!empty($at) &&  strtotime($at['modified_at'])!=0){
                              echo $this->lang->line('time'); ?> (Updated On): <?php echo date('jS F Y g:i A', strtotime($at['modified_at']));
                              }

                             ?> -->
                            
                        </p>
                    </div>
                </div>            
            </div>
           <?php } ?>
            
            <div class="x_content">
                <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th><?php echo $this->lang->line('sl_no'); ?></th>
                            <th><?php echo $this->lang->line('photo'); ?></th>
                            <th><?php echo $this->lang->line('name'); ?></th>
                            <th><?php echo $this->lang->line('responsibility'); ?></th>
                            <th><?php echo $this->lang->line('phone'); ?></th>
                            <th><?php echo $this->lang->line('email'); ?></th>
                            <th><input type="checkbox" value="P" name="present" id="fn_present" class="fn_all_attendnce"/> <?php echo $this->lang->line('present_all'); ?></th>                                            
                            <th><input type="checkbox" value="L" name="late" id="fn_late"  class="fn_all_attendnce"/> <?php echo $this->lang->line('late_all'); ?></th>                                            
                            <th><input type="checkbox" value="A" name="absent" id="fn_absent"  class="fn_all_attendnce"/> <?php echo $this->lang->line('absent_all'); ?></th>                                            
                        </tr>
                    </thead>
                    <tbody id="fn_attendance">   
                        <?php
                        $count = 1;
                        if (isset($teachers) && !empty($teachers)) {
                            ?>
                            <?php foreach ($teachers as $obj) {  ?>

                            <?php  $attendance = get_teacher_attendance($obj->id, $academic_year_id, $year, $month, $day ); ?>
                                <tr>
                                    <td><?php echo $count++;  ?></td>
                                    <td>
                                        <?php if ($obj->photo != '') { ?>
                                            <img src="<?php echo UPLOAD_PATH; ?>/teacher-photo/<?php echo $obj->photo; ?>" alt="" width="60" /> 
                                        <?php } else { ?>
                                            <img src="<?php echo IMG_URL; ?>/default-user.png" alt="" width="60" /> 
                                        <?php } ?>
                                    </td>  
                                    <td><?php echo ucfirst($obj->name); ?></td>
                                    <td><?php echo $obj->responsibility; ?></td>
                                    <td><?php echo $obj->phone; ?></td>
                                    <td><?php echo $obj->email; ?></td>
                                    <td><input type="radio" value="P" data-id = "<?php echo $obj->id; ?>" itemid="<?php echo $obj->id; ?>" name="teacher_<?php echo $obj->id; ?>" class="present fn_single_attendnce" <?php if($attendance == 'P'){ echo 'checked="checked"'; } ?> /></td>
                                    <td><input type="radio" value="L" data-id = "<?php echo $obj->id; ?>" itemid="<?php echo $obj->id; ?>"  name="teacher_<?php echo $obj->id; ?>" class="late fn_single_attendnce" <?php if($attendance == 'L'){ echo 'checked="checked"'; } ?>/></td>
                                    <td><input type="radio" value="A" data-id = "<?php echo $obj->id; ?>" itemid="<?php echo $obj->id; ?>" name="teacher_<?php echo $obj->id; ?>" class="absent fn_single_attendnce" <?php if($attendance == 'A'){ echo 'checked="checked"'; } ?>/></td>
                                </tr>
                            <?php } ?>
                             <tr><td colspan="9"><button onclick="javascript: return confirm('<?php echo 'Do you want to send a text message of attendance to all the teachers?'; ?>');" class="send-message-to-all btn btn-success">Send Text</button><td></tr>
                        <?php }else{ ?>
                                <tr>
                                    <td colspan="9" align="center"><?php echo $this->lang->line('no_data_found'); ?></td>
                                </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div> 
            
        </div>
    </div>
</div>


 <!-- bootstrap-datetimepicker -->
<link href="<?php echo VENDOR_URL; ?>datepicker/datepicker.css" rel="stylesheet">
 <script src="<?php echo VENDOR_URL; ?>datepicker/datepicker.js"></script>
 <script type="text/javascript">
     
  $('#date').datepicker();

  $(document).ready(function(){
  
       $('#fn_present').click(function(){
           
           if($(this).prop('checked')) {   
               $('input:checkbox').removeAttr('checked');
               $(this).prop('checked', true);
               $('.present').prop('checked', true);
           }else{
               $('.present').prop('checked', false);
           }           
       });
       
       
       $('#fn_late').click(function(){
           
           if($(this).prop('checked')) {   
               $('input:checkbox').removeAttr('checked');
               $(this).prop('checked', true);
               $('.late').prop('checked', true);
           }else{
              $('.late').prop('checked', false); 
           }           
       });
       
       $('#fn_absent').click(function(){
           
           if($(this).prop('checked')) {   
               $('input:checkbox').removeAttr('checked');
               $(this).prop('checked', true);
               $('.absent').prop('checked', true);
           }else{
               $('.absent').prop('checked', false);
           }           
       });
       
       
       $('.fn_single_attendnce').click(function(){
           
          var status     = $(this).prop('checked') ? $(this).val() : '';
          var teacher_id = $(this).prop('checked') ? $(this).attr('itemid') : '';
          var class_id   = $('#class_id').val();
          var section_id = $('#section_id').val();
          var date       = $('#date').val();
          
          $.ajax({       
            type   : "POST",
            url    : "<?php echo site_url('attendance/teacher/update_single_attendance'); ?>",
            data   : { status : status , teacher_id: teacher_id, class_id:class_id, section_id:section_id, date:date},               
            async  : false,
           success: function(response){ 
               if(response){
                     toastr.success('<?php echo $this->lang->line('update_success'); ?>');  
                }else{
                     toastr.error('<?php echo $this->lang->line('update_failed'); ?>');  
                }
                toastr.options = {
                "closeButton": true,               
                "newestOnTop": false,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "showDuration": "400",
                "hideDuration": "400",
                "timeOut": "5000",              
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
              }
            }
        }); 
                      
       });
       
         $('.fn_all_attendnce').click(function(){
           
          var status     = $(this).prop('checked') ? $(this).val() : '';         
          var class_id   = $('#class_id').val();
          var section_id = $('#section_id').val();
          var date       = $('#date').val();
          
          $.ajax({       
            type   : "POST",
            url    : "<?php echo site_url('attendance/teacher/update_all_attendance'); ?>",
            data   : { status : status , class_id:class_id, section_id:section_id, date:date},               
            async  : false,
            success: function(response){ 
                if(response){
                     toastr.success('<?php echo $this->lang->line('update_success'); ?>');  
                }else{
                     toastr.error('<?php echo $this->lang->line('update_failed'); ?>');  
                }
                toastr.options = {
                "closeButton": true,               
                "newestOnTop": false,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "showDuration": "400",
                "hideDuration": "400",
                "timeOut": "5000",              
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
              }
            }
        }); 
                      
       });

        $('.send-message-to-all').click(function(){
          var p=0;var l=0;var a=0;
          var presentData = [];
          var absentData = [];
          var lateData = [];
          var date       = $('#date').val();
           $(':radio:checked').each(function(){
             var $dds = $(this).attr('data-id');
             
             if($(this).val()=='P'){
              presentData[p] = $dds;
              p++;
             }else if($(this).val()=='A'){
              absentData[a] = $dds;
              a++;
             }else if($(this).val()=='L'){
              lateData[l] = $dds;
              l++;
             }
             
             /*alert($(this).val());*/
          });
         
          $.ajax({       
            type   : "POST",
            url    : "<?php echo site_url('attendance/teacher/send_message'); ?>",
            data   : { presentData : presentData , absentData:absentData, lateData:lateData,date:date},               
            async  : false,
            success: function(response){ 
                if(response){
                     toastr.success('<?php echo $this->lang->line('update_success'); ?>');  
                }else{
                     toastr.error('<?php echo $this->lang->line('update_failed'); ?>');  
                }
                toastr.options = {
                "closeButton": true,               
                "newestOnTop": false,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "showDuration": "400",
                "hideDuration": "400",
                "timeOut": "5000",              
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
              }
            }
        }); 
                      
       });
  });

   $("#teacher").validate(); 
</script>


