<?php

$action = get_input('action');
$guid = get_input('guid');

$request = get_entity($guid);

if (!$request instanceof \Groups\Requests\Request) {
	register_error(elgg_echo('group_requests:not_found'));
	forward(REFERER);
}

$user = $request->getOwnerEntity();

if ($action == 'deny') {
	$subject = elgg_echo('group_requests:denied:title', array(), $user->language);
	$body = elgg_echo('group_requests:denied:body',
		array(
			$user->name,
			$request->title,
		),
		$user->language
	);
	notify_user($request->owner_guid, elgg_get_site_entity()->guid, $subject, $body);

	$request->delete();

	system_message(elgg_echo('group_requests:deny:success'));

	forward(REFERER);
}

$group = new ElggGroup;
$group->owner_guid = $request->owner_guid;
$group->container_guid = $request->container_guid;
$group->name = $request->title;
$group->access_id = ACCESS_PUBLIC;

if ($group->save()) {
	// Besides being owner, user also needs to be a member
	$group->join($user);

	$subject = elgg_echo('group_requests:approved:title', array(), $user->language);
	$body = elgg_echo('group_requests:approved:body',
		array(
			$user->name,
			$group->name,
			elgg_normalize_url("groups/edit/{$group->guid}"),
		),
		$user->language
	);

	$params = array(
		'action' => 'create',
		'object' => $group,
	);

	notify_user($user->guid, elgg_get_site_entity()->guid, $subject, $body, $params);

	$request->delete();

	system_message(elgg_echo('group_requests:approve:success'));
} else {
	register_error(elgg_echo('group_requests:approve:error'));
}

forward(REFERER);
