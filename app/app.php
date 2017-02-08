<?php
    date_default_timezone_set('America/Los_Angeles');
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Tamagochi.php";

    session_start();

    if (empty($_SESSION['pets'])) {
        $_SESSION['pets'] = array();
    }

    $app = new Silex\Application();

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/../views'
    ));

    $app->get("/", function() use ($app) {

        return $app['twig']->render('pet-name.html.twig', array('my_pets' => Tamagochi::getAll()));
    });

    $app->post("/name", function() use ($app) {
        $this_pet = new Tamagochi($_POST['name']);
        $this_pet->save();
        return $app['twig']->render('name.html.twig', array('newpet' => $this_pet));
    });

    $app->post("/delete_pets", function() use ($app) {
        Tamagochi::deleteAll();
        return $app['twig']->render('delete_pets.html.twig');
    });

    return $app;
?>
