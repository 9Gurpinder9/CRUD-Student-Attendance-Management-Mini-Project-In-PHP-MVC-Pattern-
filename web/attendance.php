 <?php
require_once('header.php');
?>

<div class="container" style="margin-top: 40px;">

<div class="row">
	<div class="col-lg-8 offset-lg-2 text-center cust-heading">
    <h1><b>Attendance Management System</b></h1>
  </div>
	<div class="col-lg-6">
		<a href="index.php?action=attendance-add" class="btn btn-primary" title="Add Student"><i class="fas fa-user-plus"></i>Add Attendance</a>
	</div>
<div class="table-responsive" style="margin-top: 40px;">
<table class="table table-bordered table-hover">
  <thead>
    <tr>
    <th scope="col">Serial No.</th>
      <th scope="col">Date</th>
      <th scope="col">Present</th>
      <th scope="col">Absent</th>
    <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  	<?php 
    $count=0;
         if(!empty($at_result)){
         	// echo "<pre>";
         	// print_r($result);
         	foreach($at_result as $k => $v){
            $count++;
         	// 	echo "<pre>";
         	// print_r($v);
  	?>
    <tr>
      <td><?= $count; ?></td>
      <td><?= $at_result[$k]['at_date']; ?></td>
      <td><?= $at_result[$k]['present']; ?></td>
      <td><?= $at_result[$k]['absent']; ?></td>
      
      <td><a href="index.php?action=attendance-edit&date=<?php echo $at_result[$k]['at_date'];?>"><i class="fas fa-edit fa-2x cust-icon" title="Edit"></i></a>
          <a href="index.php?action=attendance-delete&date=<?php echo $at_result[$k]['at_date'];?>" class="fas fa-trash fa-2x cust-icon" title="Delete" onclick="return del();" ></a>  
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