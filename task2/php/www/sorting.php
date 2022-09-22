<!--sorting.php for sorting some numbers-->
<?php

// add form to the page for entering numbers
echo "<form method='post'>";
echo "<input type='text' name='numbers' placeholder='Enter numbers separated by comma'>";
echo "<input type='submit' value='Sort'>";
echo "</form>";

// if the form is submitted
if (isset($_POST['numbers'])) {
    // get the numbers from the form
    $numbers = $_POST['numbers'];
    // split the numbers by comma
    $numbers = explode(',', $numbers);
    // sort the numbers
    $sorted = shellSort($numbers);
    // display the sorted numbers in a one line
    displayNumbers($sorted);
}

function displayNumbers($numbers) {
    echo "<pre>";
    echo "Sorted numbers: ";
    echo implode(" ", $numbers);
    echo "</pre>";
}

function shellSort($array) {
    $count = count($array);
    $gap = floor($count / 2);
    while ($gap > 0) {
        for ($i = $gap; $i < $count; $i++) {
            $temp = $array[$i];
            $j = $i;
            while ($j >= $gap && $array[$j - $gap] > $temp) {
                $array[$j] = $array[$j - $gap];
                $j -= $gap;
            }
            $array[$j] = $temp;
        }
        $gap = floor($gap / 2);
    }
    return $array;
}

?>