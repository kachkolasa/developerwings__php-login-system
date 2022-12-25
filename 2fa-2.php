<?php
$code = '123456'; // TOTP provided by the user
if ($ga->verifyCode($secret, $code, 2)) {
  // TOTP is valid
} else {
  // TOTP is invalid
}
