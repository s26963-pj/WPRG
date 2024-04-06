<?php

$x = $_GET["x"];
$y = $_GET["y"];
$operation = $_GET["operation"];

if($operation == "add"){
    echo($x + $y);
} elseif ($operation == "sub"){
    echo($x - $y);
} elseif ($operation == "mul"){
    echo($x * $y);
} elseif ($operation == "div"){
    echo($x / $y);
}

?>