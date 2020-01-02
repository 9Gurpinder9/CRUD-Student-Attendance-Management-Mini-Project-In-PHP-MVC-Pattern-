<?php
$connect = mysqli_connect('localhost','root','','crud_attendance');
     $query = "SELECT count(*) as present_absent_count,present,case 
               when present = 1 then 'Present'
               when present = 0 then 'Absent'
          end as present FROM tbl_attendance GROUP BY present ";
$result = mysqli_query($connect, $query);

$i=0;
while ($row = mysqli_fetch_array($result))
	
  
{
	// echo "<pre>";
	// print_r($row);
 $label[$i] = $row['present'];
 $count[$i] = $row['present_absent_count'];
 $i++;
}
require_once('header.php');
?>
<script type="text/javascript">
  
  google.charts.load('current', {packages: ['corechart']});
  google.charts.setOnLoadCallback(drawPieChart);
  function drawPieChart()
  {

     var pie = google.visualization.arrayToDataTable([['attendance','Number'],
          ['<?php echo $label[0];?>',<?php echo $count[0]?>],
          ['<?php echo $label[1]; ?>',<?php echo $count[1];?> ],]);

     var header = {
     	title: 'Percentage of Employee Attendance',
     	slices: {0:{color:'#666666'},1:{color:'#006EFF'}}
     };
    var piechart = new google.visualization.PieChart(document.getElementById('piechart'));
    piechart.draw(pie,header);
  }

  google.charts.load('current',{packages:['corechart','bar']});
  google.charts.setOnLoadCallback(drawcolumnChart);

  function drawcolumnChart(){
  	var bar = google.visualization.arrayToDataTable([
         ['attendance','Count',{role:"style"}],
         ['<?php echo $label[1];?>',<?php echo $count[1];?>,"#006EFF"],
         ['<?php echo $label[0];?>',<?php echo $count[0];?>,"#666666"]
  		]);
  	var columnview = new google.visualization.DataView(bar);
  	var header = {
  		title:'Employee Attendance',
  		bar:{groupWidth:"50%"}    
           };
    var barchart = new google.visualization.ColumnChart(document.getElementById("columnchart"));
    	barchart.draw(columnview,header);
  }
</script>
<div class="container" style="margin-top: 40px;">

<div class="row">
	<div class="col-lg-12 text-center">
		<h1>
Showing Attendance Graph Status Using Google Graph API</h1>
<div id="piechart"> </div>
<div id="columnchart"> </div>
	</div>
</div>
	</div>

<?php
require_once('footer.php');
?>