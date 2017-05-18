<?php


class Enum
{

}

class SkillsEnum extends Enum
{
    const MINING = 'mining';
    const FISHING = 'fishing';
    const LUMBERJACKING = 'lumberjacking';

    static function getCraftSkills()
    {
        return [self::MINING, self::LUMBERJACKING];
    }
}


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

    protected $name;
    private $str = 10;
    private $attackPower;
    private $dex = 10;
    private $int = 10;
    private $weapon = "";
    private $skills = [
        SkillsEnum::FISHING => 30,
        SkillsEnum::MINING => 75,
        SkillsEnum::LUMBERJACKING => 30
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


}

class Mining
{
    private $i = 0;
    private $skill;

    function __construct()
    {
        $this->skill = "mining";
    }

    function incSkill($who)
    {

        $getSkill = $who->getSkillValue($this->skill);

        if ($getSkill < 45) {
            $who->incrementor($this->skill);

        } elseif ($getSkill < 80) {

            $this->i++;
            if ($this->i == 3) {
                $who->incrementor($this->skill);
            }
        } elseif ($getSkill <= 100) {

            $this->i++;
            if ($this->i == 10) {
                $who->incrementor($this->skill);
            }
        }
        echo $who->getSkillValue($this->skill);
    }

}

class Backpack
{
    private $backpack = [];
    private $backpackCount = 0;
    private $backpackMax = 100;

    public function getBackpack()
    {
        return print_r($this->backpack);
    }

    public function addToBackpack($weapon)
    {
        var_dump($weapon);
        $newVeight = $this->backpackCount + $weapon::VEIGHT;
        if ($newVeight > $this->backpackMax) {
            throw new Exception('Its more than 100kg! ', 1);
        } else {

            $this->backpackCount += $weapon::VEIGHT;
            array_push($this->backpack, $weapon);
        };
        echo $this->backpackCount;
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


class Katana extends Weapon implements abbleToDig
{
    public function canDig()
    {
        echo "I can dig!";
    }

    const POWER = 50;
    const VEIGHT = 40;
}

class Lopata extends Weapon implements abbleToDig
{
    public function canDig()
    {
        echo "Eho!";
    }

    const POWER = 40;
    const VEIGHT = 40;
}

class Kirka extends Weapon
{
    const POWER = 20;
    const VEIGHT = 40;
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

$kirka = new Kirka;
$lopata = new Lopata;
$katana = new Katana;
$Dwarf->setWeapon($kirka);
if ($Dwarf instanceof Digable) {
    if ($Dwarf->getWeapon() instanceof abbleToDig) {
        $Dwarf->dig();
    } else {
        echo get_class($Dwarf->getWeapon()) . " can not dig ";
    }

} else {
    echo "Not implemented";
}


$mining = new Mining();
$mining->incSkill($Dwarf);
$mining->incSkill($Dwarf);
$mining->incSkill($Dwarf);
$mining->incSkill($Dwarf);


echo PHP_EOL;
echo $Dwarf->getSkillValue('mining');

$backpack = new Backpack;

try {
    $backpack->addToBackpack(new Kirka());
} catch (Exception $e) {
    echo $e->getMessage();
}
try {
    $backpack->addToBackpack(new Kirka());
} catch (Exception $e) {
    echo $e->getMessage();
}
try {
    $backpack->addToBackpack(new Kirka());
} catch (Exception $e) {
    echo $e->getMessage();
}





