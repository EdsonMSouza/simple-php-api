<?php

# Search example, try with "new" and "update" (see documentation)
$url = 'http://emsapi.esy.es/rest/api/search/';
$token = '123';

$array = array(
    'username'=> 'john',
    'password'=> 'doe'
);

$json = json_encode( $array );

$ch = curl_init( $url );
curl_setopt( $ch, CURLOPT_CUSTOMREQUEST, 'POST' ); # PUT to update
curl_setopt( $ch, CURLOPT_POSTFIELDS, $json );
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
curl_setopt( $ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Authorization: ' . $token,
    'Content-Length: ' . strlen( $json ) )
);

$obj = json_decode( curl_exec( $ch ) );

print_r( $obj );