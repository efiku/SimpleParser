<?php
declare(strict_types=1);
require "../vendor/autoload.php";
use efiku\SimpleParser;

$polishWords = new SimpleParser('./1.txt');
$englishWords = new SimpleParser('./2.txt');
$arrayOfWords = new ArrayObject();

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
    echo $words[0]  . " == ". $words[1] . PHP_EOL;

}

