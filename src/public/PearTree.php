<?php
/* 
*Creates a pear tree.
*/
class PearTree
{
    public string $id;
    public int $fruitNum; //number of fruits on the tree

    public function __construct()
    {
        $this->id = 'P-' . uniqid();
        $this->fruitNum = mt_rand(0, 20);
    }
}