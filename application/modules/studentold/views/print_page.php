<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h3 class="head-title"><i class="fa fa-certificate"></i><small> <?php echo $this->lang->line('manage_certificate'); ?></small></h3>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>                    
                </ul>
                <div class="clearfix"></div>
            </div>
           <!--  <div class="x_content quick-link">
                <?php echo $this->lang->line('quick_link'); ?>:
               
                <?php if(has_permission(VIEW, 'certificate', 'certificate')){ ?>
                    <a href="<?php echo site_url('certificate/index'); ?>"><?php echo $this->lang->line('generate'); ?> <?php echo $this->lang->line('certificate'); ?></a>
                <?php } ?>
            </div> -->
            
            
            <div class="x_content"> 
                <?php echo form_open_multipart(site_url('student/print'), array('name' => 'generate', 'id' => 'generate', 'class' => 'form-horizontal form-label-left'), ''); ?>
                <div class="row">
                
                   <div class="col-md-3 col-sm-3 col-xs-12">
                        <div class="item form-group"> 
                            <div><?php echo $this->lang->line('class'); ?> <span class="required">*</span></div>
                            <select  class="form-control col-md-7 col-xs-12" name="class_id" id="class_id"  required="required" onchange="get_section_by_class(this.value, '');">
                                <option value="">--<?php echo $this->lang->line('select'); ?>--</option>
                                <?php foreach ($classes as $obj) { ?>
                                <option value="<?php echo $obj->id; ?>" <?php if(isset($class_id) && $class_id == $obj->id){ echo 'selected="selected"';} ?>><?php echo $this->lang->line('class'); ?> <?php echo $obj->name; ?></option>
                                <?php } ?>
                            </select>
                            <div class="help-block"><?php echo form_error('class_id'); ?></div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-12">
                        <div class="item form-group"> 
                            <div><?php echo $this->lang->line('section'); ?> <span class="required">*</span></div>
                            <select  class="form-control col-md-7 col-xs-12" name="section_id" id="section_id" required="required">                                
                                <option value="">--<?php echo $this->lang->line('select'); ?>--</option>
                            </select>
                            <div class="help-block"><?php echo form_error('section_id'); ?></div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-12">
                        <div class="item form-group"> 
                            <div><?php echo $this->lang->line('type'); ?></div>
                            <select  class="form-control col-md-7 col-xs-12"  name="print_id"  id="print_id" required="required">
                                <option value="">--<?php echo $this->lang->line('select'); ?>--</option>  
                                
                                <option value="identity" <?php if(isset($print_id) && $print_id == "identity"){ echo 'selected="selected"'; } ?>><?php echo 'Identity Card'; ?></option>
                                <option value="admit" <?php if(isset($print_id) && $print_id == "admit"){ echo 'selected="selected"'; } ?>><?php echo 'Admit Card'; ?></option>
                               

                                
                            </select>
                            <div class="help-block"><?php echo form_error('print_id'); ?></div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-12">
                        <div class="item form-group"> 
                            <div><?php echo $this->lang->line('exam'); ?> </div>
                            <select  class="form-control col-md-7 col-xs-12" name="exam" id="exam"  >
                                <option value="">--<?php echo $this->lang->line('select'); ?>--</option>
                                <?php foreach ($exams as $obj) { ?>
                                <option value="<?php echo $obj->id; ?>" <?php if(isset($exam) && $exam == $obj->id){ echo 'selected="selected"';} ?>><?php echo $this->lang->line('exam'); ?> <?php echo $obj->title; ?></option>
                                <?php } ?>
                            </select>
                            <div class="help-block"><?php echo form_error('exam'); ?></div>
                        </div>
                    </div>
                
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group text-center"><br/>
                            <button id="send" type="submit" class="btn btn-success"><?php echo $this->lang->line('find'); ?></button>
                         <!--    <button id="generateAll" name="generateAll" value="generateAll" type="submit" class="btn btn-success"><?php echo $this->lang->line('generate'); ?><?php echo $this->lang->line('all'); ?></button> -->
                        </div>
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
            
             <div class="x_content">
                <div class="" data-example-id="togglable-tabs">                    
                    <ul  class="nav nav-tabs bordered">                 
                        <li  class="active"><a href="#tab_user_list" role="tab" data-toggle="tab" aria-expanded="false"><i class="fa fa-group"></i> <?php echo $this->lang->line('student'); ?> <?php echo $this->lang->line('list'); ?></a></li>                          
                    </ul>
                    <br/>
                     <div class="tab-content">
                        <div  class="tab-pane fade in active" id="tab_user_list" >
                           
                            <div class="x_content">
                            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                    <?php if(isset($students) && !empty($students)){?>
                                        <?php if($exam!=null){?>
                                            <tr><td colspan="7" align="center"> <a target="_blank" href="<?php echo site_url('student/generatePrintAll/'.$class_id.'/'.$section_id.'/'.$print_id.'/'.$exam); ?>"  class="btn btn-success btn-xs"><i class="fa fa-certificate"> <?php echo $this->lang->line('generate'); ?> All</i></a></td></tr>
                                        <?php } else{
                                        ?>
                                            <tr><td colspan="7"> <a target="_blank" href="<?php echo site_url('student/generatePrintAll/'.$class_id.'/'.$section_id.'/'.$print_id.'/'.'none'); ?>"  class="btn btn-success btn-xs"><i class="fa fa-certificate"> <?php echo $this->lang->line('generate'); ?> All</i></a></td></tr>          
                                        <?php } ?>
                                    <?php } ?>
                                    <tr>

                                        <th><?php echo $this->lang->line('sl_no'); ?></th>
                                        <th><?php echo $this->lang->line('photo'); ?></th>                                                                    
                                        <th><?php echo $this->lang->line('name'); ?></th>
                                        <th><?php echo $this->lang->line('phone'); ?></th>
                                        <th><?php echo $this->lang->line('email'); ?></th>
                                        <th><?php echo $this->lang->line('created'); ?></th>                                            
                                        <th><?php echo $this->lang->line('action'); ?></th>                                            
                                    </tr>
                                </thead>
                                <tbody id="fn_mark">   
                                    <?php
                                    $count = 1;
                                    if (isset($students) && !empty($students)) {
                                        ?>
                                        <?php foreach ($students as $obj) { ?>
                                         
                                            <tr>
                                                <td><?php echo $count++;  ?></td>
                                                <td>
                                                    <?php if ($obj->photo != '') { ?>                                        
                                                        <img src="<?php echo UPLOAD_PATH; ?>/student-photo/<?php echo $obj->photo; ?>" alt="" width="60" /> 
                                                    <?php } else { ?>
                                                        <img src="<?php echo IMG_URL; ?>/default-user.png" alt="" width="60" /> 
                                                    <?php } ?>
                                                </td>
                                                <td><?php echo ucfirst($obj->name); ?></td>
                                                <td><?php echo $obj->phone; ?></td>
                                                <td><?php echo $obj->email; ?></td>   
                                                <td><?php echo date('M j, Y', strtotime($obj->created_at)); ?></td>   
                                                <td>    
                                                    <?php if($exam!=null){?>
                                                        <a target="_blank" href="<?php echo site_url('student/generatePrint/'.$obj->id.'/'.$class_id.'/'.$section_id.'/'.$print_id.'/'.$exam); ?>"  class="btn btn-success btn-xs"><i class="fa fa-certificate"> <?php echo $this->lang->line('generate'); ?></i></a>
                                                    <?php } else{
                                                        ?>
                                                        <a target="_blank" href="<?php echo site_url('student/generatePrint/'.$obj->id.'/'.$class_id.'/'.$section_id.'/'.$print_id.'/none'); ?>"  class="btn btn-success btn-xs"><i class="fa fa-certificate"> <?php echo $this->lang->line('generate'); ?></i></a>
                                                    <?php } ?>
                                                    
                                                </td>   
                                            </tr>
                                        <?php } ?>
                                    <?php } ?> 

                                </tbody>
                            </table> 
                        </div> 
                        </div>
                 </div>
            </div>

            
        </div>
    </div>
</div>
</div>

 <script type="text/javascript">

        $(document).ready(function() {
          $('#datatable-responsive').DataTable( {
              dom: 'Bfrtip',
              iDisplayLength: 15,
              buttons: [
                  'copyHtml5',
                  'excelHtml5',
                  'csvHtml5',
                  'pdfHtml5',
                  'pageLength'
              ],
              search: true
          });
        });

         <?php if(isset($class_id) && isset($section_id)){ ?>
            get_section_by_class('<?php echo $class_id; ?>', '<?php echo $section_id; ?>');
        <?php } ?>
    
        function get_section_by_class(class_id, section_id){       
               
            $.ajax({       
                type   : "POST",
                url    : "<?php echo site_url('ajax/get_section_by_class'); ?>",
                data   : { class_id : class_id , section_id: section_id},               
                async  : false,
                success: function(response){                                                   
                   if(response)
                   {
                      $('#section_id').html(response);
                   }
                }
            }); 
        }
        
     $("#generate").validate();    
</script> 

   