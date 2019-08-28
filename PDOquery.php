<?php
require_once "Config/Mysql.php";
// $dsn="$dbms:host=$host;dbname=$dbName";
$host = Mysql::host;
$username = Mysql::username;
$password = Mysql::password;
$db = Mysql::db;
try {
    // mysql:dbname=test;host=127.0.0.1
    $db = new PDO("mysql:host={$host};dbname={$db}", $username, $password,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")); //初始化一个PDO对象
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Suggested to comment on production websites
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
         
    echo "連線成功<br/>";
    /*你还可以进行一次搜索操作
    foreach ($dbh->query('SELECT * from FOO') as $row) {
        print_r($row); //你可以用 echo($GLOBAL); 来看到这些值
    }
    */
    $dbh = null;
} catch (PDOException $e) {
    die("Error!: " . $e->getMessage() . "<br/>");
}

try {
    $sql="Select * from hero WHERE id = 2";
    $result=$db->query($sql);
    
    print_r($result->fetchAll(PDO::FETCH_ASSOC));
    echo  "<br/>";
} catch (PDOException $e) {
    die("Error!: " . $e->getMessage() . "<br/>");
}

// try {
//     $sql="INSERT INTO `hero` (`hero_name`,`hero_hp`,`hero_mp`) VALUES ('逼逼鳥', '122', '25')";
//     $result=$db->query($sql);
    
//     print_r("{$sql}成功");
// } catch (PDOException $e) {
//     die("Error!: " . $e->getMessage() . "<br/>");
// }

// try {
//     $sql="UPDATE `hero` SET `hero_hp` = 110, `hero_mp` = 60 WHERE `hero_name` = '逼逼鳥' ";
//     $result=$db->query($sql);
    
//     print_r("{$sql}成功");
// } catch (PDOException $e) {
//     die("Error!: " . $e->getMessage() . "<br/>");
// }

try {
    $sql="DELETE FROM `hero` WHERE `hero_name` = '逼逼鳥' ";
    $result=$db->query($sql);
    
    print_r("{$sql}成功". "<br/>");
} catch (PDOException $e) {
    die("Error!: " . $e->getMessage() . "<br/>");
}
?>