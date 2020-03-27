<?php
namespace classes;

class Druide extends Character
{
    private $regenererVie = False;
    private $forceForet;
    private $coupBaton;
    private $compteurTour = 0;

    public function __construct($name) {
        parent :: __construct($name);
    }

    public function attack(Character $target) {
        $rand = rand(1, 10);
        if ($rand == 1) {
            $status = $this->regenererVie($target); // On regénère la vie !
        }
        else if ($rand == 4) {
            $status = $this->forceForet(); // force de la foret
        }
        else{
            $status = $this->coupBaton($target); // "Le planter du baton !"
        }
        return $status;
    }

    private function regenererVie() {
        $this->regenererVie = True;
        $this->lifePoints = 100;
        $status = "{$this->name} retrouve tous ses points de vie ! (100 points)";
        return $status;
    }

    private function forceForet() {
        $this->compteurTour = 3;
        $status = "{$this->name} se prépare à invoquer la force de la forêt !";
        return $status;
    }

    private function coupBaton(Character $target) {
        $attack = rand(5, 15);
        if ($this->compteurTour > 0) {
            $attack *= 1.5;
            $this->compteurTour -= 1;
        }

        $target->setlifePoints($attack);
        $status = "{$this->name} fait le planter de bâton à {$target->name}. Il reste {$target->getLifePoints()} à {$target->name} !";
        return $status;
    }
}
