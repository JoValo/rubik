<?
include "connection.php";

if (!connection) {
	$e = oci_error();
	trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

$p=12;

$stid = oci_parse(connection, 'begin :r := myfunc(:p);end;');
oci_bind_by_name($stid, ':p', $p);
oci_bind_by_name($stid, ':r', $r, 40);

oci_execute($stid);

print "$r\n"; 

oci_free_statement($stid);
oci_close(connection);
?>