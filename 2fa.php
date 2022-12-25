<?php
use PHPGangsta_GoogleAuthenticator;

$ga = new PHPGangsta_GoogleAuthenticator();
$secret = $ga->createSecret();
