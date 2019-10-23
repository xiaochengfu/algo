<?php
/**
 * Name: SingleLinkedListOperate.php.
 * Author: hp <xcf-hp@foxmail.com>
 * Date: 2019/10/21 0021 下午 17:35
 * Description: SingleLinkedListOperate.php.
 */

namespace Exercise\linked_list;


class SingleLinkedListOperate
{
    public $list;

    public function __construct(SingleLinkedList $list = null)
    {
        $this->list = $list;
    }

    /**
     * Description:  链表反转
     * Author: hp <xcf-hp@foxmail.com>
     * Updater:
     * @param $list
     * @return mixed
     */
    public function reverse($list){
        //1. head->1->2->3->null
        $p = $list->head->next; //设置起始指针p,指向第一个元素
        $q = null;//设置一个指针q，永远指向反转后最后节点的位置
        $remain = null; //设置一个指针remain，记录要断开的节点位置
        //断开头结点
        //2. head 1->2->3->null p指向1
        $list->head->next = null;
        while ($p!=null){
            //就地反转，让当前的元素，从指向下一个，变为指向上一个
            //下一个元素的表示
            $remain = $p->next; //记录2的位置
            //断开
            //3. head 1 2->3->null
            $p->next = $q; //执行断开操作
            $q = $p;//3. head 1 2->3->null q指向1
            $p = $remain;//4. head 1 2->3->null q指向1,p指向2
            //遍历完后，n.  head 1<-2<-3<-null
        }
        $list->head->next = $q;
        return $list;
    }

    /**
     * Description:  构建循环链表
     * Author: hp <xcf-hp@foxmail.com>
     * Updater:
     * @param $list
     */
    public function buildCircle($list){
        //1->2->3->4->5->6->7->null
        $node1 = $list->head->next;
        $node2 = $node1->next;
        $node3 = $node2->next;
        $node4 = $node3->next;
        $node5 = $node4->next;
        $node6 = $node5->next;
        $node7 = $node6->next;

        //设置环
        $node7->next = $node1;
    }

    /**
     * Description:  判断是否有环
     * Author: hp <xcf-hp@foxmail.com>
     * Updater:
     * @param $list
     * @return bool
     */
    public function isCircle($list){
        if($list == null || $list->head == null || $list->head->next == null){
            return false;
        }
        /**
         * 开始
         *    f
         *    1->2->3
         *    s
         * 循环时，f如果永远在前，则不带环；
         * 若f与s相交，则带环
         *          f
         *    1->2->3
         *       s
         */
        //设置快慢指针
        $f = $list->head->next;
        $s = $list->head->next;
        while ($f != null && $f->next != null){
            $f = $f->next->next;//快指针一次走两步
            $s = $s->next;//慢指针一次走一步
            if($f == $s){
                return true;
            }
        }
        return false;
    }
}