<?php
$currency_symbol = $this->customlib->getSchoolCurrencyFormat(); ?>
<style type="text/css">
  /*.table td:last-child, th:last-child {float: none;text-align: start;}*/
  .image-upload>input {
  display: none;
}
.dropify-wrapper .dropify-message {
	font-size:0px;
	top: 70%;
}

</style>
<div class="content-wrapper">
  <div class="row">
    <div class="col-md-12">
      <section class="content-header" style="padding-right: 0;">
        <h1>
          <i class="fa fa-user-plus">
          </i> 
          <?php echo $this->lang->line("student_information"); ?> 
          <small>
            <?php echo $this->lang->line("student1"); ?>
          </small>
        </h1>
      </section>
    </div>
    <div>
      <a id="sidebarCollapse" class="studentsideopen">
        <i class="fa fa-navicon">
        </i>
      </a>
      <aside class="studentsidebar">
        <div class="stutop" id="">
          <!-- Create the tabs -->
          <div class="studentsidetopfixed">
            <p class="classtap">
              <?php echo $student["class"]; ?> 
              <a href="#" data-toggle="control-sidebar" class="studentsideclose">
                <i class="fa fa-times">
                </i>
              </a>
            </p>
            <ul class="nav nav-justified studenttaps">
              <?php foreach ($class_section as $skey => $svalue) { ?>
              <li 
                  <?php if ($student["section_id"] == $svalue["section_id"]) {
        echo "class='active'";
    } ?> >
              <a href="#section<?php echo $svalue["section_id"]; ?>" data-toggle="tab">
                <?php print_r($svalue["section"]); ?>
              </a>
              </li>
            <?php
} ?>
            </ul>
        </div>
        <!-- Tab panes -->
        <div class="tab-content">
          <?php foreach ($class_section as $skey => $snvalue) { ?>
          <div class="tab-pane <?php if ($student["section_id"] == $snvalue["section_id"]) {
        echo "active";
    } ?>" id="section<?php echo $snvalue["section_id"]; ?>">
            <?php foreach ($studentlistbysection as $stkey => $stvalue) {
        if ($stvalue["section_id"] == $snvalue["section_id"]) { ?>
            <div class="studentname">
              <a class="" href="<?php echo base_url() . "student/view/" . $stvalue["id"]; ?>">
                <div class="icon">
                  <?php if ($sch_setting->student_photo) { ?>
                  <img src="<?php if (!empty($stvalue["image"])) {
                    echo base_url() . $stvalue["image"];
                } else {
                    if ($student["gender"] == "Female") {
                        echo base_url() . "uploads/student_images/default_female.jpg";
                    } elseif ($student["gender"] == "Male") {
                        echo base_url() . "uploads/student_images/default_male.jpg";
                    }
                } ?>" alt="User Image">
                  <?php
            } ?>
                </div>
                <div class="student-tittle">
                  <?php echo $this->customlib->getFullName($stvalue["firstname"], $stvalue["middlename"], $stvalue["lastname"], $sch_setting->middlename, $sch_setting->lastname); ?>
                </div>
              </a>
            </div>
            <?php
        }
    } ?>
          </div>
          <?php
} ?>
          <div class="tab-pane" id="sectionB">
            <h3 class="control-sidebar-heading">Recent Activity 2
            </h3>
          </div>
          <div class="tab-pane" id="sectionC">
            <h3 class="control-sidebar-heading">Recent Activity 3
            </h3>
          </div>
          <div class="tab-pane" id="sectionD">
            <h3 class="control-sidebar-heading">Recent Activity 3
            </h3>
          </div>
          <!-- /.tab-pane -->
        </div>
        </div>
      </aside>
  </div>
  <!-- /.control-sidebar -->
</div>
<section class="content">
  <div class="row">
    <div class="col-md-3">
      <div class="box box-primary"  
           <?php if ($student["is_active"] == "no") {
    echo "style='background-color:#f0dddd;'";
} ?>>
<script>

	$(document).ready(function (e) {
		$('#imageUploadForm').on('submit',(function(e) {
			e.preventDefault();
			var formData = new FormData(this);

			$.ajax({
				type:'POST',
				url: '<?php echo base_url("student/edit_profile_image");?>',
				data:formData,
				cache:false,
				contentType: false,
				processData: false,
				success:function(data){
					window.location.reload();
					
				},
				error: function(data){
					
				}
			});
		}));

		$("#file-input").on("change", function() {
			$("#imageUploadForm").submit();
		});
	});

