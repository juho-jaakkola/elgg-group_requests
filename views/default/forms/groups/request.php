<?php

$form_info = elgg_echo('group_requests:info');

$title_label = elgg_echo('group_requests:title');
$title_input = elgg_view('input/text', array(
	'name' => 'title',
));

$desc_label = elgg_echo('group_requests:description');
$desc_input = elgg_view('input/longtext', array(
	'name' => 'description',
));

$user_guid_input = elgg_view('input/hidden', array(
	'name' => 'user_guid',
	'value' => $vars['user_guid'],
));

$submit_input = elgg_view('input/submit', array(
	'value' => elgg_echo('request'),
));


echo <<<HTML
	<p>$form_info</p>
	<div>
		<label>$title_label</label>
		$title_input
	</div>
	<div>
		<label>$desc_label</label>
		$desc_input
	</div>
	<div>
		$user_guid_input
		$submit_input
	</div>
HTML;
