<?php

    /*
   
		this class connect to the database and with the help of query we can perform SQL query
   
    */


   define("address",  "127.0.0.1");
   define("username", "root");
   define("password", "");
   define("dbname",   "demo_db");

   
    class DBConnection {
		
		protected $address;
	    protected $username;
	    protected $password;
	    protected $dbname;   
	   
	    public function __construct(){
			
		    $this->address  = address;
		    $this->username = username;
		    $this->password = password;
		    $this->dbname   = dbname;
	    }


        public function query( $cmd ){
			
			try{
				$con = new mysqli( $this->address, $this->username, $this->password, $this->dbname );
				
				if( $con->connect_error ){
					throw new Exception("Error : Failed to connect to database");
				}
				else{
					
					try{
						$result = $con->query($cmd);
						if( !$result ){
							throw new Exception("Error : Unable to retrieve data from database");
						}
						else{
							$con->close();
							return true;
						}
					}
					catch(Exception $e){
						return false;
					}
				}
				
			}
			catch(Exception $e){
				return false;
			}
			
		}
		
	}

?>