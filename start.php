<?php

elgg_register_event_handler('init', 'system', 'group_requests_init');

/**
 * Initialize the plugin
 */
function group_requests_init() {
	$actions_path = elgg_get_plugins_path() . 'group_requests/actions/group_requests';
	elgg_register_action('groups/request', "{$actions_path}/request.php");
	elgg_register_action('groups/process_request', "{$actions_path}/process.php", 'admin');

	elgg_register_page_handler('group_requests', 'group_requests_page_handler');
	elgg_register_page_handler('groups', 'group_requests_add_to_page_menu');

	elgg_register_plugin_hook_handler('register', 'menu:page', '\Groups\Requests\PageMenu::register');
	elgg_register_plugin_hook_handler('register', 'menu:entity', '\Groups\Requests\EntityMenu::register');
}

/**
 * Serve pages related to group requests
 *
 * @param array $page The URL segments
 */
function group_requests_page_handler($page) {
	if (!isset($page[0])) {
		$page[0] = 'add';
	}

	$params = array('filter' => false);

	switch ($page[0]) {
		case 'all':
			admin_gatekeeper();

			$requests = elgg_list_entities(array(
				'type' => 'object',
				'subtype' => \Groups\Requests\Request::SUBTYPE,
				'no_results' => elgg_echo('group_requests:none'),
			));

			$params['title'] = elgg_echo('group_requests:requests');
			$params['content'] = $requests;
			break;
		case 'add':
		default:
			gatekeeper();
			$params['title'] = elgg_echo('group_requests:request');
			$params['content'] = elgg_view_form('groups/request',
				array(),
				array('user_guid' => elgg_get_logged_in_user_guid())
			);
			break;

	}

	$body = elgg_view_layout('content', $params);

	echo elgg_view_page($title, $body);
}

/**
 * Adds the group requesting link to title menu
 *
 * @param array $page
 */
function group_requests_add_to_page_menu($page) {
	if (!isset($page[0])) {
		$page[0] = 'all';
	}

	// This way of adding the title menu item is a bit hacky but it makes
	// sure that the item is not visible e.g. when creating a new group
	if (in_array($page[0], array('all', 'member', 'owner'))) {
		if (elgg_is_logged_in()) {
			elgg_register_menu_item('title', array(
				'name' => 'group_requests',
				'text' => elgg_echo('group_requests:request'),
				'href' => 'group_requests/add',
				'link_class' => 'elgg-button elgg-button-action',
			));
		}
	}

	groups_page_handler($page);
}
