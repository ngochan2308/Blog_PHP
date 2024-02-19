<?php  
class contact{

	//DB params
	private $table = "blog_contact";
	private $conn;

	//Myguests properties
	public $contact_id;
	public $contact_name;
	public $contact_email;
	public $contact_phone;
	public $contact_message;
	public $contact_date_created;

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
	public function read_db() {
        $sql = "SELECT * FROM $this->table";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        return $stmt;
    }

	//Read one record
	public function read(){
		$sql = "SELECT * FROM $this->table WHERE contact_id = :get_id";
		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(":get_id",$this->contact_id);
		$stmt->execute();
		$row = $stmt->fetch();

		$this->contact_id = $row['contact_id'];
		$this->contact_name = $row['contact_name'];
		$this->contact_phone = $row['contact_phone'];
		$this->contact_email = $row['contact_email'];
		$this->contact_message = $row['contact_message'];
		$this->contact_date_created = $row['contact_date_created'];
	}
	

	//Add record
	public function add(){
		$sql = "INSERT INTO $this->table
				SET contact_name = :new_name,
					contact_phone = :new_phone,
					contact_email = :new_email,
					contact_message = :new_message,
					contact_date_created = localtime()";
					

		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(":new_name",$this->contact_name);
		$stmt->bindParam(":new_phone",$this->contact_phone);
		$stmt->bindParam(":new_email",$this->contact_email);
		$stmt->bindParam(":new_message",$this->contact_message);


		try{
			if($stmt->execute()){
				return true;
			}
		}catch(PDOException $e){
			echo "Error insert record: <br>".$e->getMessage();
			return false;
		}
	}

	//Update record
	public function update(){
		$sql = "UPDATE $this->table
				SET contact_name = :new_name,
					contact_phone = :new_phone,
					contact_email = :new_email,
					contact_message = :new_message,
					contact_date_created = localtime()
				WHERE contact_id = :get_id";
					
		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(":new_name",$this->contact_name);
		$stmt->bindParam(":new_phone",$this->contact_phone);
		$stmt->bindParam(":new_email",$this->contact_email);
		$stmt->bindParam(":new_message",$this->contact_message);
		$stmt->bindParam(":get_id",$this->contact_id);

		try{
			if($stmt->execute()){
				return true;
			}
		}catch(PDOException $e){
			echo "Error update record: <br>".$e->getMessage();
			return false;
		}
	}

	//Delete record
	public function delete(){
		$sql = "DELETE FROM $this->table WHERE contact_id = :get_id";
		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(":get_id",$this->contact_id);

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