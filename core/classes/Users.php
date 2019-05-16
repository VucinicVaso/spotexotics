<?php 
class Users {

	protected $pdo;

	function __construct($pdo) 
	{
		$this->pdo = $pdo;
	}

	/* login user */
	public function login($email, $password)
	{
		$stmt = $this->pdo->prepare("SELECT * FROM users WHERE email = :email");
		$stmt->bindValue(":email", $email, PDO::PARAM_STR);
		$stmt->execute();
		$user = $stmt->fetch(PDO::FETCH_OBJ);
		if(!empty($user)){
			if(password_verify($password, $user->password)){
				$userdata = array(
					"id"            => $user->id,
					"firstname"     => $user->firstname, 
					"lastname"      => $user->lastname, 
					"username"      => $user->username,
					'email'         => $user->email,
					'admin'         => $user->admin
				);
				$_SESSION['userdata'] = $userdata;
				if($user->admin == 0){
					return header('Location: '.BASE_URL.'/index.php');
				}else if($user->admin == 1){
					return header('Location: '.BASE_URL.'/admin/index.php');
				}
			}else {
				return false;
			}
		}else {
			return false;
		}
	}

	/* check if user is loggedIn */
	public function loggedIn()
	{
		return (isset($_SESSION['userdata'])) ? true : false;
	}

	/* logout user */
	public function logout()
	{
		unset($_SESSION['userdata']);
		session_destroy();
		header('Location: '.BASE_URL.'/'.'index.php');
	}

	/* check if email exists */
	public function checkEmail($email)
	{
		$stmt = $this->pdo->prepare("SELECT email FROM users WHERE email = :email");
		$stmt->bindValue(":email", $email, PDO::PARAM_STR);
		$stmt->execute();
		$count = $stmt->rowCount();
		if($count > 0) {
			return true;
		}else {
			return false;
		}
	}	

	/* check if password exists */
	public function checkPassword($password_to_verify)
	{
		$stmt = $this->pdo->prepare("SELECT password FROM users");
		$stmt->execute();
		$passwords = $stmt->fetchAll(PDO::FETCH_OBJ);
		foreach ($passwords as $password) {
			while (password_verify($password_to_verify, $password->password)) {
				return true;
			}
		}
	}

	/* check if password exists */
	public function checkUsersPassword($email, $password_to_verify)
	{
		$stmt = $this->pdo->prepare("SELECT email, password FROM users WHERE email = :email");
		$stmt->bindValue(":email", $email, PDO::PARAM_STR);
		$stmt->execute();
		$user = $stmt->fetch(PDO::FETCH_OBJ);
		if(!empty($user)){
			if(password_verify($password_to_verify, $user->password)){
				return true;
			}else {
				return false;
			}
		}else {
			return false;
		}
	}

	/* check if user was born before */
	public function checkAge($year)
	{
		return ($year <= 2010) ? true : false;
	}


}
?>