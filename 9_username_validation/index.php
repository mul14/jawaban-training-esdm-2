<?php

function checkValidUsername($username) {
  preg_match('/^[A-z0-9\.\-_]{3,20}$/', $username, $matches);

  if (count($matches)) {
    return true;
  }

  return false;
}

var_dump(checkValidUsername('hello')) . PHP_EOL;
var_dump(checkValidUsername('hello_world')) . PHP_EOL;
var_dump(checkValidUsername('hello-world')) . PHP_EOL;
var_dump(checkValidUsername('hello.world')) . PHP_EOL;
var_dump(checkValidUsername('hello$world')) . PHP_EOL;
var_dump(checkValidUsername('hello%world')) . PHP_EOL;
var_dump(checkValidUsername('hello@world')) . PHP_EOL;
var_dump(checkValidUsername('hello world')) . PHP_EOL;
var_dump(checkValidUsername('hellopanjangsekaliinitulisannya')) . PHP_EOL;
