<?php
	Class AccountModel extends Model{
		public $id;
		public $email;
		public $password;
		public $cookie_id;
		public $created_at;
		public $updated_at;

		public $tb_name = "tb_account";

		public function loginByEmailAndPassword(){
			$isAuth = false;
			$email = mysqli_real_escape_string($this->getConn(), $this->email);
			$password = mysqli_real_escape_string($this->getConn(), $this->password);

			$sql = "select * from tb_account where email = '".$email."' and password = '".md5($password)."'";
			$result = mysqli_query($this->getConn(), $sql);

			if(mysqli_errno($this->getConn())!=0)
        // return "Failed: ". mysqli_error($this->getConn());
        return "Failed. Try again later!";

			if(mysqli_num_rows($result) > 0){
				$isAuth = true;
			}

			if($isAuth){
				$row = mysqli_fetch_assoc($result);
				$obj = new stdClass();
        foreach($row as $field=>$value){
          $obj->$field = $value;
        }
        return $obj;
			} else {
				return "Email or password is incorrect";
			}
		}

		public function loginByCookieId(){
			$isAuth = false;

			$sql = "select * from tb_account where cookie_id = '$this->cookie_id'";
			$result = mysqli_query($this->getConn(), $sql);

			if(mysqli_errno($this->getConn())!=0)
          return "Failed: ". mysqli_error($this->getConn());

			if(mysqli_num_rows($result) > 0){
				$isAuth = true;
			}

			if($isAuth){
				$row = mysqli_fetch_assoc($result);
				$obj = new stdClass();
        foreach($row as $field=>$value){
          $obj->$field = $value;
        }
        return $obj;
			} else {
				return "Cookie expried";
			}
		}
	}
?>