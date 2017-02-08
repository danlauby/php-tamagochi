<?php
    class Tamagotchi
    {
        private $food;
        private $play;
        private $sleep;

        function __construct($food, $play, $sleep)
        {
            $this->food = $food;
            $this->play = $play;
            $this->sleep = $sleep;
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

        // function save()
        // {
        //     array_push($_SESSION[])
        // }

    }

 ?>
