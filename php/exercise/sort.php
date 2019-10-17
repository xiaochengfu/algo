<?php
/**
 * Name: sort.php.
 * Author: hp <xcf-hp@foxmail.com>
 * Date: 2019/10/17 0017 上午 9:35
 * Description: sort.php.
 */

/**
 * Description:  冒泡排序
 * Author: hp <xcf-hp@foxmail.com>
 * Updater:
 * @param array $array
 * @return array
 */
function bubble(array $array){
    //谁大谁往后
    for($i=count($array)-1;$i>0;$i--){//要遍历的次数
        for($j=0;$j<$i;$j++){//要对比的次数
            $temp = $array[$j];
            if($array[$j] > $array[$j+1]){//如果前>后
                $array[$j] = $array[$j+1];//后面的值赋给前面的
                $array[$j+1] = $temp;//前面的值赋给后面的，为保证前面的值不变，设一个临时变量
            }
        }
    }
    return $array;
}
$array = range(1,100);
shuffle($array);
print_r(implode('->',$array));echo PHP_EOL;
$newArray = bubble($array);
print_r(implode('->',$newArray));
