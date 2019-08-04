<?php
/**
 * @link http://www.i-taj.com/
 * @copyright Copyright (c) 2019 I-taj.com
 * @license http://www.i-taj.com/license/
 */
use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule();

$capsule->addConnection([
    'driver' => 'mysql',
    'host' => '',
    'username' => '',
    'password' => '',
    'database' => '',
    'charset' => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix' => ''
]);

$capsule->bootEloquent();
