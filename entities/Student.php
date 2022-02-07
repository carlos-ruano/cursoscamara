<?php
class Student {
	protected $id;
	protected $name;
	protected $surname;
	protected $dni;
	protected $telephone;
	protected $garantia;
	protected $pice;
	protected $orientation;
	protected $observations;


	function __construct(array $data) {
		if (isset($data["id"]))
			$this->id = $data["id"];
		$this->name = $data["name"];
		$this->surname = $data["surname"];
		if (isset($data["dni"]))
			$this->dni = $data["dni"];
		if (isset($data["telephone"]))
			$this->telephone = $data["telephone"];
		if (isset($data["garantia"]))
			$this->garantia = $data["garantia"];
		if (isset($data["pice"]))
			$this->pice = $data["pice"];
		if (isset($data["orientation"]))
			$this->orientation = $data["orientation"];
		if (isset($data["observations"]))
			$this->observations = $data["observations"];
	}

	function encriptarPassword() {
		$this->password = password_hash($this->password, PASSWORD_DEFAULT);
	}

	public function getId() {
		return $this->id;
	}

	public function setId($id) {
		$this->id = $id;
	}

	public function getName() {
		return $this->name;
	}

	public function setName($name) {
		$this->name = $name;
	}
	
	public function getSurname(){
		return $this->surname;
	}

	public function setSurname($surname){
		$this->surname = $surname;
	}

	public function getDni(){
		return $this->dni;
	}

	public function setDni($dni){
		$this->dni = $dni;
	}

	public function getTelephone(){
		return $this->telephone;
	}

	public function setTelephone($telephone){
		$this->telephone = $telephone;
	}

	public function getGarantia(){
		return $this->garantia;
	}

	public function setGarantia($garantia){
		$this->garantia = $garantia;
	}

	public function getPice(){
		return $this->pice;
	}

	public function setPice($pice){
		$this->pice = $pice;
	}

	public function getOrientation(){
		return $this->orientation;
	}

	public function setOrientation($orientation){
		$this->orientation = $orientation;
	}

	public function getObservations(){
		return $this->observations;
	}

	public function setObservations($observations){
		$this->observations = $observations;
	}

	
}
