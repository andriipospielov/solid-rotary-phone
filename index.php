<?php
/**
 * Created by PhpStorm.
 * User: andrii
 * Date: 02.02.17
 * Time: 18:14
 */
require_once(__DIR__ . '/vendor/autoload.php');
$front = FrontController::getInstance();
$front->route();
echo $front->getBody();
