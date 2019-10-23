<?php
/**
 * Name: linkedlist.php.
 * Author: hp <xcf-hp@foxmail.com>
 * Date: 2019/10/18 0018 上午 11:20
 * Description: linkedlist.php.
 */

require_once '../vendor/autoload.php';
use Exercise\linked_list\SingleLinkedList;
use Exercise\linked_list\SingleLinkedListOperate;

$list = new SingleLinkedList();
$list->insert(1);
$list->insert(2);
$list->insert(3);
$list->insert(4);
$list->insert(5);
$list->insert(6);
$list->insert(7);
$list->printList();

//单链表反转
$listAlgo = new SingleLinkedListOperate($list);
$listAlgo->reverse($list);
$listAlgo->list->printList();

//创建一个带环的链表
$listAlgo = new SingleLinkedListOperate($list);
$listAlgo->buildCircle($list);
var_dump($listAlgo->isCircle($list));
