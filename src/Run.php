<?php
require 'Race.php';

// run a race and print the results
 $test = new Race;
 ob_start();
 $results = $test->runRace();
 print_r($results);
 ob_flush();
 ob_end_clean();
