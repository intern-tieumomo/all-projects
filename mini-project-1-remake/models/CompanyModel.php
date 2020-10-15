<?php
	Class CompanyModel extends Model{
		public $id;
		public $company;
		public $contact;
		public $country;
		public $created_at;
		public $updated_at;

		public $tb_name = "tb_company";

		public function getAllCompany(){
			$sql = "select * from $this->tb_name";
			$res = mysqli_query($this->getConn(), $sql);

			if(mysqli_errno($this->getConn())!=0)
        return "Failed: ". mysqli_error($this->getConn());

      $dataRes = array();
      while ($row = mysqli_fetch_assoc($res)) {
      	$obj = new stdClass();
      	foreach ($row as $field_name => $value) {
      		$obj->$field_name = $value;
      	}
      	$dataRes[] = $obj;
      }
      mysqli_free_result($res);
      return $dataRes;
		}

		public function createCompany(){
			$company = mysqli_real_escape_string($this->getConn(), $this->company);
			$contact = mysqli_real_escape_string($this->getConn(), $this->contact);
			$country = mysqli_real_escape_string($this->getConn(), $this->country);
			$sql = "insert into $this->tb_name(company, contact, country, created_at, updated_at) values('$company', '$contact', '$country', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)";
			$res = mysqli_query($this->getConn(), $sql);

			if(mysqli_errno($this->getConn())!=0)
        return "Failed: ". mysqli_error($this->getConn());

      $new_id = mysqli_insert_id($this->getConn());
	    return $new_id;
		}

		public function deleteCompany(){
			$id = mysqli_real_escape_string($this->getConn(), $this->id);
			$sql = "delete from $this->tb_name where id = $id";
			$res = mysqli_query($this->getConn(), $sql);

			if(mysqli_errno($this->getConn())!=0)
        return "Failed: ". mysqli_error($this->getConn());

      return $id;
		}

		public function updateCompany(){
			$company = mysqli_real_escape_string($this->getConn(), $this->company);
			$contact = mysqli_real_escape_string($this->getConn(), $this->contact);
			$country = mysqli_real_escape_string($this->getConn(), $this->country);
			$id = mysqli_real_escape_string($this->getConn(), $this->id);
			$sql = "update $this->tb_name set company = '$company', contact = '$contact', country = '$country', updated_at = CURRENT_TIMESTAMP where id = '$id'";
			$res = mysqli_query($this->getConn(), $sql);

			if(mysqli_errno($this->getConn())!=0)
        return "Failed: ". mysqli_error($this->getConn());

      return $id;
		}
	}
?>