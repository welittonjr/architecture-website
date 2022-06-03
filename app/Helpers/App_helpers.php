<?php

use Symfony\Component\VarDumper\VarDumper;

function dump($var) {
    foreach(func_get_args() as $var) {
        VarDumper::dump($var);
    }
}