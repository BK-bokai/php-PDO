<?php
require_once "Config/Mysql.php";
$host = Mysql::host;
$username = Mysql::username;
$password = Mysql::password;
$db = Mysql::db;
try {
    $db = new PDO("mysql:host={$host};dbname={$db}", $username, $password,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")); //初始化一个PDO对象
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Suggested to comment on production websites
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
         
    echo "連線成功<br/>";

    $dbh = null;
} catch (PDOException $e) {
    die("Error!: " . $e->getMessage() . "<br/>");
}

try {
    $sql="Select * from hero WHERE id = :id";
    $result=$db->prepare($sql);
    $result->execute(array(':id'=>2));
    
    print_r($result->fetchAll(PDO::FETCH_ASSOC));
    echo  "<br/>";
} catch (PDOException $e) {
    die("Error!: " . $e->getMessage() . "<br/>");
}

// try {
//     // $sql="INSERT INTO `hero` (`hero_name`,`hero_hp`,`hero_mp`) VALUES ('逼逼鳥', '122', '25')";
//     $sql="INSERT INTO `hero` (`hero_name`,`hero_hp`,`hero_mp`) VALUES (:hero_name, :hero_hp, :hero_mp)";
//     $result=$db->prepare($sql);
//     $result->execute(array(':hero_name'=>'逼逼鳥',':hero_hp'=>'122',':hero_mp'=>25));
    
//     print_r("{$sql}成功");
// } catch (PDOException $e) {
//     die("Error!: " . $e->getMessage() . "<br/>");
// }

// try {
//     // $sql="UPDATE `hero` SET `hero_hp` = 110, `hero_mp` = 60 WHERE `hero_name` = '逼逼鳥' ";
//     $sql="UPDATE `hero` SET `hero_hp` = :hero_hp, `hero_mp` = :hero_mp WHERE `hero_name` = :hero_name ";
//     $result=$db->prepare($sql);
//     $result->execute(array(':hero_hp'=>110, ':hero_mp'=>60, ':hero_name'=>'逼逼鳥'));
    
//     print_r("{$sql}成功");
// } catch (PDOException $e) {
//     die("Error!: " . $e->getMessage() . "<br/>");
// }

// try {
//     $sql="DELETE FROM `hero` WHERE `hero_name` = :hero_name ";
//     $result=$db->prepare($sql);
//     $result->execute(array(':hero_name'=>'逼逼鳥'));
    
//     print_r("{$sql}成功". "<br/>");
// } catch (PDOException $e) {
//     die("Error!: " . $e->getMessage() . "<br/>");
// }
?>