</script>
      <div class="box-body box-profile">
        
		<div class="image-upload text-center">
		<form name="photo" id="imageUploadForm" enctype="multipart/form-data" action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
		  <label for="file-input">
		  <?php if ($sch_setting->student_photo) { ?>
        <img class="profile-user-img img-responsive img-circle" src="<?php if (!empty($student["image"])) {
        echo base_url() . $student["image"];
    } else {
        if ($student["gender"] == "Female") {
            echo base_url() . "uploads/student_images/default_female.jpg";
        } else {
            echo base_url() . "uploads/student_images/default_male.jpg";
        }
    } ?>" alt="User profile picture">
			<img width="15px" style="margin-top: -100%;margin-right: -100%;" src="<?php echo base_url() . "uploads/edit-solid.svg";?>"/>
			
		  </label>
			
			<input type="hidden" name="student_id" value="<?php echo $student["id"]; ?>">
		  <input id="file-input" name="first_doc" type="file" />
		  </form>
		</div>
        <?php
} ?>
        <h3 class="profile-username text-center">
          <?php echo $this->customlib->getFullName($student["firstname"], $student["middlename"], $student["lastname"], $sch_setting->middlename, $sch_setting->lastname); ?>
        </h3>
        <ul class="list-group list-group-unbordered">
          <?php if ($student["is_active"] == "no") { ?>
          <li class="list-group-item listnoback">
            <b>
              <?php echo $this->lang->line("disable") . " " . $this->lang->line("reason"); ?>
            </b> 
            <span class="pull-right text-aqua">
              <?php echo $reason_data["reason"]; ?>
            </span>
          </li>
          <li class="list-group-item listnoback">
            <b>
              <?php echo $this->lang->line("disable") . " " . $this->lang->line("note"); ?>
            </b> 
            <span class="pull-right text-aqua">
              <?php echo $student["dis_note"]; ?>
            </span>
          </li>
          <li class="list-group-item listnoback">
            <b>
              <?php echo $this->lang->line("disable") . " " . $this->lang->line("date"); ?>
            </b> 
            <span class="pull-right text-aqua">
              <?php echo date($this->customlib->getSchoolDateFormat(), $this->customlib->dateyyyymmddTodateformat($student["disable_at"])); ?>
            </span>
          </li>
          <?php
} ?>
            <li class="list-group-item">
                        <b>Student No</b> <a class="pull-right text-aqua"><?php echo $student["admission_no"]; ?></a>
                     </li>
          <?php if ($sch_setting->roll_no) { ?>
                     <!--li class="list-group-item">
                        <b>City & Guilds No</b> <a class="pull-right text-aqua"><?php echo $student["roll_no"]; ?></a>
                     </li-->
           <?php
} ?>
                     <li class="list-group-item">
                        <b><?php echo $this->lang->line("class"); ?></b> <a class="pull-right text-aqua"><?php echo $student["class"]; ?></a>
                     </li>
                     <li class="list-group-item">
                        <b>Campus</b> <a class="pull-right text-aqua"><?php echo str_replace("Campus", "", $student["section"]); ?></a>
                     </li>
					 <li class="list-group-item">
                        <b>Accommodation</b> <a class="pull-right text-aqua"><?php echo $student["hostel_name"]; ?></a>
                     </li>
					 <li class="list-group-item">
					<?php $data = fees_arrear_amount($student['id']); 
						if($data['in_arrear'] == "YES"){
					?>
                        <b>Arrears</b> 
					<?php }else{ ?>
						<b>Fees Due</b>
					<?php } ?>
						<a class="pull-right text-aqua">
						<?php 
							if($data['amount'] > 0){
								echo "<strong class='text-danger'>R ".$data['amount']."</strong>";
							}else{
								echo "R ".$data['amount'];
							}
						?></a>
                     </li>
				</ul>
			  </div>
			</div>
			
				
	
    <?php if (!empty($siblings)) { ?>
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">
          <?php echo $this->lang->line("sibling"); ?>
        </h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <?php foreach ($siblings as $sibling_key => $sibling_value) { ?>
        <div class="box box-widget widget-user-2">
          <!-- Add the bg color to the header using any of the bg-* classes -->
          <div class="siblingview">
            <img class="" src="<?php echo base_url() . $sibling_value->image; ?>" alt="User Avatar">
            <h4>
              <a href="<?php echo site_url("student/view/" . $sibling_value->id); ?>">
                <?php echo $this->customlib->getFullName($sibling_value->firstname, $sibling_value->middlename, $sibling_value->lastname, $sch_setting->middlename, $sch_setting->lastname); ?>
              </a>
            </h4>
          </div>
          <div class="box-footer no-padding">
            <ul class="list-group list-group-unbordered">
              <li class="list-group-item">
                <b>
                  <?php echo $this->lang->line("admission_no"); ?>
                </b> 
                <a class="pull-right text-aqua">
                  <?php echo $sibling_value->admission_no; ?>
                </a>
              </li>
              <li class="list-group-item">
                <b>
                  <?php echo $this->lang->line("class"); ?>
                </b> 
                <a class="pull-right text-aqua">
                  <?php echo $sibling_value->class; ?>
                </a>
              </li>
              <li class="list-group-item">
                <b>
                  <?php echo $this->lang->line("section"); ?>
                </b> 
                <a class="pull-right text-aqua">
                  <?php echo $sibling_value->section; ?>
                </a>
              </li>
            </ul>
          </div>
        </div>
        <?php
    } ?>
      </div>
      <!-- /.box-body -->
    </div>
    <?php
} ?>
  </div>
  <div class="col-md-9">
    <div class="nav-tabs-custom theme-shadow">
      <ul class="nav nav-tabs">
		<li class="active"><a href="#activity" data-toggle="tab" aria-expanded="true">Profile</a></li>
				  
                  <li class=""><a href="#documents" onclick="change_doc_type('documents')" data-toggle="tab" aria-expanded="true">Documents</a></li>
				
				  <li class=""><a href="#legal" onclick="change_doc_type('legal')" data-toggle="tab" aria-expanded="true">Legal</a></li>
				  <li class=""><a href="#certificates" onclick="change_doc_type('certificates')" data-toggle="tab" aria-expanded="true">Certificates</a></li>
				  <li class=""><a href="#wel" data-toggle="tab" aria-expanded="true">W.E.L</a></li>
				  <li class=""><a href="#result" data-toggle="tab" aria-expanded="true">Results</a></li>
                 
                  <li class=""><a href="#covid" data-toggle="tab" aria-expanded="true">Covid-19</a></li>
                 
                 
        <?php if ($student["is_active"] == "yes") { ?>
        <?php
    if ($this->rbac->hasPrivilege("disable_student", "can_view")) { ?>
        <li class="pull-right dropdown">
          <a href="#" class="dropdown-toggle" type="button" data-toggle="dropdown">
            <i class="fa fa-ellipsis-v">
            </i>
          </a>
          <ul class="dropdown-menu">
            <li>
              <a style="cursor: pointer;" onclick="send_password()">
                <?php echo $this->lang->line("send_student_password"); ?>
              </a>
            </li>
            <li>
              <a style="cursor: pointer;" onclick="send_parent_password()"> 
                <?php echo $this->lang->line("send_parent_password"); ?>
              </a>
            </li>
          </ul>
        </li>
        <li class="pull-right">
          <a style="cursor: pointer;" onclick="disable_student('<?php echo $student["id"]; ?>')"  class="text-red" data-toggle="tooltip" data-placement="bottom" title="<?php echo $this->lang->line("disable"); ?>">
            <i class="fa fa-thumbs-o-down">
            </i>
            <?php
        //echo "Disable Student";
        
?>
          </a>
        </li>
        <?php
    }
    if ($this->rbac->hasPrivilege("student_login_credential_report", "can_view")) { ?>
        <li class="pull-right">
          <a href="#" class="schedule_modal text-green" data-toggle="tooltip" data-placement="bottom" title="<?php echo $this->lang->line("login_details"); ?>">
            <i class="fa fa-key">
            </i>
          </a>
        </li>
        <?php
    }
?>
        <li class="pull-right">
          <a href="<?php echo site_url("studentfee/addfee/" . $student["id"]); ?>" data-toggle="tooltip" data-placement="bottom" title="<?php echo $this->lang->line("collect_fees"); ?>">
            <i class="fa fa-dollar">
            </i>
          </a>
        </li>
        <?php if ($this->rbac->hasPrivilege("student", "can_edit")) { ?>
        <li class="pull-right">
          <a href="<?php echo base_url() . "student/edit/" . $student["id"]; ?>"  class="" data-toggle="tooltip" data-placement="bottom" title="<?php echo $this->lang->line("edit"); ?>">
            <i class="fa fa-pencil">
            </i>
          </a>
        </li>
        <?php
    }
} else { ?>
        <li class="pull-right">
          <a href="#" onclick="enable('<?php echo $student["id"]; ?>')"  class="text-green" data-toggle="tooltip" data-placement="left" title="<?php echo $this->lang->line("enable"); ?>">
            <i class="fa fa-thumbs-o-up">
            </i>
            <?php ?>
          </a>
        </li>
        <?php
} ?>
      </ul>
      <div class="tab-content">
        <div class="tab-pane active" id="activity">
          <div class="tshadow mb25 bozero">
            <div class="table-responsive around10 pt0">
              <table class="table table-hover table-striped tmb0">
                <tbody>
                  <?php if ($sch_setting->admission_date) { ?>
                  <tr>
                    <td class="col-md-4">
                      <?php echo $this->lang->line("admission_date"); ?>
                    </td>
                    <td class="col-md-5">
                      <?php if (!empty($student["admission_date"])) {
        echo date($this->customlib->dateformat($student["admission_date"]));
    } ?>
                    </td>
                  </tr>
                  <?php
} ?>
                  <tr>
                    <td>
                      <?php echo $this->lang->line("date_of_birth"); ?>
                    </td>
                    <td>
                      <?php if (!empty($student["dob"]) && $student["dob"] != "0000-00-00") {
    echo date($this->customlib->getSchoolDateFormat(), $this->customlib->dateyyyymmddTodateformat($student["dob"]));
} ?>
                    </td>
                  </tr>
                  <?php
if ($sch_setting->category) { ?>
                  <tr>
                    <td>
                      <?php echo $this->lang->line("category"); ?>
                    </td>
                    <td>
                      <?php foreach ($category_list as $value) {
        if ($student["category_id"] == $value["id"]) {
            echo $value["category"];
        }
    } ?>
                    </td>
                  </tr>
                  <?php
}
if ($sch_setting->mobile_no) { ?>
                  <tr>
                    <td>
                      <?php echo $this->lang->line("mobile_no"); ?>
                    </td>
                    <td>
                      <?php echo $student["mobileno"]; ?>
                    </td>
                  </tr>
                  <?php
}
if ($sch_setting->cast) { ?>
                  <tr>
                    <td>
                      <?php echo $this->lang->line("cast"); ?>
                    </td>
                    <td>
                      <?php echo $student["cast"]; ?>
                    </td>
                  </tr>
                  <?php
}
if ($sch_setting->religion) { ?>
                  <tr>
                    <td>
                      <?php echo $this->lang->line("religion"); ?>
                    </td>
                    <td>
                      <?php echo $student["religion"]; ?>
                    </td>
                  </tr>
                  <?php
}
if ($sch_setting->student_email) { ?>
                  <tr>
                    <td>
                      <?php echo $this->lang->line("email"); ?>
                    </td>
                    <td>
                      <?php echo $student["email"]; ?>
                    </td>
                  </tr>
                  <?php
}
?>
                  <?php
