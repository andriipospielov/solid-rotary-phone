<?php

/**
 * Created by PhpStorm.
 * User: andrii
 * Date: 02.02.17
 * Time: 18:55
 */
class TripRoute
{
    private $cards= array();
    private $sortedCards;
    public static function getRouteStr($cards){
        $result ='';
        foreach ($cards as $card){
            $result .='Take the '. $card['type']. ' number '.$card['number'].' '.'from '.$card['from'].'to '. $card['to'].". ";
            $result.= (isset($card['gate']))? 'Gate: '.$card['gate'].'. ': '';
            $result.= (!empty($card['seat']))? 'Seat: '.$card['seat']: 'Seat not mentioned. ';
            $result.= (!empty($card['note']))? $card['note']."<br>": "<br>";



        }
        $result .="You have arrived at your final destination.";

        return $result;
}

    public function __construct()
    {
        include ('storage/cards.php');
        shuffle($ParsedData);
        $this->cards = $ParsedData;
    }

    public function sortCardsRecursive($needle, $array){
        foreach ($array as $key => $item) {
            if ($item['from'] == $needle){
                $this->sortedCards[] = $item;
                unset($array[$key]);
                $this->sortCardsRecursive($item['to'], $array);
                break;
            }
        }

    }

    public function getSortedCards()
    {
        foreach ($this->cards as  $card) {
//            if we have found the first card
            if (array_key_exists('start', $card)){
                $destination = $card['to'];
                $this->sortedCards[]= $card;
                $this->sortCardsRecursive($destination, $this->cards);
                break;
            }
        }
        return $this->sortedCards;

    }




}