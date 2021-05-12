<?php
header( 'Content-Type: application/json; charset=UTF-8' );
echo json_encode( [ 'message' => 'Method Not Allowed Here' ] );
die();