$cutom_fields_data = get_custom_table_values($student["id"], "students");
if (!empty($cutom_fields_data)) {
    foreach ($cutom_fields_data as $field_key => $field_value) { 
	
	?>
                  <tr>
                    <td>
                      <?php echo $field_value->name; ?>
                    </td>
                    <td>
                      <?php if (is_string($field_value->field_value) && is_array(json_decode($field_value->field_value, true)) && json_last_error() == JSON_ERROR_NONE) {
            $field_array = json_decode($field_value->field_value);
            echo "<ul class='student_custom_field'>";
            foreach ($field_array as $each_key => $each_value) {
                echo "<li>" . $each_value . "</li>";
            }
            echo "</ul>";
        } else {
            $display_field = $field_value->field_value;
            if ($field_value->type == "link") {
                $display_field = "<a href=" . $field_value->field_value . " target='_blank'>" . $field_value->field_value . "</a>";
            }
            echo $display_field;
        } ?>
                    </td>
                  </tr>
                  <?php break;
    }
} ?>
                </tbody>
              </table>
            </div>
         
        </div>
       
      </div>
      <div class="tab-pane" id="fee">
        <?php if (empty($student_due_fee) && empty($student_discount_fee)) { ?>
        <div class="alert alert-danger">
          <?php echo $this->lang->line("no_record_found"); ?>
        </div>
        <?php
} else { ?>
        <div class="table-responsive">
          <table class="table table-hover table-striped">
            <thead>
              <tr>
                <th>
                  <?php echo $this->lang->line("fees_group"); ?>
                </th>
                <th>
                  <?php echo $this->lang->line("fees_code"); ?>
                </th>
                <th class="text text-left">
                  <?php echo $this->lang->line("due_date"); ?>
                </th>
                <th class="text text-left">
                  <?php echo $this->lang->line("status"); ?>
                </th>
                <th class="text text-right">
                  <?php echo $this->lang->line("amount"); ?> 
                  <span>
                    <?php echo "(" . $currency_symbol . ")"; ?>
                  </span>
                </th>
                <th class="text text-left">
                  <?php echo $this->lang->line("payment_id"); ?>
                </th>
                <th class="text text-left">
                  <?php echo $this->lang->line("mode"); ?>
                </th>
                <th class="text text-left">
                  <?php echo $this->lang->line("date"); ?>
                </th>
                <th class="text text-right" >
                  <?php echo $this->lang->line("discount"); ?> 
                  <span>
                    <?php echo "(" . $currency_symbol . ")"; ?>
                  </span>
                </th>
                <th class="text text-right">
                  <?php echo $this->lang->line("fine"); ?> 
                  <span>
                    <?php echo "(" . $currency_symbol . ")"; ?>
                  </span>
                </th>
                <th class="text text-right">
                  <?php echo $this->lang->line("paid"); ?> 
                  <span>
                    <?php echo "(" . $currency_symbol . ")"; ?>
                  </span>
                </th>
                <th class="text text-right">
                  <?php echo $this->lang->line("balance"); ?>
                </th>
              </tr>
            </thead>
            <tbody>
              <?php
    $total_amount = 0;
    $total_deposite_amount = 0;
    $total_fine_amount = 0;
    $total_discount_amount = 0;
    $total_balance_amount = 0;
    $alot_fee_discount = 0;
    $total_fees_fine_amount = 0;
    foreach ($student_due_fee as $key => $fee) {
        foreach ($fee->fees as $fee_key => $fee_value) {
            $fee_paid = 0;
            $fee_discount = 0;
            $fee_fine = 0;
            $alot_fee_discount = 0;
            if (!empty($fee_value->amount_detail)) {
                $fee_deposits = json_decode($fee_value->amount_detail);
                foreach ($fee_deposits as $fee_deposits_key => $fee_deposits_value) {
                    $fee_paid = $fee_paid + $fee_deposits_value->amount;
                    $fee_discount = $fee_discount + $fee_deposits_value->amount_discount;
                    $fee_fine = $fee_fine + $fee_deposits_value->amount_fine;
                }
            }
            $total_amount = $total_amount + $fee_value->amount;
            $total_discount_amount = $total_discount_amount + $fee_discount;
            $total_deposite_amount = $total_deposite_amount + $fee_paid;
            $total_fine_amount = $total_fine_amount + $fee_fine;
            $feetype_balance = $fee_value->amount - ($fee_paid + $fee_discount);
            $total_balance_amount = $total_balance_amount + $feetype_balance;
            $total_fees_fine_amount = $total_fees_fine_amount + $fee_value->fine_amount;
?>
              <?php if ($feetype_balance > 0 && strtotime($fee_value->due_date) < strtotime(date("Y-m-d"))) { ?>
              <tr class="danger font12">
                <?php
            } else { ?>
              <tr class="dark-gray">
                <?php
            } ?>
                <td>
                  <?php echo $fee_value->name; ?>
                </td>
                <td>
                  <?php echo $fee_value->code; ?>
                </td>
                <td class="text text-left">
                  <?php if ($fee_value->due_date == "0000-00-00") {
            } else {
                echo date($this->customlib->getSchoolDateFormat(), $this->customlib->dateyyyymmddTodateformat($fee_value->due_date));
            } ?>
                </td>
                <td class="text text-left">
                  <?php if ($feetype_balance == 0) { ?>
                  <span class="label label-success">
                    <?php echo $this->lang->line("paid"); ?>
                  </span>
                  <?php
            } elseif (!empty($fee_value->amount_detail)) { ?>
                  <span class="label label-warning">
                    <?php echo $this->lang->line("partial"); ?>
                  </span>
                  <?php
            } else { ?>
                  <span class="label label-danger">
                    <?php echo $this->lang->line("unpaid"); ?>
                  </span>
                  <?php
            } ?>
                </td>
                <td class="text text-right">
                  <?php
            echo $fee_value->amount;
            if ($fee_value->due_date != "0000-00-00" && $fee_value->due_date != null && strtotime($fee_value->due_date) < strtotime(date("Y-m-d"))) { ?>
                  <span class="text text-danger">
                    <?php echo " + " . $fee_value->fine_amount; ?>
                  </span>
                  <?php
            }
?>
                </td>
                <td class="text text-left">
                </td>
                <td class="text text-left">
                </td>
                <td class="text text-left">
                </td>
                <td class="text text-right">
                  <?php echo number_format($fee_discount, 2, ".", ""); ?>
                </td>
                <td class="text text-right">
                  <?php echo number_format($fee_fine, 2, ".", ""); ?>
                </td>
                <td class="text text-right">
                  <?php echo number_format($fee_paid, 2, ".", ""); ?>
                </td>
                <td class="text text-right">
                  <?php
            $display_none = "ss-none";
            if ($feetype_balance > 0) {
                $display_none = "";
                echo number_format($feetype_balance, 2, ".", "");
            }
?>
                </td>
              </tr>
              <?php if (!empty($fee_value->amount_detail)) {
                $fee_deposits = json_decode($fee_value->amount_detail);
                foreach ($fee_deposits as $fee_deposits_key => $fee_deposits_value) { ?>
              <tr class="white-td">
                <td class="text-left">
                </td>
                <td class="text-left">
                </td>
                <td class="text-left">
                </td>
                <td class="text-left">
                </td>
                <td class="text-right">
                  <img src="<?php echo base_url(); ?>backend/images/table-arrow.png" alt="" />
                </td>
                <td class="text text-left">
                  <a href="#" data-toggle="popover" class="detail_popover" > 
                    <?php echo $fee_value->student_fees_deposite_id . "/" . $fee_deposits_value->inv_no; ?>
                  </a>
                  <div class="fee_detail_popover" style="display: none">
                    <?php if ($fee_deposits_value->description == "") { ?>
                    <p class="text text-danger">
                      <?php echo $this->lang->line("no_description"); ?>
                    </p>
                    <?php
                    } else { ?>
                    <p class="text text-info">
                      <?php echo $fee_deposits_value->description; ?>
                    </p>
                    <?php
                    } ?>
                  </div>
                </td>
                <td class="text text-left">
                  <?php echo $fee_deposits_value->payment_mode; ?>
                </td>
                <td class="text text-center">
                  <?php echo date($this->customlib->getSchoolDateFormat(), $this->customlib->dateyyyymmddTodateformat($fee_deposits_value->date)); ?>
                </td>
                <td class="text text-right">
                  <?php echo number_format($fee_deposits_value->amount_discount, 2, ".", ""); ?>
                </td>
                <td class="text text-right">
                  <?php echo number_format($fee_deposits_value->amount_fine, 2, ".", ""); ?>
                </td>
                <td class="text text-right">
                  <?php echo number_format($fee_deposits_value->amount, 2, ".", ""); ?>
                </td>
                <td>
                </td>
              </tr>
              <?php
                }
            } ?>
              <?php
        }
    }
?>
              <?php if (!empty($student_discount_fee)) {
        foreach ($student_discount_fee as $discount_key => $discount_value) { ?>
              <tr class="dark-light">
                <td align="left"> 
                  <?php echo $this->lang->line("discount"); ?> 
                </td>
                <td align="left">
                  <?php echo $discount_value["code"]; ?>
                </td>
                <td align="left">
                </td>
                <td align="left" class="text text-left">
                  <?php if ($discount_value["status"] == "applied") { ?>
                  <a href="#" data-toggle="popover" class="detail_popover" >
                    <?php echo $this->lang->line("discount_of") . " " . $currency_symbol . $discount_value["amount"] . " " . $this->lang->line($discount_value["status"]) . " : " . $discount_value["payment_id"]; ?>
                  </a>
                  <div class="fee_detail_popover" style="display: none">
                    <?php if ($discount_value["student_fees_discount_description"] == "") { ?>
                    <p class="text text-danger">
                      <?php echo $this->lang->line("no_description"); ?>
                    </p>
                    <?php
                } else { ?>
                    <p class="text text-danger">
                      <?php echo $discount_value["student_fees_discount_description"]; ?>
                    </p>
                    <?php
                } ?>
                  </div>
                  <?php
            } else {
                echo '<p class="text text-danger">' . $this->lang->line("discount_of") . " " . $currency_symbol . $discount_value["amount"] . " " . $this->lang->line($discount_value["status"]);
            } ?>
                </td>
                <td>
                </td>
                <td class="text text-left">
                </td>
                <td class="text text-left">
                </td>
                <td class="text text-left">
                </td>
                <td  class="text text-right">
                  <?php $alot_fee_discount = $alot_fee_discount; ?>
                </td>
                <td>
                </td>
                <td>
                </td>
                <td>
                </td>
              </tr>
              <?php
        }
    } ?>
              <tr class="box box-solid total-bg">
                <td >
                </td>
                <td >
                </td>
                <td >
                </td>
                <td class="text text-right" > 
                </td>
                <td class="text text-right">
                  <?php echo $currency_symbol . number_format($total_amount, 2, ".", "") . "<span class='text text-danger'>+" . number_format($total_fees_fine_amount, 2, ".", "") . "</span>"; ?>
                </td>
                <td>
                </td>
                <td>
                </td>
                <td>
                </td>
                <td class="text text-right">
                  <?php echo $currency_symbol . number_format($total_discount_amount + $alot_fee_discount, 2, ".", ""); ?>
                </td>
                <td class="text text-right">
                  <?php echo $currency_symbol . number_format($total_fine_amount, 2, ".", ""); ?>
                </td>
                <td class="text text-right">
                  <?php echo $currency_symbol . number_format($total_deposite_amount, 2, ".", ""); ?>
                </td>
                <td class="text text-right">
                  <?php echo $currency_symbol . number_format($total_balance_amount - $alot_fee_discount, 2, ".", ""); ?>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <?php
} ?>
      </div>
      <div class="tab-pane" id="documents">
        <div class="timeline-header no-border">
          <button type="button"  data-student-session-id="<?php echo $student["student_session_id"]; ?>" class="btn btn-xs btn-primary pull-right myTransportFeeBtn"> 
            <i class="fa fa-upload">
            </i>  
            <?php echo $this->lang->line("upload_documents"); ?>
          </button>
          <div class="table-responsive" style="clear: both;">
            <table class="table table-striped table-bordered table-hover">
              <thead>
                <tr>
                  <th>
                    <?php echo $this->lang->line("title"); ?>
                  </th>
                  <th>
                    <?php echo $this->lang->line("file"); ?> 
                    <?php echo $this->lang->line("name"); ?>
                  </th>
                  <th class="mailbox-date text-right">
                    <?php echo $this->lang->line("action"); ?>
                  </th>
                </tr>
              </thead>
              <div class="row">
                <tbody>
                  <?php if (empty($student_doc)) {  ?>
                  <tr>
                    <td colspan="5" class="text-danger text-center">
                      <?php echo $this->lang->line("no_record_found"); ?>
                    </td>
                  </tr>
                  <?php
} else {
    foreach ($student_doc as $value) { if($value['doc_type'] != "documents"){ continue; }  ?>
                  <tr>
                    <td>
                      <?php echo $value["title"]; ?>
                    </td>
                    <td>
                      <?php echo $value["doc"]; ?>
                    </td>
                    <td class="mailbox-date pull-right">
                      <a href="<?php echo base_url(); ?>student/download/<?php echo $value["student_id"] . "/" . $value["doc"]; ?>"class="btn btn-default btn-xs"  data-toggle="tooltip" title="<?php echo $this->lang->line("download"); ?>">
                        <i class="fa fa-download">
                        </i>
                      </a>
                      <a href="<?php echo base_url(); ?>student/doc_delete/<?php echo $value["id"] . "/" . $value["student_id"]; ?>"class="btn btn-default btn-xs"  data-toggle="tooltip" title="<?php echo $this->lang->line("delete"); ?>" onclick="return confirm('<?php echo $this->lang->line("delete_confirm"); ?>');">
                        <i class="fa fa-remove">
                        </i>
                      </a>
                    </td>
                  </tr>
                  <?php
    }
} ?>
                </tbody>
                </table>
              </div>
          </div>
          </table>
      </div>
	  
	  <div class="tab-pane" id="legal">
        <div class="timeline-header no-border" >
		 
          <form  action="<?php echo base_url('student/create_doc_legal');?>" method="POST" enctype="multipart/form-data">
				
          <div class="table-responsive" style="clear: both;">
            <table class="table table-striped table-bordered table-hover">
              <thead>
                <tr>
                  <th>
                    <?php echo $this->lang->line("title"); ?>
                  </th>
                  <th>
                    <?php echo $this->lang->line("file"); ?> 
                    <?php echo $this->lang->line("name"); ?>
                  </th>
				  <th></th>
                  <th class="mailbox-date text-right">
                    <?php echo $this->lang->line("action"); ?>
                  </th>
                </tr>
              </thead>
              <div class="row">
                <tbody>
                  <?php if (empty($student_doc)) { ?>
                  <tr>
                    <td colspan="5" class="text-danger text-center">
                      <?php echo $this->lang->line("no_record_found"); ?>
                    </td>
                  </tr>
                  <?php
				} else { ?>
				
				<tr>
				<td>
					<select style="width:50%" required id="legal_doc" name="first_title" class="form-control">
					  <option value="">Select Legal Documents</option>
					  <option value="SPI Form">SPI Form</option>
					  <option value="Student Application Check List">Student Application Check List</option>
					  <option value="Application form">Application form</option>
					  <option value="Uniform order sheet">Uniform order sheet</option>
					  <option value="Accommodation application">Accommodation application</option>
					  <option value="Student study agreement">Student study agreement</option>
					  <option value="Accommodation Agreement">Accommodation Agreement</option>
					  <option value="Accommodation Inspection">Accommodation Inspection</option>
					  <option value="Health Questionaire">Health Questionaire</option>
					  <option value="Learner code of conduct">Learner code of conduct</option>
					  <option value="Proof of address">Proof of address</option>
					  <option value="Certified ID copies">Certified ID copies</option>
					  <option value="Highest School result">Highest School result</option>
					  <option value="Plagiarism policy">Plagiarism policy</option>
					  <option value="Substance abuse policy">Substance abuse policy</option>
					  <option value="Student tablet policy">Student tablet policy</option>
					  <option value="Re-assestment policy">Re-assestment policy</option>
					</select> 
				</td>
				<td></td>
				<td style="width:20px;text-align:right"> 
				 <input required type="file" name="first_doc" class="filestyle form-control ">
				  <input required type="hidden" name="doc_type" value="legal">
				  <input required type="hidden" name="student_id" value="<?php echo $student["id"];?>">
				</td>
				
				<td style="text-align:right;width:20px;">
				 
				  <input type="submit" value="save" class="btn btn-primary btn-sm pull-right">
				</td>
				
				</tr>
				
				<?php
					foreach ($student_doc as $value) {
						if($value['doc_type'] != "legal"){ continue; }
						
						?>
                  <tr>
                    <td>
                      <?php echo $value["title"]; ?>
                    </td>
                    <td>
                      <?php echo $value["doc"]; ?>
                    </td>
					<td></td>
                    <td class="mailbox-date pull-right">
                      <a href="<?php echo base_url(); ?>student/download/<?php echo $value["student_id"] . "/" . $value["doc"]; ?>"class="btn btn-default btn-xs"  data-toggle="tooltip" title="<?php echo $this->lang->line("download"); ?>">
                        <i class="fa fa-download">
                        </i>
                      </a>
                      <a href="<?php echo base_url(); ?>student/doc_delete/<?php echo $value["id"] . "/" . $value["student_id"]; ?>"class="btn btn-default btn-xs"  data-toggle="tooltip" title="<?php echo $this->lang->line("delete"); ?>" onclick="return confirm('<?php echo $this->lang->line("delete_confirm"); ?>');">
                        <i class="fa fa-remove">
                        </i>
                      </a>
                    </td>
                  </tr>
                  <?php  } } ?>
                </tbody>
                </table>
              </div>
          </div>
          </table>
		  </form>
      </div>
	  
	  <div class="tab-pane" id="certificates">
        <div class="timeline-header no-border">
			 
		 
          <div class="table-responsive" style="clear: both;">
		  <form action="<?php echo base_url('student/create_doc_certificate');?>" method="POST" enctype="multipart/form-data">
            <table class="table table-striped table-bordered table-hover">
              <thead>
                <tr>
                  <th>
                    <?php echo $this->lang->line("title"); ?>
                  </th>
				  <th>Date Collected</th>
				  <th>Person Who Collected</th>
				  <th>Telephone</th>
				  <th>Certificate Collected</th>
				  <th></th>
                  
                  <th class="mailbox-date text-right">
                    <?php echo $this->lang->line("action"); ?>
                  </th>
                </tr>
              </thead>
              <div class="row">
                <tbody>
                  <?php if (empty($student_doc)) {  ?>
                  <tr>
                    <td colspan="5" class="text-danger text-center">
                      <?php echo $this->lang->line("no_record_found"); ?>
                    </td>
                  </tr>
                  <?php
} else {?>

	<tr>
	
				
	<td>
		<select style="width: 149px;" required id="legal_doc" name="first_title" class="form-control">
					  <option value="">Select Certificate</option>
					  <option value="City & Guilds Certificate">City & Guilds Certificate</option>
					  <option value="City & Guilds Diploma">City & Guilds Diploma</option>
					  <option value="City & Guilds Advanced Diploma">City & Guilds Advanced Diploma</option>
					  <option value="City & Guilds Safety Certificate">City & Guilds Safety Certificate</option>
					  <option value="Trade Certificate">Trade Certificate</option>
					  <option value="City & Guilds Pastry Diploma">City & Guilds Pastry Diploma</option>
					  <option value="City & Guilds Results - Certificate">City & Guilds Results - Certificate</option>
					  <option value="City & Guilds Results - Diploma">City & Guilds Results - Diploma</option>
					  <option value="City & Guilds Results - Pastry Diploma">City & Guilds Results - Pastry Diploma</option>
					  <option value="City & Guilds Results - Advanced Diploma">City & Guilds Results - Advanced Diploma</option>
					  <option value="POE File Collected">POE File Collected</option>
					  
					</select> 
	</td>
	<td>
		<input type="text" required class="form-control date" name="date_collected" placeholder="YYYY/MM/DD">
	  </td>
	  <td >
		<input type="text" required class="form-control" name="person_collected" placeholder="Person Who Collected">
	  </td>
	  <td>
		<input type="text" required class="form-control" name="telephone" placeholder="+9876543210">
	  </td>
	   <td class="text-center">
		
		<input type="checkbox" class="form-check-input" name="cert_collected" value="YES">
	  </td>
	  <td class="text-center">
		 <input required type="hidden" name="doc_type" value="certificates">
		 <input required type="hidden" name="student_id" value="<?php echo $student["id"];?>">
		<input type="file" class="filestyle" name="first_doc" >
	  </td>
		<td class="text-center">
		
		<input type="submit" class="btn btn-primary btn-sm" value="save" >
	  </td>

	</tr>
		 
<?php
    foreach ($student_doc as $value) { if($value['doc_type'] != "certificates"){ continue; } ?>
                  <tr>
                    <td>
                      <?php echo $value["title"]; ?>
                    </td>
					<td>
                      <?php echo date('Y-m-d',strtotime($value["date_collected"])); ?>
                    </td>
					<td>
                      <?php echo $value["person_collected"]; ?>
                    </td>
					<td>
                      <?php echo $value["telephone"]; ?>
                    </td>
					
                    <td class="text-center">
					<?php if(trim($value["cert_collected"]) == "YES"){
						$checked = "checked";
					}else{
						$checked = $value["cert_collected"];
					} ?>
                     <input type="checkbox" class="form-check-input" name="cert_collected" <?php echo $checked;?> value="YES">
                    </td>
					<td></td>
                    <td class="mailbox-date pull-right">
                      <a href="<?php echo base_url(); ?>student/download/<?php echo $value["student_id"] . "/" . $value["doc"]; ?>"class="btn btn-default btn-xs"  data-toggle="tooltip" title="<?php echo $this->lang->line("download"); ?>">
                        <i class="fa fa-download">
                        </i>
                      </a>
                      <a href="<?php echo base_url(); ?>student/doc_delete/<?php echo $value["id"] . "/" . $value["student_id"]; ?>"class="btn btn-default btn-xs"  data-toggle="tooltip" title="<?php echo $this->lang->line("delete"); ?>" onclick="return confirm('<?php echo $this->lang->line("delete_confirm"); ?>');">
                        <i class="fa fa-remove">
                        </i>
                      </a>
                    </td>
                  </tr>
                  <?php
    }
} ?>
                </tbody>
                </table>
              </div>
          </div>
          </table>
		   </form>
      </div>
	  
	   <div class="tab-pane" id="wel">
		<div class="timeline-header no-border">
			 <div class="table-responsive" style="clear: both;">
				<form  method="post" action="<?php echo base_url('student/wel_save');?>">
					<div class="timeline-header no-border">
						 <div class="table-responsive">
						 
								
								<div class="form-row">
									<div class="form-group col-md-3">
									  <label for="">Establishment</label>
									</div>
									<div class="form-group col-md-3">
									  <label for="">from Date</label>
									</div>
									<div class="form-group col-md-3">
									  <label for="">Start Date</label>
									</div>
									<div class="form-group col-md-3">
									  <label for="">Total Hour</label>
									</div>
								 </div>
								<?php
								$count = 1;
								$get_wel = get_wel($student["id"]);
								$total_hours = 0;
								if($get_wel){
									foreach($get_wel as $row){ 
									
									?>
								<div class="form-group col-md-3">
									<input type="text" class="form-control" value="<?php echo $row["establishment"]; ?>" name="establishment[<?= $count;?>]" >
									<input type="hidden" value="<?php echo $row["student_id"]; ?>" class="form-control" name="student_id[<?= $count;?>]" >
									<input type="hidden" value="<?php echo $row["id"]; ?>" class="form-control" name="id[<?= $count;?>]" >
								 </div>
								 <div class="form-group col-md-3">
									<input type="text" value="<?php echo date("Y/m/d",strtotime($row["from_date"])); ?>" class="form-control date" name="from_date[<?= $count;?>]" >
								  </div>
								  <div class="form-group col-md-3">
									<input type="text"  value="<?php echo date("Y/m/d",strtotime($row["to_date"])); ?>" class="form-control date" name="to_date[<?= $count;?>]" >
								  </div>
								  <div class="form-group col-md-3">
								   <input type="text" value="<?php echo $row["total_hours"]; ?>" class="form-control" name="total_hours[<?= $count;?>]" >
								</div>
									
								<?php 
								$total_hours  = $total_hours + $row["total_hours"];
								$count++; } } ?>
								
							  <?php for($i=$count; $i<15; $i++){ ?>
								<div class="form-group col-md-3">
									<input type="text" class="form-control" name="establishment[<?= $i;?>]" >
									<input type="hidden" value="<?php echo $student["id"]; ?>" class="form-control" name="student_id[<?= $i;?>]" >
									<input type="hidden" value="" class="form-control" name="id[<?= $i;?>]" >
								 </div>
								 <div class="form-group col-md-3">
									<input type="text" class="form-control date" name="from_date[<?= $i;?>]" >
								  </div>
								  <div class="form-group col-md-3">
									<input type="text" class="form-control date" name="to_date[<?= $i;?>]" >
								  </div>
								  <div class="form-group col-md-3">
								   <input type="text" class="form-control" name="total_hours[<?= $i;?>]" >
								</div>
								  
							  <?php } ?>
								 <div class="col-lg-12">
									<div class="pull-right"><label>Total hours worked</label>
										<input type="text" class="" size="10" name="total_hour" value="<?= $total_hours; ?>"> /
										<input type="text" class="" size="12" name="manual_hours" value="<?php if(isset($row["manual_hours"][0])){ echo $get_wel[0]["manual_hours"]; } ?>" >
									</div>
								 </div><br><br>
								 <div class="col-lg-12">
								 <div class="pull-right">
									<input type="submit"  name="wel_save" value="Save" class=" btn btn-success">
								 </div>
								 </div>
							  
						</div>
					</div>
				  </div>
				 </form >
			</div>
		</div>
	 
	  <div class="tab-pane" id="covid">
						<div class="timeline-header no-border">
							 <div class="table-responsive" style="clear: both;">
							   <table class="table table-striped table-bordered table-hover ">
								  <thead>
									 <tr>
										<th>
										   <?php echo $this->lang->line("screening-date"); ?>
										</th>										
										<th class="mailbox-date text-right">
										   <?php echo $this->lang->line("action"); ?>
										</th>
									 </tr>
								  </thead>
								   <tbody>
								   <?php if (!empty(get_covid_screening($student["id"]))) {
    foreach (get_covid_screening($student["id"]) as $row) { ?>
										<tr>
											<td><?php echo date("d/m/Y", strtotime($row->date)); ?></td>
											<td style="float:right !important">
												<a href="<?php echo base_url("student/download_covid_screening"); ?>/<?php echo $row->id; ?>">
													<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
													  <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"></path>
													  <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"></path>
													</svg>
												</a>
											</td>
										
										</tr>
								   <?php
    }
} ?>
								   </tbody>
								</table>
							</div>
						</div>
				   </div>
                 
	 <div class="tab-pane" id="timelineh">
        <div >
          <?php if ($this->rbac->hasPrivilege("student_timeline", "can_add")) { ?>
          <button type="button" id="myTimelineButton" class="btn btn-sm btn-primary pull-right">
            <i class="fa fa-plus">
            </i> 
            <?php echo $this->lang->line("add"); ?>
          </button>
          <?php
} ?>
        </div>
        <br/>
        <div class="timeline-header no-border">
          <div id="timeline_list">
            <?php if (empty($timeline_list)) { ?>
            <br/>
            <div class="alert alert-info">
              <?php echo $this->lang->line("no_record_found"); ?>
            </div>
            <?php
} else { ?>
            <ul class="timeline timeline-inverse">
              <?php foreach ($timeline_list as $key => $value) { ?>
              <li class="time-label">
                <span class="bg-blue">    
                  <?php echo date($this->customlib->getSchoolDateFormat(), $this->customlib->dateyyyymmddTodateformat($value["timeline_date"])); ?>
                </span>
              </li>
              <li>
                <i class="fa fa-list-alt bg-blue">
                </i>
                <div class="timeline-item">
                  <?php if ($this->rbac->hasPrivilege("student_timeline", "can_delete")) { ?>
                  <span class="time">
                    <a class="defaults-c text-right" data-toggle="tooltip" title="" onclick="delete_timeline('<?php echo $value["id"]; ?>')" data-original-title="<?php echo $this->lang->line("delete"); ?>">
                      <i class="fa fa-trash">
                      </i>
                    </a>
                  </span>
                  <?php
        } ?>
                  <?php if (!empty($value["document"])) { ?>
                  <span class="time">
                    <a class="defaults-c text-right" style="color:#0084B4"  data-toggle="tooltip" title="" href="<?php echo base_url() . "admin/timeline/download/" . $value["id"] . "/" . $value["document"]; ?>" data-original-title="<?php echo $this->lang->line("download"); ?>">
                      <i class="fa fa-download"></i>
                    </a>
                  </span>
                  <?php
        } ?>
                  <h3 class="timeline-header text-aqua"> 
                    <?php echo $value["title"]; ?> 
                  </h3>
                  <div class="timeline-body">
                    <?php echo $value["description"]; ?>
                  </div>
                </div>
              </li>
              <?php
    } ?>
              <li>
                <i class="fa fa-clock-o bg-gray">
                </i>
              </li>
              <?php
} ?>
            </ul>
          </div>
        </div>
      </div>
	
	  <div class="tab-pane" id="result">
