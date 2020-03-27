<?php
namespace classes;

class Warrior extends Character
{
    private $boost = False;
    // Soit attaquer (80%)
    // Soit il peut charger sont attaque. Au tour suivant, il fait dégat * (1.7, 3). (20%)

    public function __construct($name) {
        parent::__construct($name);
    }

    public function attack(Character $target) {
        $rand = rand(1, 10);
        if ($rand <= 8 || $this->boost) {
            return $this->sword($target);
        } else if ($rand > 8) {
            return $this->boost();
        }
    }

    private function sword(Character $target) {
        $attack = rand(5, 15);
        if ($this->boost) {
            $rand = rand(17, 30);
            $rand /= 10;
            $attack *= $rand;
            $this->boost = False;
        }
        $target->setLifePoints($attack);
        $status = "$this->name attaque {$target->name}! Il reste {$target->getLifePoints()} à {$target->name} !";
        return $status;
    }

    private function boost() {
        $this->boost = True;
        $status = "{$this->name} se concentre pour taper plus fort!";
        return $status;
    }
}
