<?php
namespace TestMeetingDoctors\Context\Client\Module\Client\Infrastructure;

use TestMeetingDoctors\Context\Client\Module\Client\Application\IClientRepositoryWriter;
use Illuminate\Support\Collection;
/**
 * Description of ClientCSVWriter
 *
 * @author diegofree
 */
class ClientRepositoryWriterCSV implements IClientRepositoryWriter {
	
	
	
	public function saveAll(Collection $clientsCollection) {
		$filePath = storage_path('app/public/downloads/exported_clients.csv');
		$file = fopen($filePath, 'w');
		$delimiter = ';';
		
		//Headers
		fputcsv($file, ['Nombre', 'Email', 'Teléfono', 'Empresa'], $delimiter);
		
		foreach ($clientsCollection->getIterator() as $client){
			fputcsv($file, [$client->name(), $client->email(), $client->phone(), $client->company()], $delimiter);
		}
		
		fclose($file);
	}

}
