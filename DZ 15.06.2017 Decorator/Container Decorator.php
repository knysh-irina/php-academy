<?php
/**
 * Created by PhpStorm.
 * User: Users
 * Date: 22.06.2017
 * Time: 12:30
 */
class Container{
    private $weight;
    private $items = array();

    public function __construct($weight, $items = array('container')){
        $this->weight = $weight;
        if (!is_array($items)){
            $items = array($items);
        }
        $this->items = $items;
    }

    public function getWeight(){return $this->weight;}
    public function getItems(){return $this->items;}
}

class ContainerDecorator {
    protected $container;
    protected $weight;
    protected $items = array();

    public function __construct(Container $container)
    {
        $this->container = $container;
        $this->setWeight();
        $this->setItems();
    }

    public function setWeight(){
        $this->weight = $this->container->getWeight();
    }

    public function setItems(){
        $this->items = $this->container->getItems();
    }

    public function getWeight(){ return $this->weight;}
    public function getItems(){return $this->items;}
    public function getSortedItems(){
        $items= $this->getItems();
        $arr = array();
        foreach ($items as $item){
            $arr[$item] = (array_key_exists($item, $arr)?$arr[$item]:0)+1;
        }
        return $arr;
    }
}

class ContainerWithBoll extends ContainerDecorator{
    private $decorator;
    protected $weight = 1;
    protected $items = array("Boll");

    public function __construct(ContainerDecorator $decorator)
    {
       $this->decorator = $decorator;
       $this->addBoll();
    }
    public function addBoll(){
        $this->decorator->weight = $this->decorator->getWeight() + $this->weight;
        $this->decorator->items = array_merge($this->items, $this->decorator->getItems());
    }
}

class ContainerWithCup extends ContainerDecorator{
    private $decorator;
    protected $weight = 5;
    protected $items = array('Cup');

    public function __construct(ContainerDecorator $decorator)
    {
        $this->decorator = $decorator;
        $this->addCup();
    }

    public function addCup(){
        $this->decorator->weight = $this->decorator-> getWeight()+$this->weight;
        $this->decorator->items = array_merge($this->items, $this->decorator->getItems());
    }
}

$container = new  Container(12);
$decorator = new ContainerDecorator($container);
echo "Intial container: ".$container->getWeight(). "kg ". json_encode($container->getItems())."\n";
$containerWithBoll = new ContainerWithBoll($decorator);
echo "Container with boll: " . $decorator->getWeight()."kg ".json_encode($decorator->getSortedItems())."\n";
$contsinerWithCup = new ContainerWithCup($decorator);
echo "Container with cup: " . $decorator->getWeight()."kg ".json_encode($decorator->getSortedItems())."\n";
$contsinerWithCup -> addCup();
echo "Container with 2 cup: " . $decorator->getWeight()."kg ".json_encode($decorator->getSortedItems())."\n";
