<?php   if(!empty($st)){?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		body{
        		margin: 8px !important;
        	}
		@media screen {
        	#hrefPrint{
        		display: block;
        	}
        	td{
        		padding: 2px !important;
        	}

      }

      @media print {
         .header{
         	display: none;
         }
         #hrefPrint{
    		display: none;
    	}
    	td{
    		padding: 2px !important;
    	}
    	.table-data{
    		margin-bottom: 500px;
    	}
      }
	</style>
	<script type="text/javascript">
    function PrintDiv(){
      
      /* var divToPrint=document.getElementById("printTable");
       newWin= window.open("");
       newWin.document.write(divToPrint.outerHTML);
       newWin.print();
       newWin.close();*/
       window.print();
    }
  </script>
</head>
<body>
	<div class="header">
       <h2>Print Demand Note</h2>
  	</div>
  	<form name="form" method="post" action="" id="form">
        <table width="100%">
            <tbody>
            	<tr>
	                <td align="center" style="height: 40px">
	                    <div><a style="font-size: small; font-family: Verdana; font-weight: bold" href="#" id="hrefPrint" onclick="PrintDiv()">Print</a></div>
	                </td>
            	</tr>
		        <tr>
		        	<td align="center">
		            	<div id="printdiv" style="width: 100%">
		            		<?php foreach($st as $key => $value){?>
	                        <table id="DataList1" cellspacing="5" class="table-data" cellpadding="4" ordercolor="Black" border="0" style="color:Black;height:100%;float: left;width:50%;">
							<tbody>
								<tr>
									<td style="padding: 4px;width:45%;">
                                		<table cellpadding="0" cellspacing="6" class="" style="width: 100%; border: 2px solid black">
                                    		<tbody>
                                    			<tr>
                                    				<td align="left" style="width: 150px;float: left;">
                                                    	<img style="width: 80px;height:70px" alt="logo" src="<?php echo UPLOAD_PATH; ?>/logo/<?php echo $settings->logo; ?>">  
                                                    </td>
			                                        <td style="float: left;">
			                                            <table cellpadding="0" cellspacing="0" style="width: 100%">
			                                                <tbody>
			                                                	<tr>
				                                                    <td align="right" style="padding-right: 5px">
				                                                        <span id="DataList1_ctl00_Label19" style="font-weight: 700; text-decoration: underline; font-size: large">Demand Note</span>
				                                                    </td>
				                                                    <td align="right" style="width: 150px">
				                                                        <span id="DataList1_ctl00_lblMobile"><?php echo $value->custom_invoice_id;?></span>
				                                                    </td>
			                                                	</tr>
			                                                	  <tr>
							                                        <td align="center" colspan="2">
							                                            <span id="DataList1_ctl00_lblSchoolName" style="font-weight: 700; font-size: large; font-family: 'Times New Roman', Times, serif;"><?php echo $settings->school_name;?></span>
							                                        </td>
							                                        <tr>
								                                        <td align="center" colspan="2" style="">
								                                            <span id="DataList1_ctl00_lblAddress"><?php echo $value->student_details->present_address;?></span>
								                                        </td>
								                                    </tr>
				                                    			</tr>
			                                            	</tbody>
			                                        	</table>
			                                        </td>
			                                    </tr>
			                                  
	                                    		
		                                    	<tr>
			                                        <td colspan="2" style="border-top: 1px solid #000000">
			                                            <table cellpadding="0" cellspacing="0" style="width: 100%">
			                                                <tbody><tr>
			                                                    <td valign="top" style="width: 70px">
			                                                        <span id="DataList1_ctl00_Label36" style="font-size:12px;">Reg. No. :</span>
			                                                    </td>
			                                                    <td valign="top" align="left">
			                                                        <span id="DataList1_ctl00_lblName0" style="font-size:12px;"><?php echo $value->student_details->registration_no;?></span>
			                                                    </td>
			                                                    <td align="right" style="width: 360px;">
			                                                        <span id="DataList1_ctl00_Label29" style="font-size:12px;">Invoice No. :</span>
			                                                    </td>
			                                                    <td align="right">
			                                                        <span id="DataList1_ctl00_lblMonth" style="font-size:12px;"><?php echo $value->custom_invoice_id;?></span>
			                                                    </td>
			                                                </tr>
			                                                <tr>
			                                                    <td valign="top" style="width: 90px;">
			                                                        <span id="DataList1_ctl00_Label5" style="font-size:12px;">Invoice Date. :</span>
			                                                    </td>
			                                                    <td valign="top" align="left">
			                                                        <span id="DataList1_ctl00_Label6" style="font-size:12px;"><?php echo date('Y-m-d');?></span>
			                                                    </td>                                                    
			                                                    <td style="width: 360px" align="right">
			                                                        <span id="DataList1_ctl00_Label3" style="font-size:12px;">Month :</span>
			                                                    </td>
			                                                    <td align="right">

			                                                        <span id="DataList1_ctl00_Label4" style="font-size:12px;font-weight:bold;"><?php  echo date('F, Y',strtotime('01-'.$month));?></span>
			                                                    </td>
			                                                </tr>
			                                            </tbody></table>
			                                        </td>
			                                    </tr>
			                                    <tr>
			                                        <td colspan="2">
			                                            <table width="100%">
			                                                <tbody>
			                                                	<tr>
				                                                    <td align="left" style="width: 50px">
				                                                        <span id="DataList1_ctl00_Label24" style="font-size:12px;">Name :</span>
				                                                    </td>
				                                                    <td align="left">
				                                                        <span id="DataList1_ctl00_lblName" style="font-size:12px;font-weight: 700;"><?php echo $value->student_details->name;?></span>
				                                                    </td>
			                                                	</tr>
			                                                	 <tr>
							                                        <td style="width: 80px">
							                                            <span id="DataList1_ctl00_Label25" style="font-size:12px;">Father's Name :</span>
							                                        </td>
							                                        <td>
							                                            <span id="DataList1_ctl00_lblFather" style="font-size:12px;"><?php echo $value->student_details->guardian_name;?></span>
							                                        </td>
							                                    </tr>
			                                            	</tbody>
			                                        	</table>
			                                        </td>
				                                </tr>
				                               
				                                <tr>
			                                        <td colspan="2">
			                                            <table cellpadding="0" cellspacing="0" width="100%">
			                                                <tbody><tr>
			                                                    <td style="width: 33px">
			                                                        <span id="DataList1_ctl00_Label26" style="font-size:12px;">Class :</span>
			                                                    </td>
			                                                    <td style="width: 40px">
			                                                        <span id="DataList1_ctl00_lblClass" style="font-size:12px;"><?php echo $value->student_details->class_name;?></span>
			                                                    </td>
			                                                    <td style="width: 43px">
			                                                        <span id="DataList1_ctl00_Label27" style="font-size:12px;">Section :</span>
			                                                    </td>
			                                                    <td style="width: 30px">
			                                                        <span id="DataList1_ctl00_lblSection" style="font-size:12px;"><?php echo $value->student_details->section;?></span>
			                                                    </td>
			                                                    <td style="width: 48px">
			                                                        <span id="DataList1_ctl00_Label28" style="font-size:12px;">Roll No. :</span>
			                                                    </td>
			                                                    <td>
			                                                        <span id="DataList1_ctl00_lblRollNo" style="font-size:12px;"><?php echo $value->student_details->roll_no;?></span>
			                                                    </td>
			                                                </tr>
			                                            </tbody></table>
			                                        </td>
			                                    </tr>
			                                    <tr>
			                                        <td colspan="2">
			                                            <div id="DataList1_ctl00_Panel1" style="width:100%;">
				                                            <div>
																<table cellspacing="2" cellpadding="2" rules="all" border="1" id="DataList1_ctl00_GridView1" style="color:Black;background-color:White;border-color:#F0F0F0;border-width:1px;border-style:Solid;width:100%;font-size: small">
																	<tbody>
																		<tr>
																			<th align="center" scope="col">Sno.</th>
																			<th align="center" scope="col">Particulars</th>
																			<th align="center" scope="col">Amount</th>
																		</tr>
																		<?php $i = 1;?>
																		<?php if(isset($value->monthly_tution_feeamount) && !empty($value->monthly_tution_feeamount)){ ?>
																			<tr>
																				<td align="center">
				                                                                <span id="DataList1_ctl00_GridView1_ctl02_Label1"><?php echo $i; $i++;?></span>
			                                                           		 	</td>
			                                                           		 	<td align="left">
				                                                                <span id="DataList1_ctl00_GridView1_ctl02_Labesadl1">MONTHLY TUITION FEE</span>
					                                                            </td><td align="right">
					                                                                <span id="DataList1_ctl00_GridView1_ctl02_Label2"><?php echo $value->monthly_tution_feeamount;?></span>
					                                                            </td>
																			</tr>
																		<?php } ?>
																		<?php if(isset($value->certificate_feeamount) && !empty($value->certificate_feeamount)){ ?>
																			<tr>
																				<td align="center">
				                                                                <span id="DataList1_ctl00_GridView1_ctl02_Label1"><?php echo $i; $i++;?></span>
			                                                           		 	</td>
			                                                           		 	<td align="left">
				                                                                <span id="DataList1_ctl00_GridView1_ctl02_Labesadl1">CERTIFICATE FEE</span>
					                                                            </td><td align="right">
					                                                                <span id="DataList1_ctl00_GridView1_ctl02_Label2"><?php echo $value->certificate_feeamount;?></span>
					                                                            </td>
																			</tr>
																		<?php } ?>
																		<?php if(isset($value->admission_feeamount) && !empty($value->admission_feeamount)){ ?>
																			<tr>
																				<td align="center">
				                                                                <span id="DataList1_ctl00_GridView1_ctl02_Label1"><?php echo $i; $i++;?></span>
			                                                           		 	</td>
			                                                           		 	<td align="left">
				                                                                <span id="DataList1_ctl00_GridView1_ctl02_Labesadl1">ADMISSION FEE</span>
					                                                            </td><td align="right">
					                                                                <span id="DataList1_ctl00_GridView1_ctl02_Label2"><?php echo $value->admission_feeamount;?></span>
					                                                            </td>
																			</tr>
																		<?php } ?>
																		<?php if(isset($value->exam_feeamount) && !empty($value->exam_feeamount)){ ?>
																			<tr>
																				<td align="center">
				                                                                <span id="DataList1_ctl00_GridView1_ctl02_Label1"><?php echo $i; $i++;?></span>
			                                                           		 	</td>
			                                                           		 	<td align="left">
				                                                                <span id="DataList1_ctl00_GridView1_ctl02_Labesadl1">EXAM FEE</span>
					                                                            </td><td align="right">
					                                                                <span id="DataList1_ctl00_GridView1_ctl02_Label2"><?php echo $value->exam_feeamount;?></span>
					                                                            </td>
																			</tr>
																		<?php } ?>
																		<?php if(isset($value->transport_feeamount) && !empty($value->transport_feeamount)){ ?>
																			<tr>
																				<td align="center">
				                                                                <span id="DataList1_ctl00_GridView1_ctl02_Label1"><?php echo $i; $i++;?></span>
			                                                           		 	</td>
			                                                           		 	<td align="left">
				                                                                <span id="DataList1_ctl00_GridView1_ctl02_Labesadl1">TRANSPORT FEE</span>
					                                                            </td><td align="right">
					                                                                <span id="DataList1_ctl00_GridView1_ctl02_Label2"><?php echo $value->transport_feeamount;?></span>
					                                                            </td>
																			</tr>
																		<?php } ?>
																		<?php if(isset($value->hostel_feeamount) && !empty($value->hostel_feeamount)){ ?>
																			<tr>
																				<td align="center">
				                                                                <span id="DataList1_ctl00_GridView1_ctl02_Label1"><?php echo $i; $i++;?></span>
			                                                           		 	</td>
			                                                           		 	<td align="left">
				                                                                <span id="DataList1_ctl00_GridView1_ctl02_Labesadl1">HOSTEL FEE</span>
					                                                            </td><td align="right">
					                                                                <span id="DataList1_ctl00_GridView1_ctl02_Label2"><?php echo $value->hostel_feeamount;?></span>
					                                                            </td>
																			</tr>
																		<?php } ?>
																		<?php if(isset($value->library_feeamount) && !empty($value->library_feeamount)){ ?>
																			<tr>
																				<td align="center">
				                                                                <span id="DataList1_ctl00_GridView1_ctl02_Label1"><?php echo $i; $i++;?></span>
			                                                           		 	</td>
			                                                           		 	<td align="left">
				                                                                <span id="DataList1_ctl00_GridView1_ctl02_Labesadl1">LIBRARY FEE</span>
					                                                            </td><td align="right">
					                                                                <span id="DataList1_ctl00_GridView1_ctl02_Label2"><?php echo $value->library_feeamount;?></span>
					                                                            </td>
																			</tr>
																		<?php } ?>
																		
																	<!-- 	<tr>
																		<td align="center">
			                                                                <span id="DataList1_ctl00_GridView1_ctl03_Label1">2</span>
			                                                            </td><td align="left">
			                                                                <span id="DataList1_ctl00_GridView1_ctl03_Labesadl1">EXAMINATION FEE</span>
			                                                            </td><td align="right">
			                                                                <span id="DataList1_ctl00_GridView1_ctl03_Label2">600</span>
			                                                            </td>
																	</tr>
																	<tr>
																		<td align="center">
			                                                                <span id="DataList1_ctl00_GridView1_ctl04_Label1">3</span>
			                                                            </td><td align="left">
			                                                                <span id="DataList1_ctl00_GridView1_ctl04_Labesadl1">MISLENIOUS FEE</span>
			                                                            </td><td align="right">
			                                                                <span id="DataList1_ctl00_GridView1_ctl04_Label2">1200</span>
			                                                            </td>
																	</tr> -->	
																	</tbody>
																</table>
															</div>
														</div>
                                        			</td>
	                                    		</tr>
	                                    		<tr>
	                                        <td colspan="2" align="right">
	                                            <table cellpadding="0" cellspacing="0" style="width: 200px">
	                                                <tbody>
	                                                	 <tr>
		                                                    <td align="right">
		                                                        <span id="DataList1_ctl00_Label33">Gross Total :</span>
		                                                    </td>
		                                                    <td align="right">
		                                                        <span id="DataList1_ctl00_lblGrossTotal" style="font-weight: 700"><?php echo $value->gross_amount;?></span>
		                                                    </td>
		                                                </tr>
	                                                
	                                                	<?php if(isset($value->discount) && !empty($value->discount)){ ?>
		                                                	<tr>
			                                                    <td align="right">
			                                                        <span id="DataList1_ctl00_Label32">Discount :</span>
			                                                    </td>
			                                                    <td align="right">
			                                                        <span id="DataList1_ctl00_lblOldDues" style="font-weight: 700"><?php echo $value->discount;?></span>
			                                                    </td>
			                                                </tr>
		                                            	<?php }?>
		                                            	<?php if(isset($value->previous_dues) && !empty($value->previous_dues)){ ?>
		                                                	<tr>
			                                                    <td align="right">
			                                                        <span id="DataList1_ctl00_Label32">Old Dues :</span>
			                                                    </td>
			                                                    <td align="right">
			                                                        <span id="DataList1_ctl00_lblOldDues" style="font-weight: 700"><?php echo $value->previous_dues;?></span>
			                                                    </td>
			                                                </tr>
		                                            	<?php }?>
		                                               	<tr>
		                                                    <td align="right">
		                                                        <span id="DataList1_ctl00_Label31">Net Total :</span>
		                                                    </td>
		                                                    <td align="right">
		                                                        <span id="DataList1_ctl00_lblNetAmount" style="font-weight: 700"><?php echo $value->net_amount+(!empty($value->previous_dues)?$value->previous_dues:0);?></span>
		                                                    </td>
	                                                	</tr>
	                                            	</tbody>
	                                        	</table>
	                                    	</td>
	                                    		</tr>
			                                    <tr>
			                                        <td colspan="2">
			                                            <table cellpadding="0" cellspacing="0" style="width: 100%">
			                                                <tbody>
			                                                	<tr>
			                                                		<?php 
			                                                		$ans = getWords($value->net_amount);
																	?>
				                                                    <td valign="top">
				                                                        <span id="DataList1_ctl00_Label34" style="font-size:12px;">In Words :</span>
				                                                    </td>
				                                                    <td valign="top">
				                                                        <span id="DataList1_ctl00_lblInWords" style="display:inline-block;font-size:12px;width:200px;word-wrap: break-word"><?php echo ucfirst($ans);?></span>
				                                                    </td>
				                                                    <td align="center" valign="bottom" style="height: 30px">
				                                                        <span id="DataList1_ctl00_Label35" style="font-style: italic; font-family: Haettenschweiler; font-size: medium">Signature</span>
				                                                    </td>
			                                                	</tr>
			                                            	</tbody>
			                                        	</table>
			                                        </td>
			                                    </tr>
		                                	</tbody>
                            			</table>
                            		</td>
                            	</tr>	
                            </tbody>
                        </table>
                        <?php }?>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</form>
</body>
</html>
<?php }?>