<?php
$currency_symbol = $this->customlib->getSchoolCurrencyFormat();
?>


<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <i class="fa fa-user-plus"></i> <?php echo $this->lang->line('student_information'); ?> <small><?php echo $this->lang->line('student1'); ?></small></h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-search"></i> <?php echo $this->lang->line('select_criteria'); ?></h3>
                    </div>
                    <div class="box-body">
                         <form role="form" action="<?php echo site_url('admin/examgroup/examination') ?>" method="post" class="class_search_form">
                        <?php if ($this->session->flashdata('msg')) {?> <div class="alert alert-success">  <?php echo $this->session->flashdata('msg') ?> </div> <?php }?>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                        <?php echo $this->customlib->getCSRF(); ?>
                                        <div class="col-sm-2">                                  
											<div class="form-group">
												<label for="exampleInputEmail1"><?php echo $this->lang->line('class'); ?></label><small class="req"> *</small>
												<select required  id="class_id" multiple name="class_id[]" class="form-control"  >
												<?php
													
													foreach ($classlist as $class) {
														?>
														<option value="<?php echo $class['id'] ?>" <?php if(in_array($class['id'],$class_id_array)){ echo "selected=selected"; } ?>><?php echo $class['class'] ?></option>
														<?php } ?>
												</select>
												<span class="text-danger"><?php echo form_error('class_id'); ?></span>
											</div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group">
												<?php $section = get_section(); ?>
                                                <label><?php echo $this->lang->line('section'); ?></label>
                                                <select required id="" name="section_id" class="form-control" >
                                                    <option value=""><?php echo $this->lang->line('select'); ?></option>
													<?php foreach($section as $row){ ?>
													<option <?php if (set_value('section_id') == $row['id']) {
                                                echo "selected=selected"; } ?> value="<?php echo $row['id']; ?>"><?php echo $row['section']; ?></option>
													<?php } ?>
													
                                                </select>
                                                <span class="text-danger"><?php echo form_error('section_id'); ?></span>
                                            </div>
                                        </div>
										<div class="col-sm-3">
											<div class="form-group">
											<?php $get_all_exams = get_all_exams(); ?>
											   <label>Exam</label><small class="req"> *</small>
											   <select required id="exam_id" name="exam_id" class="form-control" autocomplete="off">
												  <option value="">Select</option>
												  <?php foreach($get_all_exams as $row){ ?>
													<option <?php if (set_value('exam_id') == $row['id']) {
                                                echo "selected=selected"; } ?> value="<?php echo $row['id']; ?>"><?php echo $row['exam']; ?> (<?php echo get_exam_group_name($row['exam_group_id']);?>)</option>
													<?php } ?>
											   </select>
											   <span class="text-danger"></span>
											</div>
										</div>
										<div class="col-sm-2">
											<div class="form-group">
											<?php $session = get_session(); ?>
											   <label>Year</label><small class="req"> *</small>
											   <select required id="session_id" name="session_id" class="form-control" autocomplete="off">
												  <option value="">Select</option>
												  <?php foreach($session as $row){ ?>
													<option <?php if (set_value('session_id') == $row['id']) {
                                                echo "selected=selected"; } ?> value="<?php echo $row['id']; ?>"><?php echo $row['session']; ?></option>
													<?php } ?>
											   </select>
											   <span class="text-danger"></span>
											</div>
										</div>
										<div class="col-sm-3">
											<div class="form-group">
											<?php $subjects = get_subjects(); ?>
											   <label>Examination</label><small class="req"> *</small>
											   <select required id="subject_type" name="subject_id" class="form-control" autocomplete="off">
												  <option value="">Select</option>
												 <?php foreach($subjects as $row){ ?>
													<option <?php if (set_value('subject_id') == $row['id']) {
                                                echo "selected=selected"; } ?> value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
													<?php } ?>								 
											   </select>
											   <span class="text-danger"></span>
											</div>
										</div>
                                        <div class="col-sm-12 ">
                                            <div class="form-group  pull-right">
											
                                                <button type="submit" name="search" value="search_filter" class="btn btn-primary  "><i class="fa fa-search"></i> <?php echo $this->lang->line('search'); ?></button>
                                            </div>
                                        </div>
                                </div>
                            </div><!--./col-md-6-->
                            <!--div class="col-md-6">
                                <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label><?php echo $this->lang->line('search_by_keyword'); ?></label>
                                        <input type="text" name="search_text" id="search_text" class="form-control" value="<?php echo set_value('search_text'); ?>"   placeholder="<?php echo $this->lang->line('search_by_student_name'); ?>">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <button type="submit" name="search" value="search_full" class="btn btn-primary pull-right btn-sm checkbox-toggle"><i class="fa fa-search"></i> <?php echo $this->lang->line('search'); ?></button>
                                            </div>
                                        </div>
                                    
                                </div>
                           </div><!--./col-md-6-->
                        </div><!--./row-->
                    </div>


                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title"><i class="fa fa-users"></i> Assign Exam Group
                                </i> </h3>
                            <div class="box-tools pull-right">
                            </div>
                        </div>
                        <div class="box-body">
						
                            <div class="row">

                                <div class="col-md-12">

                                   
                                    <div class=" table-responsive">
                                      <?php
										$subject_id = set_value('subject_id');
										$sub_type	=	get_subjects_id($subject_id);
									  ?>
									  
									<table class="table table-striped">
										<tbody>
											<tr>
												<th><?php echo $this->lang->line('admission_no'); ?></th>
												<th><?php echo $this->lang->line('student_name'); ?></th>
												<?php if(isset($sub_type['type']) && $sub_type['type'] == "theory"){?>
												<th><?php echo $this->lang->line('test'); ?></th>
												<th><?php echo $this->lang->line('project'); ?></th>
												<th class="text-center"><?php echo $this->lang->line('sub_average')?></th>
												<?php }else{ ?>
												<th><?php echo $this->lang->line('menu'); ?></th>
												<?php } ?>
												
												<th class="text-center"><?php echo $this->lang->line('competent'); ?></th>
												
											</tr>
											<?php
											if (empty($examination)) {
												?>
												<tr>
													<td colspan="7" class="text-danger text-center"><?php echo $this->lang->line('no_record_found'); ?></td>
												</tr>
												<?php
											} else {

												foreach ($examination as $key => $row) {
													$student_id = $row->id;
													$class_id = $row->class_id;
													$section_id = $row->section_id;
													$session_id = set_value('session_id');
													$exam_id = set_value('exam_id');
													
													$get_existing = get_result($student_id,$class_id,$section_id,$session_id,$subject_id,$exam_id );
													
													$test_mark = "";
													$project_mark = "";
													$menu_mark = "";
													$average = "";
													if($get_existing){
														if(!empty($get_existing['test_mark'])){
															$test_mark = $get_existing['test_mark'];
														}
														if(!empty($get_existing['project_mark'])){
															$project_mark = $get_existing['project_mark'];
														}
														if(!empty($get_existing['menu_mark'])){
															$menu_mark = $get_existing['menu_mark'];
														}
														if(!empty($get_existing['average'])){
															$average = $get_existing['average'];
														}	
													}
													?>
													<tr>
														<td>
														<?php echo $row->admission_no; ?>
														<input type="hidden" value="<?= $student_id; ?>" class="form-control" name="hidden_student_id[]">
														<input type="hidden" value="<?= $section_id; ?>" class="form-control" name="hidden_section_id[]">
														<input type="hidden" value="<?= $class_id; ?>" class="form-control" name="hidden_class_id[]">
														<input type="hidden" value="<?= $session_id; ?>" class="form-control" name="hidden_session_id[]" value="<?= set_value('session_id'); ?>">
														<input type="hidden" value="<?= $exam_id; ?>" class="form-control" name="hidden_exam_id[]" value="<?= set_value('exam_id'); ?>">
														<input type="hidden" value="<?= $subject_id; ?>" class="form-control" name="hidden_subject_id[]">
														</td>
														<td>
															<a href="<?php echo base_url(); ?>student/view/<?php echo $row->id; ?>"><?php echo $row->firstname . " " . $row->lastname; ?>
															</a>
														</td>
														<?php if($sub_type['type'] == "theory"){?>
														<td>
														<input type="text" value="<?= $test_mark; ?>" class="form-control" name="test_mark[]">
														</td>
														<td><input type="text" value="<?= $project_mark; ?>" class="form-control" name="project_mark[]"></td>
														<td class="text-center"><?= $average; ?></td>
														
														<?php }else{ ?>
														
														<td><input type="text" value="<?= $menu_mark; ?>" class="form-control" name="menu_mark[]"></td>
														<?php } ?>
														
														<td  class="text-center"><input <?php if(!empty($get_existing['competent'])){ echo "checked";} ?> type="checkbox" name="competent[]" value="1" class=""></td>
														
													</tr>
													<?php } ?><td colspan="7" class="pull-right">
													<input type="submit" class="btn btn-success pull-right" name="examination" value="Save" style="margin-right:30px"></td>
											<?php } 	?>
										</tbody>
										</table>
                                    </div>
									
                                </div>
                            </div>
							
							</form>

                        </div>
                    </div>
            </div>

        </div>

    </section>
