<?php

$IS_DEBUG = 1;

function D($str) {
  global $IS_DEBUG;
  if ($IS_DEBUG == 1)
    echo "===$str";
}


?>
