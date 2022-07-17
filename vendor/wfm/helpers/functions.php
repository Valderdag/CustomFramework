<?php
function d($data, $die = false)
{
    echo "<pre>" . print_r($data, 1) . "</pre>";
    if($die){
        die;
    }
}

function rt($str)
{
    return htmlspecialchars($str);
}