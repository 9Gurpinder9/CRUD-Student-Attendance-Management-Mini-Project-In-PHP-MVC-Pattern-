<?php 
class DBController
{
	private $host="localhost";
	private $user="root";
	private $password="";
	private $database="crud_attendance";
	private $conn;
	public function __construct()
	{
		$this->conn=$this->connectDB();
	}

	public function connectDB()
	{
           $conn = mysqli_connect($this->host,$this->user,$this->password,$this->database);
           return $conn;
	}
     

     public function runQuery($query, $param_type,$param_value_array)
     {
      
          $sql = $this->conn->prepare($query);

          $this->bindQueryParams($sql, $param_type, $param_value_array);
          $sql->execute();
          $result = $sql->get_result();
          if($result->num_rows > 0)
          {
             while($row = $result->fetch_assoc())
             {
                  $resultset[] = $row; 
             }
          }
          if(!empty($resultset))
          { 
                 return $resultset;
          }
     }


     public function runBaseQuery($query)
     {
        $resultSet="";
        $result=$this->conn->query($query);
        if($result->num_rows > 0)
        {
        while($row=$result->fetch_assoc())
        {
        	$resultSet[] = $row;

        }
        }
        return $resultSet;
     }
    
    
    public function bindQueryParams($sql, $param_type, $param_value_array)
    {
         $param_value_reference[] = & $param_type;
         for($i=0;$i<count($param_value_array); $i++)
         {
         	$param_value_reference[] = & $param_value_array[$i];
         }
          call_user_func_array(array($sql,'bind_param'), $param_value_reference);
    }

    public function insert($query, $param_type,$param_value_array)
    {
        
    
       $sql = $this->conn->prepare($query);
       $this->bindQueryParams($sql, $param_type,$param_value_array);
       $sql->execute();
       $insertId = $sql->insert_id;
       return $insertId;
    }

    public function update($query, $param_type, $param_value_array)
    {
    	$sql = $this->conn->prepare($query);
    	$this->bindQueryParams($sql, $param_type, $param_value_array);
    	$sql->execute();
     
    }

}

?>