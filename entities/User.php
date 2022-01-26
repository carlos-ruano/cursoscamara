<?php
class User {
    protected $id;
    protected $name;
	protected $email;
    protected $password;
    protected $role;

    function __construct(array $data) {
        if (isset($data["id"]))
            $this->id = $data["id"];
        $this->name = $data["name"];
        $this->email = $data["email"];
        $this->password = $data["password"];
        if (isset($data["role"]))
            $this->role = $data["role"];
    }

    function encriptarPassword(){
        $this->password = password_hash($this->password,PASSWORD_DEFAULT);
    }

	public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getName(){
		return $this->name;
	}

	public function setName($name){
		$this->name = $name;
	}
	public function getEmail(){
		return $this->email;
	}

	public function setEmail($email){
		$this->email = $email;
	}

	public function getPassword(){
		return $this->password;
	}

	public function setPassword($password){
		$this->password = $password;
	}

	public function getRole(){
		return $this->role;
	}

	public function setRole($role){
		$this->role = $role;
	}
}
