<?php
/**
 * Created by PhpStorm.
 * User: andrii
 * Date: 02.02.17
 * Time: 18:38
 */
class IndexController implements IController
{
    public function index()
    {
        $fc = FrontController::getInstance();
//        $output = 'Hello MVC';
//        $fc->setBody($output);
        $TripRoute = new TripRoute();
        $cards = $TripRoute->getSortedCards();
        echo TripRoute::getRouteStr($cards);


    }

}