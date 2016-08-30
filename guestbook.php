<?php 	
	
class Guestbook 
{
	public $id;	
	public $name;	
	public $message;
	public $tableName;		
	protected $pdo;	
	
	public function __construct($host, $dbname, $db_user_name, $db_user_password, $tableName)
	{
		$this->tableName = $tableName;		
		$this->pdo = new PDO("mysql:host=".$host.";dbname=".$dbname, $db_user_name, $db_user_password);
	}
	
	public function last()
	{
		$sql = "SELECT `crdate`, `name`, `message` FROM `".$this->tableName."` ORDER BY `crdate` DESC LIMIT 20";
		$last20 = array();
		foreach ($this->pdo->query($sql) as $row) {
			$last20[] = $row;
		}
		return $last20;
	}

	public function create($item)
	{	
		$this->name = htmlspecialchars($item['name']);
		$this->message = htmlspecialchars($item['message']);
		
		$sql_insert_item = "INSERT INTO `".$this->tableName."` (`crdate`, `name`, `message`) VALUES (NOW(), '$this->name', '$this->message')";	
		$this->pdo->query($sql_insert_item);
		
		$sql_last_id = "SELECT `id` FROM `".$this->tableName."` ORDER BY `crdate` DESC LIMIT 1";
		foreach ($this->pdo->query($sql_last_id) as $row){
			$this->id = $row['id'];
		}
		
		return $this->id;
	}	
}
