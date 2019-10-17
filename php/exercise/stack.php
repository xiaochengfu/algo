<?php
/**
 * Name: stack.php.
 * Author: hp <xcf-hp@foxmail.com>
 * Date: 2019/10/17 0017 下午 17:14
 * Description: stack.php.
 */

function isValidBracket($str){
    if($str == "" || $str == '') return true;
    $array_str = str_split($str);
    $stack = [];
    $valid_array = ['(',')','[',']','{','}'];
    $compare_array = [
        '{'=>'}',
        '}'=>'{',
        '['=>']',
        ']'=>'[',
        '('=>')',
        ')'=>'(',
    ];
    foreach ($array_str as $key=>$value){
        if(in_array($value,$valid_array)){
            if($key == 0){
                array_push($stack,$value);
                continue;
            }
            if ($compare_array[$value] == end($stack)){
                array_pop($stack);
            }else{
                array_push($stack,$value);
            }
        }else{
            array_push($stack,$value);
            break;
        }
    }
    return empty($stack)?true:false;
}

$isValid = isValidBracket("");
var_dump($isValid);