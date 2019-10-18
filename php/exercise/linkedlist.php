<?php
/**
 * Name: linkedlist.php.
 * Author: hp <xcf-hp@foxmail.com>
 * Date: 2019/10/18 0018 上午 11:20
 * Description: linkedlist.php.
 */

require_once '../vendor/autoload.php';
use Exercise\linked_list\SingleLinkedList;

$list = new SingleLinkedList();
$list->insert(1);
$list->insert(2);
$list->insert(3);
$list->insert(4);
$list->insert(5);
$list->insert(6);
$list->insert(7);
$list->printList();

