<?php
    date_default_timezone_set('America/Los_Angeles');
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Tamagochi.php";

    $app = new Silex\Application();

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/../views'
    ));

    session_start();
    if (empty($_SESSION['pets'])) {
        $_SESSION['pets'] = array();
    }

    $app->get("/", function() use ($app) {
        return $app['twig']->render('pet-name.html.twig');
    });

    $app->get("/pet-care", function() use ($app) {
        $chaos = new Tamagochi("Chaos", 500, 800, 200);
        $chaos->save();
        $pets = array($chaos);
        // return $chaos->getName();
        return $app['twig']->render('pet-care.html.twig', array('my_pets' => Tamagochi::getAll()));
    });

    $app->get("/pet-view", function() use ($app) {
        return $app['twig']->render('pet-view.html.twig');
    });

    return $app;
?>
