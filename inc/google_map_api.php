<?php
if (get_field('google_map_api', 'option')) {
	add_action('wp_enqueue_scripts', 'rfware_enqueue_api_script');
	function rfware_enqueue_api_script()
	{
		wp_enqueue_script(
			'rfware-map-api',
			'https://maps.googleapis.com/maps/api/js?key=' . get_field('google_map_api', 'option') . '&callback=initMap&_v=20241205151347',
			array('rfware-app'),
			null,
			[
				'in_footer' => true,
				'strategy'  => 'defer',
			]
		);
	}
	// Google map api for admin panel
	function my_acf_google_map_api($api)
	{
		$api['key'] = get_field('google_map_api', 'option');
		return $api;
	}
	add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');
}
