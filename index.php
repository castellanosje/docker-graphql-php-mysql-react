<?php
// script based on youtube tutorial https://www.youtube.com/watch?v=QdQ2OnLk7-U
require ('./vendor/autoload.php');
use Illuminate\Database\Capsule\Manager as Capsule;
use App\Models\User;

$capsule = new Capsule;

$capsule->addConnection([
    'driver' => 'mysql',
    'host' => 'db',
    'database' => 'graphqldatabase',
    'username' => 'root',
    'password' => 'root',
    'charset' => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix' => '',
]);

$capsule->setAsGlobal();

$capsule->bootEloquent();

$user = User::find(1);


var_dump($user->addresses->toArray());
?> 

