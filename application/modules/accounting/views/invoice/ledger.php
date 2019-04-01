<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h3 class="head-title"><i class="fa fa-calculator"></i><small> <?php echo $this->lang->line('manage_invoice'); ?></small></h3>
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
                        <li class="<?php if(isset($list)){ echo 'active'; }?>"><a href="#tab_invoice_list"   role="tab" data-toggle="tab" aria-expanded="true"><i class="fa fa-list-ol"></i> <?php echo $this->lang->line('invoice'); ?> <?php echo $this->lang->line('list'); ?></a> </li>
                                               
                                    
                    </ul>
                    <br/>
                    

                    <div class="tab-content">
                        <div  class="tab-pane fade in <?php if(isset($list)){ echo 'active'; }?>" id="tab_invoice_list" >
                    <?php echo form_open_multipart(site_url('accounting/invoice/get_filter_ledger'), array('date' => 'date', 'class' => 'form-horizontal form-label-left'), ''); ?>
                    <div class="row">
                    
                    
                    <div class="col-md-3 col-sm-3 col-xs-12">
                        <div class="item form-group"> 
                            <div><?php echo $this->lang->line('student'); ?> </div>
                            <input class="form-control col-md-7 col-xs-12" name="reg_no" id="reg_no" type="text"
                            value="<?php echo isset($reg_no) ?  $reg_no : ''; ?>">                                
                             
                            <div class="help-block"><?php echo form_error('reg_no'); ?></div>
                        </div>
                    </div>
                    <div class="col-md-1 col-sm-1 col-xs-6">
                        <div class="form-group"><br/>
                            <button id="send" type="submit" class="btn btn-success"><?php echo $this->lang->line('find'); ?></button>
                        </div>
                    </div>
                    
                    <?php echo form_close(); ?>

                    <?php if(!empty($ledgers)){?>
                      <div class="row">
                        <div class="col-md-4 col-sm-4 col-xs-12">
                          
                              <div><?php echo $this->lang->line('name'); ?> :
                              <?php echo $student_name;?> 
                              </div>                              
                               
                              
                          
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                          
                              <div><?php echo $this->lang->line('class'); ?> :
                              <?php echo $class_name;?> 
                              </div>                              
                               
                              
                         
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                          
                              <div><?php echo $this->lang->line('section'); ?> :
                              <?php echo $section_name;?> 
                              </div>                              
                               
                              
                          
                        </div>
                   
                      </div>
                  <?php }?>
                            <div class="x_content">
                            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th><?php echo $this->lang->line('sl_no'); ?></th>
                                        <th><?php echo $this->lang->line('invoice'); ?> <?php echo $this->lang->line('number'); ?></th>
                                       <!--  <th><?php echo $this->lang->line('student'); ?></th>
                                        <th><?php echo $this->lang->line('class'); ?></th>
                                        <th><?php echo $this->lang->line('section'); ?></th> -->
                                        <th><?php echo 'fee_due'; ?></th>
                                        <th><?php echo 'previous_due'; ?></th>
                                        <th><?php echo 'total'; ?></th>
                                        <th><?php echo 'payment'; ?></th>
                                        <th><?php echo 'payment_date'; ?></th>
                                        <th><?php echo 'month'; ?></th>
                                        <th><?php echo 'balance' ?></th>
                                                                                    
                                    </tr>
                                </thead>
                                <tbody>   
                                    <?php $count = 1; if(isset($ledgers) && !empty($ledgers)){ ?>
                                        <?php foreach($ledgers as $obj){ ?>
                                        <tr>
                                            <td><?php echo $count++; ?></td>
                                            <td><?php echo $obj->custom_invoice_id; ?></td>
                                           <!--  <td><?php echo $obj->student_name; ?></td>
                                            <td><?php echo $obj->class_name; ?></td>
                                            <td><?php echo $obj->section_name; ?></td> -->
                                            <td><?php echo $obj->fee_due; ?></td>
                                            <td><?php echo $obj->previous_due; ?></td>
                                            <td><?php echo $obj->total; ?></td>
                                            <td><?php echo $obj->payment; ?></td>
                                            <td><?php echo $obj->date; ?></td>
                                            <td><?php echo $obj->month; ?></td>
                                            <td><?php echo (!empty($obj->balance) && $obj->balance<0)?($obj->balance).'(Extra-Payment)':$obj->balance; ?></td>
                                            
                                            
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

  <!-- bootstrap-datetimepicker -->
 <link href="<?php echo VENDOR_URL; ?>datepicker/datepicker.css" rel="stylesheet">
 <script src="<?php echo VENDOR_URL; ?>datepicker/datepicker.js"></script>
 
<script type="text/javascript"> 
    $('#date').datepicker({
         format: "mm-yyyy",
        startView: "months", 
        minViewMode: "months"
    });
    $("#add_month").datepicker( {
        format: "mm-yyyy",
        startView: "months", 
        minViewMode: "months"
    });
    
    $("#add_bulk_month").datepicker( {
        format: "mm-yyyy",
        startView: "months", 
        minViewMode: "months"
    });
    
    $("#edit_month").datepicker( {
        format: "mm-yyyy",
        startView: "months", 
        minViewMode: "months"
    });

   
    
    <?php if(isset($edit)){ ?>
        get_student_by_class('<?php echo $invoice->class_id; ?>', '<?php echo $invoice->student_id; ?>', 'bulk');
    <?php } ?>

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
  
    
    function get_student_by_class(class_id, student_id, is_bulk){       
           
        $.ajax({       
            type   : "POST",
            url    : "<?php echo site_url('ajax/get_student_by_class'); ?>",
            data   : { class_id : class_id , student_id : student_id, is_bulk : is_bulk},               
            async  : false,
            success: function(response){                                                   
               if(response)
               {
                    if(student_id != ''){
                        $('#edit_student_id').html(response);
                    }else{                        
                         
                         if(is_bulk){                         
                            $('#add_bulk_student_id').html(response);
                         }else{
                            $('#add_student_id').html(response);
                         }
                    }
               }
            }
        });                  
        
   }

   $("#filter_button").on('click',function(){
        $date = $("#filter_month").val();
        get_invoice_by_filter($date);
   });
   function get_invoice_by_filter($date){       
           
        $.ajax({       
            type   : "POST",
            url    : "<?php echo site_url('ajax/get_invoice_by_filter'); ?>",
            data   : { date : date},               
            async  : false,
            success: function(response){                                                   
               if(response)
               {
                    
               }
            }
        });                  
        
   }


 </script>
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
    $("#add").validate(); 
    
    $("#bulk").validate();  
    
    $("#edit").validate(); 
    
    
</script>