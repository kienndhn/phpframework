<?php	

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(dirname(__FILE__)));

if(isset($_SERVER['REQUEST_URI'])){
    $url=$_SERVER['REQUEST_URI'];
}
$url= substr($url, strpos($url, '/',1)+1);
//echo $url;
require_once (ROOT . DS . 'library' . DS . 'bootstrap.php');
