<?php
class Vehicle {
	protected $licensePlateNumber;
	protected $numWheels;

	public function __construct(string $newLicensePlateNumber, int $newNumWheels) {
		try {
			$this->setLicensePlateNumber($newLicensePlateNumber);
			$this->setNumWheels($newNumWheels);
		} catch(Exception $exception) {
			throw(new Exception($exception->getMessage(), 0, $exception));
		}
	}

	public function getLicensePlateNumber() {
		return($this->licensePlateNumber);
	}

	public function setLicensePlateNumber(string $newLicensePlateNumber) {
		$newLicensePlateNumber = trim(strtoupper($newLicensePlateNumber));
		if(preg_match("/^[\dA-Z]{1,7}$/", $newLicensePlateNumber) !== 1) {
			throw(new InvalidArgumentException("invalid license plate number"));
		}
		$this->licensePlateNumber = $newLicensePlateNumber;
	}

	public function getNumWheels() {
		return($this->numWheels);
	}

	public function setNumWheels(int $newNumWheels) {
		if($newNumWheels <= 0) {
			throw(new RangeException("number of wheels must be positive"));
		}
		$this->numWheels = $newNumWheels;
	}
}

class Car extends Vehicle {
	protected $make;
	protected $model;


	public function __construct(string $newLicensePlateNumber, string $newMake, string $newModel, int $newNumWheels) {
		try {
			parent::__construct($newLicensePlateNumber, $newNumWheels);
			$this->setMake($newMake);
			$this->setModel($newModel);
		} catch(Exception $exception) {
			throw(new Exception($exception->getMessage(), 0, $exception));
		}
	}

	public function getMake() {
		return($this->make);
	}

	public function setMake(string $newMake) {
		$newMake = filter_var($newMake, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		if(empty($newMake) === true) {
			throw(new InvalidArgumentException("model is empty or insecure"));
		}
		$this->make = $newMake;
	}

	public function getModel() {
		return($this->model);
	}

	public function setModel(string $newModel) {
		$newMake = filter_var($newModel, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		if(empty($newModel) === true) {
			throw(new InvalidArgumentException("make is empty or insecure"));
		}
		$this->model = $newModel;
	}
}

try {
	// this will succeed since the car is properly constructed
	$car = new Car("ABC123", "Honda", "Civic", 4);
	throw(new RuntimeException("debug tactic"));
} catch(Exception $exception) {
	// this will always happen since the exception is universally thrown
	echo "Exception: " . $exception->getMessage() . PHP_EOL;
	echo $exception->getTraceAsString() . PHP_EOL;
	var_dump($car);
}
