<?php  
class subscribers{

	//DB params
	private $table = "blog_subscriber";
	private $conn;

	//Myguests properties
	public $sub_id;
	public $sub_email;
	public $sub_date_created;

	public function __construct($db){
		$this->conn = $db;
	}

	//Read all records
	public function read_all(){
		$sql = "SELECT * FROM $this->table";
		$stmt = $this->conn->prepare($sql);
		$stmt->execute();
		return $stmt;
	}

	//Read one record
	public function read(){
		$sql = "SELECT * FROM $this->table WHERE sub_id = :get_id";
		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(":get_id",$this->sub_id);
		$stmt->execute();
		$row = $stmt->fetch();

		$this->sub_id = $row['sub_id'];
		$this->sub_email = $row['sub_email'];
		$this->sub_date_created = $row['sub_date_created'];
	} 
	public function read_db() {
        $sql = "SELECT * FROM $this->table";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        return $stmt;
    }

	//Add record
	public function add(){
		$sql = "INSERT INTO $this->table
				SET 
					sub_email = :new_email,
					sub_date_created = localtime()";
										

		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(":new_email",$this->sub_email);


		try{
			if($stmt->execute()){
				return true;
			}
		}catch(PDOException $e){
			echo "Error insert record: <br>".$e->getMessage();
			return false;
		}
	}


	//Delete record
	public function delete(){
		$sql = "DELETE FROM $this->table WHERE sub_id = :get_id";
		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(":get_id",$this->sub_id);

		try{
			if($stmt->execute()){
				return true;
			}
		}catch(PDOException $e){
			echo "Error delete record: <br>".$e->getMessage();
			return false;
		}
	}

}
?>