<?php
	$get_student_session_by_session_id = get_student_session_by_session_id($student["student_session_id"]);
	$session_id = $get_student_session_by_session_id['session_id'];
?>	  
		<div class="pull-right">
		<form action="<?php echo site_url('admin/examresult/printmarksheet') ?>" method="post"  id="printMarksheet1" >
			<input type="hidden" name="session_id" value="<?php echo $session_id; ?>">
            <input type="hidden" name="section_id" value="<?php echo $student["section_id"]; ?>">
            <input type="hidden" name="student_id[]" value="<?php echo $student["student_session_id"]; ?>">
            <input type="hidden" name="qualifications" value="<?php echo $student["qualification"]; ?>">
			<input type="button" id="printMarksheet" value="Download" name="submit" class="btn btn-success btn-sm">
		</form>
		</div>
		<div class="timeline-header no-border">
			<div class="timeline-header no-border">
				<div class="table-responsive" style="clear: both;">
				<table class="table table-striped table-bordered table-hover ">
				 <thead>
				 <tr>														
					<th><?php echo $this->lang->line("unit"); ?> <?php echo $this->lang->line("title"); ?></th> 
					<th><?php echo $this->lang->line("test"); ?></th>
					<th><?php echo $this->lang->line("project"); ?></th>
					<th><?php echo $this->lang->line("sub_average"); ?></th>
					<th><?php echo $this->lang->line("outcome"); ?></th>
				 </tr>
				</thead>
					<tbody>
						<?php $get_result_student = get_result_student($student["id"]); 
				
							foreach($get_result_student as $row) { 
							if(empty($row['test_mark'])){
								continue;
							}
						?>
							<tr>
								<td>
								<?php
									$get_subjects_id = get_subjects_id($row['subject_id']);
									echo $get_subjects_id['name'];
								?>
								</td>
								<td><?php echo $row["test_mark"];?>%</td>
								<td><?php echo $row["project_mark"];?>%</td>
								<td><?php echo $row["average"];?>%</td>
								<td>
								<?php
									if(empty($row["competent"])){ echo "NYC"; }else{ echo "C"; }
								?>
								</td>
							</tr>
						<?php } ?>
					</tbody>
				</table><br><br>
				
				<table class="table table-striped table-bordered table-hover ">
				 <thead>
				 <tr>														
					<th ><?php echo $this->lang->line("unit"); ?> <?php echo $this->lang->line("title"); ?></th> 
					<th></th>
					<th></th>
					<th></th>
					<th class="text-center"><?php echo $this->lang->line("grade"); ?></th>
					<th class="text-center"><?php echo $this->lang->line("outcome"); ?></th>
				 </tr>
				</thead>
					<tbody>
						<?php $get_result_student = get_result_student($student["id"]); 
				
							foreach($get_result_student as $row) { 
							if(empty($row['menu_mark'])){
								continue;
							}
						?>
							<tr>
								<td colspan="4">
								<?php
									$get_subjects_id = get_subjects_id($row['subject_id']);
									echo $get_subjects_id['name'];
								?>
								</td>
								
								<td class="text-center"><?php echo $row["menu_mark"];?>%</td>
								<td class="text-center">
								<?php
									if(empty($row["competent"])){ echo "NYC"; }else{ echo "C"; }
								?>
								</td>
							</tr>
						<?php } ?>
					</tbody>
				</table>


				</div>
			</div>
		</div>
	  </div>
	 
	</section>
	 <div class="box-body box-profile">
		<div class="form-group">
			<a class="pull-left text-aqua">Important Information</a><br>
			<form method="POST" action="<?= base_url("student/add_important_info");?>">
			 <input type="hidden" name="student_id" value="<?php echo $student["id"]; ?>" id="student_id">
			<textarea rows="10" name="info" class="form-control" id="exampleFormControlTextarea1"><?= get_important_info($student["id"]);?></textarea>
			
			</div>
		<input type="submit" name="Save" class="btn btn-success" style="float:right">
	 
		</form>
	 </div>
