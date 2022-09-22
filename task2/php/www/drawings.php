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

if (isset($_GET['num'])) {
    $num = $_GET['num'];
    // $num is a number, where shape parameters are encoded in binary with the following mask:
    // 000f - shape type (0 - rectangle, 1 - circle, 2 - triangle, 3 - square, 4 - rhombus)
    // 00f0 - shape width (0 - 15) * 10 pixels
    // 0f00 - shape height (0 - 15) * 10 pixels
    // f000 - shape color (0 - red, 1 - green, 2 - blue, 3 - yellow, 4 - purple, 5 - orange)

    //draw shapes
    $type = $num & 15;
    $width = (($num >> 4) & 15) * 10;
    $height = (($num >> 8) & 15) * 10;
    $color = (($num >> 12) & 15);
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
    }
}

?>