<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h3 class="head-title"><i class="fa fa-bullhorn"></i><small> <?php echo $this->lang->line('manage_notice'); ?></small></h3>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>                    
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content quick-link">
                <?php echo $this->lang->line('quick_link'); ?>:
                <?php if(has_permission(VIEW, 'announcement', 'notice')){ ?>
                    <a href="<?php echo site_url('announcement/notice/index'); ?>"><?php echo $this->lang->line('manage_notice'); ?></a>
                <?php } ?>    
                <?php if(has_permission(VIEW, 'announcement', 'news')){ ?>
                   | <a href="<?php echo site_url('announcement/news/index'); ?>"><?php echo $this->lang->line('manage_news'); ?></a>
                <?php } ?>    
                <?php if(has_permission(VIEW, 'announcement', 'holiday')){ ?>
                   | <a href="<?php echo site_url('announcement/holiday/index'); ?>"><?php echo $this->lang->line('manage_holiday'); ?></a>                    
                <?php } ?>
                <?php if(has_permission(VIEW, 'frontend', 'frontend')){ ?>
                   | <a href="<?php echo site_url('frontend/index'); ?>"><?php echo $this->lang->line('manage_frontend'); ?> </a>
                <?php } ?>    
            </div>
            
            <div class="x_content">
                <div class="" data-example-id="togglable-tabs">
                    
                    <ul  class="nav nav-tabs bordered">
                        <li class="<?php if(isset($list)){ echo 'active'; }?>"><a href="#tab_notice_list"   role="tab" data-toggle="tab" aria-expanded="true"><i class="fa fa-list-ol"></i> <?php echo $this->lang->line('notice'); ?> <?php echo $this->lang->line('list'); ?></a> </li>
                        <?php if(has_permission(ADD, 'announcement', 'notice')){ ?>
                            <li  class="<?php if(isset($add)){ echo 'active'; }?>"><a href="#tab_add_notice"  role="tab"  data-toggle="tab" aria-expanded="false"><i class="fa fa-plus-square-o"></i> <?php echo $this->lang->line('add'); ?> <?php echo $this->lang->line('notice'); ?></a> </li>                          
                        <?php } ?>
                        <?php if(isset($edit)){ ?>
                            <li  class="active"><a href="#tab_edit_notice"  role="tab"  data-toggle="tab" aria-expanded="false"><i class="fa fa-pencil-square-o"></i> <?php echo $this->lang->line('edit'); ?> <?php echo $this->lang->line('notice'); ?></a> </li>                          
                        <?php } ?>                
                        <?php if(isset($detail)){ ?>
                            <li  class="active"><a href="#tab_view_notice"  role="tab"  data-toggle="tab" aria-expanded="false"><i class="fa fa-eye"></i> <?php echo $this->lang->line('view'); ?> <?php echo $this->lang->line('notice'); ?></a> </li>                          
                        <?php } ?>                
                    </ul>
                    <br/>
                    
                    <div class="tab-content">
                        <div  class="tab-pane fade in <?php if(isset($list)){ echo 'active'; }?>" id="tab_notice_list" >
                            <div class="x_content">
                            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th><?php echo $this->lang->line('sl_no'); ?></th>
                                        <th><?php echo $this->lang->line('title'); ?></th>
                                        <th><?php echo $this->lang->line('date'); ?></th>
                                        <th><?php echo $this->lang->line('notice_for'); ?></th>
                                        <th><?php echo $this->lang->line('action'); ?></th>                                            
                                    </tr>
                                </thead>
                                <tbody>   
                                    <?php $count = 1; if(isset($notices) && !empty($notices)){ ?>
                                        <?php foreach($notices as $obj){ ?>
                                        <tr>
                                            <td><?php echo $count++; ?></td>
                                            <td><?php echo $obj->title; ?></td>
                                            <td><?php echo $obj->date; ?></td>
                                            <td><?php echo $obj->name  ? $obj->name : 'All'; ?></td>
                                            <td>
                                                <?php if(has_permission(EDIT, 'announcement', 'notice')){ ?>
                                                    <a href="<?php echo site_url('announcement/notice/edit/'.$obj->id); ?>" class="btn btn-info btn-xs"><i class="fa fa-pencil-square-o"></i> <?php echo $this->lang->line('edit'); ?> </a>
                                                <?php } ?>
                                                <?php if(has_permission(VIEW, 'announcement', 'notice')){ ?>
                                                    <a href="<?php echo site_url('announcement/notice/view/'.$obj->id); ?>" class="btn btn-success btn-xs"><i class="fa fa-eye"></i> <?php echo $this->lang->line('view'); ?> </a>
                                                <?php } ?>
                                                <?php if(has_permission(DELETE, 'announcement', 'notice')){ ?>
                                                    <a href="<?php echo site_url('announcement/notice/delete/'.$obj->id); ?>" onclick="javascript: return confirm('<?php echo $this->lang->line('confirm_alert'); ?>');" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> <?php echo $this->lang->line('delete'); ?> </a>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    <?php } ?>
                                </tbody>
                            </table>
                            </div>
                        </div>

                        <div  class="tab-pane fade in <?php if(isset($add)){ echo 'active'; }?>" id="tab_add_notice">
                            <div class="x_content"> 
                               <?php echo form_open(site_url('announcement/notice/add'), array('name' => 'add', 'id' => 'add', 'class'=>'form-horizontal form-label-left'), ''); ?>
                                
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title"><?php echo $this->lang->line('notice'); ?> <?php echo $this->lang->line('title'); ?> <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input  class="form-control col-md-7 col-xs-12"  name="title"  id="title" value="<?php echo isset($post['title']) ?  $post['title'] : ''; ?>" placeholder="<?php echo $this->lang->line('notice'); ?> <?php echo $this->lang->line('title'); ?>" required="required" type="text">
                                        <div class="help-block"><?php echo form_error('title'); ?></div>
                                    </div>
                                </div>                                
                                
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="date"><?php echo $this->lang->line('date'); ?> <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input  class="form-control col-md-7 col-xs-12"  name="date"  id="add_date" value="<?php echo isset($post['date']) ?  $post['date'] : ''; ?>" placeholder="<?php echo $this->lang->line('date'); ?>" required="required" type="text">
                                        <div class="help-block"><?php echo form_error('date'); ?></div>
                                    </div>
                                </div>
                                
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="role_id"><?php echo $this->lang->line('notice_for'); ?> <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select  class="form-control col-md-7 col-xs-12"  name="role_id"  id="role_id" required="required">
                                             <option value="">--<?php echo $this->lang->line('select'); ?>--</option>
                                             <option value="0"><?php echo $this->lang->line('all'); ?></option>
                                            <?php foreach($roles as $obj ){ ?>
                                            <option value="<?php echo $obj->id; ?>"  <?php echo isset($post['role_id']) && $post['role_id'] == $obj->id ?  'selected="selected"' : ''; ?>><?php echo $obj->name; ?></option>
                                            <?php } ?>                                            
                                        </select>
                                        <div class="help-block"><?php echo form_error('role_id'); ?></div>
                                    </div>
                                </div>
                                
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="notice"><?php echo $this->lang->line('notice'); ?> <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <textarea  class="form-control col-md-7 col-xs-12"  name="notice"  id="notice" required="required" placeholder="<?php echo $this->lang->line('notice'); ?>"><?php echo isset($post['notice']) ?  $post['notice'] : ''; ?></textarea>
                                        <div class="help-block"><?php echo form_error('notice'); ?></div>
                                    </div>
                                </div>
                               
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
                                        <a href="<?php echo site_url('announcement/notice'); ?>" class="btn btn-primary"><?php echo $this->lang->line('cancel'); ?></a>
                                        <button id="send" type="submit" class="btn btn-success"><?php echo $this->lang->line('submit'); ?></button>
                                    </div>
                                </div>
                                <?php echo form_close(); ?>
                            </div>
                        </div>  

                        <?php if(isset($edit)){ ?>
                        <div class="tab-pane fade in active" id="tab_edit_notice">
                            <div class="x_content">
                               
                               <?php echo form_open(site_url('announcement/notice/edit/'.$notice->id), array('name' => 'edit', 'id' => 'edit', 'class'=>'form-horizontal form-label-left'), ''); ?>
                                
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title"><?php echo $this->lang->line('notice'); ?> <?php echo $this->lang->line('title'); ?> <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input  class="form-control col-md-7 col-xs-12"  name="title"  id="title" value="<?php echo isset($notice->title) ?  $notice->title : $post['title']; ?>" placeholder="<?php echo $this->lang->line('notice'); ?> <?php echo $this->lang->line('title'); ?>" required="required" type="text">
                                        <div class="help-block"><?php echo form_error('title'); ?></div>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="date"><?php echo $this->lang->line('date'); ?> <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input  class="form-control col-md-7 col-xs-12"  name="date"  id="edit_date" value="<?php echo isset($notice->date) ?  $notice->date : $post['date']; ?>" placeholder="<?php echo $this->lang->line('date'); ?>" required="required" type="text">
                                        <div class="help-block"><?php echo form_error('date'); ?></div>
                                    </div>
                                </div>
                                
                               
                                                                
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="role_id"><?php echo $this->lang->line('notice_for'); ?> <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select  class="form-control col-md-7 col-xs-12"  name="role_id"  id="edit_role_id" required="required">
                                            <option value="">--<?php echo $this->lang->line('select'); ?>--</option> 
                                            <option value="0" <?php if($notice->role_id == 0){ echo 'selected="selected"';} ?>><?php echo $this->lang->line('all'); ?></option> 
                                            <?php  foreach($roles as $obj ){ ?>
                                            <option value="<?php echo $obj->id; ?>" <?php if($notice->role_id == $obj->id){ echo 'selected="selected"';} ?>><?php echo $obj->name; ?></option>
                                            <?php } ?>                                            
                                        </select>
                                        <div class="help-block"><?php echo form_error('role_id'); ?></div>
                                    </div>
                                </div>
                                                         
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="notice"><?php echo $this->lang->line('notice'); ?> <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <textarea  class="form-control col-md-7 col-xs-12"  name="notice"  id="notice" required="required" placeholder="<?php echo $this->lang->line('notice'); ?>"><?php echo isset($notice->notice) ?  $notice->notice : $post['notice']; ?></textarea>
                                        <div class="help-block"><?php echo form_error('notice'); ?></div>
                                    </div>
                                </div>
                                                             
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
                                        <input type="hidden" value="<?php echo isset($notice) ? $notice->id : $id; ?>" name="id" />
                                        <a href="<?php echo site_url('announcement/notice'); ?>" class="btn btn-primary"><?php echo $this->lang->line('cancel'); ?></a>
                                        <button id="send" type="submit" class="btn btn-success"><?php echo $this->lang->line('update'); ?></button>
                                    </div>
                                </div>
                                <?php echo form_close(); ?>
                            </div>
                        </div>  
                        <?php } ?>
                        
                        <?php if(isset($detail)){ ?>
                        <div class="tab-pane fade in active" id="tab_view_notice">
                            <div class="x_content"> 
                               <?php echo form_open(site_url(), array('name' => 'detail', 'id' => 'detail', 'class'=>'form-horizontal form-label-left'), ''); ?>
                                
                                <div class="item form-group">
                                    <label class="col-md-3 col-sm-3 col-xs-4"><?php echo $this->lang->line('notice'); ?> <?php echo $this->lang->line('title'); ?></label>
                                    <div class="col-md-9 col-sm-9 col-xs-8">
                                    : <?php echo $notice->title; ?>
                                    </div>
                                </div>  
                                <div class="item form-group">
                                    <label class="col-md-3 col-sm-3 col-xs-4"><?php echo $this->lang->line('date'); ?></label>
                                    <div class="col-md-9 col-sm-9 col-xs-8">
                                    : <?php echo date('M j, Y', strtotime($notice->date)); ?>
                                    </div>
                                </div>  
                                                                
                                <div class="item form-group">
                                    <label class="col-md-3 col-sm-3 col-xs-4"><?php echo $this->lang->line('notice_for'); ?></label>
                                    <div class="col-md-9 col-sm-9 col-xs-8">
                                    : <?php echo $notice->name  ? $notice->name : $this->lang->line('all'); ?>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-md-3 col-sm-3 col-xs-4"><?php echo $this->lang->line('notice'); ?></label>
                                    <div class="col-md-9 col-sm-9 col-xs-8">
                                    : <?php echo $notice->notice; ?>
                                    </div>
                                </div>
                                <?php if(has_permission(EDIT, 'announcement', 'notice')){ ?>                                                            
                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                        <div class="col-md-6 col-md-offset-3">
                                            <a href="<?php echo site_url('announcement/notice/edit/'.$notice->id); ?>" class="btn btn-primary"><?php echo $this->lang->line('update'); ?></a>
                                        </div>
                                    </div>
                                <?php } ?>
                                <?php echo form_close(); ?>
                            </div>
                        </div>  
                        <?php } ?>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

  <!-- bootstrap-datetimepicker -->
 <link href="<?php echo VENDOR_URL; ?>datepicker/datepicker.css" rel="stylesheet">
 <script src="<?php echo VENDOR_URL; ?>datepicker/datepicker.js"></script>
 <script type="text/javascript">
     
  $('#add_date').datepicker();
  $('#edit_date').datepicker();

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
    $("#add").validate();     
    $("#edit").validate();  
</script>