</div>
<script type="text/javascript">
  $("#myTimelineButton").click(function () {
    $("#reset").click();
    $('.transport_fees_title').html("<b><?php echo $this->lang->line("add"); ?> <?php echo $this->lang->line("timeline"); ?></b>");
    $('#myTimelineModal').modal({
      backdrop: 'static',
      keyboard: false,
      show: true
    }
                               );
  }
                              );
  $(".myTransportFeeBtn").click(function () {
    $("span[id$='_error']").html("");
    $('#transport_amount').val("");
    $('#transport_amount_discount').val("0");
    $('#transport_amount_fine').val("0");
    var student_session_id = $(this).data("student-session-id");
    $('.transport_fees_title').html("<b><?php echo $this->lang->line("upload_documents"); ?></b>");
                                    $('#transport_student_session_id').val(student_session_id);
    $('#myTransportFeesModal').modal({
      backdrop: 'static',
      keyboard: false,
      show: true
    }
                                    );
  }
                               );
</script>
<div class="modal fade" id="myTimelineModal" role="dialog">
  <div class="modal-dialog modal-sm400">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;
        </button>
        <h4 class="modal-title title transport_fees_title">
        </h4>
      </div>
      <div class="">
        <div class="">
          <form  id="timelineform" name="timelineform" method="post"  enctype="multipart/form-data">
            <div class="modal-body pb0">
              <?php echo $this->customlib->getCSRF(); ?>
              <div id='timeline_hide_show' class="row">
                <input type="hidden" name="student_id" value="<?php echo $student["id"]; ?>" id="student_id">
                <div class=" col-md-12">
                  <div class="form-group">
                    <label for="exampleInputEmail1">
                      <?php echo $this->lang->line("title"); ?>
                    </label>
                    <small class="req"> *
                    </small>
                    <input id="timeline_title" name="timeline_title" placeholder="" type="text" class="form-control"  />
                    <span class="text-danger">
                      <?php echo form_error("timeline_title"); ?>
                    </span>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">
                      <?php echo $this->lang->line("date"); ?>
                    </label>
                    <small class="req"> *
                    </small>
                    <input id="timeline_date" value="<?php echo set_value("timeline_date", date($this->customlib->getSchoolDateFormat())); ?>" name="timeline_date" placeholder="" type="text" class="form-control date"  />
                    <span class="text-danger">
                      <?php echo form_error("timeline_date"); ?>
                    </span>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">
                      <?php echo $this->lang->line("description"); ?>
                    </label>
                    <textarea id="timeline_desc" name="timeline_desc" placeholder=""  class="form-control">
                    </textarea>
                    <span class="text-danger">
                      <?php echo form_error("description"); ?>
                    </span>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">
                      <?php echo $this->lang->line("attach_document"); ?>
                    </label>
                    <div class="">
                      <input id="timeline_doc_id" name="timeline_doc" placeholder="" type="file"  class="filestyle form-control" data-height="40"  value="<?php echo set_value("timeline_doc"); ?>" />
                      <span class="text-danger">
                        <?php echo form_error("timeline_doc"); ?>
                      </span>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="labeltopmb0">
                      <?php echo $this->lang->line("visible"); ?>
                    </label>
                    <input id="visible_check" checked="checked" name="visible_check" value="yes" placeholder="" type="checkbox"   />
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit"  class="btn btn-info pull-right">
                <?php echo $this->lang->line("save"); ?>
              </button>
              <button type="reset" id="reset" style="display: none"  class="btn btn-info pull-right">Reset
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="myTransportFeesModal" role="dialog">
  <div class="modal-dialog modal-sm400">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;
        </button>
        <h4 class="modal-title title text-center transport_fees_title">
        </h4>
      </div>
      <div class="">
        <div class="">
          <div class="">
            <input  type="hidden" class="form-control" id="transport_student_session_id"  value="0" readonly="readonly"/>
            <form id="form1" action="<?php echo site_url("student/create_doc"); ?>"  id="employeeform" name="employeeform" method="post" accept-charset="utf-8" enctype="multipart/form-data">
              <?php echo $this->customlib->getCSRF(); ?>
              <div class="modal-body pt0 pb0">
                <div id='upload_documents_hide_show'>
                  <input type="hidden" name="student_id" value="<?php echo $student_doc_id; ?>" id="student_id">
                  <input type="hidden" name="doc_type" value="documents" id="doc_type">
                  <h4>
                    <?php echo $this->lang->line("upload_documents1"); ?>
                  </h4>
                  <div class="form-group">
                    <label for="exampleInputEmail1">
                      <?php echo $this->lang->line("title"); ?>
                      <small class="req" > *
                      </small>
                    </label>
                    <input id="first_title" name="first_title" placeholder="" type="text" class="form-control"  value="<?php echo set_value("first_title"); ?>" />
                    <span class="text-danger">
                      <?php echo form_error("first_title"); ?>
                    </span>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">
                      <?php echo $this->lang->line("documents"); ?>
                      <small class="req" > *
                      </small>
                    </label>
                    <div class="">
                      <input id="first_doc_id" name="first_doc" placeholder="" type="file"  class="filestyle form-control" data-height="40"  value="<?php echo set_value("first_doc"); ?>" />
                      <span class="text-danger">
                        <?php echo form_error("first_doc"); ?>
                      </span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer" style="clear:both">
                <button type="submit" class="btn btn-info pull-right">
                  <?php echo $this->lang->line("save"); ?>
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div id="scheduleModal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">??
        </button>
        <h4 class="modal-title_logindetail">
        </h4>
      </div>
      <div class="modal-body_logindetail">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">
          <?php echo $this->lang->line("cancel"); ?>
        </button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="disable_modal" tabindex="-1" role="dialog" aria-labelledby="evaluation" style="padding-left: 0 !important">
  <div class="modal-dialog " role="document">
    <div class="modal-content modal-media-content">
      <div class="modal-header modal-media-header">
        <button type="button" class="close" data-dismiss="modal">&times;
        </button>
        <h4 class="box-title" >
          <?php echo $this->lang->line("disable") . " " . $this->lang->line("student"); ?>
        </h4>
      </div>
      <form role="form" id="disable_form" method="post" enctype="multipart/form-data" action="">
        <div class="modal-body pt0 pb0" >
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 paddlr">
              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group">
                    <label for="pwd">
                      <?php echo $this->lang->line("reason"); ?>
                    </label>
                    <small class="req"> *
                    </small>
                    <input type="hidden" name="student_id" id="disstudent_id" >
                    <select class="form-control" name="reason">
                      <option value="">
                        <?php echo $this->lang->line("select"); ?>
                      </option>
                      <?php foreach ($reason as $value) { ?>
                      <option value="<?php echo $value["id"]; ?>">
                        <?php echo $value["reason"]; ?>
                      </option>
                      <?php
} ?>
                    </select>
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="form-group">
                    <label for="pwd">
                      <?php echo $this->lang->line("date"); ?>
                    </label>
                    <input name="disable_date" class="form-control date" value="<?php echo date($this->customlib->getSchoolDateFormat()); ?>" type="text"   />
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="form-group">
                    <label for="pwd">
                      <?php echo $this->lang->line("note"); ?>
                    </label>
                    <textarea name="note" class="form-control">
                    </textarea>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
		
        <div class="box-footer">
		
          <div class="pull-right paddA10">
            <button class="btn btn-info pull-right"  data-loading-text="<i class='fa fa-spinner fa-spin '></i> Please wait" value="">
              <?php echo $this->lang->line("save"); ?>
            </button>
          </div>
          </form>
        </div>
    </div>
	
  </div>
  
