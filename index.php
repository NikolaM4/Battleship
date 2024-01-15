<?php
session_start();

if (!isset($_SESSION['coordinates']) || empty($_SESSION['coordinates'])) {
  $_SESSION['coordinates'] = generateCoordinates();
  $_SESSION['tries'] = 0;
} else {
  $_SESSION['coordinates'] = generateCoordinates();
  $_SESSION['tries']++;
}

function generateCoordinates()
{
  $coordinates = [];
  $X = rand(0, 5);
  $Y = rand(0, 5);

  $horizontalAliVertikal = rand(0, 1);
  if ($horizontalAliVertikal == 1)
    for ($i = 0; $i < 5; $i++)
      $coordinates[] = ['x' => $X + $i, 'y' => $Y];
  else
    for ($i = 0; $i < 5; $i++)
      $coordinates[] = ['x' => $X, 'y' => $Y + $i];

  return $coordinates;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Battleship</title>
  <link rel="stylesheet" href="style.css">
  <script src="script.js" defer></script>
</head>

<body>
  <?php
  echo '<table id="game-table">';
  for ($i = 0; $i < 10; $i++) {
    echo '<tr>';
    for ($j = 0; $j < 10; $j++)
      echo '<td id="' . $i . '-' . $j . '" onclick="check(' . $i . ',' . $j . ')"></td>';
    echo '</tr>';
  }
  echo '</table>';
  ?>

</body>

</html>