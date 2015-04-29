<?php

namespace Groups\Requests;

use ElggObject;

/**
 *
 */
class Request extends ElggObject {
	const SUBTYPE = 'group_request';

	/**
	 * Set subtype
	 */
	protected function initializeAttributes() {
		parent::initializeAttributes();

		$this->attributes['subtype'] = $this::SUBTYPE;
	}

	/**
	 * Return an URL for the request
	 *
	 * Requests do not have single views, so this will take user
	 * to the list of all pending requests.
	 *
	 * @return string
	 */
	public function getURL() {
		return 'groups/requests';
	}
}
