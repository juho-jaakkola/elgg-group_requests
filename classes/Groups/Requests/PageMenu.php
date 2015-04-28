<?php

namespace Groups\Requests;

use ElggMenuItem;

/**
 * Class for modifying the page menu
 */
class PageMenu {

	/**
	 * Add page menu link for listing qroup requests
	 *
	 * @param string $hook   'register'
	 * @param string $type   'menu:page'
	 * @param array  $menu   Array of ElggMenuItem objects
	 * @param array  $params Hook parameters
	 * @return array $menu Array of ElggMenuItem objects
	 */
	public static function register($hook, $type, $menu, $params) {
		if (!elgg_in_context('groups')) {
			return $menu;
		}

		if (!elgg_is_admin_logged_in()) {
			return $menu;
		}

		$menu[] = ElggMenuItem::factory(array(
			'name' => 'group_requests',
			'text' => elgg_echo('group_requests:requests'),
			'href' => 'groups/requests',
		));

		return $menu;
	}
}
