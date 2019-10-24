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

    /**
     * Description:  从第key个节点后，插入新节点
     * Author: hp <xcf-hp@foxmail.com>
     * Updater:
     * @param $key
     * @param $data
     */
    public function insertNodeInKeyAfter($key,$data){
        // 1->2->3 3.5 ->4->null
        $currentNode = $this->head->next;
        for($i=0;$i<$key;$i++){
           $currentNode =  $currentNode->next;
        }
        $newNode = new SingleLinkedNode();

        $newNode->data = $data;
        $newNode->next = $currentNode->next;
        $currentNode->next = $newNode;
        $this->length++;
    }

    /**
     * Description:  删除第key个节点
     * Author: hp <xcf-hp@foxmail.com>
     * Updater:
     * @param $key
     */
    public function deleteNodeInKeyAfter($key){
        // 1->2->3
        $loopNode = $this->head->next;
        for($i=0;$i<$key;$i++){
            $loopNode = $loopNode->next;
        }
        //       k
        // 1->2->3 3.5 4->5
        $q = $loopNode->next->next;
        $loopNode->next = $q;
        $this->length--;
    }

    public function deleteLastN($n){
        /**
         *  利用2个指针，快速查找第n个节点
         *  假设 n=2,让第一个指针p指向第2（n)个节点
         *           p
         *  head->1->2->3->4->5->6->7->null
         *  q
         *  让第二个指针q指向头结点
         *  开始循环，直到p指针指向null
         *                          p
         *  head->1->2->3->4->5->6->7->null
         *                    q
         * 极端情况，当删除倒数第0个时
         *                          p
         *  head->1->2->3->4->5->6->7->null
         *                      pre q
         */
        $p = $this->head;
        $q = $this->head;
        //先让p指向第n个节点
        $i = 0;
        while ($p != null && $i<$n){
            $p = $p->next;
            $i++;
        }
        if($p == null){
            return true;
        }

        //让p指向最后的节点
        $pre = null;
        while ($p->next != null){
            $pre = $q;
            $p = $p->next;
            $q = $q->next;
        }
        if($q->next == null){
            $pre->next = null;
        }else{
            $q->next = $q->next->next;
        }


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