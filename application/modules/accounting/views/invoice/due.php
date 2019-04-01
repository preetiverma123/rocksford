<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h3 class="head-title"><i class="fa fa-calculator"></i><small> <?php echo $this->lang->line('manage_due_invoice'); ?></small></h3>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>                    
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content quick-link">
                <?php echo $this->lang->line('quick_link'); ?>:
               <?php if(has_permission(VIEW, 'accounting', 'incomehead')){ ?>
                    <a href="<?php echo site_url('accounting/incomehead/index'); ?>"><?php echo $this->lang->line('income_head'); ?></a>                  
                <?php } ?> 
                <?php if(has_permission(VIEW, 'accounting', 'income')){ ?>
                   | <a href="<?php echo site_url('accounting/income/index'); ?>"><?php echo $this->lang->line('manage_income'); ?></a>                     
                <?php } ?> 
                <?php if(has_permission(VIEW, 'accounting', 'invoice')){ ?>
                   
                   <?php if($this->session->userdata('role_id') == STUDENT || $this->session->userdata('role_id') == GUARDIAN){ ?>
                        | <a href="<?php echo site_url('accounting/invoice/due'); ?>"><?php echo $this->lang->line('due_invoice'); ?></a>                    
                   <?php }else{ ?>
                        | <a href="<?php echo site_url('accounting/invoice'); ?>"><?php echo $this->lang->line('manage_invoice'); ?></a>
                        | <a href="<?php echo site_url('accounting/invoice/due'); ?>"><?php echo $this->lang->line('due_invoice'); ?></a>                    
                    <?php } ?> 
                <?php } ?> 
                <?php if(has_permission(VIEW, 'accounting', 'exphead')){ ?>
                   | <a href="<?php echo site_url('accounting/exphead/index'); ?>"><?php echo $this->lang->line('expenditure_head'); ?></a>                  
                <?php } ?> 
                <?php if(has_permission(VIEW, 'accounting', 'expenditure')){ ?>
                   | <a href="<?php echo site_url('accounting/expenditure/index'); ?>"><?php echo $this->lang->line('manage_expenditure'); ?></a>                  
                <?php } ?> 
                
            </div>
            <div class="x_content">               
                    
                 <div class="" data-example-id="togglable-tabs">
                    
                    <ul  class="nav nav-tabs bordered">                 
                        <li  class="active"><a href="#due_invoice" role="tab" data-toggle="tab" aria-expanded="false"><i class="fa fa-calculator"></i> <?php echo $this->lang->line('due_invoice'); ?> </a></li>  

                    </ul>
                    <br/>
                   
                     <div class="tab-content">
                        <div  class="tab-pane fade in active" id="due_invoice" >
                           <?php echo form_open_multipart(site_url('accounting/invoice/get_filter_due_data'), array('date' => 'date', 'class' => 'form-horizontal form-label-left'), ''); ?>
                      <div class="row">
                        <div class="col-md-3 col-sm-3 col-xs-12">
                            <div class="item form-group">  
                                <div><?php echo $this->lang->line('date'); ?> </div>
                             
                                <input  class="form-control col-md-7 col-xs-12"  name="date"  id="date" value="<?php echo isset($date) ?  $date : ''; ?>" placeholder="<?php echo $this->lang->line('date'); ?>" type="text" autocomplete="off">
                                <div class="help-block"><?php echo form_error('date'); ?></div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                            <div class="item form-group"> 
                                <div><?php echo $this->lang->line('class'); ?> </div>
                                <select  class="form-control col-md-7 col-xs-12" name="class_id" id="class_id"   onchange="get_section_by_class(this.value, '');">
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
                                <div><?php echo $this->lang->line('section'); ?> </div>
                                <select  class="form-control col-md-7 col-xs-12" name="section_id" id="section_id" >                                
                                    <option value="">--<?php echo $this->lang->line('select'); ?>--</option>
                                </select>
                                <div class="help-block"><?php echo form_error('section_id'); ?></div>
                            </div>
                        </div>
                        <div class="col-md-1 col-sm-1 col-xs-6">
                            <div class="form-group"><br/>
                                <button id="send" type="submit" class="btn btn-success"><?php echo $this->lang->line('find'); ?></button>
                            </div>
                        </div>
                      
                    <?php echo form_close(); ?>

                    <?php echo form_open_multipart(site_url('accounting/invoice/due')); ?>
                    
                    <div class="col-md-1 col-sm-1 col-xs-6">
                        <div class="form-group"><br/>
                            <button id="send" type="submit" class="btn btn-info"><?php echo 'Clear'; ?></button>
                        </div>
                    </div>
                    <?php echo form_close(); ?>
                  </div>
                            <div class="x_content">   
                               <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                   <thead>
                                       <tr>
                                           <th><?php echo $this->lang->line('sl_no'); ?></th>
                                           <th><?php echo $this->lang->line('invoice'); ?> <?php echo $this->lang->line('number'); ?></th>
                                           <th><?php echo $this->lang->line('student'); ?></th>
                                           <th><?php echo $this->lang->line('class'); ?></th>
                                           <th><?php echo $this->lang->line('gross_amount'); ?></th>
                                           <th><?php echo $this->lang->line('discount'); ?></th>
                                           <th><?php echo $this->lang->line('net_amount'); ?></th>
                                           <th><?php echo 'Paid_amount'; ?></th>
                                           <th><?php echo 'Due_amount'; ?></th>
                                           <th><?php echo $this->lang->line('payment'); ?> <?php echo $this->lang->line('status'); ?></th>
                                           <th><?php echo $this->lang->line('action'); ?></th>                                            
                                       </tr>
                                   </thead>
                                   <tbody>   
                                       <?php $count = 1; if(isset($invoices) && !empty($invoices)){ ?>
                                           <?php foreach($invoices as $obj){ ?>
                                           <tr>
                                               <td><?php echo $count++; ?></td>
                                               <td><?php echo $obj->custom_invoice_id; ?></td>
                                               <td><?php echo $obj->student_name; ?></td>
                                               <td><?php echo $obj->class_name; ?></td>
                                               <td><?php echo $obj->gross_amount; ?></td>
                                               <td><?php echo $obj->discount; ?></td>
                                               <td><?php echo $obj->net_amount; ?></td>
                                               <td><?php echo $obj->paid_amount; ?></td>
                                               <td><?php echo $obj->net_amount-$obj->paid_amount; ?></td>
                                               <td><?php echo get_paid_status($obj->paid_status); ?></td>
                                               <td>
                                                   <a href="<?php echo site_url('accounting/invoice/view/'.$obj->id); ?>" class="btn btn-info btn-xs"><i class="fa fa-eye"></i> <?php echo $this->lang->line('view'); ?> </a>
                                                   <a href="<?php echo site_url('accounting/payment/index/'.$obj->id); ?>"  class="btn btn-success btn-xs"><i class="fa fa-credit-card"></i> <?php echo $this->lang->line('payment'); ?> </a>
                                                   <a href="<?php echo site_url('accounting/invoice/send_message/'.$obj->id); ?>" onclick="javascript: return confirm('<?php echo 'Do you want to send a text message to the parent of this student?'; ?>');" class="btn btn-info btn-xs"><i class="fa fa-envelope"></i> <?php echo $this->lang->line('sms'); ?> </a>
                                                 
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
<link href="<?php echo VENDOR_URL; ?>datepicker/datepicker.css" rel="stylesheet">
 <script src="<?php echo VENDOR_URL; ?>datepicker/datepicker.js"></script>
<!-- datatable with buttons -->
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
        $('#date').datepicker({
          format: "mm-yyyy",
          startView: "months", 
          minViewMode: "months"
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
</script>