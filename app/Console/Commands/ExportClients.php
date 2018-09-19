<?php

namespace TestMeetingDoctors\Console\Commands;

use Illuminate\Console\Command;

use TestMeetingDoctors\Shared\Domain\Bus\Command\SynchronousCommandBus;
use TestMeetingDoctors\Context\Client\Module\Client\Domain\ExportClientsCommand;
use TestMeetingDoctors\Context\Client\Module\Client\Application\ExportClientsCommandHandler;
use TestMeetingDoctors\Context\Client\Module\Client\Infrastructure\ClientRepositoryReaderWebService;
use TestMeetingDoctors\Context\Client\Module\Client\Infrastructure\ClientRepositoryWriterCSV;

class ExportClients extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:ExportClients';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
		$this->line("");
		$this->line("*******************************************************************************");
		$this->line("/");
		$this->line("/    Exporta base de datos de clientes a archivo: " . date('d-m-Y H:i:s') . "");
		$this->line("/");
		$this->line("*******************************************************************************");
		$this->line("");

		$this->line("APP_ENVIRONMENT: " . env('APP_ENV'));
		$this->line("BASE_URL: " . url(''));
		$this->line("DB_HOST: " . env('DB_HOST'));
		$this->line("DB_DATABASE: " . env('DB_DATABASE'));
		$this->line("");
		$this->line("");
		
		
		try {
		
			$commandBus = new SynchronousCommandBus;
			$command = new ExportClientsCommand;
			$commandHandler = new ExportClientsCommandHandler(
					new ClientRepositoryReaderWebService,
					new ClientRepositoryWriterCSV
					);
			
			$commandBus->register(get_class($command), $commandHandler);
			$commandBus->execute($command);
			
			$this->comment('Clientes Exportados correctamente!');
			
		} catch (\Exception $ex) {
			$this->error("Ha ocurrido un error: ". $ex->getMessage());
		}
		
		$this->line("");
		$this->line("\nProceso finalizado");
		$this->line("End Time: " . date('d-m-Y H:i:s') . "\n");
		$this->line("*******************************************************************************\n");
    }
}
