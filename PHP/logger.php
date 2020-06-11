<?php 
	class admin{
		private $utility;
		public $password;
		public $username;

		public function __construct($psw, $uname){
    		$this->utility= new utility();
			$this->password=$psw;
			$this->username=$uname;
    	}

    	public function loginAdmin(){

    		$isCorrect=$this->utility->checkAdminPsw($this->password, $this->username);
    		if ($isCorrect){
    			return true;
    		}else{
    			return false;
    		}
    	}
	}
 ?>