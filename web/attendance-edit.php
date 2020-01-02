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
	<input name="attendance_date" id="attendacne_date"
   value="<?php echo $attendance_date;?>" disabled/>
</div>
</div>
	<div class="table-responsive">
		<table class="table table-brodered table-hover">
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
            $presentChecked = "";
            $absentChecked = "";
            if($studentResult[$k]["id"] == $result[$k]["student_id"])
            {
               if($result[$k]["present"] == 1)
               {
                 $presentChecked = "checked";

               }
               else if($result[$k]["absent"] == 1)
               {
                   $absentChecked = "checked";
               }
            }
      ?>
      <tr>
    <td><input type="hidden" name="student_id[]" id="student_id" value="<?php echo $studentResult[$k]["id"]; ?>" />
     <?php echo $studentResult[$k]["name"]; ?>
    </td>
    <td>
      <input type="radio" name="attendance-<?php echo $studentResult[$k]["id"];?>" value="present" <?php echo $presentChecked;?> />
    </td>
     <td>
      <input type="radio" name="attendance-<?php echo $studentResult[$k]["id"];?>" value="absent" <?php echo $absentChecked;?>/></td>
      </tr>
  <?php } } ?>
       </tbody>
		</table>
	</div>
 <input type="submit" name="add" class="btn btn-primary" value="Add" />
</form>
</div>

<?php
require_once('footer.php');
?>