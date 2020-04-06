<!-- module to create new database and table using queries -->
<?php
	class CreateDb{
		public $servername;
		public $username;
		public $password;
		public $dbname;
		public $tablename;
		public $con;

		//class constructor
		public function __construct(
			$dbname = "Newdb",
			$tablename = "fooddb",
			$servername = "35.186.157.176",
			$username = "root",
			$password = "Shadegame1"
		)
		{
			$this->dbname = $dbname;
			$this->tablename = $tablename;
			$this->servername = $servername;
			$this->username = $username;
			$this->password = $password;

			//create connection
			//it will open the new connection to mysqli server
			$this->con = mysqli_connect($servername,$username,$password);

			//check connection
			if(!$this->con){
				//if we don't have valid connection
				die("Connection failed:".mysqli_connect_error());
			}

			//if the connection is establish then create a query that create a new database
			//query
			$sql = "CREATE DATABASE IF NOT EXISTS $dbname";

			//execute query
			if(mysqli_query($this->con,$sql)){

				$this->con = mysqli_connect($servername,$username,$password,$dbname);

				//sql create new table
				$sql = "CREATE TABLE IF NOT EXISTS $tablename
					(id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
						fooditem_name VARCHAR(25) NOT NULL,
						fooditem_price FLOAT,
						fooditem_image VARCHAR(100)	
					);";

				if(!mysqli_query($this->con,$sql)){
					echo "Error creating table:".mysqli_error($this->con);
				}	
			}else{
				return false;
			}


		}

		//get product from database
		public function getData(){
			$sql = "SELECT * FROM $this->tablename";

			$result = mysqli_query($this->con,$sql);

			if(mysqli_num_rows($result)>0){
				return $result;
			}
		}
	}
?>