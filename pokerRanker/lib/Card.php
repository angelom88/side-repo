<?php
include_once 'CardRank.php';
include_once 'CardSuit.php';

/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PokerHand
 *
 * @author angelo
 */
class Card {
    //put your code here

  private $rank;
  private $suit;


  public function  __construct($rank, $suit) {
    $this->rank = $rank;
    $this->suit = $suit;
  }

  public function setRank($rank) {
    $this->rank = $rank;
  }

  public function getRank() {
    return $this->rank;
  }


  public function setSuit($suit) {
    $this->suit = $suit;
  }

  public function getSuit() {
    return $this->suit;
  }




}
?>
