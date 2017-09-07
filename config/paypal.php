<?php
return array(
/** set your paypal credential **/
'client_id' =>'ATWSXWgj9R3k-4t1O-Ir9jIZ1c3CnoaSMIHlP2Jwj-EwHhjoDT71tfzMaxWciDJxIq5MKDmMTOrfCrLE',
'secret' => 'ENfbt-QRC-axWQe_301q9XHSfROMCIt8Af2hGKcJvxpfkWGcbuvwCTortw8zL2X6_j9GdGlV57-m1c_S',
/**
* SDK configuration 
*/
'settings' => array(
/**
* Available option 'sandbox' or 'live'
*/
'mode' => 'sandbox',
/**
* Specify the max request time in seconds
*/
'http.ConnectionTimeOut' => 1000,
/**
* Whether want to log to a file
*/
'log.LogEnabled' => true,
/**
* Specify the file that want to write on
*/
'log.FileName' => storage_path() . '/logs/paypal.log',
/**
* Available option 'FINE', 'INFO', 'WARN' or 'ERROR'
*
* Logging is most verbose in the 'FINE' level and decreases as you
* proceed towards ERROR
*/
'log.LogLevel' => 'FINE'
),
);