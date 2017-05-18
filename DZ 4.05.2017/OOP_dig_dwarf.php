<?php


interface Digable
{
    public function dig();
}

interface abbleToDig
{
    public function canDig();
}



abstract class Char
{
    private $i = 0;
    protected $name;
    private $str = 10;
    private $dex = 10;
    private $int = 10;
    private $weapon = "";
    private $skills = [
        'fishing' => 30,
        'mining' => 75,
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

    public function attack()
    {
        $attackPower = $this->getWeapon()->getAttackPower();
    }



    function incSkill($skill)
    {

        $getSkill = $this->getSkillValue($skill);

        if ($getSkill < 45) {
            $this->incrementor($skill);

        } elseif ($getSkill < 80) {

           $this->i++;
            if ($this->i == 3) {
                $this->incrementor($skill);
            }
        } elseif ($getSkill <= 100) {

            $this->i++;
            if ($this->i == 10) {
                $this->incrementor($skill);
            }
        }
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
    public function canDig()
    {
        echo "Eho!";
    }

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

$Dwarf->setWeapon('Lopata');
if ($Dwarf instanceof Digable) {
    if ($Dwarf->getWeapon() instanceof abbleToDig) {
        $Dwarf->dig();
    } else {
        echo $Dwarf->getWeapon() . " can not dig ";
    }

} else {
    echo "Not implemented";
}


$Dwarf->incSkill('mining');
echo $Dwarf->getSkillValue('mining');