<?php

function dd($value)
{
    echo "<pre>";
    var_dump($value);
    echo "<pre>";
    die();
}



// declare the route for nav highlighting
function urlIs($value)
{

    return $_SERVER['REQUEST_URI'] === $value;
}

function authorize($condition, $status = Response ::FORBIDDEN)
{
    if (!$condition) {
        abort($status);
    }
}
