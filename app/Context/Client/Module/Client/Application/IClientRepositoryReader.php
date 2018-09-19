<?php

namespace TestMeetingDoctors\Context\Client\Module\Client\Application;

use Illuminate\Support\Collection;
/**
 *
 * @author diego
 */
interface IClientRepositoryReader {
	
	/**
	 * Devuelve una colección de Clientes (Client)
	 * @return Collection Description
	 */
	public function getAll();
	
}
