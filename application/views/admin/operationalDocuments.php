   <style>
<style>
HTML CSS JSResult Skip Results Iframe
EDIT ON
*{box-sizing:border-box;}

body{
  font-family:source sans pro;
}
h3{
  font-weight:400;
  font-size:16px;
}
p{
  font-size:12px;
  color:#888;
}

.stage{
  max-width:80%;margin:60px 10%;
  position:relative;  
}
.folder-wrap{
  display: flex;
  flex-wrap:wrap;
}
.folder-wrap::before{
  content:'';
  display: block;
  position: absolute;
  top:-40px;
}
.folder-wrap:first-child::before{
  content:'Home (top of file structure)';
  display: block;
  position: absolute;
  top:-40px;
}
.tile{
    border-radius: 3px;
    width: calc(20% - 17px);
    margin-bottom: 23px;
    text-align: center;
    border: 1px solid #eeeeee;
    transition: 0.2s all cubic-bezier(0.4, 0.0, 0.2, 1);
    position: relative;
    padding: 35px 16px 25px;
    margin-right: 17px;
    cursor: pointer;
}
.tile:hover{
  box-shadow: 0px 7px 5px -6px rgba(0, 0, 0, 0.12);
}
.tile i{
    color: #00A8FF;
    height: 55px;
    margin-bottom: 20px;
    font-size: 55px;
    display: block;
    line-height: 54px;
    cursor: pointer;
}
.tile i.mdi-file-document{
  color:#8fd9ff;
}

.back{
  font-size: 26px;
  border-radius: 50px;
  background: #00a8ff;
  border: 0;
  color: white;
  width: 60px;
  height: 60px;
  margin: 20px 20px 0;
  outline:none;
  cursor:pointer;
}

/* Transitioning */
.folder-wrap{
  position: absolute;
  width: 100%;
  transition: .365s all cubic-bezier(.4,0,.2,1);
  pointer-events: none;
  opacity: 0;
  top: 0;
}
.folder-wrap.level-up{
  transform: scale(1.2);
    
}
.folder-wrap.level-current{
  transform: scale(1);
  pointer-events:all;
  opacity:1;
  position:relative;
  height: auto;
  overflow: visible;
}
.folder-wrap.level-down{
  transform: scale(0.8);  
}
Run Pen
Resources1× 0.5× 0.25×Rerun

</style>


</style>   
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link href="https://cdn.materialdesignicons.com/2.5.94/css/materialdesignicons.min.css" rel="stylesheet" />
<div class="content-wrapper">
		
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                  
                    <div class="box-body">
<?php

	$base_dir = FCPATH.'uploads/operationalDocuments';
	if(isset($_POST['create_folder'])=="Add Folder"){
		$base_dir = $_POST['base_dir'];

		$folder_name=$_POST['createfolder'];
		$output_dir=$base_dir."/".$folder_name;
		
		if (!file_exists($output_dir."/".$folder_name))/* Check folder exists or not */
		{
			@mkdir($output_dir , 0777);/* Create folder by using mkdir function */
		}else{
			die("invalid path");
		}
	}
		
?>

<?php
if(isset($_POST['create_file'])=="Add file"){
	if(isset($_FILES['file']['name']) != ""){
		$base_dir = $_POST['base_dir'];
		$path=$_FILES['file']['name'];
		$pathto=$base_dir."/";
		move_uploaded_file( $_FILES['file']['tmp_name'],$pathto . basename($_FILES['file']['name'])) or die( "Could not copy file!");
	}
	else {
		die("No file specified!");
	}
}
?>


  
<div class="container">
<div class="row">
<div class="col-md-3 pull-left" >
<a class="btn btn-info pull-left" href="<?= base_url('admin/admin/operationalDocuments');?>" style="float:right">Go Back</a>
</div>
<div class="col-md-4" >

<form action="" method="post">
    
	<div class="input-group" style="display:flex">
		<div class="input-group-append">
			<input name="base_dir" value='<?= $base_dir;?>' type="hidden" id="base_dir">
			<input name="createfolder" required class="form-control" type="text" placeholder="Type Folder Name">
		</div>
    <input type="submit" name="create_folder" class="btn btn-success" value="Add Folder">
	</div>
  </form>
</div>
<div class="col-md-4">
<form action="" method="post" enctype="multipart/form-data">
<div class="input-group" style="display:flex">
	<div class="input-group-append">
	<input name="base_dir" value='<?= $base_dir;?>' type="hidden" id="base_dir_file">
    <input name="file" required type="file" style="opacity:1" class="control-fileupload">
</div>
    <input type="submit" name="create_file" class="btn btn-success" value="Add file">
 
</div>

 </form>

</div>
</div>
</div>
<br><br>
  <div class="folder-wrap level-current scrolling">
<?php

function getDirContents($dir, &$results = array()) {

    $files = scandir($dir);
	if($files){
    foreach ($files as $key => $value) {
        $path = realpath($dir . DIRECTORY_SEPARATOR . $value);
        if (!is_dir($path)) {
			
            $results[] = $path;
        } else if ($value != "." && $value != "..") {
            //getDirContents($path, $results);
            $results[] = $path;
            
        }
    }
	}else{
		$results = array();
	}

    return $results;
}

if (isset($_POST["dir"]) && !empty($_POST["dir"])) {
  $files = getDirContents($_POST["dir"]);
}else{
	$files = getDirContents("$base_dir");
}

sort($files);
if($files){
 // this does the sorting
foreach($files as $file){
	if(is_dir($file)){ ?>

		 <div class="tile folder" id='<?= $file; ?>'>
		  <i class="mdi mdi-folder"></i>
		  <h3><?= basename($file); ?></h3>
		  
		</div><!-- .tile.folder -->

		<?php }else{  ?>
		<div class="tile form">
			<a target="_blank" href="<?= base_url(str_replace(FCPATH,'',$file)); ?>" download>
		  <i class="mdi mdi-file-document"></i>
		  <h3><?= basename($file); ?></h3></a>
		</div>
<?php	} } }else{ ?>
	<div class="row"style="width:100%">
		<div class="alert alert-warning center" >
		  <strong>No Records!</strong> 
		</div>
	</div>

<?php } ?>
	</div>
	</div>
	</section>
	</div>

<script>
$(document).on('click', '.folder', function () {
    var directory = this.id;
	
	$.post('<?php echo base_url("admin/admin/operationalDocuments");?>', ({"dir":directory}), function(data){
		
		console.log(data); // Will output, whatever your starter-functions outputs
		$("body").html(data);
		$("#base_dir").val(directory);
		$("#base_dir_file").val(directory);
	  });
});
</script>
