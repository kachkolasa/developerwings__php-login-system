<?php
$password = 'mysecurepassword';
$salt = 'mysaltrandomstring';
$options = [
  'cost' => 12, // Number of iterations to use
  'salt' => $salt
];
$hashedPassword = password_hash($password, PASSWORD_ARGON2I, $options);
