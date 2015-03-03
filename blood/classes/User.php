<?php
abstract class User{
	public $name = null;
	
	public function setName($name) {
		$this->name = $name;
		return $this;
	}
	
	public function getName() {
		return $this->name;
	}
}

class Donor extends User {
	public $blood_group = null;

	public function setBloodGroup($blood_group) {
		$this->blood_group = $blood_group;
		return $this;
	}
	
	public function getBloodGroup() {
		return $this->blood_group;
	}
}

class Seeker extends User {
	public $blood_group = null;

	public function setBloodGroup($blood_group) {
		$this->blood_group = $blood_group;
		return $this;
	}
	
	public function getBloodGroup() {
		return $this->blood_group;
	}
}

$obj = new Donor();
$obj->setName('Arif');
echo $obj->getName();
	

?>