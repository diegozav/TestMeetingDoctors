<?php

namespace TestMeetingDoctors\Context\Client\Module\Client\Application;

use Illuminate\Support\Collection;

/**
 *
 * @author diego
 */
interface IClientRepositoryWriter {
	
	/**
	 * @param Collection $clientsCollection
	 */
	public function saveAll(Collection $clientsCollection);
	
	
}