</div>




<script type="text/javascript">
	$(document.body).ready(function () {
		var selected_value = '<?php echo json_encode($class_id_array);?>';
		$('select[multiple]').multiselect({
			columns:1,
			placeholder:"Please select",
			search: false,
            searchOptions: {
                'default': 'Search Class'
            },
            selectAll: false
		});
		
		$('ul').find("input:checkbox").each(function(key, val) {
			key++;			
			var value = document.getElementById('ms-opt-'+key).value;			
			if($.inArray(value, selected_value) != -1) {
				console.log(value);				
				$(".default").trigger("click");
			}
		});
	});

    $(document).ready(function () {

        var class_id = $('#class_id').val();
        var section_id = '<?php echo set_value('section_id', 0) ?>';
        var hostel_id = $('#hostel_id').val();
        var hostel_room_id = '<?php echo set_value('hostel_room_id', 0) ?>';

        getSectionByClass(class_id, section_id);
    });

    $(document).on('change', '#class_id', function (e) {
        $('#section_id').html("");
        var class_id = $(this).val();
        getSectionByClass(class_id, 0);
    });





    function getSectionByClass(class_id, section_id) {
		return false;
        if (class_id != "") {
            $('#section_id').html("");
            var base_url = '<?php echo base_url() ?>';
            var div_data = '<option value=""><?php echo $this->lang->line('select'); ?></option>';
            $.ajax({
                type: "GET",
                url: base_url + "sections/getByClass",
                data: {'class_id': class_id},
                dataType: "json",
                beforeSend: function () {
                    $('#section_id').addClass('dropdownloading');
                },
                success: function (data) {
                    $.each(data, function (i, obj)
                    {
                        var sel = "";
                        if (section_id == obj.section_id) {
                            sel = "selected";
                        }
                        div_data += "<option value=" + obj.section_id + " " + sel + ">" + obj.section + "</option>";
                    });
                    $('#section_id').append(div_data);
                },
                complete: function () {
                    $('#section_id').removeClass('dropdownloading');
                }
            });
        }
    }



</script>



<script type="text/javascript">
    $(document).ready(function () {
        $.extend($.fn.dataTable.defaults, {
            searching: true,
            ordering: true,
            paging: false,
            retrieve: true,
            destroy: true,
            info: false
        });
    });
 

</script>
