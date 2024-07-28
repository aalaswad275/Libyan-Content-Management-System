<?php
$host = "localhost"; /* Host name */
$user = "root"; /* User */
$password = ""; /* Password */
$dbname = "epcdb"; /* Database name */

$con = mysqli_connect($host, $user, $password,$dbname) or die("خطأ في الاتصال بقاعدة البيانات");

echo "connected successfully <br>";
?>