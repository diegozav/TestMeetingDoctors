<?php
namespace TestMeetingDoctors\Shared\Domain\Bus\Command;


/**
 * Description of SynchronousCommandBus
 *
 * @author diego
 */
class SynchronousCommandBus {
  
  public $handlers = [];
  
  public function register($commandClass, $commandHandler){
	$this->handlers[$commandClass] = $commandHandler;
    return $this;
  }
  
  
  public function execute(Command $command){
	$commandName = get_class($command);
    // We'll need to check if the Command that's given
    // is actually registered to be handled here.
    if (!array_key_exists($commandName, $this->handlers)) {
      throw new \Exception(sprintf("%s is not supported by the SynchronousCommandBus.", $commandName));
    }

    return $this->handlers[$commandName]->handle($command);
  }
  
  
}
