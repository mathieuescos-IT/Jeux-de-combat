<?php
namespace classes;

class Mage extends Character
{
    private $shield = False;

    function __construct(string $name) {
        parent::__construct($name);
        $this->magicPoints *= 7;
    }

    public function attack(Character $target) {
        $rand = rand(1, 2);
        if ($rand == 1 || $this->shield) {
            $status = $this->fireball($target);
        } else if ($rand == 2) {
            $status = $this->shield();
        }
        return $status;
    }

    private function fireball(Character $target) {
        $rand = rand(5, 10);
        if ($rand <= $this->magicPoints) {
            $atk = $rand*1.5;
            $this->magicPoints -= $rand;
            $target->setLifePoints($atk);
            $status = "{$this->name} lance une boule de feu à {$target->name}! Il reste {$target->getLifePoints()} à {$target->name} !";
        } else if ($this->magicPoints > 0) {
            $atk = $this->magicPoints*1.5;
            $this->magicPoints = 0;
            $target->setLifePoints($atk);
            $status = "{$this->name} lance une boule de feu à {$target->name}! Il reste {$target->getLifePoints()} à {$target->name} !";
        } else {
            $target->setLifePoints(2);
            $status = "{$this->name} n'a plus de point de magie, et attaque {$target->name} au couteau (ahah)! Il reste {$target->getLifePoints()} à {$target->name} !";
        }
        return $status;
    }

    private function shield() {
        $this->shield = True;
        $status = "{$this->name} lance un bouclier magique pour se protéger!";
        return $status;
    }

    public function setLifePoints($dmg) {
        if (!$this->shield) {
            $this->lifePoints -= round($dmg);
            if ($this->lifePoints < 0) {
                $this->lifePoints = 0;
            }
        }
        $this->shield = False;
        return;
    }
}