</div>

<script type="text/javascript">
  $(document).ready(function (e) {
    $("#timelineform").on('submit', (function (e) {
      var student_id = $("#student_id").val();
      e.preventDefault();
      $.ajax({
        url: "<?php echo site_url("admin/timeline/add"); ?>",
        type: "POST",
        data: new FormData(this),
        dataType: 'json',
        contentType: false,
        cache: false,
        processData: false,
        success: function (data) {
        if (data.status == "fail") {
        var message = "";
        $.each(data.error, function (index, value) {
        message += value;
      }
            );
      errorMsg(message);
    }
                                     else {
                                     successMsg(data.message);
                          window.location.reload(true);
  }
                    }
                    ,
                    error: function (e) {
    alert("Fail");
    console.log(e);
  }
  }
  );
  }
  ));
  }
  );
  function delete_timeline(id) {
    var student_id = $("#student_id").val();
    if (confirm('<?php echo $this->lang->line("delete_confirm"); ?>')) {
                $.ajax({
                url: '<?php echo base_url(); ?>admin/timeline/delete_timeline/' + id,
                success: function (res) {
        $.ajax({
        url: '<?php echo base_url(); ?>admin/timeline/student_timeline/' + student_id,
        success: function (res) {
      $('#timeline_list').html(res);
    }
    ,
      error: function () {
        alert("Fail")
      }
  }
  );
  }
    ,
      error: function () {
        alert("Fail")
      }
  }
  );
  }
  }
  function disable_student(id) {
    if (confirm("<?php echo $this->lang->line("are_you_sure_you_want_to_disable_this_student"); ?>")) {
                $('#disstudent_id').val(id);
        $('#disable_modal').modal('show');
  }
  }
  $("#disable_form").on('submit', (function (e) {
    e.preventDefault();
    var id = $('#disstudent_id').val();
    var $this = $(this).find("button[type=submit]:focus");
    $.ajax({
      url: "<?php echo site_url("student/disable_reason"); ?>",
      type: "POST",
      data: new FormData(this),
      dataType: 'json',
      contentType: false,
      cache: false,
      processData: false,
      beforeSend: function () {
      $this.button('loading');
    }
           ,
           success: function (res)
    {
      if (res.status == "fail") {
        var message = "";
        $.each(res.error, function (index, value) {
          message += value;
        }
              );
        errorMsg(message);
      }
      else {
        successMsg(res.message);
        window.location.reload(true);
      }
    }
    ,
      error: function (xhr) {
        // if error occured
        alert("Error occured.please try again");
        $this.button('reset');
      }
    ,
      complete: function () {
        $this.button('reset');
      }
  }
                                  );
                        }
                       ));
  function disable(id) {
    if (confirm("Are you sure you want to disable this record.")) {
      var student_id = '<?php echo $student["id"]; ?>';
      $.ajax({
        type: "post",
        url: base_url + "student/getUserLoginDetails",
        data: {
          'student_id': student_id}
        ,
        dataType: "json",
        success: function (response) {
          var userid = response.id;
          changeStatus(userid, 'no', 'student');
        }
      }
            );
    }
    else {
      return false;
    }
  }
  function enable(id, status, role) {
    if (confirm("<?php echo $this->lang->line("are_you_sure") . " " . $this->lang->line("you_want_to_enable_this_record"); ?>")) {
        var student_id = '<?php echo $student["id"]; ?>';
        $.ajax({
        type: "post",
        url: base_url + "student/getUserLoginDetails",
        data: {
        'student_id': student_id}
        ,
        dataType: "json",
        success: function (response) {
      var userid = response.id;
      changeStatus(userid, 'yes', 'student');
    }
  }
  );
  $.ajax({
    type: "post",
    url: base_url + "student/enablestudent/"+student_id,
    data: {
      'student_id': student_id}
    ,
    dataType: "json",
    success: function (data) {
      window.location.reload(true);
    }
  }
        );
  }
  else {
    return false;
  }
  }
  function changeStatus(rowid, status = 'no', role = 'student') {
    var base_url = '<?php echo base_url(); ?>';
    $.ajax({
      type: "POST",
      url: base_url + "admin/users/changeStatus",
      data: {
        'id': rowid, 'status': status, 'role': role}
      ,
      dataType: "json",
      success: function (data) {
        successMsg(data.msg);
      }
    }
          );
  }
  $(document).ready(function () {
    $.extend($.fn.dataTable.defaults, {
      searching: false,
      ordering: false,
      paging: false,
      bSort: false,
      info: false
    }
            );
  }
                   );
  function send_password() {
    var base_url = '<?php echo base_url(); ?>';
    var student_id = '<?php echo $student["id"]; ?>';
    var username = '<?php echo $student["username"]; ?>';
    var password = '<?php echo $student["password"]; ?>';
    var contact_no = '<?php echo $student["mobileno"]; ?>';
    var email = '<?php echo $student["email"]; ?>';
    $.ajax({
      type: "post",
      url: base_url + "student/sendpassword",
      data: {
        student_id: student_id, username: username, password: password, contact_no: contact_no, email: email}
      ,
      success: function (response) {
        successMsg('<?php echo $this->lang->line("message_successfully_sent"); ?>');
                   }
                   }
                  );
      }
      function send_parent_password() {
      var base_url = '<?php echo base_url(); ?>';
      var student_id = '<?php echo $student["id"]; ?>';
      var username = '<?php echo $guardian_credential["username"]; ?>';
      var password = '<?php echo $guardian_credential["password"]; ?>';
      var contact_no = '<?php echo $student["guardian_phone"]; ?>';
      var email = '<?php echo $student["guardian_email"]; ?>';
      $.ajax({
      type: "post",
      url: base_url + "student/send_parent_password",
      data: {
      student_id: student_id, username: username, password: password, contact_no: contact_no, email: email}
           ,
           success: function (response) {
      successMsg('<?php echo $this->lang->line("message_successfully_sent"); ?>');
                 }
                 }
                );
    }
    $(document).on('click', '.schedule_modal', function () {
      $('.modal-title_logindetail').html("");
      $('.modal-title_logindetail').html("<?php echo $this->lang->line("login_details"); ?>");
                                         var base_url = '<?php echo base_url(); ?>';
                                         var student_id = '<?php echo $student["id"]; ?>';
                                         var student_name = '<?php echo $this->customlib->getFullName($student["firstname"], $student["middlename"], $student["lastname"], $sch_setting->middlename, $sch_setting->lastname); ?>';
      $.ajax({
        type: "post",
        url: base_url + "student/getlogindetail",
        data: {
          'student_id': student_id}
        ,
        dataType: "json",
        success: function (response) {
          var data = "";
          data += '<div class="col-md-12">';
          data += '<div class="table-responsive">';
          data += '<p class="lead text text-center">' + student_name +  '</p>';
          data += '<table class="table table-hover">';
          data += '<thead>';
          data += '<tr>';
          data += '<th>' + "<?php echo $this->lang->line("user_type"); ?>" + '</th>';
          data += '<th class="text text-center">' + "<?php echo $this->lang->line("username"); ?>" + '</th>';
          data += '<th class="text text-center">' + "<?php echo $this->lang->line("password"); ?>" + '</th>';
          data += '</tr>';
          data += '</thead>';
          data += '<tbody>';
          $.each(response, function (i, obj)
                 {
            data += '<tr>';
            data += '<td><b>' + firstToUpperCase(obj.role) + '</b></td>';
            data += '<input type=hidden name=userid id=userid value=' + obj.id + '>';
            data += '<td class="text text-center">' + obj.username + '</td> ';
            data += '<td class="text text-center">' + obj.password + '</td> ';
            data += '</tr>';
          }
                );
          data += '</tbody>';
          data += '</table>';
          data += '<b class="lead text text-danger" style="font-size:14px;"> ' + "<?php echo $this->lang->line("login_url"); ?>" + ': ' + base_url + 'site/userlogin</b>';
          data += '</div>  ';
          data += '</div>  ';
          $('.modal-body_logindetail').html(data);
          $("#scheduleModal").modal('show');
        }
      }
            );
    }
                  );
    function firstToUpperCase(str) {
      return str.substr(0, 1).toUpperCase() + str.substr(1);
    }
    $(document).ready(function () {
      getExamResult();
      $('.detail_popover').popover({
        placement: 'right',
        title: '',
        trigger: 'hover',
        container: 'body',
        html: true,
        content: function () {
          return $(this).closest('td').find('.fee_detail_popover').html();
        }
      }
                                  );
    }
                     );
    function getExamResult(student_session_id) {
      if (student_session_id != "") {
        $('.examgroup_result').html("");
        $.ajax({
          type: "POST",
          url: baseurl + "admin/examresult/getStudentCurrentResult",
          data: {
            'student_session_id': 17}
          ,
          dataType: "JSON",
          beforeSend: function () {
          }
          ,
          success: function (data) {
            $('.examgroup_result').html(data.result);
          }
          ,
          complete: function () {
          }
        }
              );
      }
    }
	
	function change_doc_type(type){
		$("#doc_type").val(type);
	}
