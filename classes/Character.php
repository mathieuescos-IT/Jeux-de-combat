<?php
namespace classes;

class Character
{
    public static $pv = 350;
    public $name;
    protected $lifePoints = 100;
    public $magicPoints = 10;

    function __construct(string $name) {
        $this->name = $name;
    }

    public function getLifePoints() {
        return $this->lifePoints;
    }

    public function setLifePoints($dmg) {
        $this->lifePoints -= round($dmg);
        if ($this->lifePoints < 0) {
            $this->lifePoints = 0;
        }
        return;
    }
    
}
