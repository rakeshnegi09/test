
<style type="text/css">
    .radio {
        padding-left: 20px;}
    .radio label {
        display: inline-block;
        vertical-align: middle;
        position: relative;
        padding-left: 5px; }
    .radio label::before {
        content: "";
        display: inline-block;
        position: absolute;
        width: 17px;
        height: 17px;
        left: 0;
        margin-left: -20px;
        border: 1px solid #cccccc;
        border-radius: 50%;
        background-color: #fff;
        -webkit-transition: border 0.15s ease-in-out;
        -o-transition: border 0.15s ease-in-out;
        transition: border 0.15s ease-in-out; }
    .radio label::after {
        display: inline-block;
        position: absolute;
        content: " ";
        width: 11px;
        height: 11px;
        left: 3px;
        top: 3px;
        margin-left: -20px;
        border-radius: 50%;
        background-color: #555555;
        -webkit-transform: scale(0, 0);
        -ms-transform: scale(0, 0);
        -o-transform: scale(0, 0);
        transform: scale(0, 0);
        -webkit-transition: -webkit-transform 0.1s cubic-bezier(0.8, -0.33, 0.2, 1.33);
        -moz-transition: -moz-transform 0.1s cubic-bezier(0.8, -0.33, 0.2, 1.33);
        -o-transition: -o-transform 0.1s cubic-bezier(0.8, -0.33, 0.2, 1.33);
        transition: transform 0.1s cubic-bezier(0.8, -0.33, 0.2, 1.33); }
    .radio input[type="radio"] {
        opacity: 0;
        z-index: 1; }
    .radio input[type="radio"]:focus + label::before {
        outline: thin dotted;
        outline: 5px auto -webkit-focus-ring-color;
        outline-offset: -2px; }
    .radio input[type="radio"]:checked + label::after {
        -webkit-transform: scale(1, 1);
        -ms-transform: scale(1, 1);
        -o-transform: scale(1, 1);
        transform: scale(1, 1); }
    .radio input[type="radio"]:disabled + label {
        opacity: 0.65; }
    .radio input[type="radio"]:disabled + label::before {
        cursor: not-allowed; }
    .radio.radio-inline {
        margin-top: 0; }
    .radio-primary input[type="radio"] + label::after {
        background-color: #337ab7; }
    .radio-primary input[type="radio"]:checked + label::before {
        border-color: #337ab7; }
    .radio-primary input[type="radio"]:checked + label::after {
        background-color: #337ab7; }
    .radio-danger input[type="radio"] + label::after {
        background-color: #d9534f; }
    .radio-danger input[type="radio"]:checked + label::before {
        border-color: #d9534f; }
    .radio-danger input[type="radio"]:checked + label::after {
        background-color: #d9534f; }
    .radio-info input[type="radio"] + label::after {
        background-color: #5bc0de; }
    .radio-info input[type="radio"]:checked + label::before {
        border-color: #5bc0de; }
    .radio-info input[type="radio"]:checked + label::after {
        background-color: #5bc0de; }
    @media (max-width:767px){
        .radio.radio-inline {display: inherit;}
    }      
</style>

<div class="content-wrapper" style="min-height: 946px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-calendar-check-o"></i> <?php echo $this->lang->line('attendance'); ?> <small><?php echo $this->lang->line('by_date1'); ?></small></h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">

                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-search"></i> <?php echo $this->lang->line('select_criteria'); ?></h3>
                    </div>
                    <form id='form1' action="<?php echo site_url('admin/stuattendence/index') ?>"  method="post" accept-charset="utf-8">
                        <div class="box-body">
                            <?php
                            if ($this->session->flashdata('msg')) {
                                echo $this->session->flashdata('msg');
                            }
                            ?>

                            <?php echo $this->customlib->getCSRF(); ?>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1"><?php echo $this->lang->line('class'); ?></label><small class="req"> *</small>

                                        <select autofocus="" id="class_id" name="class_id" class="form-control" >
                                            <option value=""><?php echo $this->lang->line('select'); ?></option>
                                            <?php
                                            foreach ($classlist as $class) {
                                                ?>
                                                <option value="<?php echo $class['id'] ?>" <?php
                                                if ($class_id == $class['id']) {
                                                    echo "selected =selected";
                                                }
                                                ?>><?php echo $class['class'] ?></option>
                                                        <?php
                                                        $count++;
                                                    }
                                                    ?>
                                        </select>
                                        <span class="text-danger"><?php echo form_error('class_id'); ?></span>
                                    </div>
                                </div>
								<div class="col-sm-4">
									<div class="form-group">
										<?php $section = get_section(); ?>
										<label><?php echo $this->lang->line('section'); ?></label>
										<select  id="" name="section_id" class="form-control" >
											<option value=""><?php echo $this->lang->line('select'); ?></option>
											<?php foreach($section as $row){ ?>
											<option  <?php
                                                if ($section_id == $row['id']) {
                                                    echo "selected =selected";
                                                }
                                                ?> value="<?php echo $row['id']; ?>"><?php echo $row['section']; ?></option>
											<?php } ?>
											
										</select>
										<span class="text-danger"><?php echo form_error('section_id'); ?></span>
									</div>
								</div>
                               
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">
                                            <?php echo $this->lang->line('attendance'); ?>
                                            <?php echo $this->lang->line('date'); ?>
                                        </label>
                                        <input id="date" name="date" placeholder="" type="text" class="form-control date"  value="<?php echo set_value('date', date($this->customlib->getSchoolDateFormat())); ?>" readonly="readonly"/>
                                        <span class="text-danger"><?php echo form_error('date'); ?></span>
                                    </div>
                                </div>
                                <div class="col-md-12">    
                                    <div class="form-group">
                                        <button type="submit" name="search" value="search" class="btn btn-primary btn-sm pull-right checkbox-toggle"><i class="fa fa-search"></i> <?php echo $this->lang->line('search'); ?></button>
                                    </div> 
                                </div>   
                            </div>
                        </div>
                    </form>
                    <?php
                    if (isset($resultlist)) {
                        ?>
                        <div class="">
                            <div class="box-header ptbnull"></div> 
                            <div class="box-header with-border">
							<?php
									$get_week_date = get_week_date($date);
									$day_count = 1;
									foreach($get_week_date as $key=> $day){
										if($key==0){
											$from_date = $day->format('Y/m/d');
										}
										if($key==4){
											$to_date = $day->format('Y/m/d');
										}
									}
									
								
								?>
                               
								<strong class="text-center">Week: <?php echo $from_date ;?> - <?php echo $to_date ;?></strong>
                                <div class="box-tools pull-right">
								
								
								 <div class="lateday">
								 
									<b>Present: <b class="text text-success">P </b></b>
									<b>Absent: <b class="text text-danger">A </b></b>
									<b>Holiday: <b class="text text-danger">H</b></b>
									<b>Absent with Reason: <b class="text text-success">AR</b></b>
									<b>W.E.L: <b class="text text-success">W.E.L</b></b>
								</div>
                                </div>
                            </div>
                            <div class="box-body">
                                <?php
                                if (!empty($resultlist)) {
                                    $can_edit = 1;
                                    $checked = "";
                                    if (!isset($msg)) {
                                        if ($resultlist[0]['attendence_type_id'] != "") {
                                            if ($resultlist[0]['attendence_type_id'] != 5) {
                                                if ($this->rbac->hasPrivilege('student_attendance', 'can_edit')) {

                                                    $can_edit = 1;
                                                } else {
                                                    $can_edit = 0;
                                                }
                                                ?>
                                                <div class="alert alert-success"><?php echo $this->lang->line('attendance_already_submitted_you_can_edit_record'); ?></div>
                                                <?php
                                            } else {
                                                $checked = "checked='checked'";
                                                ?>
                                                <div class="alert alert-warning"><?php echo $this->lang->line('attendance_already_submitted_as_holiday'); ?>. <?php echo $this->lang->line('you_can_edit_record'); ?></div>
                                                <?php
                                            }
                                        }
                                    } else {
                                        ?>
                                        <div class="alert alert-success"><?php echo $this->lang->line('attendance_saved_successfully'); ?></div>
                                        <?php
                                    }
                                    ?>
                                    <form action="<?php echo site_url('admin/stuattendence/index') ?>" method="post" class="form_attendence" enctype='multipart/form-data'>
                                        <?php echo $this->customlib->getCSRF(); ?>
                                      <div class="mailbox-controls">
                                            <span class="button-checkbox">
                                               
                                                </span>
                                                <div >
												<span  style="margin-left:93%">
														<span class="btn btn-primary btn-file">Upload<input type="file" id="file-upload" name="doc"></span>
														<div id="file-upload-filename" style="margin-left:85%"></div>
													</span>
                                            </div>
                                        </div>
                                        <input type="hidden" name="class_id" value="<?php echo $class_id; ?>">
                                        <input type="hidden" name="section_id" value="<?php echo $section_id; ?>">
                                        <input type="hidden" name="date" value="<?php echo $date; ?>">
                                        <div class="table-responsive ptt10">
                                            <table class="table table-hover table-striped example"> 
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th><?php echo $this->lang->line('admission_no'); ?></th>
                                                        <?php
                                                        if ($sch_setting->biometric) {
                                                            ?>
                                                            <th><?php echo $this->lang->line('date'); ?></th>
                                                            <?php
                                                        } 
                                                        ?>
                                                        <th><?php echo $this->lang->line('roll_no'); ?></th>
                                                        <th><?php echo $this->lang->line('name'); ?></th>
                                                        <th class="">Monday</th>
                                                        <th class="">Tuesday</th>
                                                        <th class="">Wednesday</th>
                                                        <th class="">Thursday</th>
                                                        <th class="">Friday</th>
                                                        <th style="width:50px;text-align:right">W.E.L</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
													
													$get_week_date = get_week_date($date);
													
                                                    $row_count = 1;
                                                    foreach ($resultlist as $key => $value) {

                                                        ?>
                                                        <tr>
                                                            <td>
                                                                <input type="hidden" name="student_session[]" value="<?php echo $value['student_session_id']; ?>">
                                                                <input  type="hidden" value="<?php echo $value['attendence_id']; ?>"  name="attendendence_id<?php echo $value['student_session_id']; ?>">
            <?php echo $row_count; ?>
                                                            </td>
                                                            <td>
                                                            <?php echo $value['admission_no']; ?>
                                                            </td>
                                                            <?php
                                                            if ($sch_setting->biometric) {
                                                                ?>
                                                                <td>
                                                                    <?php
                                                                    if ($value['biometric_attendence']) {

                                                                        echo $value['attendence_dt'];
                                                                    }
                                                                    ?>
                                                                </td>
                                                                <?php
                                                            }
                                                             ?>
                                                            <td>
            <?php echo $value['roll_no']; ?>
                                                            </td>

                                                            <td>

            <?php 
            echo $this->customlib->getFullName($value['firstname'],$value['middlename'],$value['lastname'],$sch_setting->middlename,$sch_setting->lastname);  ?>
                                                            </td>
					<?php 
					$count_date = 0;
					foreach($get_week_date as $key_date=>$date) { $count_date++ ;?>	
							<td >
							
								<?php
								$value['attendence_type_id'] = '';
								$get_attendence_by_date_id = get_attendence_by_date_id($date->format('Y-m-d'),$value['student_session_id']);
								$value['attendence_type_id'] = $get_attendence_by_date_id['attendence_type_id'];
								$c = 1;
								$count = 0;
								
								
								foreach ($attendencetypeslist as $key => $type) {
									
									
									if ($type['key_value'] != "H") {
									$att_type = str_replace(" ", "_", strtoupper($type['type']));
									if ($value['date'] != "xxx") {
									
									
									
								?>
								
								<input <?php if ($value['attendence_type_id'] == $type['id']) echo "checked"; ?> type="radio" id="attendencetype<?php echo $value['student_session_id'] . "-" . $count; ?>" value="<?php echo $type['id'] ?>" name="attendencetype<?php echo $value['student_session_id']; ?><?php echo $count_date;?>" >

								<label for="attendencetype<?php echo $value['student_session_id'] . "-" . $count; ?>">
								<?php echo $att_type; ?> 
								</label>

								
								<?php
								}else {
								?>


								
								<?php
								if ($sch_setting->biometric) {
								?>
								<input  <?php if ($value['attendence_type_id'] == $type['id']) echo "checked"; ?> type="radio" id="attendencetype<?php echo $value['student_session_id'] . "-" . $count; ?>" value="<?php echo $type['id'] ?>" name="attendencetype<?php echo $value['student_session_id']; ?><?php echo $count_date;?>" >
								<?php
								}else {
								?>
								<input  <?php if ($value['attendence_type_id'] == $type['id']) echo "checked"; ?> type="radio" id="attendencetype<?php echo $value['student_session_id'] . "-" . $count; ?>" value="<?php echo $type['id'] ?>" name="attendencetype<?php echo $value['student_session_id']; ?><?php echo $count_date;?>" >
								<?php
								}
								?>
								<label for="attendencetype<?php echo $value['student_session_id'] . "-" . $count; ?>">
								<?php echo $att_type; ?> 
								</label>
								
									<?php
									}
										$c++;
										$count++;
									}
								}
								?>
							<input type="hidden" id="attendencedate<?php echo $value['student_session_id'] . "-" . $count; ?>" value="<?php echo $date->format('Y-m-d'); ?>" name="attendencedate<?php echo $value['student_session_id']; ?><?php echo $count_date;?>" >
							</td>
						<?php } ?>
                                                            <?php if ($date == 'xxx') { ?> 
                                                                  <td class="text-right"><input <?php if ($value['wel'] == "1") echo "checked"; ?> type="checkbox"  name="remark<?php echo $value["student_session_id"] ?>" value="1" ></td>
            <?php } else { ?>

                                                                <td class="text-right"><input <?php if ($value['wel'] == "1") echo "checked"; ?> type="checkbox"  name="remark<?php echo $value["student_session_id"] ?>" value="1" ></td>
                                                        <?php } ?>
                                                        </tr>
                                                        <?php
                                                        $row_count++;
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
											
                                                <div class="">
                                                    <?php
                                               
                                                if ($can_edit == 1) {
                                                    if ($this->rbac->hasPrivilege('student_attendance', 'can_add')) {
                                                        ?>
                                                        <button type="submit" name="search" value="saveattendence" class="btn btn-primary btn-sm pull-right checkbox-toggle"><i class="fa fa-save"></i> <?php echo $this->lang->line('save_attendance'); ?> </button>
                                                    <?php }
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </form>
                                    <?php
                                } else {
                                    ?>
                                    <div class="alert alert-info"><?php echo $this->lang->line('admited_alert'); ?></div>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div> 
                    <?php
                }
                ?>
                </section>
            </div>
            <script type="text/javascript">
				function showFileName( event ) {
				  
				  // the change event gives us the input it occurred in 
				  var input = event.srcElement;
				  
				  // the input has an array of files in the `files` property, each one has a name that you can use. We're just using the name here.
				  var fileName = input.files[0].name;
				  
				  // use fileName however fits your app best, i.e. add it into a div
				  infoArea.textContent = 'File name: ' + fileName;
				}
					var input = document.getElementById( 'file-upload' );
				var infoArea = document.getElementById( 'file-upload-filename' );

				input.addEventListener( 'change', showFileName );
             

            </script>