</script>
<script type="text/javascript">
  $(document).on('change', '#exam_group_id', function () {
    var exam_group_id = $(this).val();
    if (exam_group_id != "") {
      $('#exam_id').html("");
      var div_data = '<option value=""><?php echo $this->lang->line("select"); ?></option>';
      $.ajax({
        type: "POST",
        url: baseurl + "admin/examgroup/getExamsByExamGroup",
        data: {
          'exam_group_id': exam_group_id}
        ,
        dataType: "JSON",
        beforeSend: function () {
          $('#exam_id').addClass('dropdownloading');
        }
        ,
        success: function (data) {
          console.log(data);
          $.each(data.result, function (i, obj)
                 {
            div_data += "<option value=" + obj.id + ">" + obj.exam + "</option>";
          }
                );
          $('#exam_id').append(div_data);
        }
        ,
        complete: function () {
          $('#exam_id').removeClass('dropdownloading');
        }
      }
            );
    }
  }
                );
  // this is the id of the form
  $("form#form_examgroup").submit(function (e) {
    e.preventDefault();
    // avoid to execute the actual submit of the form.
    var form = $(this);
    var url = form.attr('action');
    var submit_button = $("button[type=submit]");
    $.ajax({
      type: "POST",
      url: url,
      dataType: 'JSON',
      data: form.serialize(), // serializes the form's elements.
      beforeSend: function () {
        submit_button.button('loading');
      }
      ,
      success: function (data)
      {
        $('.examgroup_result').html(data.result);
      }
      ,
      error: function (xhr) {
        // if error occured
        alert("Error occured.please try again");
        submit_button.button('reset');
      }
      ,
      complete: function () {
        submit_button.button('reset');
      }
    }
          );
  }
                                 );
  $(document).ready(function (e) {
    $("#form1").on('submit', (function (e) {
      e.preventDefault();
      $.ajax({
        url: "<?php echo site_url("student/create_doc"); ?>",
        type: "POST",
        data: new FormData(this),
        dataType: 'json',
        contentType: false,
        cache: false,
        processData: false,
        success: function (res)
        {
        if (res.status == "fail") {
        var message = "";
        $.each(res.error, function (index, value) {
        message += value;
      }
            );
      errorMsg(message);
    }
                              else {
                              successMsg(res.message);
                   window.location.reload(true);
  }
                    }
                    }
                   );
  }
  ));
  }
  );
