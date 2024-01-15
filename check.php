<?php
session_start();

if (isset($_GET['x']) && isset($_GET['y'])) {
  $X = intval($_GET['x']);
  $Y = intval($_GET['y']);

  $response = array(
    'goal' => false,
    'end' => false,
    'tries' => $_SESSION['tries']
  );

  $_SESSION['tries']++;

  foreach ($_SESSION['coordinates'] as $idx => $coordinates) {
    if ($coordinates['x'] == $X && $coordinates['y'] == $Y) {
      unset($_SESSION['coordinates'][$idx]);
      $response['goal'] = true;
      break;
    }
  }

  if (empty($_SESSION['coordinates'])) {
    $response['end'] = true;
  }

  echo json_encode($response);
}
?>