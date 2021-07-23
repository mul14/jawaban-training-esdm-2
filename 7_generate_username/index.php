<?php

$emails = json_decode(file_get_contents('emails.json'), true);

foreach($emails as $email) {
  echo preg_replace('/@.+/', '', $email['email']) . PHP_EOL;  
}
