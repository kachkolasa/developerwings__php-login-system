<?php
$password = 'mysecurepassword';
$salt = 'mysaltrandomstring';
$hashedPassword = password_hash($password . $salt, PASSWORD_DEFAULT);
