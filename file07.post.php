<?php
require_once('MDB2.php') ;
$dsn
    = "mysql://scott:tiger@localhost/instytut" ;
$db = MDB2 :: connect($dsn) ;
if (MDB2 :: isError($db))
    die($db -> getMessage()) ;
if (isset($_POST['id_prac']) &&
    is_numeric($_POST['id_prac']) &&
    is_string($_POST['nazwisko']))
{
    $sql = "INSERT INTO pracownicy(id_prac,nazwisko) VALUES(?,?)" ;
    $pstmt = $db -> prepare($sql) ;
    $result =& $pstmt -> execute(array($_POST['id_prac'] , $_POST['nazwisko'])) ;
    if (MDB2 :: isError($result))
    {
        echo "<a href=\"file07.get.php\">back to the list of employees</a><br/>";
        die($result -> getMessage()) ;
    }
}
$db -> disconnect() ;
header('Location: file07.get.php') ;
?>