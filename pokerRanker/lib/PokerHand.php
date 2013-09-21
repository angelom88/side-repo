<?php
/*
 * To change this template, choose Tools | Templates
* and open the template in the editor.
*/

/**
 * Description of PokerHand
 *
 * @author angelo
 */
class PokerHand {
	//put your code here

	private $cards;
	private $rank;


	public function  __construct($cards) {
		$this->cards = $cards;
	}


	public function setCards($cards) {
		$this->cards = $cards;
	}

	public function getCards() {
		return $this->cards;
	}

	public function setRank($rank) {
		$this->rank = $rank;
	}

	public function getRank() {
		return $this->rank;
	}

}
?>
