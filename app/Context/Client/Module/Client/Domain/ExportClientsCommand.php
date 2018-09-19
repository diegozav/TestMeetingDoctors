<?php

namespace TestMeetingDoctors\Context\Client\Module\Client\Domain;


use TestMeetingDoctors\Shared\Domain\Bus\Command\Command;
/**
 * Description of ExportClientsCommand
 *
 * @author diego
 */
class ExportClientsCommand extends Command {
	
	private $format;
	
	function __construct($format = 'csv') {
		$this->format = $format;
	}

	public function format(){
		return $this->format;
	}
	
}
