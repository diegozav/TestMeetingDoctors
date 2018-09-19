<?php
namespace TestMeetingDoctors\Context\Client\Module\Client\Domain;

use TestMeetingDoctors\Shared\Domain\Exception\EmailNotValidException;
use TestMeetingDoctors\Shared\Domain\Exception\NumberFormatException;
use TestMeetingDoctors\Shared\Domain\Exception\StringFormatException;
/**
 * Description of Client
 * @author diegofree
 */
class Client {
	
	private $id;
	private $name;
	private $email;
	private $phone;
	private $company;
	
	/**
	 * 
	 * @param int $id
	 * @param string $name
	 * @param string $email
	 * @param string $phone
	 * @param string $company
	 */
	function __construct($id, $name, $email, $phone, $company) {
		$this->setId($id);
		$this->name = $name;
		$this->setEmail($email);
		$this->phone = $phone;
		$this->setCompany($company);
	}
	
	public function setId($id) {
		if (!is_int($id))
			throw new NumberFormatException ('Identifier must be a number: %s', $id);
		$this->id = $id;
	}

	public function setEmail($email){
		if ($email){
			if (!filter_var($email, FILTER_VALIDATE_EMAIL))
				throw new EmailNotValidException(sprintf('Incorrect email format: %s', $email));
		}
		$this->email = $email;
	}
	
	public function setCompany($company) {
		if (!is_string($company)){
			dump($company);
			throw new StringFormatException('Company must be a string');
		}
		$this->company = $company;
	}
	
	public function id(){
		return $this->id;
	}
	
	public function name(){
		return $this->name;
	}
	
	public function email(){
		return $this->email;
	}
	
	public function phone(){
		return $this->phone;
	}
	
	public function company(){
		return $this->company;
	}


}
