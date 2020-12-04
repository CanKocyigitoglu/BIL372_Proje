<?php
function fall($data, $die = true) {
    echo "<pre>";
    print_r($data);
    echo "</pre>";
    if ($die) die();
}