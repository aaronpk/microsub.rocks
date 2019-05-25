<?php
require(__DIR__.'/../lib/helpers.php');

header('Content-type: application/json');

echo json_encode([
  'me' => $CONFIG['base'].'/',
  'access_token' => time(),
]);
