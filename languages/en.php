<?php

return array(
	'group_requests:request' => 'Request a new group',
	'group_requests:requests' => 'Group requests',
	'group_requests:title' => 'Enter a name for the group',
	'group_requests:description' => 'Tell a bit about yourself and what would the group be used for',
	'group_requests:info' => '',
	'group_requests:request:success' => 'Request has been saved. You will receive a notification when your request gets processed.',
	'group_requests:request:error' => 'An error occurred while saving the requests. Try again.',

	// Admin actions
	'group_requests:none' => 'There are no pending requests',
	'group_requests:request:approve' => 'Approve',
	'group_requests:request:deny' => 'Deny',
	'group_requests:not_found' => 'The request was not found',
	'group_requests:approve:success' => 'The request was approved',
	'group_requests:approve:error' => 'An error occurred while trying to approve the request',
	'group_requests:deny:success' => 'The request was denied',

	// User notifications
	'group_requests:approved:title' => 'Your group request has been approved',
	'group_requests:approved:body' => 'Hi %s

Your request for the group "%s" has been approved.

Fill in the group details and settings here:
%s
',
	'group_requests:denied:title' => 'Your group request has been denied',
	'group_requests:denied:body' => 'Hi %s

Unfortunately your request for the group "%s" has been denied.
',

	// Admin notifications
	'group_requests:notification:title' => 'Pending group request',
	'group_requests:notification:body' => '%s has requested a group named "%s".

See all pending group requests here:
%s
',

	// Admin panel
	'group_requests:limited_groups:disabled' => 'You are using the <i>Group requests</i> plugin, so may want
to restrict the ability to greate groups only to administrators. %s',
	'group_requests:limited_groups:enable' => 'You can do it here',
	'item:object:group_request' => 'Group requests',
);
