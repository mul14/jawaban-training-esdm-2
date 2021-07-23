<?php

$films = json_decode(file_get_contents('films.json'), true);

$viewersGreaterThan500 = array_filter($films, function ($film) {
  return $film['viewers'] > 500;
});

print_r($viewersGreaterThan500);

$totalViewers = 0;
foreach ($films as $film) {
  $totalViewers += $film['viewers'];
}

print_r($totalViewers);
