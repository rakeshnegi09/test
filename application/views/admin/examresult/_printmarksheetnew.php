<style type="text/css">
    @media print {
        .pagebreak { page-break-before: always; } /* page-break-after works, as well */
    }
	
table {
  border-collapse: collapse;
  width: 100%;
}
th {
  text-align: left;
  padding: 8px;
  font-weight: 300;
}

td {
  text-align: center;
  padding: 8px;
  font-weight: 600;
}
.heading{
	background-color: papayawhip;width:150px;text-align:left;
}
tr:nth-child(even) {background-color: #f2f2f2;}	
.single_row{line-height: normal;margin-bottom:-20px}
</style>

<?php foreach($marksheet as $key=>$row) { ?>

<div style="width: 100%; margin: 0 auto; border:0px solid #000; padding: 10px 5px 5px;position: relative; z-index: 1;height:auto;text-align:center;font-family:Arial,serif;font-style:normal;text-decoration: none">
<img src="<?php echo base_url('uploads/school_content/admin_logo/1.png'); ?>"  width="250" height="auto">
<h1 style="font-size:36px"><strong>Statement of Results</strong></h1>
<p style="margin-top:-20px;"><strong ><?php echo strtoupper($placeholder);?>: QUALIFICATION CHOSEN</strong></p>
<div style="padding-top:10px">

	<div class="single_row" style="display: flex;">
		<p class="heading">DATE OF PRINT</p>
		<p style="margin-left:5%"><strong><?php echo date('d/m/Y'); ?></strong></p>
	</div>
	<div class="single_row" style="display: flex;">
		<p class="heading">STUDENT NO</p>
		<p style="margin-left:5%"><strong><?php echo $row['student_value']['admission_no'];?></strong></p>
	</div>
	<div class="single_row" style="display: flex;">
		<p class="heading">STUDENT DETAILS</p>
		<p style="margin-left:5%"><strong><?php echo strtoupper($row['student_value']['firstname']);?> <?php echo strtoupper($row['student_value']['lastname']);?></strong></p>
	</div>
	<div class="single_row" style="display: flex;">
		<p class="heading">SCHOOL NAME</p>
		<p style="margin-left:5%"><strong>LIMPOPO CHEFS ACADEMY</strong></p>
	</div>
	<div class="single_row" style="display: flex;">
		<p class="heading">CAMPUS</p>
		<p style="margin-left:5%"><strong><?php echo strtoupper($row['student_value']['section']);?></strong></p>
	</div>
</div>
<p style="text-align:left;font-weight:400;text-transform: uppercase;margin-top:5%">To whom it may concern: This certifies that the above student has achieved the below results for the academic year as of date of print of this statement of results. All results are verified on a set base of outcomes and should the candidate not meet these requirements it will be noted next to the relevent subject.</p>
<div style="padding-top:6%">
<table class=""  >
	<tr>
		<th>Subjects</th>
		<th>Test</th>
		<th>Project/Task</th>
		<th>Subject Average</th>
		<th>Outcome</th>
	</tr>
	<?php 
		$count = 0;
		$average = 0;
		foreach($row['exam_connection_list'] as $data){ 
		$average = $average + $data['average'];
		if(empty($data['test_mark']) && empty($data['project_mark']) && empty($data['average'])){
			continue;
		}
	?>
	<tr>
		<td style="text-align: left;"><?php echo get_subjects_id($data['subject_id'])['name'];?></td>
		<td ><?php echo $data['test_mark'];?></td>
		<td><?php echo $data['project_mark'];?></td>
		<td><?php echo $data['average'];?></td>
		<td><?php if(empty($data['competent'])){ echo "NYC"; }else{ echo "C";  }?></td>
		
	</tr>
	<?php $count++; } 
	$average_result = $average/$count;
	if($average_result > 60){
		$outcome = "C";
	}else{
		$outcome = "NYC";
	}
	?>
	<tr style="border-top:2px solid gray"><td colspan="4" style="text-align:right;padding;8%">OVERALL OUTCOME</td><td><?php echo $outcome; ?></td></tr>
</table>

<p style="text-align:left;font-weight:400;text-transform: uppercase;padding-top:6%">Please note: This is a computer generated copy. No manual alterations to be accepted. Should you wish to receive a signed copy of the statement of results please contact your respective campus of study: mokopane: (015) 491 1226 or reception@limpopochefs.co.za polokwane: (015) 292 0102 or polokwane@limpopochefs.co.za C = COMPETENT | NYC = NOT YET COMPETENT | NS = NOT SUBMITTED | A = ABSENT</p>
</div>
<div style="text-align:left;padding-top:5%">
<img src="<?php echo $signature;?>" width="160px">
</div>
<?php if($key > 0){ ?>
<div class="pagebreak"> </div>
<?php } ?>
<?php } ?>

