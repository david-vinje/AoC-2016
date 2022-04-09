<?php
$file = fopen("Day1.txt", "r");
$input = fread($file, filesize("Day1.txt"));
$arr = explode(", ", $input);
$direction = "N";
$east = 0;
$north = 0;
foreach ($arr as $val) {
    $split = substr($val, 0, 1);
    if ($direction == "N") {
        $direction = $split[0]=="R" ? "E" : "W";
    } else if ($direction == "E") {
        $direction = $split[0]=="R" ? "S" : "N";
    } else if ($direction == "W") {
        $direction = $split[0]=="R" ? "N" : "S";
    } else if ($direction == "S") {
        $direction = $split[0]=="R" ? "W" : "E";
    }
    $amount = intval(substr($val, 1)); 
    if ($direction == "N") {
        $north += $amount;
    } else if ($direction == "S") {
        $north -= $amount;
    } else if ($direction == "E") {
        $east += $amount;
    } else {
        $east -= $amount;
    }
}
echo abs($north)+abs($east) . "\n";