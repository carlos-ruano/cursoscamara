<?php
class Course {

	protected $id;
	protected $name;
	protected $start_date;
	protected $end_date;
	protected $duration;
	protected $place;
	protected $schedule;
	protected $contact_email;
	protected $contact_telephone;
	protected $description;
	protected $web_link;
	protected $pdf_link;
	protected $image_link;
	protected $status;


	function __construct(array $data) {
		if (isset($data["id"]))
			$this->id = $data["id"];
		$this->name = $data["name"];
		if (isset($data["start_date"]))
			$this->start_date = $data["start_date"];
		if (isset($data["end_date"]))
			$this->end_date = $data["end_date"];
		if (isset($data["duration"]))
			$this->duration = $data["duration"];
		if (isset($data["place"]))
			$this->place = $data["place"];
		if (isset($data["schedule"]))
			$this->schedule = $data["schedule"];
		if (isset($data["contact_email"]))
			$this->contact_email = $data["contact_email"];
		if (isset($data["contact_telephone"]))
			$this->contact_telephone = $data["contact_telephone"];
		if (isset($data["description"]))
			$this->description = $data["description"];
		if (isset($data["web_link"]))
			$this->web_link = $data["web_link"];
		if (isset($data["pdf_link"]))
			$this->pdf_link = $data["pdf_link"];
		if (isset($data["image_link"]))
			$this->image_link = $data["image_link"];
		if (isset($data["status"]))
			$this->status = $data["status"];
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

	public function getStart_date(){
		return $this->start_date;
	}

	public function setStart_date($start_date){
		$this->start_date = $start_date;
	}

	public function getEnd_date(){
		return $this->end_date;
	}

	public function setEnd_date($end_date){
		$this->end_date = $end_date;
	}

	public function getDuration(){
		return $this->duration;
	}

	public function setDuration($duration){
		$this->duration = $duration;
	}

	public function getPlace(){
		return $this->place;
	}

	public function setPlace($place){
		$this->place = $place;
	}

	public function getSchedule(){
		return $this->schedule;
	}

	public function setSchedule($schedule){
		$this->schedule = $schedule;
	}

	public function getContact_email(){
		return $this->contact_email;
	}

	public function setContact_email($contact_email){
		$this->contact_email = $contact_email;
	}

	public function getContact_telephone(){
		return $this->contact_telephone;
	}

	public function setContact_telephone($contact_telephone){
		$this->contact_telephone = $contact_telephone;
	}

	public function getDescription(){
		return $this->description;
	}

	public function setDescription($description){
		$this->description = $description;
	}

	public function getWeb_link(){
		return $this->web_link;
	}

	public function setWeb_link($web_link){
		$this->web_link = $web_link;
	}

	public function getPdf_link(){
		return $this->pdf_link;
	}

	public function setPdf_link($pdf_link){
		$this->pdf_link = $pdf_link;
	}

	public function getImage_link(){
		return $this->image_link;
	}

	public function setImage_link($image_link){
		$this->image_link = $image_link;
	}

	public function getStatus(){
		return $this->status;
	}

	public function setStatus($status){
		$this->status = $status;
	}
}
