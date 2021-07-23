<?php

$names = json_decode(file_get_contents('names.json'), true);

foreach($names as $name) {
  echo substr($name['name'], 0, 1);
}
