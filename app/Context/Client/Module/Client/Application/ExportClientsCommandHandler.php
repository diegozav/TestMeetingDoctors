<?php

namespace TestMeetingDoctors\Context\Client\Module\Client\Application;

use TestMeetingDoctors\Shared\Domain\Bus\Command\ICommandHandler;
use TestMeetingDoctors\Shared\Domain\Bus\Command\ICommand;
use TestMeetingDoctors\Context\Client\Module\Client\Application\IClientRepositoryReader;
use TestMeetingDoctors\Context\Client\Module\Client\Application\IClientRepositoryWriter;
/**
 * Description of ExportClientsCommandHandler
 *
 * @author diego
 */
class ExportClientsCommandHandler implements ICommandHandler {
	
	/** @var IClientRepositoryReader */
	private $clientRepositoryReader;
	
	/** @var IClientRepositoryWriter */
	private $clientRepositoryWriter;
	
	
	/**
	 * 
	 * @param IClientRepositoryReader $clientRepositoryReader
	 * @param IClientRepositoryWriter $clientRepositoryWriter
	 */
	function __construct(
			IClientRepositoryReader $clientRepositoryReader, 
			IClientRepositoryWriter $clientRepositoryWriter
			) {
		$this->clientRepositoryReader = $clientRepositoryReader;
		$this->clientRepositoryWriter = $clientRepositoryWriter;
	}

		
	public function handle(ICommand $command) {
		$clientsCollection = $this->clientRepositoryReader->getAll();
		$this->clientRepositoryWriter->saveAll($clientsCollection);
	}

}
