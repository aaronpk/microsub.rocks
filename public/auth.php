<?php
require(__DIR__.'/../lib/helpers.php');

if(isset($_POST['code'])) {

  header('Content-type: application/json');
  echo json_encode([
    'me' => $CONFIG['base'],
  ]);

} else {

  header('Location: '.$_GET['redirect_uri'].'?code=1234&state='.$_GET['state']);

}
