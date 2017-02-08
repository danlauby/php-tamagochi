<?php
    date_default_timezone_set('America/Los_Angeles');
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Tamagochi.php";

    $app = new Silex\Application();

    $app->get("/my-pet", function() {
        return "";
    });

    $app->post("/view-pet", function() {
        return
        "";
    });

    return $app;
?>
