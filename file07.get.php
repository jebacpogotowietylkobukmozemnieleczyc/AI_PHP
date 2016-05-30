<?php
require_once('MDB2.php') ;
include('file07.form.php') ;
$dsn = "mysql://scott:tiger@localhost/instytut" ;
$db = MDB2 :: connect($dsn) ;
if (MDB2 :: isError($db))
    die($db -> getMessage()) ;
$sql = "SELECT * FROM pracownicy" ;
$result = $db -> query($sql) ;
while ($row = $result -> fetchrow())
{
    echo "$row[0],$row[1] <br/>" ;
}
$result -> free() ;
$db -> disconnect() ;
?>