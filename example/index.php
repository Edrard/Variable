<?php

header("Content-type: text/html; charset=utf-8");
error_reporting(E_ALL);
ini_set('display_errors', 1);

require '../vendor/autoload.php';

use edrard\Variable\Variable;


//   ?test=222&new=333&belike=coc

print_r(Variable::Get(array('test','belike'),function($arg){
    foreach($arg as $name => $val){
        $arg[$name] = '----'.$val;
    }
    return $arg;
    }
));

//G et All
print_r(Variable::Get('*'));