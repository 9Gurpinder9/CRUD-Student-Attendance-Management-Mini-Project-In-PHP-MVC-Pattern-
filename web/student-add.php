<?php 
require_once('header.php');
?>

<div class="container" style="margin-top: 40px;">

<div class="row">
	<div class="col-lg-8 offset-lg-2 text-center cust-heading">
    <h1><b>Attendance Management System</b></h1>
  </div>
<div class="col-lg-8 offset-lg-2 cust-form">
<form name="frm" method="POST" action="" id="frm">
  <fieldset>
    <div class="form-group">
      <label><b>Name</b></label>
      <input type="text" class="form-control" placeholder="Student name" name="name" id="name" required>
    
    </div>
    <div class="form-group">
      <label><b>Roll Number</b></label>
      <input type="number" class="form-control" placeholder="Roll number" name="roll_number" id="roll_number" required>
    </div>
    <div class="form-group">
      <label><b>Date of Birth</b></label>
      <div id="datepicker" class="input-group date" data-date-format="mm-dd-yyyy">
    <input class="form-control" type="text" readonly name="dob" id="dob" required/>
    <span class="input-group-addon">
    </span>
</div>
    </div>
  <div class="form-group">
    <label><b>Class</b></label>
  <input class="form-control" type="text" placeholder="Class name" name="class" id="class" required>
  </div>

    <input type="submit" class="btn btn-primary" name="add" value="Add">
  </fieldset>
</form>

</div>
</div>
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