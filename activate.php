<?php

// Register a class for the object/group_request subtype
if (get_subtype_id('object', 'group_request')) {
	update_subtype('object', 'group_request', '\Groups\Requests\Request');
} else {
	add_subtype('object', 'group_request', '\Groups\Requests\Request');
}

$limited_groups = elgg_get_plugin_setting('limited_groups', 'groups');

// Notify admin if group creation has not been restricted to admins
if ($limited_groups !== 'yes') {
	$group_settings = elgg_view('output/url', array(
		'text' => elgg_echo('group_requests:limited_groups:enable'),
		'href' => 'admin/plugin_settings/groups',
	));

	elgg_add_admin_notice('limited_groups_disabled',
		elgg_echo('group_requests:limited_groups:disabled',
		array($group_settings)
	));
}
