<?php
require_once('header.php');
?>

<div class="container" style="margin-top: 40px;">

<div class="row">
	<div class="col-lg-8 offset-lg-2 text-center cust-heading">
    <h1><b>Attendance Management System</b></h1>
  </div>
	<div class="col-lg-6">
		<a href="index.php?action=student-add" class="btn btn-primary" title="Add Student"><i class="fas fa-user-plus"></i>Add Student</a>
	</div>
<div class="table-responsive" style="margin-top: 40px;">
<table class="table table-bordered table-hover">
  <thead>
    <tr>
      <th scope="col">Serial No.</th>
      <th scope="col">Student Name</th>
      <th scope="col">Roll Number</th>
      <th scope="col">Date of Birth</th>
      <th scope="col">Class</th>
    <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  	<?php 
    $count=0;
         if(!empty($result)){
         	// echo "<pre>";
         	// print_r($result);
         	foreach($result as $k => $v){
            $count++;
         	// 	echo "<pre>";
         	// print_r($v);
  	?>
    <tr>
      <td><?= $count; ?></td>
      <td><?= $result[$k]['name']; ?></td>
      <td><?= $result[$k]['roll_number']; ?></td>
      <td><?= $result[$k]['dob']; ?></td>
      <td><?= $result[$k]['class']; ?></td>
      <td><a href="index.php?action=student-edit&id=<?php echo $result[$k]['id'];?>"><i class="fas fa-edit fa-2x cust-icon" title="Edit"></i></a>
          <a href="index.php?action=student-delete&id=<?php echo $result[$k]['id'];?>" onclick="return del();" class="fas fa-trash fa-2x cust-icon" title="Delete"></a>  
      </td>
    </tr>
<?php } } ?>

  </tbody>
</table> 
</div>
</div>
	</div>
<script type="text/javascript">
    function del()
    {
      var ans=confirm("Are You Sure You Want to Delete!!!");
      if(ans == true)
      {
         return true;
      }
      else
      {
        return false;
      }
      return false;
    }
  </script>


<?php
require_once('footer.php');
?>