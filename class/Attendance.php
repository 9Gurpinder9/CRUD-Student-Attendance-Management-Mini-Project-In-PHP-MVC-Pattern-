<?php 

require_once("DBController.php");
class Attendance{

	private $db_handle;

	function __construct()
	{
		$this->db_handle = new DBController();
	}

	function addAttendance($attendance_date, $student_id, $present, $absent)
	{
       $query = "INSERT INTO tbl_attendance(at_date,student_id,present,absent) VALUES(?,?,?,?)";
       $paramType = "siii";
       $paramValue = array($attendance_date,$student_id,$present,$absent);

       $insertId = $this->db_handle->insert($query,$paramType,$paramValue);
       return $insertId;
	}


	public function getAttendence()
     {

     	$sql = "SELECT id,at_date,sum(present) as present, sum(absent) as absent FROM tbl_attendance GROUP BY at_date";
     	$at_result = $this->db_handle->runBaseQuery($sql);

     	return $at_result;
     }

    public function deleteAttendanceByDate($attendance_date)
    { 
          $query = "DELETE FROM tbl_attendance WHERE at_date = ?";
          $paramType = "s";
          $paramValue = array($attendance_date);
          $this->db_handle->update($query, $paramType, $paramValue);
    }
public function getAttendenceByDate($attendance_date)
{
  
     $query= "SELECT * FROM tbl_attendance LEFT JOIN tbl_student ON tbl_attendance.student_id = tbl_student.id WHERE at_date = ? ORDER BY student_id";
     $paramType = "s";
     $paramValue = array($attendance_date);
     $result = $this->db_handle->runQuery($query,$paramType,$paramValue);
     return $result;
     
} 
}
?>