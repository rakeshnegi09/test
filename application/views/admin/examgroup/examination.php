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
                                        <div class="col-sm-3">
                                            <div class="form-group">
											  <div class="select_container">
                                                <label><?php echo $this->lang->line('class'); ?></label> <small class="req"> *</small>
                                                <select autofocus="" id="class_id" multiple  name="class_id[]" class="form-control" style="height: 100%;" >
                                                    
                                                    <?php
													$count = 0;
													foreach ($classlist as $class) {
														?>
                                                        <option value="<?php echo $class['id'] ?>" <?php if (set_value('class_id') == $class['id']) {
																echo "selected=selected";
															}
														?>>
														<?php echo $class['class'] ?></option>
                                                        <?php $count++;	} ?>
													</select>
												</div>
                                                  <span class="text-danger" id="error_class_id"></span>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
												<?php $section = get_section(); ?>
                                                <label><?php echo $this->lang->line('section'); ?></label>
                                                <select  id="" name="section_id" class="form-control" >
                                                    <option value=""><?php echo $this->lang->line('select'); ?></option>
													<?php foreach($section as $row){ ?>
													<option value="<?php echo $row['id']; ?>"><?php echo $row['section']; ?></option>
													<?php } ?>
													
                                                </select>
                                                <span class="text-danger"><?php echo form_error('section_id'); ?></span>
                                            </div>
                                        </div>
										<div class="col-sm-3">
											<div class="form-group">
											   <label>Year</label><small class="req"> *</small>
											   <select id="session_id" name="session_id" class="form-control" autocomplete="off">
												  <option value="">Select</option>
												  <option value="7">2017</option>
												  <option value="11">2018</option>
												  <option value="13">2019</option>
												  <option value="14">2020</option>
												  <option value="15">2021</option>
												  <option value="16">2022</option>
												  <option value="18">2023</option>
												  <option value="19">2024</option>
												  <option value="20">2025</option>
												  <option value="21">2026</option>
												  <option value="22">2027</option>
												  <option value="23">2028</option>
												  <option value="24">2029</option>
												  <option value="25">2030</option>
											   </select>
											   <span class="text-danger"></span>
											</div>
										</div>
										<div class="col-sm-3">
											<div class="form-group">
											   <label>Examination</label><small class="req"> *</small>
											   <select id="subject_type" name="subject_type" class="form-control" autocomplete="off">
												  <option value="">Select</option>
												  <option value="practical">Practical</option>
												  <option value="theory">Menu</option>								 
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
                                    </form>
                                </div>
                           </div><!--./col-md-6-->
                        </div><!--./row-->
                    </div>


                <?php
                if (isset($resultlist)) {
                    ?>
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

                                    <input type="hidden" name="exam_group_class_batch_exam_subject_id" value="<?php echo $id; ?>">
                                    <div class=" table-responsive">
                                        <?php
                                        if (!empty($exam_subjects)) {
                                            ?>
                                            <table class="table table-striped">
                                                <tbody>
                                                    <tr>
                                                        <th><?php echo $this->lang->line('admission_no'); ?></th>
                                                        <th><?php echo $this->lang->line('student_name'); ?></th>
                                                        <th><?php echo $this->lang->line('father_name'); ?></th>
                                                        <th><?php echo $this->lang->line('date_of_birth')?></th>
                                                        <th><?php echo $this->lang->line('gender'); ?></th>
                                                        <?php
                                                        foreach ($exam_subjects as $exam_subject_key => $exam_subject_value) {
                                                            ?>
                                                            <th>
                                                                <?php
                                                                echo $exam_subject_value->subject_name . "<br/> (" . $exam_subject_value->max_marks . "/" . $exam_subject_value->min_marks . ") ";
                                                                ?>
                                                            </th>
                                                            <?php
                                                        }
                                                        ?>


                                                    </tr>
                                                    <?php
                                                    if (empty($resultlist)) {
                                                        ?>
                                                        <tr>
                                                            <td colspan="7" class="text-danger text-center"><?php echo $this->lang->line('no_record_found'); ?></td>
                                                        </tr>
                                                        <?php
                                                    } else {

                                                        foreach ($resultlist as $student_result => $student) {
                                                            ?>
                                                            <tr>
                                                                <td><?php echo $student->admission_no; ?></td>
                                                                <td>
                                                                    <a href="<?php echo base_url(); ?>student/view/<?php echo $student->id; ?>"><?php echo $student->firstname . " " . $student->lastname; ?>
                                                                    </a>
                                                                </td>

                                                                <td><?php echo $student->father_name; ?></td>
                                                                <td><?php
                                                                    if ($student->dob != null) {
                                                                        echo date($this->customlib->getSchoolDateFormat(), $this->customlib->dateyyyymmddTodateformat($student->dob));
                                                                    }
                                                                    ?></td>

                                                                <td><?php echo $student->gender; ?></td>
                                                                <?php
                                                                foreach ($student->marks_result as $markkey => $markvalue) {
                                                                    ?>
                                                                    <td><?php
                                                                        if ($markvalue->exam_group_exam_result_id == "") {
                                                                            echo "N/A";
                                                                        } else {

                                                                            echo $markvalue->get_marks;
                                                                        }
                                                                        ?></td>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </tr>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>


                                            <?php
                                        } else {

                                          echo $this->lang->line('no_subject_found');
                                        }
                                        ?>

                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                    <?php
                }
                ?>

            </div>

        </div>

    </section>
</div>





<script type="text/javascript">
$(document).ready(function () {
	$('select[multiple]').multiselect({
		columns:0,
		placeholder: 'Select options'
	});
	
});

    var date_format = '<?php echo $result = strtr($this->customlib->getSchoolDateFormat(), ['d' => 'dd', 'm' => 'mm', 'Y' => 'yyyy']) ?>';
    var class_id = '<?php echo set_value('class_id', 0) ?>';
    var batch_id = '<?php echo set_value('batch_id', 0) ?>';
    // getBatchByClass(class_id, section_id);
    getBatchByClass(class_id, batch_id);
    $(document).on('change', '#class_id', function (e) {
        $('#section_id').html("");
        var class_id = $(this).val();
        getBatchByClass(class_id, 0);
    });




    function getBatchByClass(class_id, batch_id) {

        if (class_id != "") {
            $('#batch_id').html("");

            var div_data = '<option value=""><?php echo $this->lang->line('select'); ?></option>';


            $.ajax({
                type: "POST",
                url: baseurl + "admin/batchsubject/getBatchByClass",
                data: {'class_id': class_id},
                dataType: "JSON",
                beforeSend: function () {
                    $('#batch_id').addClass('dropdownloading');
                },
                success: function (data) {
                    $.each(data, function (i, obj)
                    {
                        var sel = "";
                        if (batch_id == obj.batch_id) {
                            sel = "selected";
                        }
                        div_data += "<option value=" + obj.batch_id + " " + sel + ">" + obj.batch_name + "</option>";
                    });
                    $('#batch_id').append(div_data);
                },
                complete: function () {
                    $('#batch_id').removeClass('dropdownloading');
                }
            });
        }
    }



    var response;
    $.validator.addMethod("uniqueUserName", function (value, element, options)
    {
        var max_mark = $('#max_mark').val();

        //we need the validation error to appear on the correct element
        return parseFloat(value) <= parseFloat(max_mark);
    },
            "Invalid Marks"
            );


    $('form#assign_form').on('submit', function (event) {
        //Add validation rule for dynamically generated name fields
        $('.marks').each(function () {
            $(this).rules("add",
                    {
                        required: true,
                        uniqueUserName: true,
                        messages: {
                            required: "Required",
                        }
                    });
        });

        //Add validation rule for dynamically generated email fields

    });
    $("#assign_form").validate({
        submitHandler: function (form) {
            if (confirm('Are you sure?')) {
                var $this = $('.allot-fees');
                $.ajax({
                    type: "POST",
                    dataType: 'Json',
                    url: $("#assign_form").attr('action'),
                    data: $("#assign_form").serialize(), // serializes the form's elements.
                    beforeSend: function () {
                        $this.button('loading');

                    },
                    success: function (data)
                    {
                        if (data.status == "fail") {
                            var message = "";
                            $.each(data.error, function (index, value) {

                                message += value;
                            });
                            errorMsg(message);
                        } else {
                            successMsg(data.message);
                        }

                        $this.button('reset');
                    },
                    complete: function () {
                        $this.button('reset');
                    }
                });

            }
            return false; // required to block normal submit since you used ajax
        }
    });



</script>


