<?php

// require('Repository/Reward.php');

require('registration.php');

use Container\Repository\Reward;


//default Dollar
// $rewardClass = new Reward(10);
// echo 'Reward point for dollar: ', $rewardClass->get('point').PHP_EOL;
// echo 'Reward point eqivalent amount for dollar: ', $rewardClass->get('value').PHP_EOL;

//change Dollar to Aus_dollar
$rewardClass = new Reward(10,'Aus_dollar');
echo 'Reward point for Aus_dollar: ', $rewardClass->get('point').PHP_EOL;
echo 'Reward point eqivalent amount for Aus_dollar: ', $rewardClass->get('value');
