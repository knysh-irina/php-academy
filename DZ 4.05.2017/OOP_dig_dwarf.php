<?php

interface Digable
{
    public function dig();
}

interface abbleToDig{
    public function weaponInArms();
}

abstract class Char
{

    protected $name;
    private $str = 10;
    private $dex = 10;
    private $int = 10;
    private $weapon = "";
    private $skills = [
        'fishing' => 30,
        'mining' => 30,
        'lumberjacking' => 30
    ];

    public function incrementor($skill)
    {
        return $this->skills[$skill] = $this->skills[$skill] + 0.1;
    }

    public function getSkillValue($skill)
    {
        return $this->skills[$skill];
    }

    public function getWeapon()
    {
        return $this->weapon;
    }

    public function setWeapon($weapon)
    {
        return $this->weapon = $weapon;
    }

    public function getAttackPower()
    {
        return $this->attackPower;
    }

   public function __construct($name)
   {
       $this->name = $name;
   }
   public function attack(){
        $attackPower = $this->getWeapon()->getAttackPower();
   }


}

abstract class Weapon
{
    private $name;
    private $attackPower = 50;

    public function __construct()
    {
        $this->name = __CLASS__;
    }

    public function setPower($power)
    {
        $this->power = self::POWER;
    }
}


abstract class Katana extends Weapon implements abbleToDig
{
    const POWER = 50;
}
abstract class Lopata extends Weapon implements abbleToDig
{
    const POWER = 40;
}
abstract class Kirka extends Weapon
{
    const POWER = 20;
}

class Dwarf extends Char implements Digable
{
    public function dig()
    {
        echo "I can dig";
        $i = 0;
        if ($this->getSkillValue('mining')<45  ){
            $this->incrementor('mining');
        } elseif ($this->getSkillValue('mining')<80){
            $i++;
            if ($i == 3){
                $this->incrementor('mining');
            }
        } elseif ($this->getSkillValue('mining')<=100){
            $i++;
            if ($i == 10){
                $this->incrementor('mining');
            }
        }
    }
}

$Dwarf = new Dwarf("Tomas");

class Human extends Char implements Digable
{
    public function dig()
    {
        echo "I can dig";
    }

}

$Human = new Human("Jeck");

$Dwarf->setWeapon('Kirka');
if ($Dwarf instanceof Digable) {
    if ($Dwarf->getWeapon() instanceof abbleToDig ){
        $Dwarf->dig();
    } else {echo $Dwarf->getWeapon(). " can not to dig "; }

} else {
    echo "Not implemented";
}


