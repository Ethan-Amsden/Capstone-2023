<?php
$lifetime = 60 * 60 * 24 * 2;    // 2 days
$path = '/';

session_set_cookie_params($lifetime, $path);
session_start();
?>

<?php
/*$lifetime = 60 * 60 * 24 * 2;    // 2 days
$path = '/';
$userName = 'Account';
session_set_cookie_params($lifetime, $path, $userName);

$themeName = 'Theme';
session_set_cookie_params($lifetime, $path, $themeName);
session_start();*/
?>