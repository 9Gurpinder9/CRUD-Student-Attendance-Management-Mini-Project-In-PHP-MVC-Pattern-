<?php 
require_once('header.php');
?>

<div class="container" style="margin-top: 50px;">
	<div class="row">
	<div class="col-lg-8 offset-lg-2 text-center cust-heading">
		<h1><b>Attendance Management System</b></h1>
	</div>
</div>

<form name="frmAdd" method="POST" action="" id="frmAdd">
  <div class="row">
  <div class="col-lg-3" style="margin-bottom: 20px;">
    <label>Select Date</label>
  <div id="datepicker" class="input-group date" data-date-format="mm-dd-yyyy">
    <input class="form-control" type="text" readonly name="attendance_date" id="attendance_date" required/>
    <span class="input-group-addon">
    </span>
</div>
</div>
</div>
	<div class="table-responsive">
		<table class="table table-bordered table-hover">
       <thead>
       	<tr>
       		<th><strong>Student</strong></th>
       		<th><strong>Present</strong></th>
       		<th><strong>Absent</strong></th>
       	</tr>
       </thead>
       <tbody>
      <?php 
        if(!empty($studentResult)){
        	foreach($studentResult as $k => $v){

        		// echo "<pre>";
        		// print_r($studentResult[$k]);
      ?>
      <tr>
    <td><input type="hidden" name="student_id[]" id="student_id" value="<?php echo $studentResult[$k]["id"]; ?>" />
     <?php echo $studentResult[$k]["name"]; ?>
    </td>
    <td>
      <input type="radio" name="attendance-<?php echo $studentResult[$k]["id"];?>" value="present" checked />
    </td>
     <td>
      <input type="radio" name="attendance-<?php echo $studentResult[$k]["id"];?>" value="absent"/></td>
      </tr>
  <?php } } ?>
       </tbody>
		</table>
	</div>
 <input type="submit" name="add" class="btn btn-primary" value="Add" />
</form>
</div>
<script>
$(function () {
  $("#datepicker").datepicker({ 
        autoclose: true, 
        todayHighlight: true
  }).datepicker('update', new Date());
});

</script>
<?php
require_once('footer.php');
?>