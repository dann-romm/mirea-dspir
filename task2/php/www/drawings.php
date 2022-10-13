<!--drawings.php for draw some simple geometric shapes on the screen-->
<?php

//draw a rectangle
function drawRectangle($width, $height, $color) {
    echo "<div style='width:{$width}px; height:{$height}px; background-color:{$color};'></div>";
}

//draw a circle
function drawCircle($radius, $color) {
    echo "<div style='width:{$radius}px; height:{$radius}px; border-radius:50%; background-color:{$color};'></div>";
}

//draw a triangle
function drawTriangle($width, $height, $color) {
    echo "<div style='width:0; height:0; border-left:{$width}px solid transparent; border-right:{$width}px solid transparent; border-bottom:{$height}px solid {$color};'></div>";
}

//draw a square
function drawSquare($width, $color) {
    echo "<div style='width:{$width}px; height:{$width}px; background-color:{$color};'></div>";
}

//draw a rhombus
function drawRhombus($width, $height, $color) {
    echo "<div style='width:0; height:0; border-left:{$width}px solid transparent; border-right:{$width}px solid transparent; border-bottom:{$height}px solid {$color};'></div>";
    echo "<div style='width:0; height:0; border-left:{$width}px solid transparent; border-right:{$width}px solid transparent; border-top:{$height}px solid {$color};'></div>";
}

// print help message for 'num' parameter and exit
function displayHelp() {
    echo "<p>parameter 'num' is a number, where shape parameters are encoded in binary with the following mask:</p>";
    echo "<p> 000f - shape type (0 - rectangle, 1 - circle, 2 - triangle, 3 - square, 4 - rhombus)</p>";
    echo "<p> 00f0 - shape width (0 - 15) * 10 pixels</p>";
    echo "<p> 0f00 - shape height (0 - 15) * 10 pixels</p>";
    echo "<p> f000 - shape color (0 - red, 1 - green, 2 - blue, 3 - yellow, 4 - purple, 5 - orange)</p>";
}

if (isset($_GET['num'])) {
    $num = $_GET['num'];
    
    // check if $num is a number
    if (!is_numeric($num)) {
        displayHelp();
        exit();
    }

    //draw shapes
    $type = $num & 15;
    $width = (($num >> 4) & 15) * 10;
    $height = (($num >> 8) & 15) * 10;
    $color = (($num >> 12) & 15);

    if ($width == 0 || $height == 0) {
        displayHelp();
        exit();
    }

    switch ($color) {
        case 0:
            $color = 'red';
            break;
        case 1:
            $color = 'green';
            break;
        case 2:
            $color = 'blue';
            break;
        case 3:
            $color = 'yellow';
            break;
        case 4:
            $color = 'purple';
            break;
        case 5:
            $color = 'orange';
            break;
        default:
            displayHelp();
            exit();
    }
    switch ($type) {
        case 0:
            drawRectangle($width, $height, $color);
            break;
        case 1:
            drawCircle($width, $color);
            break;
        case 2:
            drawTriangle($width, $height, $color);
            break;
        case 3:
            drawSquare($width, $color);
            break;
        case 4:
            drawRhombus($width, $height, $color);
            break;
        default:
            displayHelp();
            exit();
    }
} else {
    displayHelp();
    exit();
}

?>