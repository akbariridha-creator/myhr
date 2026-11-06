<?php
$serverName = "sqlmisis-test.public.ca87cd4bc197.database.windows.net,3342"; //serverName\instanceName
//$serverName = "(localdb)\MSSQLLocalDB";
// Since UID and PWD are not specified in the $connectionInfo array,
// The connection will be attempted using Windows Authentication.
$connectionInfo = array( "Database"=>"PREDICTIVE","UID"=>"predictsis_user","PWD"=>"@Welcome1!@#");
//$connectionInfo =array("Database"=>"snipe-it_db");
$conn = sqlsrv_connect( $serverName, $connectionInfo); 
if( $conn ) {
     echo "Connection established.<br />";
}else{
     echo "Connection could not be established.<br />";
     die( print_r( sqlsrv_errors(), true));
}
?>