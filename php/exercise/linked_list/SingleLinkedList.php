<?php
/**
 * Name: singleLinkedList.phpst.php.
 * Author: hp <xcf-hp@foxmail.com>
 * Date: 2019/10/18 0018 上午 11:03
 * Description: singleLinkedList.phpst.php.
 */

namespace Exercise\linked_list;

class SingleLinkedList
{
    public $head;
    private $length;

    public function __construct($head = null)
    {
        /**
         * head 里包含数据节点（data和next)
         */
       if($head == null){
            $this->head = new SingleLinkedNode();
       }else{
           $this->head = $head;
       }
       $this->length = 0;
    }

    public function getLength(){
        return $this->length;
    }

    public function insert($data){

        // 1(next) -> x(next) -> 2
        //原节点
        $originNode = $this->head;

        //新节点
        $newNode = new SingleLinkedNode();

        $newNode->data = $data;
        $newNode->next = $originNode->next; //新节点的next指向的是原接点的next指向
        $originNode->next = $newNode;//原节点的next指向的是新节点

        $this->length++;
        return $newNode;
    }

    public function printList(){
        if($this->head->next == null){
            return false;
        }
        $currentNode = $this->head;
        $listLength = $this->getLength();
        while ($currentNode->next != null && $listLength--){
            echo $currentNode->next->data . '->' ;
            $currentNode = $currentNode->next;
        }
        echo 'NULL' . PHP_EOL;
        return true;
    }
}