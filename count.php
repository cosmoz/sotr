<?php

$rand_numbers = 0;
$test_data = array();

while($rand_numbers<10000) {
	$test_data[] = rand(1,10000);
	$rand_numbers++;
}


function count_pairs($input) {
    
    $pairs_count = 0;
    $size = count($input);

    for ($i=0; $i < $size; ++$i) {
        for ($j = $i+1; $j < $size; ++$j) {
            if (($i != $j) && ($input[$i] == $input[$j])) {
                $pairs_count++;
                echo "index i: " . $i . " index j " . $j;
                echo " values: " . $input[$i] . " " . $input[$j] , "\n";
	        }
	    }
	}

	return $pairs_count;
}


function count_pairs_optimized($input) {
	$pairs_count = 0;

    $values = array_flip($input);
    $input_reduced = array_flip($values);

    echo "orig count: " . count($input) . " input_reduced count: " . \
    	count($input_reduced);

    print_r(array_diff($input_reduced, $input));
    
}


// print_r($test_data);
 echo "Ilosc par TAB[i] = TAB[j]: " . count_pairs($test_data) . "\n";
count_pairs_optimized($test_data);
