<?php
// turn on error reporting
ini_set('display_error', 1);
error_reporting(E_ALL);

// require the autoload file
require_once('vendor/autoload.php');
require_once('model/data-layer.php');

// create an instance of the base class
$f3 = Base::instance();

// Define a default route
$f3->route('GET /', function () {
    // fat free - taking the view page and rendering it in the browser
    $view = new Template();
    echo $view->render('/views/home.html');
});

// SURVEY ROUTE
$f3->route('GET /survey', function ($f3) {
    // fat free - taking the view page and rendering it in the browser
    $f3->set('options', getCheckboxes());
    $view = new Template();
    echo $view->render('/views/survey.html');
});

// SUMMARY ROUTE
$f3->route('POST /summary', function ($f3) {
    // fat free - taking the view page and rendering it in the browser
    //var_dump($_POST);
    $f3->set('ops', implode(', ', $_POST['options']));
    $view = new Template();
    echo $view->render('/views/summary.html');
});

// Run fat free
$f3->run();
