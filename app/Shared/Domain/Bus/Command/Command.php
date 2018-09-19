<?php

namespace TestMeetingDoctors\Shared\Domain\Bus\Command;

/**
 * Description of Command
 *
 * @author diego
 */
abstract class Command implements ICommand {
  
  
	public function messageType() {
	  return 'command';
	}
  
  
}
