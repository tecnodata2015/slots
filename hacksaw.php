<?php

$result = shell_exec('find ../hacksawdata/. -name "*500*" -name "*png*" -print ');
$csv = trim(str_replace("\r", '', $result), "\n");
$rows = explode("\n", $csv);
foreach ($rows as $row) {
    $r = explode('/', $row);
    $n = preg_replace("/[^a-z]+/", "", strtolower($r[3]));
    $files[$n] = $row;
}
#print_r($files);
#die();

$result = file_get_contents('hacksaw.csv');
$csv = trim(str_replace("\r", '', $result), "\n");
$rows = explode("\n", $csv);
foreach ($rows as $row) {
    $r = explode(',', $row);
    $n = preg_replace("/[^a-z]+/", "", strtolower($r[1]));
    if(isset($files[$n])) {
        $fname = "hacksaw/$r[0].png";
        $c="mv \"$files[$n]\" $fname";
        echo "$c\n";
        shell_exec($c);
        #echo $r[0];
    } else {
        echo $r[0] . " => missing\n";
    }
}
