<?php
session_start();
require_once './commons/helpers.php';

require_once './vendor/autoload.php';

$url = isset($_GET['url']) == true ? $_GET['url'] : "/";

require_once './commons/database.php'; // để sử dụng thư viện illuminate


use Commons\Routing;
Routing::customRouting($url);

?>
