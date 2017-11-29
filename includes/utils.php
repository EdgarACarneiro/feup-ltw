<?php

function redirect($url) {
  ob_start();
  header('Location: ' . $url);
  ob_end_flush();
  die;
}

function currentPHP() {
  return basename($_SERVER['PHP_SELF']);
}

?>