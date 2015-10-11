<?php
require 'vendor/autoload.php';

use Serima\Hashee\Hashee;

class Benchmark
{
    public function bench($elementNumber)
    {
        echo "========================================\n";
        echo "elementNumber : " . $elementNumber . "\n";
        $total = 10000;
        $paragraph = 'how are you today?';
        $words = explode(' ', $paragraph);

        // Create a bunch of letter entries
        $sequence = [];
        for ($j = 0; $j < $elementNumber; $j++) {
            $sequence[] = 'a' . $j;
        }

        $s = microtime(true);
        for ($j = 0; $j < $total; $j++) {
            foreach ($words as $word) {
                in_array(strtolower($word), $sequence);
            }
        }
        echo "in_array: " . (microtime(true) - $s) . "\n";

        // Convert the array to a hash
        Hashee::addBulk($sequence);
        $s = microtime(true);
        for ($j = 0; $j < $total; $j++) {
            foreach ($words as $word) {
                Hashee::in($word, $sequence);
            }
        }

        echo "hashee:   " . (microtime(true) - $s) . "\n";
        echo "========================================\n";
    }
}

$benchmark = new Benchmark();
$benchmark->bench(5);
$benchmark->bench(10);
$benchmark->bench(100);
$benchmark->bench(1000);
$benchmark->bench(10000);
