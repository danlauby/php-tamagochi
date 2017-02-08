<?php
    class Tamagochi
    {
        private $name;
        private $food;
        private $play;
        private $sleep;

        function __construct($name, $food, $play, $sleep)
        {
            $this->name = $name;
            $this->food = $food;
            $this->play = $play;
            $this->sleep = $sleep;
        }

        function getName()
        {
            return $this->name;
        }

        function setName($newName)
        {
            $this->name = (string) $newName;
        }

        function getFood()
        {
            return $this->food;
        }

        function setFood($newFood)
        {
            $this->food = (string) $newFood;
        }

        function getPlay()
        {
            return $this->play;
        }

        function setPlay($newPlay)
        {
            $this->play = (string) $newPlay;
        }

        function getSleep()
        {
            return $this->sleep;
        }

        function setSleep($newSleep)
        {
            $this->sleep = (string) $newSleep;
        }

        function save()
        {
            array_push($_SESSION['pets'], $this);
        }
        static function getAll()
        {
            return $_SESSION['pets'];
        }

    }

 ?>
