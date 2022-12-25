<?php
$password = 'mysecurepassword';
$salt = 'mysaltrandomstring';
$hashedPassword = '$2y$10$xEZF9aJlhvH8l/1wjDyNL.m2YOv8waW0.ZfrDKCZz0q3NvO8W3/fK';

if (password_verify($password . $salt, $hashedPassword)) {
  // Password is correct
} else {
  // Password is incorrect
}
