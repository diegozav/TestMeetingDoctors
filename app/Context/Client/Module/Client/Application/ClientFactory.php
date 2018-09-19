<?php

namespace TestMeetingDoctors\Context\Client\Module\Client\Application;

use TestMeetingDoctors\Context\Client\Module\Client\Domain\Client;
/**
 * Description of ClientFactory
 *
 * @author diego
 */
class ClientFactory {
	
	
	/**
	 * 
	 * @param int $id
	 * @param string $name
	 * @param string $email
	 * @param string $phone
	 * @param string $company
	 * @return Client
	 */
	public static function create($id, $name, $email, $phone, $company){
		return new Client($id, $name, $email, $phone, $company);
	}
	
	
}
