
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <i class="fa fa-map-o"></i> <?php echo $this->lang->line('examinations'); ?> <small><?php echo $this->lang->line('student_fee1'); ?></small>  </h1>
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

                        <form role="form" action="<?php echo site_url('admin/examresult/marksheet') ?>" method="post" class="row">

                            <?php echo $this->customlib->getCSRF(); ?>
                            <!--div class="col-sm-6 col-lg-4 col-md-4">
                                <div class="form-group">
                                    <label><?php echo $this->lang->line('exam') . " " . $this->lang->line('group'); ?></label><small class="req"> *</small>
                                    <select autofocus="" id="exam_group_id" name="exam_group_id" class="form-control select2" >
                                        <option value=""><?php echo $this->lang->line('select'); ?></option>
                                        <?php
                                        foreach ($examgrouplist as $ex_group_key => $ex_group_value) {
                                            ?>
                                            <option value="<?php echo $ex_group_value->id ?>" <?php
                                            if (set_value('exam_group_id') == $ex_group_value->id) {
                                                echo "selected=selected";
                                            }
                                            ?>><?php echo $ex_group_value->name; ?></option>
                                                    <?php
                                                }
                                                ?>
                                    </select>
                                    <span class="text-danger"><?php echo form_error('exam_group_id'); ?></span>
                                </div>  
                            </div--><!--./col-md-3-->
                            <!--div class="col-sm-6 col-lg-4 col-md-4">
                                <div class="form-group">   
                                    <label><?php echo $this->lang->line('exam'); ?></label><small class="req"> *</small>
                                    <select  id="exam_id" name="exam_id" class="form-control select2" >
                                        <option value=""><?php echo $this->lang->line('select'); ?></option>
                                    </select>
                                    <span class="text-danger"><?php echo form_error('exam_id'); ?></span>
                                </div>  
                            </div--><!--./col-md-3-->
                            
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
							
							<div class="col-sm-2">
                                <div class="form-group">  
                                    <label><?php echo $this->lang->line('session'); ?></label><small class="req"> *</small>
                                    <select required id="session_id" name="session_id" class="form-control" >
                                        <option value=""><?php echo $this->lang->line('select'); ?></option>
                                        <?php
                                        foreach ($sessionlist as $session) {
                                            ?>
                                            <option value="<?php echo $session['id'] ?>" <?php
                                            if (set_value('session_id') == $session['id']) {
                                                echo "selected=selected";
                                            }
                                            ?>><?php echo $session['session'] ?></option>
                                                    <?php
                                                }
                                                ?>
                                    </select>
                                    <span class="text-danger"><?php echo form_error('session_id'); ?></span>
                                </div>  
                            </div>
							 <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Qualifications</label><small class="req"> *</small>
                                    <select  id="marksheet" required name="qualifications" class="form-control" >
                                        <option value=""><?php echo $this->lang->line('select'); ?></option>
                                        <option <?php if (set_value('qualifications') == '1') {
									echo "selected=selected"; } ?> value="1">Occupational Certificate: Chef</option>
                                        <option <?php if (set_value('qualifications') == '2') {
									echo "selected=selected"; } ?> value="2">City & Guilds Diploma in Food Preparation & Culinary Arts - Patisserie</option>
                                        <option <?php if (set_value('qualifications') == '3') {
									echo "selected=selected"; } ?> value="3">City & Guilds Certificate in Introduction to Professional Cookery and the Hospitality Industry</option>
                                    </select>
                                    <span class="text-danger"><?php echo form_error('marksheet'); ?></span>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="exampleInputEmail1"><?php echo $this->lang->line('marksheet') . " " . $this->lang->line('template') ?></label><small class="req"> *</small>
                                    <select  id="marksheet" required name="marksheet" class="form-control" >
                                        <option value=""><?php echo $this->lang->line('select'); ?></option>
                                        <option <?php if (set_value('marksheet') == 'polokwane') {
									echo "selected=selected"; } ?> value="polokwane">Polokwane Template</option>
                                        <option <?php if (set_value('marksheet') == "mokopane") {
									echo "selected=selected"; } ?> value="mokopane">Mokopane Template</option>
                                    </select>
                                    <span class="text-danger"><?php echo form_error('marksheet'); ?></span>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <button type="submit" name="search" value="search_filter" class="btn btn-primary pull-right btn-sm checkbox-toggle"><i class="fa fa-search"></i> <?php echo $this->lang->line('search'); ?></button>
                                </div>
                            </div>
                        </form>

                    </div>

                    <?php
                    if (isset($studentList)) {
						$section_id = set_value('section_id');
						$session_id = set_value('session_id');
						$qualifications = set_value('qualifications');
						$marksheet = set_value('marksheet');
                        ?>
                        <form method="post" action="<?php echo base_url('admin/examresult/printmarksheet') ?>" id="printMarksheet">
                            <input type="hidden" name="marksheet" value="<?php echo $marksheet; ?>">
                            <input type="hidden" name="session_id" value="<?php echo $session_id; ?>">
                            <input type="hidden" name="section_id" value="<?php echo $section_id; ?>">
                            <input type="hidden" name="qualifications" value="<?php echo $qualifications; ?>">


                            <div class="box-header ptbnull"></div>  
                            <div class="box-header ptbnull">
                                <h3 class="box-title titlefix"><i class="fa fa-users"></i> <?php echo $this->lang->line('student'); ?> <?php echo $this->lang->line('list'); ?></h3>
                                <button  class="btn btn-info btn-sm printSelected pull-right" type="submit" name="generate" title="generate multiple certificate"><?php echo $this->lang->line('generate'); ?></button>
                            </div>
                            <div class="box-body">
                                
                                <div class="tab-pane active table-responsive no-padding" id="tab_1">
                                    <table class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th><input type="checkbox" id="select_all" /></th>
                                                <th><?php echo $this->lang->line('admission_no'); ?></th>
                                                <th><?php echo $this->lang->line('student_name'); ?></th>
                                                <th><?php echo $this->lang->line('father_name'); ?></th>
                                                <th><?php echo $this->lang->line('date_of_birth'); ?></th>
                                                <th><?php echo $this->lang->line('gender'); ?></th>
                                                <th><?php echo $this->lang->line('category'); ?></th>
                                                <th class=""><?php echo $this->lang->line('mobile_no'); ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if (empty($studentList)) {
                                                ?>

                                                <?php
                                            } else {
                                                $count = 1;
                                                foreach ($studentList as $student_key => $student_value) {
                                                
                                                    ?>
                                                    <tr>
                                                        <td class="text-center"><input type="checkbox" class="checkbox center-block"  name="student_id[]" data-student_id="<?php echo $student_value->student_id; ?>" value="<?php echo $student_value->student_id; ?>">

                                                        </td>
                                                        <td><?php echo $student_value->admission_no; ?></td>
                                                        <td>
            <a href="<?php echo base_url(); ?>student/view/<?php echo $student_value->student_id; ?>"><?php echo $this->customlib->getFullName($student_value->firstname,$student_value->middlename,$student_value->lastname,$sch_setting->middlename,$sch_setting->lastname); ?>
                                                            </a>
                                                        </td>

                                                        <td><?php echo $student_value->father_name;
                                        ;
                                                    ?></td>
                                                        <td><?php 
															if (!empty($student_value->dob) && $student_value->dob != '0000-00-00') {
															echo date($this->customlib->getSchoolDateFormat(), $this->customlib->dateyyyymmddTodateformat($student_value->dob)); }?></td>
                                                        <td><?php echo $student_value->gender; ?></td>
                                                        <td><?php echo $student_value->category; ?></td>
                                                        <td><?php echo $student_value->mobileno; ?></td>
                                                    </tr>
                                                    <?php
                                                    $count++;
                                                }
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>                                                                           
                            </div>                                           

                        </form>
                    </div>
                    <?php
                }
                ?>
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

</script>
<script>

    $(document).on('submit', 'form#printMarksheet', function (e) {

        e.preventDefault();
        var form = $(this);
        var subsubmit_button = $(this).find(':submit');
        var formdata = form.serializeArray();

        var list_selected =  $('form#printMarksheet input[name="student_id[]"]:checked').length;
      if(list_selected > 0){
        $.ajax({
            type: "POST",
            url: form.attr('action'),
            data: formdata, // serializes the form's elements.
            dataType: "JSON", // serializes the form's elements.
            beforeSend: function () {
                subsubmit_button.button('loading');
            },
            success: function (response)
            {
				console.log(response);
                Popup(response.page);
            },
            error: function (xhr) { // if error occured

                alert("Error occured.please try again");
                subsubmit_button.button('reset');
            },
            complete: function () {
                subsubmit_button.button('reset');
            }
        });
      }else{
         confirm("<?php echo $this->lang->line('please_select_student'); ?>");
      }
    });


    $(document).on('click', '#select_all', function () {
        $(this).closest('table').find('td input:checkbox').prop('checked', this.checked);
    });

</script>
<script type="text/javascript">

    var base_url = '<?php echo base_url() ?>';
    function Popup(data)
    {

        var frame1 = $('<iframe />');
        frame1[0].name = "frame1";
        $("body").append(frame1);
        var frameDoc = frame1[0].contentWindow ? frame1[0].contentWindow : frame1[0].contentDocument.document ? frame1[0].contentDocument.document : frame1[0].contentDocument;
        frameDoc.document.open();
//Create a new HTML document.
        frameDoc.document.write('<html>');
        frameDoc.document.write('<head>');
        frameDoc.document.write('<title></title>');
        frameDoc.document.write('</head>');
        frameDoc.document.write('<body>');
        frameDoc.document.write(data);
        frameDoc.document.write('</body>');
        frameDoc.document.write('</html>');
        frameDoc.document.close();
        setTimeout(function () {
            window.frames["frame1"].focus();
            window.frames["frame1"].print();
            frame1.remove();
        }, 500);
        return true;
    }
</script>