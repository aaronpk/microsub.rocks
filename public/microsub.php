<?php
require(__DIR__.'/../lib/helpers.php');

header('Content-type: application/json');

if(strtolower($_SERVER['REQUEST_METHOD']) == 'get') {

  if(!isset($_GET['action'])) {
    respond_error('invalid_request', 'The request was missing the "action" parameter');
  }

  switch($_GET['action']) {
    case 'channels':
      echo json_encode([
        'channels' => [
          [
            'uid' => 'notifications',
            'name' => 'Notifications',
          ],
          [
            'uid' => 'notes',
            'name' => 'Notes',
          ],
          [
            'uid' => 'photos',
            'name' => 'Photos',
          ],
        ]
      ], JSON_PRETTY_PRINT);
      die();

    case 'timeline':

      if(!isset($_GET['channel'])) {
        respond_error('invalid_request', 'The request was missing the "channel" parameter');
      }

      if(!preg_match('/^([a-z]+)$/', $_GET['channel'], $match)) {
        respond_error('invalid_request', 'Invalid channel');
      }

      $filename = __DIR__.'/../data/channels/'.$match[1].'.json';

      if(!file_exists($filename)) {
        respond_error('invalid_request', 'Invalid channel');
      }

      $timeline = json_decode(file_get_contents($filename), true);
      echo json_encode($timeline, JSON_PRETTY_PRINT);

      die();
  }

  respond_error('invalid_request', 'Invalid value for the "action" parameter');

} else {



}
