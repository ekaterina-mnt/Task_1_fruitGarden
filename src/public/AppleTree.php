<?php
/* 
*Creates an apple tree.
*/
class AppleTree
{
    public string $id;
    public int $fruitNum; //number of fruits on the tree

    public function __construct()
    {
        $this->id = 'A-' . uniqid();
        $this->fruitNum = mt_rand(40, 50);
    }
}