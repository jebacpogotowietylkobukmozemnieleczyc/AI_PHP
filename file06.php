<?php
require_once('MDB2.php') ;
$dsn
$db
    = "mysql://scott:tiger@localhost/instytut" ;
= MDB2 :: connect($dsn) ;
if (MDB2 :: isError($db))
    die($db -> getMessage()) ;
printf("<h1>PRACOWNICY</h1>") ;
printf("<table border=\"1\">") ;
printf("<tr><th>ID</th><th>NAZWISKO</th><th>ETAT</th><th>PLACA</th></tr>") ;
$sql = "SELECT id_prac,nazwisko,etat,placa_pod FROM pracownicy" ;
$result = $db -> query($sql) ;
while ($row = $result -> fetchrow(MDB2_FETCHMODE_ORDERED))
{
    printf("<tr><td>%d</td><td>%s</td><td>%s</td><td>%6.2f</td></tr>" ,
        $row[0] , $row[1] , $row[2] , $row[3]) ;
}
printf("</table>") ;
$result -> free() ;
$sql = "SELECT COUNT(*) FROM pracownicy" ;
$result = $db -> queryOne($sql) ;
echo "<i>Query returned $result rows</i>" ;
$db -> disconnect() ;
?>