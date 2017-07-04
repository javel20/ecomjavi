<?php

return array(
	# Account credentials from developer portal
	'Account' => array(
		'ClientId' => env('Aa9aUcElGCRSSw8iIt8RnaDXGhPatDd_IIKpxpQwTmiqT0WIcECzZMPcZCaZa8qJCCDoan1rY7NwPkXi', ''),
		'ClientSecret' => env('EN0o-pto15CKPWZTRTrYg2MRhdn_gcSY8fLVi8PLjrgcSnkFWly1spQ_1wjW2ZI6RreQRDL-B8c9-xJj', ''),
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
		'FileName' => '../PayPal.log',

		# Logging level can be one of FINE, INFO, WARN or ERROR
		# Logging is most verbose in the 'FINE' level and
		# decreases as you proceed towards ERROR
		//'LogLevel' => 'FINE',
	),
);