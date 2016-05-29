<?php
require_once('MDB2.php') ;
$dsn
    = "mysql://scott:tiger@localhost/instytut" ;
$db = MDB2 :: connect($dsn) ;
if (MDB2 :: isError($db))
    die($db -> getMessage()) ;
print<<<KONIEC
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>
<body>
<form action="file07.php" method="POST">
id_prac <input type="text" name="id_prac">
nazwisko <input type="text" name="nazwisko">
<input type="submit" value="Wstaw">
<input type="reset" value="Wyczysc">
</form>
KONIEC ;

if (isset($_POST['id_prac']) &&
is_numeric($_POST['id_prac']) &&
is_string($_POST['nazwisko']))
{
$sql = "INSERT INTO pracownicy(id_prac,nazwisko) VALUES(?,?)" ;
$pstmt = $db -> prepare($sql) ;
$result =& $pstmt -> execute(array($_POST['id_prac'] , $_POST['nazwisko'])) ;
if (MDB2 :: isError($result))
die($result -> getMessage()) ;
}
$sql = "SELECT * FROM pracownicy" ;
$result = $db -> query($sql) ;
while ($row = $result -> fetchrow())
{
echo "$row[0],$row[1] <br/>" ;
}
$result -> free() ;
$db -> disconnect() ;
?>