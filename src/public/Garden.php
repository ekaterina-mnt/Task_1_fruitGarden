<?php
require_once('AppleTree.php');
require_once('PearTree.php');

/* 
*Creates a garden.
*/
class Garden
{
    public array $garden;
    public int $totalHarvest;
    public int $totalWeight;

    public function __construct()
    {
        $this->garden = [];
        $this->totalHarvest = 0;
        $this->totalWeight = 0;
    }


    /* Adds new tree.
    *
    *@param string $kind The kind of a tree - pear/apple
    *@param int $num The number of trees to be added
    *
    *@returns void
    */
    public function add($kind, $num)
    {
        if ($kind == 'apple') {
            for ($i = 0; $i < $num; $i++) {
                $this->garden[] = new AppleTree;
            }
        } elseif ($kind == 'pear') {
            for ($i = 0; $i < $num; $i++) {
                $this->garden[] = new PearTree;
            }
        } else {
            return 'Неверно указан вид дерева. Для того, чтобы посадить яблоню - укажите "apple", чтобы грушу - "pear".';
        }
    }


    /* Picks all the fruits.
    *
    *@returns string The amount of fruits and their weight
    */
    public function pickAll()
    {
        $apples = 0;
        $pears = 0;

        $applesWeight = 0;
        $pearsWeight = 0;

        //getting the number and weight of fruits of different kinds
        for ($i = count($this->garden); $i > 0; $i--) {
            $currentTree = $this->garden[$i - 1];

            switch (get_class($currentTree)) {
                case 'AppleTree':
                    $apples += $currentTree->fruitNum;
                    $applesWeight += $this->getOneTreeWeight($currentTree);
                    break;
                case 'PearTree':
                    $pears += $currentTree->fruitNum;
                    $pearsWeight += $this->getOneTreeWeight($currentTree);
                    break;
            }

            unset($this->garden[$i - 1]);
        }

        //Total number of fruits.
        $fruits = $apples + $pears;

        //Total weight of fruits.
        $fruitsWeight = $applesWeight + $pearsWeight;
        $gr = $fruitsWeight;
        $kg = round($fruitsWeight / 1000);

        //Define the message.
        $num = str_split("$fruits");
        $lastNum = $num[count($num) - 1];

        if (in_array($lastNum, [1])) {
            $message = 'фрукт';
        } elseif (in_array($lastNum, [2, 3, 4])) {
            $message = 'фрукта';
        } elseif (in_array($lastNum, [5, 6, 7, 8, 9, 0])) {
            $message = 'фруктов';
        }

        return "Собрано яблок: $apples шт.<br> 
            Собрано груш: $pears шт.<br>
            <b>Всего урожай:</b> $fruits $message.<br><br>
        
            Вес яблок: $applesWeight гр.<br>
            Вес груш: $pearsWeight гр.<br>
            <b>Общий вес урожая:</b> $gr гр или ~ $kg кг.";
    }


    /* Calculates the weight of a tree.
    *
    *@param AppleTree/PearTree object $currentTree
    *
    *@returns int $currentTreeWeight
    */
    protected function getOneTreeWeight($currentTree)
    {
        $currentTreeWeight = 0;
        for ($i = $currentTree->fruitNum; $i > 0; $i--) {
            switch (get_class($currentTree)) {
                case 'AppleTree':
                    $currentTreeWeight += mt_rand(150, 180);
                    break;
                case 'PearTree':
                    $currentTreeWeight += mt_rand(130, 170);
                    break;
            }
        }

        return $currentTreeWeight;
    }
}
