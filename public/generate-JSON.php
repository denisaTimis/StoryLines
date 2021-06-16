<?php
require("../vendor/autoload.php");
$openapi = \OpenApi\Generator::scan(['./']);
header('Content-Type: application/json');
echo $openapi->toJSON();
?>