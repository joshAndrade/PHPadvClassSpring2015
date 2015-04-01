<?php

function load_lib($class) {
    include 'demo/lib/'.$class . '.php';
};
spl_autoload_register('load_lib');