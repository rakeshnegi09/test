<div class="content-wrapper" style="min-height: 946px;">
    <section class="content-header">
        <h1>
            <i class="fa fa-line-chart"></i> <?php echo $this->lang->line('reports'); ?> <small> <?php echo $this->lang->line('filter_by_name1'); ?></small></h1>
    </section>
    <!-- Main content -->
    <section class="content" >
        <?php $this->load->view('reports/_studentinformation'); ?>
        <div class="row">
            <div class="col-md-12">

                <div class="box removeboxmius">
                    <div class="box-header ptbnull"></div>
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-search"></i> <?php echo $this->lang->line('select_criteria'); ?></h3>
                    </div>
                    <div class="box-body">    
                        <form role="form" action="<?php echo site_url('student/disabledreportvalidation') ?>" method="post" class="" id="reportform">
                            <div class="row">

                                <?php echo $this->customlib->getCSRF(); ?>

                                <div class="col-sm-6 col-md-3">
                                     <div class="form-group">
                                        <label for="exampleInputEmail1"><?php echo $this->lang->line('class'); ?></label><small class="req"> *</small>
                                        <select  id="class_id" multiple name="class_id[]" class="form-control"  >
										<?php
											
                                            foreach ($classlist as $class) {
                                                ?>
                                                <option value="<?php echo $class['id'] ?>"<?php if(in_array($class['id'],$class_id_array)){ echo "selected=selected"; } ?>><?php echo $class['class'] ?></option>
                                                <?php
                                                $count++;
                                            }
                                            ?>
                                        </select>
                                        <span class="text-danger error_class_id"><?php echo form_error('class_id'); ?></span>
                                    </div>
                                </div> 
                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group">
										<?php $section = get_section(); ?>
										<label><?php echo $this->lang->line('section'); ?></label>
										<select  id="section_id" multiple name="section_id[]" class="form-control" >
											<?php foreach($section as $row){ ?>
											<option <?php if (set_value('section_id') == $row['id']) echo "selected=selected" ?> value="<?php echo $row['id']; ?>"><?php echo $row['section']; ?></option>
											<?php } ?>
											
										</select>
										<span class="text-danger error_section_id"><?php echo form_error('section_id'); ?></span>
									</div>
                                </div>
                                
								<div class="col-sm-6 col-md-3">
                                    <div class="form-group">
										
										<label><?php echo $this->lang->line('reason'); ?></label>
										<select  id="section_id" name="reason" class="form-control" >
											<?php foreach($disable_reason as $row){ ?>
											<option <?php if (set_value('reason') == $row['id']) echo "selected=selected" ?> value="<?php echo $row['id']; ?>"><?php echo $row['reason']; ?></option>
											<?php } ?>
											
										</select>
										<span class="text-danger error_section_id"><?php echo form_error('section_id'); ?></span>
									</div>
                                </div>
                                
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <button type="submit" name="search" value="search_filter" class="btn btn-primary btn-sm checkbox-toggle pull-right"><i class="fa fa-search"></i> <?php echo $this->lang->line('search'); ?></button>
                                    </div>
                                </div>
                            </div><!--./row-->     
                        </form>
                    </div><!--./box-body-->   


                    
                        <div class="">
                            <div class="box-header ptbnull"></div> 
                            <div class="box-header ptbnull">
                                <h3 class="box-title titlefix"><i class="fa fa-users"></i> <?php echo form_error('student'); ?> <?php echo $this->lang->line('student') . " " . $this->lang->line('report'); ?></h3>
                            </div>
                            <div class="box-body table-responsive">
                                
                                    <div class="download_label"> <?php echo $this->lang->line('student') . " " . $this->lang->line('report'); ?></div>
                            <div >
                                <table class="table table-striped table-bordered table-hover student-list" data-export-title="<?php echo $this->lang->line('student') . " " . $this->lang->line('report'); ?>">
                                    <thead>
                                        <tr>
                                            <th><?php echo $this->lang->line('admission_no'); ?></th>
                                            <th><?php echo $this->lang->line('student_name'); ?></th>
                                            <th><?php echo $this->lang->line('class'); ?></th>
                                            <th class="text-center">ID/Passport</th>                                            
                                            <th class="text-center">Reason</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div><!--./box box-primary -->

   
            </div><!-- ./col-md-12 -->  
        </div>       
</div>  
</section>
</div>

<script type="text/javascript">
	$(document.body).ready(function () {
		//var selected_value = '<?php echo json_encode($class_id_array);?>';
		$('#class_id').multiselect({
			columns:1,
			placeholder:"Please select",
			search: false,
            searchOptions: {
                'default': 'Search Class'
            },
            selectAll: false
		});
		
		$('#section_id').multiselect({
			columns:1,
			placeholder:"Please select",
			search: false,
            searchOptions: {
                'default': 'Search Campus'
            },
            selectAll: false
		});
		
		
	});
    function getSectionByClass(class_id, section_id) {
		return false;
        
    }

</script>
 <script>
$(document).ready(function() {
     emptyDatatable('student-list','data');
	 
});
</script>           
<script type="text/javascript">
$(document).ready(function(){ 
$(document).on('submit','#reportform',function(e){
    e.preventDefault(); // avoid to execute the actual submit of the form.
    var $this = $(this).find("button[type=submit]:focus");  
    var form = $(this);
    var url = form.attr('action');
    var form_data = form.serializeArray();
    form_data.push({name: 'search_type', value: $this.attr('value')});
  
    $.ajax({
           url: url,
           type: "POST",
           dataType:'JSON',
           data: form_data, // serializes the form's elements.
              beforeSend: function () {
                $('[id^=error]').html("");
                $this.button('loading');
              
               },
              success: function(response) { // your success handler
               console.log(response);
                if(!response.status){
                    $.each(response.error, function(key, value) {
						
                    $('.error_' + key).html("This field is required");
                    });
                }else{
                 
                   initDatatable('student-list','student/dtdisabledreportlist',response.params,[],100);
                }
              },
             error: function() { // your error handler
                 $this.button('reset');
             },
             complete: function() {
             $this.button('reset');
             }
         });

        });

    });
   
</script>