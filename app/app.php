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

    $app->post("/new", function() use ($app) {
        $selected_animal = $_POST['animals'];
        $this_pet = new Tamagochi($_POST['name'], $selected_animal, 500, 500, 500);
        $this_pet->save();

        return $app['twig']->render('new.html.twig', array('newpet' => $this_pet));
    });

    $app->post('/start-game', function() use ($app) {
        // $newpet
        return $app['twig']->render('play-game.html.twig');
    });

    $app->post("/food", function() use ($app) {
        // $thispetName = $_SESSION['pets'][0]->getName();
        // $thispetAnimal = $_SESSION['pets'][0]->getAnimal();
        // $addFood = $newpet->getFood() + 50;
        // echo $thispetName;
        return $app->redirect('/start-game');
    });

    $app->post("/delete_pets", function() use ($app) {
        Tamagochi::deleteAll();
        return $app['twig']->render('delete_pets.html.twig');
    });

    return $app;
?>
