<?php

if (!function_exists('toCamelCase')) {
    function toCamelCase($string) {
        $string = strtolower(trim(preg_replace('/[^A-Za-z0-9]+/', ' ', $string)));
        $string = str_replace(' ', '', ucwords($string));
        $string = lcfirst($string);
        return $string;
    }
}
 if(!function_exists('capitalizeEachWord')){
    function capitalizeEachWord($str) {
        // Convierte la primera letra de cada palabra a mayúscula
        return ucwords(strtolower($str));
    }

 }
