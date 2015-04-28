<?php
/**
 * View for group_request objects
 */

$request = elgg_extract('entity', $vars, FALSE);

$owner = $request->getOwnerEntity();
$owner_icon = elgg_view_entity_icon($owner, 'tiny');
$owner_link = elgg_view('output/url', array(
	'href' => $owner->getURL(),
	'text' => $owner->name,
	'is_trusted' => true,
));
$author_text = elgg_echo('byline', array($owner_link));
$date = elgg_view_friendly_time($request->time_created);

$metadata = elgg_view_menu('entity', array(
	'entity' => $vars['entity'],
	'handler' => 'group_request',
	'sort_by' => 'priority',
	'class' => 'elgg-menu-hz',
));

$subtitle = "$author_text $date";

$params = array(
	'entity' => $request,
	'metadata' => $metadata,
	'subtitle' => $subtitle,
	'content' => $request->description,
);
$params = $params + $vars;
$list_body = elgg_view('object/elements/summary', $params);

echo elgg_view_image_block($owner_icon, $list_body);

