<?php

namespace TestMeetingDoctors\Shared\Domain\Bus\Command;

use TestMeetingDoctors\Shared\Domain\Bus\Command\ICommand;

/**
 *
 * @author diego
 */
interface ICommandHandler {
	
	/**
	 * @param ICommand $command
	 */
	public function handle(ICommand $command);
	
}