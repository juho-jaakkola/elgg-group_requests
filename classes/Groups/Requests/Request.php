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
}