</script>
<?php
function findGradePoints($exam_grade, $exam_type, $percentage) {
    foreach ($exam_grade as $exam_grade_key => $exam_grade_value) {
        if ($exam_grade_value["exam_key"] == $exam_type) {
            if (!empty($exam_grade_value["exam_grade_values"])) {
                foreach ($exam_grade_value["exam_grade_values"] as $grade_key => $grade_value) {
                    if ($grade_value->mark_from >= $percentage && $grade_value->mark_upto <= $percentage) {
                        return $grade_value->point;
                    }
                }
            }
        }
    }
    return 0;
}
function findExamGrade($exam_grade, $exam_type, $percentage) {
    foreach ($exam_grade as $exam_grade_key => $exam_grade_value) {
        if ($exam_grade_value["exam_key"] == $exam_type) {
            if (!empty($exam_grade_value["exam_grade_values"])) {
                foreach ($exam_grade_value["exam_grade_values"] as $grade_key => $grade_value) {
                    if ($grade_value->mark_from >= $percentage && $grade_value->mark_upto <= $percentage) {
                        return $grade_value->name;
                    }
                }
            }
        }
    }
    return "";
}
function getConsolidateRatio($exam_connection_list, $examid, $get_marks) {
    if (!empty($exam_connection_list)) {
        foreach ($exam_connection_list as $exam_connection_key => $exam_connection_value) {
            if ($exam_connection_value->exam_group_class_batch_exams_id == $examid) {
                return ($get_marks * $exam_connection_value->exam_weightage) / 100;
            }
        }
    }
    return 0;
}
function getCalculatedExamGradePoints($array, $exam_id, $exam_grade, $exam_type) {
    $object = new stdClass();
    $return_total_points = 0;
    $return_total_exams = 0;
    if (!empty($array)) {
        if (!empty($array["exam_result_" . $exam_id])) {
            foreach ($array["exam_result_" . $exam_id] as $exam_key => $exam_value) {
                $return_total_exams++;
                $percentage_grade = ($exam_value->get_marks * 100) / $exam_value->max_marks;
                $point = findGradePoints($exam_grade, $exam_type, $percentage_grade);
                $return_total_points = $return_total_points + $point;
            }
        }
    }
    $object->total_points = $return_total_points;
    $object->total_exams = $return_total_exams;
    return $object;
}
function getCalculatedExam($array, $exam_id) {
    $object = new stdClass();
    $return_max_marks = 0;
    $return_get_marks = 0;
    $return_credit_hours = 0;
    $return_exam_status = false;
    if (!empty($array)) {
        $return_exam_status = "pass";
        // print_r($array['exam_result_' . $exam_id]);
        if (!empty($array["exam_result_" . $exam_id])) {
            foreach ($array["exam_result_" . $exam_id] as $exam_key => $exam_value) {
                if ($exam_value->get_marks < $exam_value->min_marks || $exam_value->attendence != "present") {
                    $return_exam_status = "fail";
                }
                $return_max_marks = $return_max_marks + $exam_value->max_marks;
                $return_get_marks = $return_get_marks + $exam_value->get_marks;
                $return_credit_hours = $return_credit_hours + $exam_value->credit_hours;
            }
        }
    }
    $object->credit_hours = $return_credit_hours;
    $object->get_marks = $return_get_marks;
    $object->max_marks = $return_max_marks;
    $object->exam_status = $return_exam_status;
    return $object;
}
?>

<script>

    $(document).on('click', '#printMarksheet', function (e) {
	
        e.preventDefault();
        var form = $("form#printMarksheet1");
       // var subsubmit_button = $(this).find(':submit');
        var formdata = form.serializeArray();

        var list_selected =  $('form#printMarksheet1 input[name="student_id[]"]').length;
		//alert(list_selected);
      if(list_selected > 0){
        $.ajax({
            type: "POST",
            url: form.attr('action'),
            data: formdata, // serializes the form's elements.
            dataType: "JSON", // serializes the form's elements.
            beforeSend: function () {
               // subsubmit_button.button('loading');
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
