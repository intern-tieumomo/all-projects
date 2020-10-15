<?php
	Class IndexController extends Controller{
		public function IndexAction(){
			$objModelCompany = new CompanyModel();
			$allCompany = $objModelCompany->getAllCompany();
			$this->view->allCompany = $allCompany;
		}

		public function LoginAction(){
			$objModelAccount = new AccountModel();
			
			if(isset($_COOKIE['cookie_id'])){
				$objModelAccount->cookie_id = $_COOKIE['cookie_id'];
				$res = $objModelAccount->loginByCookieId();
				if(is_a($res,'stdClass')){
					$_SESSION['email'] = $res->email;
					header("Location: ?controller=index");
				} else {
					$this->view->err = $res;
				}
			}

			if(!empty($_POST['login'])){
				$objModelAccount->email = $_POST['email'];
				$objModelAccount->password = $_POST['password'];
				$res = $objModelAccount->loginByEmailAndPassword();
				if(is_a($res,'stdClass')){
					$_SESSION['email'] = $res->email;
					if(!empty($_POST['remember-me'])){
						setcookie("email", $res->email, time() + 60*60*24*30);//30 days
						setcookie("cookie_id", $res->cookie_id, time() + 60*60*24*30);
					} else {
						if (isset($_COOKIE['email'])) {
		          setcookie("email", "");
		        }
		        if (isset($_COOKIE['cookie_id'])) {
		          setcookie("cookie_id", "");
		        }
					}
					header("Location: ?controller=index");
				} else {
					$this->view->err = $res;
				}
			}
		}

		public function LogoutAction(){
			session_destroy();
			setcookie("cookie_id", "");
			header("Location: ?action=login");
			exit;
		}

		public function CreateCompanyAction(){
			$objModelCompany = new CompanyModel();
			if(isset($_POST['company']) && isset($_POST['contact']) && isset($_POST['country'])){
				//preg_match("/[^A-Za-z'-]/",$_POST['name'] )
				if(trim($_POST['company']) == "" || trim($_POST['contact']) == "" || trim($_POST['country']) == "")
					$this->view->createCompany = "fail";
				else {
					$objModelCompany->company = trim($_POST['company']);
					$objModelCompany->contact = trim($_POST['contact']);
					$objModelCompany->country = trim($_POST['country']);
					$res = $objModelCompany->createCompany();
					$this->view->createCompany = $res;
				}
			}
		}

		public function DeleteCompanyAction(){
			$objModelCompany = new CompanyModel();
			if(isset($_POST['id'])){
				$objModelCompany->id = $_POST['id'];
				$res = $objModelCompany->deleteCompany();
				$this->view->deleteCompany = $res;
			}
		}

		public function UpdateCompanyAction(){
			$objModelCompany = new CompanyModel();
			if(isset($_POST['company']) && isset($_POST['contact']) && isset($_POST['country']) && isset($_POST['id'])){
				if(trim($_POST['company']) == "" || trim($_POST['contact']) == "" || trim($_POST['country']) == "")
					$this->view->updateCompany = "fail";
				else {
					$objModelCompany->company = $_POST['company'];
					$objModelCompany->contact = $_POST['contact'];
					$objModelCompany->country = $_POST['country'];
					$objModelCompany->id = $_POST['id'];
					$res = $objModelCompany->updateCompany();
					$this->view->updateCompany = $res;
				}
			}
		}
	}
?>