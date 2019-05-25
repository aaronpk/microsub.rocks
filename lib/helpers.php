<?php
require(__DIR__.'/config.php');

function respond_error($err, $desc, $code='400 Bad Request', $params=[]) {
  header('HTTP/1.1 '.$code);
  header('Content-type: application/json');
  echo json_encode(array_merge([
    'error' => $err,
    'error_description' => $desc,
  ], $params), JSON_PRETTY_PRINT);
  die();
}
