<?php

return array(
	# Account credentials from developer portal
	'Account' => array(
		'ClientId' => env('PAYPAL_CLIENT_ID', 'ATWSXWgj9R3k-4t1O-Ir9jIZ1c3CnoaSMIHlP2Jwj-EwHhjoDT71tfzMaxWciDJxIq5MKDmMTOrfCrLE'),
		'ClientSecret' => env('PAYPAL_CLIENT_SECRET', 'ENfbt-QRC-axWQe_301q9XHSfROMCIt8Af2hGKcJvxpfkWGcbuvwCTortw8zL2X6_j9GdGlV57-m1c_S'),
	),

	# Connection Information
	'Http' => array(
		// 'ConnectionTimeOut' => 30,
		'Retry' => 1,
		//'Proxy' => 'http://[username:password]@hostname[:port][/path]',
	),

	# Service Configuration
	'Service' => array(
		# For integrating with the live endpoint,
		# change the URL to https://api.paypal.com!
		'EndPoint' => 'https://api.sandbox.paypal.com',
	),


	# Logging Information
	'Log' => array(
		//'LogEnabled' => true,

		# When using a relative path, the log file is created
		# relative to the .php file that is the entry point
		# for this request. You can also provide an absolute
		# path here
		//'FileName' => '../PayPal.log',

		# Logging level can be one of FINE, INFO, WARN or ERROR
		# Logging is most verbose in the 'FINE' level and
		# decreases as you proceed towards ERROR
		//'LogLevel' => 'FINE',
	),
);
