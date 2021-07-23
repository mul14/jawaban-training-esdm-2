<?php

function nextBirthday($date) {
  $now = new DateTime();
  $birthday = new DateTime($date);
  $nextBirthday = new DateTime();
  $nextBirthday->setDate(date('Y'), $birthday->format('m'), $birthday->format('d'));

  $diff = $now->diff($nextBirthday);

  // Check if birthday on this year already passed
  if ($diff->invert) {
    $nextYear = (new DateTime())->modify('+1 year');
    $nextBirthday->setDate($nextYear->format('Y'), $birthday->format('m'), $birthday->format('d'));
    $diff = $now->diff($nextBirthday);
  }
  
  return $diff->format('%R%a days');
}


echo nextBirthday('2009-09-09');
