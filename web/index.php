<?php
use SimpleParser\SimpleParser;
require "../vendor/autoload.php";

$polishWords = new SimpleParser('./1.txt');
$englishWords = new SimpleParser('./2.txt');
$arrayOfWords = [];

foreach ($polishWords as $word) {
    if (!$polishWords->isEmptyLine()) {
        $arrayOfWords[$polishWords->key()][] = $word;
    }
}
foreach ($englishWords as $word) {
    if (!$englishWords->isEmptyLine()) {
        $arrayOfWords[$englishWords->key()][] = $word;
    }
}
foreach ($arrayOfWords as $words) {
    echo " {$words[0]}  === {$words[1]} \n";
}
echo PHP_EOL;

// Power of  SplFileObject :) (better!)
$item = new SplFileObject('./1.txt');
$item2 = new SplFileObject('./2.txt');
foreach ($item as $line ) {
    $item2->seek($item->key());
    if(!$item->eof() && !$item2->eof()){
        echo  trim($line) . " == ". trim($item2->current()) . PHP_EOL;
    }

}
