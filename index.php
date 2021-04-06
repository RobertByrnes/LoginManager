<?php
session_start();
require __DIR__ . '\vendor\autoload.php';

if (isset($_SESSION['user']))
{
    echo "You are successfully logged in.\n";
    echo '<pre>'.str_repeat('=', 14)."\nPRINT_R DEBUG:\n".str_repeat('=', 14)."\n  FILE: ".__FILE__."\n  LINE: ".__LINE__."\n".str_repeat('=', 14)."\n".print_r($_SESSION['user'], true).'</pre>';
}
else
{
    header('Location: classes/LoginManager');
}
