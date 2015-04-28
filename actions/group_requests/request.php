<?php

$user_guid = get_input('user_guid');
$title = get_input('title');
$description = get_input('description');

$user = get_user($user_guid);

$request = new \Groups\Requests\Request;

$request->owner_guid = $user_guid;
$request->container_guid = $user_guid;
$request->title = $title;
$request->description = $description;
$request->access_id = ACCESS_PRIVATE;

if ($request->save()) {
	$admins = elgg_get_admins();

	$url = elgg_normalize_url('groups/requests');

	$subject = elgg_echo('group_requests:notification:title', array(), $admin->language);
	$message = elgg_echo('group_requests:notification:body',
		array(
			$user->name,
			$title,
			$url,
		),
		$admin->language
	);

	// Notify administrators
	foreach ($admins as $admin) {
		notify_user($admin->guid, $user->guid, $subject, $message);
	}

	system_message(elgg_echo('group_requests:request:success'));
	forward('groups');
} else {
	register_error(elgg_echo('group_requests:request:error'));
	forward(REFERER);
}
