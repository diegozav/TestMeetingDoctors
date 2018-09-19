<?php

namespace TestMeetingDoctors\Context\Client\Module\Client\Infrastructure;

use TestMeetingDoctors\Context\Client\Module\Client\Application\IClientRepositoryReader;
use Illuminate\Support\Collection;
use TestMeetingDoctors\Context\Client\Module\Client\Application\ClientFactory;
/**
 * Description of ClientRepositoryWebService
 *
 * @author diego
 */
class ClientRepositoryReaderWebService implements IClientRepositoryReader {
	
	
	
	public function getAll() {
		$wsUrl = "https://jsonplaceholder.typicode.com/users";
		$jsonContents = file_get_contents($wsUrl);
		$jsonArray = json_decode($jsonContents);
		
		$clientsCollection = new Collection;
		
		foreach ($jsonArray as $item){
			$clientsCollection->push(
					ClientFactory::create(
							intval($item->id), 
							$item->name, 
							$item->email, 
							$item->phone, 
							$item->company->name
					)
			);
		}
		
		//Los clientes no tienen email
		$xmlFile = storage_path("app/files/data.xml");
		$xmlContents = file_get_contents($xmlFile);
		$simpleXml = new \SimpleXMLElement($xmlContents);
		
		foreach ($simpleXml->reading as $item){
			$clientsCollection->push(
					ClientFactory::create(
							intval($item['clientID']), 
							$item['name'],
							'', 
							$item['phone'], 
							"{$item['company']}"
					)
			);
		}
		
		return $clientsCollection;
	}

}
