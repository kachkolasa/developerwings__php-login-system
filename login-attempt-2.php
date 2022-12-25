<?php
function getFailedAttempts($username) {
  $db = new mysqli('localhost', 'user', 'password', 'database');
  $stmt = $db->prepare('SELECT failed_attempts FROM users WHERE username = ?');
  $stmt->bind_param('s', $username);
  $stmt->execute();
  $stmt->bind_result($attempts);
  $stmt->fetch();
  $stmt->close();
  return $attempts;
}

function getLastFailedAttemptTime($username) {
  $db = new mysqli('localhost', 'user', 'password', 'database');
  $stmt = $db->prepare('SELECT last_failed_attempt FROM users WHERE username = ?');
  $stmt->bind_param('s', $username);
  $stmt->execute();
  $stmt->bind_result($lastAttempt);
  $stmt->fetch();
  $stmt->close();
  return $lastAttempt;
}

function resetFailedAttempts($username) {
  $db = new mysqli('localhost', 'user', 'password', 'database');
  $stmt = $db->prepare('UPDATE users SET failed_attempts = 0 WHERE username = ?');
  $stmt->bind_param('s', $username);
  $stmt->execute();
  $stmt->close();
}

function incrementFailedAttempts($username) {
  $db = new mysqli('localhost', 'user', 'password', 'database');
  $stmt = $db->prepare('UPDATE users SET failed_attempts = failed_attempts + 1, last_failed_attempt = ? WHERE username = ?');
  $time = time();
  $stmt->bind_param('is', $time, $username);
  $stmt->execute();
  $stmt->close();
}

function checkUsernameAndPassword($username, $password) {
  $db = new mysqli('localhost', 'user', 'password', 'database');
  $stmt = $db->prepare('SELECT password_hash FROM users WHERE username = ?');
  $stmt->bind_param('s', $username);
  $stmt->execute();
  $stmt->bind_result($hashedPassword);
  $stmt->fetch();
  $stmt->close();
  return password_verify($password, $hashedPassword);
}
