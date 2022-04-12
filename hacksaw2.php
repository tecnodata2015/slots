<?php

$result = file_get_contents('hacksaw.csv');
$csv = trim(str_replace("\r", '', $result), "\n");
$rows = explode("\n", $csv);
foreach ($rows as $row) {
    $r = explode(',', $row);
    $fname = "$r[0].png";
    $url = "https://client-demo.hacksawgaming.com/img/thumbnails/$fname";
    $c="wget --user hacksaw --password hacksaw973 $url -O hacksaw/$fname";
    echo "$c\n";
    shell_exec($c);    
}
