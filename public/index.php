<?php
    header('content-type: application/json; charset=utf-8');
    header("access-control-allow-origin: *");

    use  App\core\Application as App;
    
    require realpath(__DIR__.'/../vendor/autoload.php');
    
    $app =  new App;
   
    
    
   
?>
