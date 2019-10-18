<?php
/**
 * Name: SingleLinkedNodeedNode.php.
 * Author: hp <xcf-hp@foxmail.com>
 * Date: 2019/10/18 0018 上午 11:04
 * Description: SingleLinkedNode.phpde.php.
 */

namespace Exercise\linked_list;


class SingleLinkedNode
{
    public $data;
    public $next;

    public function __construct($data = null)
    {
        $this->data = $data;
        $this->next = null;
    }
}