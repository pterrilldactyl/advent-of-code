<?

$input = file_get_contents('input.txt');
$steps = explode(',',$input);
$directions = ['N', 'E', 'S', 'W'];
$direction = 0;
$blocks = 0;

$coords = [
  'x' => 0,
  'y' => 0
];

$distance = 0;

// $last_direction = $directions[$direction];
foreach ($steps as $step)
{
  $step = trim($step);

  $turn = $step[0];
  $blocks = (int) substr($step, 1);

  if ($turn == 'R')
  {
    $direction++;
    if ($direction > 3)
    {
      $direction = 0;
    }
  }
  else if ($turn == 'L')
  {
    $direction--;
    if ($direction < 0)
    {
      $direction = 3;
    }
  }

  $current_direction = $directions[$direction];

//   switch ($current_direction)
//   {
//     case $directions[0]: // N
//       $coords['y'] += $blocks;
//       break;
//     case $directions[1]: // E
//       $coords['x'] += $blocks;
//       break;
//     case $directions[2]: // S
//       $coords['y'] -= $blocks;
//       break;
//     case $directions[3]: // W
//       $coords['x'] -= $blocks;
//       break;
//     default:
//       break;
//   }

  

  switch ($current_direction)
  {
    case $directions[0]: // N
    case $directions[1]: // E
      $distance += $blocks;
      break;
    case $directions[2]: // S
    case $directions[3]: // W
      $distance -= $blocks;
      break;
    default:
      break;
  }
}

echo abs($distance);
// echo $coords['x'] + $coords['y'];
?>