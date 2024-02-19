<?php  
class human_user{

	//DB params
	private $table = "blog_human";
	private $conn;

	public function __construct($db){
        $this->conn = $db;
    }

	//blog_post properties
	public $human_id;
	public $human_fullname;
	public $human_phone;
	public $human_email;
	public $human_image;
	public $human_message;
	public $human_date_updated;




	//Read all records
	public function read_all(){
		$sql = "SELECT * FROM $this->table";
		$stmt = $this->conn->prepare($sql);
		$stmt->execute();
		return $stmt;
	}

	//Read one record
	public function read(){
		$sql = "SELECT * FROM $this->table WHERE human_id = :get_id";
		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(":get_id",$this->human_id);
		$stmt->execute();
		$row = $stmt->fetch();

		
		$this->human_id = $row['human_id'];
		$this->human_fullname = $row['human_fullname'];
		$this->human_phone = $row['human_phone'];
		$this->human_email = $row['human_email'];
		$this->human_image = $row['human_image'];
		$this->human_message = $row['human_message'];
		$this->human_date_updated = $row['human_date_updated'];
	
	}
	


	//Update record
	public function update(){
		$sql = "UPDATE $this->table
				SET 
					human_phone = :new_phone,
					human_fullname = :new_fullname,
					human_email = :new_email,
					human_image = :new_image,
					human_message = :new_message,
					human_date_updated = localtime()
				WHERE human_id = :get_id";
		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(":new_email",$this->human_email);
		$stmt->bindParam(":new_fullname",$this->human_fullname);
		$stmt->bindParam(":new_phone",$this->human_phone);
		$stmt->bindParam(":new_image",$this->human_image);
		$stmt->bindParam(":new_message",$this->human_message);
		// $stmt->bindParam(":new_human_date_updated", $this->human_date_updated);
		$stmt->bindParam(":get_id",$this->human_id);


		try{
			if($stmt->execute()){
				return true;
			}
		}catch(PDOException $e){
			echo "Error update record: <br>".$e->getMessage();
			return false;
		}

		
	}

			


}
?>