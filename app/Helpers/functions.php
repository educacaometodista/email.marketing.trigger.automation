<?php

function classActivePath($path, $activeClass, $n)
{
    if($n != 0) {
        $i = 0;
        $final_path = '';
        $explode_path = explode('/', $_SERVER['REQUEST_URI']);
        foreach ($explode_path as $value)
        {
            $final_path .= '/'.$value;
        }
        if($path == $final_path)
            echo " $activeClass";

    } else {
        if($_SERVER['REQUEST_URI'] == $path)
            echo " $activeClass";
    }
}