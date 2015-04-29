<?php

return array(
	'group_requests:request' => 'Ano omaa ryhmää',
	'group_requests:requests' => 'Ryhmäanomukset',
	'group_requests:title' => 'Syötä ryhmälle nimi',
	'group_requests:description' => 'Kerro kuka olet, ja mihin käyttäisit ryhmää',
	'group_requests:info' => '',
	'group_requests:request:success' => 'Anomus tallennettu. Saat ilmoituksen, kun se on käsitelty.',
	'group_requests:request:error' => 'Anomuksen tallentaminen epäonnistui. Yritä uudelleen.',

	// Admin actions
	'group_requests:none' => 'Ei odottavia anomuksia',
	'group_requests:request:approve' => 'Hyväksy',
	'group_requests:request:deny' => 'Hylkää',
	'group_requests:not_found' => 'Anomusta ei löytynyt',
	'group_requests:approve:success' => 'Anomus hyväksytty',
	'group_requests:approve:error' => 'Anomuksen hyväksyminen epäonnistui',
	'group_requests:deny:success' => 'Anomus hylätty',

	// User notifications
	'group_requests:approved:title' => 'Ryhmäanomuksesi on hyväksytty',
	'group_requests:approved:body' => 'Hei %s

Anomuksesi ryhmästä "%s" on hyväksytty.

Voit täyttää ryhmän tiedot ja asetukset täällä:
%s
',
	'group_requests:denied:title' => 'Ryhmäanomuksesi on hylätty',
	'group_requests:denied:body' => 'Hei %s

Valitettavasti anomuksesi ryhmästä "%s" on hylätty.
',

	// Admin notifications
	'group_requests:notification:title' => 'Odottava ryhmäanomus',
	'group_requests:notification:body' => '%s on anonut ryhmää "%s".

Pääset hallinnoimaan avoimia anomuksia täällä:
%s
',

	// Admin panel
	'group_requests:limited_groups:disabled' => 'Käytät <i>Group requests</i> -liitännäistä, joten haluanet,
että vain ylläpitäjät voivat luoda uusia ryhmiä. %s',
	'group_requests:limited_groups:enable' => 'Voit määrittää asetuksen tästä.',
	'item:object:group_request' => 'Ryhmäanomukset',
);
