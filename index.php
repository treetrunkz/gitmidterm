<?php

//Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

//Start a session
session_start();

//Require files
require_once('vendor/autoload.php');

// Instantiate Fat-Free
$f3 = Base::instance();

// Turn on Fat-Free error reporting
$f3->set('DEBUG', 3);

//Define a default route
$f3->route('GET /', function() {
    //Display a view
    $view = new Template();
    echo $view->render('views/home.html');
});

$f3->route('GET|POST /survey', function($f3) {
    $midterms = array("This midterm is easy", "I like midterms", "Today is Monday");

    if (!empty($_POST['name'])) {
        $_SESSION['name'] = $_POST['name'];
    }

    if (isset($_POST['midterms'])) {
        $_SESSION['midterms'] = implode(", ", $_POST['midterms']);
    }

    $f3->set('midterms', $midterms);
    $view = new Template();
    echo $view->render('views/survey.html');
});

$f3->route('POST /summary', function($f3) {
    $f3->set('name', $_POST['name']);
    $f3->set('midterms', $_POST['midterms']);

    // Display a view
    $view = new Template();
    echo $view->render('views/summary.html');
});

//Run Fat-Free
$f3->run();