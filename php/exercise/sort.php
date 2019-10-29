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

/**
 * Description:  insertSort
 * 左边为已经排序的分组，初次时，第一个（8）为已分组
 * 右边为未排序的分组
 * [8,5,1,2,4,10,6,7,3,9]
 * 后面的比前面的数字小，则交换位置，依次循环
 * [5,8,1,2,4,10,6,7,3,9]
 * 1分别比8、5大，则分别交换位置
 * [1,5,8,2,4,10,6,7,3,9]
 *
 * Author: hp <xcf-hp@foxmail.com>
 * Updater:
 * @param array $array
 */
function insertSort(array &$array){
    $n = count($array);
    if ($n <= 1) return;
    for($i=1;$i<$n;$i++){
        //从第二个开始,后面的与前面的比较
        $value = $array[$i];
        $f = $i - 1;
        for(;$f>=0;$f--){
            //如果前面的大于后面的
            if($array[$f] > $value){
                $array[$f+1] = $array[$f];//更换位置
            }else{
                break;//如果与前面的比较，后面的大，则跳出循环
            }
        }
        $array[$f+1] = $value;
    }
}

echo '-----------------冒泡排序-----------------'.PHP_EOL;
$array = range(1,10);
shuffle($array);
print_r(implode('->',$array));echo PHP_EOL;
$newArray = bubble($array);
print_r(implode('->',$newArray));
echo '-----------------插入排序-----------------'.PHP_EOL;
//$array = range(1,10);
//shuffle($array);
$array = [8,5,1,2,4,10,6,7,3,9];
print_r(implode('->',$array));echo PHP_EOL;
insertSort($array);
print_r(implode('->',$array));