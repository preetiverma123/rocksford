<!DOCTYPE html>
<html>
<head>
	<title>
		
	</title>
	<style type="text/css">
		.header{
			background-color: #ddd;
		}
		.header h2{
			margin:0 10px;
			color:#000;
			padding: 5px;
			font-weight: 500;
		}
    @media screen {
      .space td{
          height:30px;
        }
        .printhide{
          display:block;
        }
        .identitySpace{
          padding-bottom: 30px;
        }
    }
     @media print {
        .space td{
          height:550px;
        }
        .printhide{
          display:none;
        }
        .identitySpace{
          padding-bottom: 160px;
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
<body style="margin: 0px; padding: 0px; font-family: Verdana; height: 100%; width: 100%;
    font-size: small; background-color: White;">
    <div class="header">
    <h2>Print <?php echo ucfirst(!empty($print_id)?$print_id:'');?> Card</h2>
    </div>
     <div align="center" class="printhide"><a style="font-size: small; font-family: Verdana; font-weight: bold" href="javascript:void(0)" onclick="PrintDiv()" id="hrefPrint">Print</a></div>
	<table width="100%" id="printTable">
		<tbody>
			<tr>
        <td align="center">
           
        </td>
      </tr>
      <?php if($print_id=='identity'){ ?> 
      <tr>
            
        <td align="center">
            <div id="printdiv" style="width: 400px">
          <table id="DataList1" cellspacing="5" cellpadding="0" ordercolor="Black" border="0" style="color:Black;height:100%;width:100%;">
				<tbody>
             <?php foreach($students as $student){ ?>
          <tr>
						<td>
                     		<table class="identitySpace" width="400" border="0" cellspacing="0" class="" cellpadding="0">
	                            <tbody><tr>
	                              <td align="center" valign="top" bgcolor="#0099CC" style="border-radius:8px;box-shadow: 0px 0px 0px 1px rgba(0, 0, 0, 0.08); padding:2px;border: 1px solid #3995d4;background:transparent;">
	                              	<table width="100%" cellpadding="0" cellspacing="0">
		                                <tbody><tr>
		                                  <td align="center" valign="top" style="padding:5px;border-bottom:1px solid #3995d4">
		                                  		<table width="100%" border="0" cellspacing="0" cellpadding="0">
				                                    <tbody>
				                                    	<tr>
					                                      <td width="21%" height="95" align="left" valign="top"><img id="imgLogo" src="<?php echo UPLOAD_PATH; ?>/logo/<?php echo $settings->logo; ?>" style="height:75px;width:75px;border-width:0px;"></td>
					                                      <td width="79%" align="center" valign="top">
					                                      	<table width="98%" border="0" cellspacing="0" cellpadding="0">
              
					                                          <tbody>
					                                          	<tr>
					                                            <td align="left">
					                                            	<span id="DataList1_ctl00_lblSchool" style="font-weight:bold;color:#;font-family:Times New Roman;font-size:18px;"><?php echo $settings->school_name;?></span>
					                                            </td>
					                                          	</tr>
					                                          	<tr>
		                                            		<td align="center">&nbsp;</td>
		                                          		</tr>
		                                           	<tr>
		                                            <td align="center">&nbsp;</td>
		                                          </tr>
		                                         
		                                        <tr>
		                                            <td align="center">
		                                            	<table width="98%" border="0" cellspacing="0" cellpadding="0">
			                                              	<tbody>
				                                              	<tr>
				                                                <td width="51%" class="style2">IDENTITY CARD</td>
				                                                <td width="49%" align="right" class="style2"><?php echo $settings->running_year;?></td>
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
                      	</td>
                       </tr>
                            <tr>
                              <td align="center" valign="" bgcolor="#fff">
                              	<table width="98%" border="0" cellspacing="0" cellpadding="0">
                                    <tbody><tr>
                                      <td align="center" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">

                                        <tbody><tr>
                                          <td align="center" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                              <tbody><tr>
                                                <td width="15%" height="25" class="style3">Name</td>
                                                <td width="6%" align="center" valign="middle" class="style3">:-</td>
                                                <td width="55%" class="style3"><?php echo $student->name;?></td>
                                                <td width="24%" rowspan="6" align="center" valign="top" style="padding:5px">
                                                  <?php if($student->photo){ ?>
                                                    <img src="<?php echo UPLOAD_PATH; ?>/student-photo/<?php echo $student->photo; ?>" style="height:80px;width:80px;border-width:0px;"/><br/><br/>
                                                    <?php }else{ ?>
                                                    <img src="<?php echo IMG_URL; ?>/default-user.png" style="height:80px;width:80px;border-width:0px;" /> 
                                                  <?php } ?>
                                                  <!-- <img id="DataList1_ctl00_Image2" src="<?php echo UPLOAD_PATH; ?>/signature/<?php echo $settings->signature; ?>" style="height:80px;width:80px;border-width:0px;"> --></td>
                                              </tr>
                                              <tr>
                                                <td height="25" class="style3">Guardian</td>
                                                <td align="center" valign="middle" class="style3">:-</td>
                                                <td class="style3"><?php echo $student->guardian_name;?></td>
                                              </tr>
                                              <tr>
                                                <td height="25" class="style3">Dob</td>
                                                <td align="center" valign="middle" class="style3">:-</td>
                                                <td class="style3"><?php echo $student->dob;?></td>
                                              </tr>
                                              <tr>
                                                <td height="25" class="style3">Class</td>
                                                <td align="center" valign="middle" class="style3">:-</td>
                                                <td class="style3"><?php echo $student->class_name;?>-<?php echo $student->section;?></td>
                                              </tr>
                                              <tr>
                                                <td height="25" class="style3">Roll No.</td>
                                                <td align="center" valign="middle" class="style3">:-</td>
                                                <td class="style3"><?php echo $student->roll_no;?></td>
                                              </tr>
                                              <tr>
                                                <td height="25" class="style3">Guardian's Phone</td>
                                                <td align="center" valign="middle" class="style3">:-</td>
                                                <td class="style3"><?php echo $student->guardian_phone;?></td>
                                              </tr>
                                          </tbody></table></td>
                                        </tr>

                                        <tr>
                                          <td align="center"><table width="98%" border="0" cellspacing="0" cellpadding="0">
                                            <tbody><tr>
                                              <td></td>
                                              <td align="right" class="style3"><img id="DataList1_ctl00_imgSignature" src="<?php echo UPLOAD_PATH; ?>/signature/<?php echo $settings->signature; ?>" style="height:30px;border-width:0px;"></td>
                                            </tr>
                                            <tr>
                                              <td></td>
                                              <td align="right" class="style3">Principal</td>
                                            </tr>
                                          </tbody></table></td>
                                        </tr>

                                      </tbody></table></td>
                                    </tr>
                                  </tbody></table></td>
                                </tr>
                                <tr>
                                  <td height="30" align="center" valign="top" style="padding:5px;"><span id="DataList1_ctl00_lblAddress"><?php echo $settings->address;?></span></td>
                                </tr>
                          		</tbody></table></td>
                        		</tr>
                      		</tbody>
                  		</table>

                        </td>
                    </tr>
            					 <?php } ?>
            			</tbody>
            					</table>
                                </div>
                            </td>
                
            </tr>
            <?php } else{ ?>
            <tr>
          <td align="center">
            <div id="printdiv" align="center" style="width: 800px">
              <table id="DataList1" cellspacing="0" cellpadding="0" ordercolor="Black" border="0" style="color:black;height:100%;width:100%;border-collapse:collapse;">
                <tbody>
              <?php foreach($students as $student){ ?>
              <tr>
              <td>
                <table width="100%" class="" style="border: 2px solid #9CAAC1">
                  <tbody>
                    
                    <tr>
                      <td>
                        <table cellspacing="0" width="100%" style="border-bottom: 2px solid #1b74b2">
                          <tbody>
                            <tr>
                              <td align="left" rowspan="4" style="width: 80px">
                                  <img id="imgLogo" src="<?php echo UPLOAD_PATH; ?>/logo/<?php echo $settings->logo; ?>" style="height:75px;width:75px;border-width:0px;">
                              </td>
                              <td valign="top" align="center">
                                  <span id="lblSchool" style="font-weight:bold;color:#3a3636;font-family:Times New Roman;font-size:24px;"><?php echo $settings->school_name;?></span>







                              </td>
                            </tr>
                           
                            <tr>
                                <td valign="top" align="center">
                                    <span id="DataList1_ctl00_lblAddress" style="font-weight: 700; color: #222526;"><?php echo $settings->address;?></span>
                                </td>
                            </tr>
                            <tr>
                                <td valign="top" align="center">
                                  <span id="DataList1_ctl00_Label5" style="color:#3995d4;font-weight:bold;font-size: small; color: #6a6a66;">(Admit Card for : <?php echo ucfirst(!empty($exam_details->title))?$exam_details->title:'';?> Examination, Session <?php echo $settings->running_year;?>)</span>
                                </td>
                            </tr>
                          </tbody>
                        </table>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <table width="100%" cellspacing="0">
                          <tbody>
                            <tr>
                              <td style="width: 120px">
                                <span id="DataList1_ctl00_Label7" style="color:#3995d4;font-weight:bold;font-size: small">Name :</span>
                              </td>
                              <td colspan="3">
                                <span id="DataList1_ctl00_Label8"><?php echo $student->name;?></span>
                              </td>
                              <td align="right" valign="top" rowspan="5">
                               <?php if($student->photo){ ?>
                                  <img src="<?php echo UPLOAD_PATH; ?>/student-photo/<?php echo $student->photo; ?>" id="DataList1_ctl00_Image2"  style="height:80px;border-width:0px;"/><br/><br/>
                                  <?php }else{ ?>
                                  <img id="DataList1_ctl00_Image2" src="<?php echo IMG_URL; ?>/default-user.png"  style="height:80px;border-width:0px;" /> 
                                <?php } ?>
                              
                              </td>
                            </tr>
                            <tr>
                              <td style="width: 120px">
                                <span id="DataList1_ctl00_Label9" style="color:#3995d4;font-weight:bold;font-size: small">Guardian :</span>
                              </td>
                              <td colspan="3">
                                <span id="DataList1_ctl00_Label16"><?php echo $student->guardian_name;?></span>
                              </td>
                            </tr>
                            <tr>
                              <td style="width: 120px">
                                <span id="DataList1_ctl00_Label10" style="color:#3995d4;font-weight:bold;font-size: small">Class :</span>
                              </td>
                              <td>
                                <span id="DataList1_ctl00_Label15"><?php echo $student->class_name;?>-<?php echo $student->section;?></span>
                              </td>
                              <td style="width: 120px">
                                <span id="DataList1_ctl00_Label11" style="color:#3995d4;font-weight:bold;font-size: small">Roll No. :</span>
                              </td>
                              <td>
                                <span id="DataList1_ctl00_Label14"><?php echo $student->roll_no;?></span>
                              </td>
                            </tr>
                            <tr>
                              <td style="width: 120px">
                                <span id="DataList1_ctl00_Label12" style="color:#3995d4;font-weight:bold;font-size: small">Address :</span>
                              </td>
                              <td>
                                <span id="DataList1_ctl00_Label17"><?php echo $student->present_address;?></span>
                              </td>
                              <td style="width: 120px">
                                <span id="DataList1_ctl00_Label18" style="color:#3995d4;font-weight:bold;font-size: small">Mobile :</span>
                              </td>
                              <td>
                                  <span id="DataList1_ctl00_Label19"><?php echo $student->guardian_phone;?></span>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </td>
                    </tr>
                  <tr>
                    <td>
                      <div>
                        <table cellspacing="2" cellpadding="2" rules="all" border="1" id="DataList1_ctl00_GridView1" style="border-width:1px;border-style:solid;height:100%;width:100%;font-size: 9px; font-family: Verdana;">
                          <tbody><tr>
                            <th align="center" scope="col" style="color:#3995d4;font-size:12px;background-color:#e5e1df;border-color:#A8D4DC;border-width:1px;border-style:Solid;font-weight:bold;width:30%;">DATE</th><th align="center" scope="col" style="color:#3995d4;font-size:12px;background-color:#e5e1df;border-color:#A8D4DC;border-width:1px;border-style:Solid;font-weight:bold;width:20%;">TIME</th><th align="center" scope="col" style="color:#3995d4;font-size:12px;background-color:#e5e1df;border-color:#A8D4DC;border-width:1px;border-style:Solid;font-weight:bold;width:50%;">SUBJECTS</th>
                          </tr>
                          <?php if(!empty($exam_subjects)){
                        
                            foreach($exam_subjects as $exams){
                          ?>
                          <tr>
                            <td align="center">
                              <span id="DataList1_ctl00_GridView1_ctl02_Label15" style="font-size:12px;"><?php echo $exams->exam_date;?></span>
                            </td><td align="center">
                              <span id="DataList1_ctl00_GridView1_ctl02_Label15" style="font-size:12px;"><?php echo $exams->start_time;?>-<?php echo $exams->end_time;?></span>
                            </td><td align="center">
                              <span id="DataList1_ctl00_GridView1_ctl02_Label15" style="font-size:12px;"><?php echo $exams->subject_name;?>-<?php echo $exams->code;?></span>
                            </td>
                          </tr>
                          <?php }}?>
                          </tbody>
                        </table>
                      </div>                                                
                    </td>
                  </tr>
                  <tr>
                    <td align="right">
                      <img id="imgSignature" src="" style="height:25px;border-width:0px;">
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <table width="100%" cellspacing="0">
                          <tbody>
                            <tr>
                              <td></td>
                              <td valign="bottom" align="right"> <img id="DataList1_ctl00_imgSignature" src="<?php echo UPLOAD_PATH; ?>/signature/<?php echo $settings->signature; ?>" style="height:30px;border-width:0px;"></td>
                            </tr>
                            <tr>
                              <td align="right" valign="bottom" style="width: 50%; height: 30px">
                                <span id="DataList1_ctl00_Label1" style="font-weight: 700">Examination Controller</span>
                              </td>
                              <td valign="bottom" align="right">
                               
                                <span id="DataList1_ctl00_Label13" style="font-weight: 700">Principal</span>
                              </td>
                            </tr>
                        </tbody>
                      </table>
                      </td>
                  </tr>
                  <tr>
                    <td align="left" style="height: 30px; border-top: 1px dotted #000000">
                      <span style="font-weight: bold; text-decoration: underline">Note:</span>
                    </td>
                  </tr>
                  <tr>
                    <td align="left" style="height: 20px">
                        <span>1. Students will bring only Pad, Pen, Pencil, Sharpner, Eraser, Colour and instrument box at the examination period.</span>
                    </td>
                  </tr>
                  <tr>
                    <td align="left" style="height: 20px">
                        <span>2. Students will appear at the exam on required time table.</span>
                    </td>
                  </tr>
                  <tr>
                    <td align="left" style="height: 20px">
                      <span>3. All the dues <!-- till month of <span id="blExamMonth" style="font-weight:bold;">March / 2019</span> --> to be certainly paid. It is very important notice.</span>
                    </td>
                </tr>
                <tr>
                  <td align="left" style="height: 20px">
                    <span>4. If any student who will have absent at the exam his result will have uncompleted.</span>
                  </td>
                </tr>
                
              </tbody>
            </table>
            <table width="100%" class="space">
              <tbody>
                <tr>
                  <td></td>
                </tr>
              </tbody>
            </table>
          </td>
        </tr>
        <?php } ?>
      </td>
    </tr>
    <?php } ?>
		</tbody>
	</table>

</body>
</html>