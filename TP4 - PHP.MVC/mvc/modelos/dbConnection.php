<?php
	namespace UNLu\PAW\Modelos;
	use PDO;
class dbConnection{
	public $db;
	
	public function __construct ($path){
		$resp = json_decode(file_get_contents($path),true);
		$dbname = $resp['dbname'];
		$dbhost = $resp['dbhost'];
		$username = $resp['username'];
		$password = $resp['password'];
		$this->db = new PDO("mysql:dbname=$dbname;host=$dbhost", $username, $password);
		$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
}
?>