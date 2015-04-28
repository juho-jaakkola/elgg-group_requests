<?php

namespace Groups\Requests;

use ElggMenuItem;

/**
 * Class for modifying the entity menu
 */
class EntityMenu {

	/**
	 * Add entity menu links for approving/denying a group request
	 *
	 * @param string $hook   'register'
	 * @param string $type   'menu:entity'
	 * @param array  $menu   Array of ElggMenuItem objects
	 * @param array  $params Hook parameters
	 * @return array $menu Array of ElggMenuItem objects
	 */
	public static function register($hook, $type, $menu, $params) {
		$request = $params['entity'];

		if (!$request instanceof Request) {
			return $menu;
		}

		// Instantiate empty array to remove the default menu items
		$menu = array();

		// Button to approve the request
		$menu[] = ElggMenuItem::factory(array(
			'name' => 'group_request_approve',
			'text' => elgg_echo('group_requests:request:approve'),
			'href' => "action/groups/process_request?action=approve&guid={$request->guid}",
			'is_action' => true,
			'link_class' => 'elgg-button elgg-button-action',
		));

		// Button to deny the request
		$menu[] = ElggMenuItem::factory(array(
			'name' => 'group_request_deny',
			'text' => elgg_echo('group_requests:request:deny'),
			'href' => "action/groups/process_request?action=deny&guid={$request->guid}",
			'is_action' => true,
			'link_class' => 'elgg-button elgg-button-delete',
		));

		return $menu;
	}
}
