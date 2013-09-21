<?php
include_once 'PokerUtility.php';
/*
 * To change this template, choose Tools | Templates
* and open the template in the editor.
*/

/**
 * Description of PokerRank
 *
 * @author angelo
 */
class PokerRank {
	//put your code here

	public static $ROYAL_FLUSH      = 1;
	public static $STRAIGHT_FLUSH   = 2;
	public static $FOUR_KIND        = 3;
	public static $FULL_HOUSE       = 4;
	public static $FLUSH            = 5;
	public static $STRAIGHT         = 6;
	public static $THREE_KIND       = 7;
	public static $TWO_PAIR         = 8;
	public static $ONE_PAIR         = 9;
	public static $HIGH_CARD        = 10;

	private $pokerHands;
	private $rankValue;

	public function  __construct($pokerHands) {
		$this->pokerHands = $pokerHands;
	}


	public function setpokerHands($pokerHands) {
		$this->pokerHands = $pokerHands;
	}

	public function getpokerHands() {
		return $this->pokerHands;
	}


	public function setRankValue($rankValue) {
		$this->rankValue = $rankValue;
	}

	public function getRankValue() {
		return $this->rankValue;
	}


	public function computeRanking() {
		$index = 0;

		foreach ($this->getpokerHands() as $pokerHand) {
			$tmpPlayers[$index]['cards'] = $pokerHand->getCards();
			$tmpPlayers[$index]['ruleRanking'] = PokerRank::getRuleRankValue($pokerHand);
			$index++;
		}
		usort($tmpPlayers, "compareByRankingValue");
		$index = 1;
		foreach ($tmpPlayers as $player) {
			$player['playerRank'] = $index;
			$players[] = $player;
			$index++;
		}
		return $players;

	}


	private static function getRuleRankValue($pokerHand) {

		if (PokerUtility::isRoyalFlush($pokerHand)) {
			return PokerRank::$ROYAL_FLUSH;
		} elseif (PokerUtility::isStraightFlush($pokerHand)) {
			return PokerRank::$STRAIGHT_FLUSH;
		} elseif (PokerUtility::isFourKind($pokerHand)) {
			return PokerRank::$FOUR_KIND;
		} elseif (PokerUtility::isFullHouse($pokerHand)) {
			return PokerRank::$FULL_HOUSE;
		} elseif (PokerUtility::isFlush($pokerHand)) {
			return PokerRank::$FLUSH;
		} elseif (PokerUtility::isStraight($pokerHand)) {
			return PokerRank::$STRAIGHT;
		} elseif (PokerUtility::isThreeKind($pokerHand)) {
			return PokerRank::$THREE_KIND;
		} elseif (PokerUtility::isTwoPair($pokerHand)) {
			return PokerRank::$TWO_PAIR;
		} elseif (PokerUtility::isOnePair($pokerHand)) {
			return PokerRank::$ONE_PAIR;
		} else {
			return PokerRank::$HIGH_CARD;
		}

	}



	/**
	 *
	 * @param <type> $ranks
	 * @return <type>
	 */
	public static function getFinalRanks($ranks) {

		$index = 0;
		foreach ($ranks as $rank) {
			$tmpRanks[$index]['number'] = $rank;
			$counter = PokerRank::countCommon($rank, $ranks);
			$tmpRanks[$index]['counter'] = $counter;

			$index++;
		}
		usort($tmpRanks, "compareByCounter");

		foreach ($tmpRanks as $tmpRank) {
			$finalRanks[] = $tmpRank['number'];
		}
		return $finalRanks;

	}


	/**
	 * Count Common
	 * @param <type> $find
	 * @param <type> $list
	 * @return int
	 */
	private static function countCommon($find, $list) {
		$counter = 0;

		foreach ($list as $element) {
			if ($find == $element) {
				$counter++;
			}
		}

		return $counter;
	}


}


//custom compare
//compare based by rule ranking if equal then go to cards ranking individually
function compareByRankingValue($a, $b) {
	if ($a['ruleRanking'] == $b['ruleRanking']) {
		$strCardsA = '';
		$strCardsB = '';
		foreach ($a['cards'] as $card) {
			$aRanks[] = $card->getRank();
		}

		foreach ($b['cards'] as $card) {
			$bRanks[] = $card->getRank();
		}
		rsort($aRanks);
		rsort($bRanks);

		foreach ($bRanks as $bRank) {
			$strCardsB = $strCardsB . $bRank;
		}

		foreach ($aRanks as $aRank) {
			$strCardsA = $strCardsA . $aRank;
		}

		$strCardsA = '';
		$strCardsB = '';
		$aRanks = PokerRank::getFinalRanks($aRanks);
		$bRanks = PokerRank::getFinalRanks($bRanks);

		foreach ($aRanks as $aRank) {
			$strCardsA = $strCardsA . $aRank;
		}

		foreach ($bRanks as $bRank) {
			$strCardsB = $strCardsB . $bRank;
		}
		$comp = strcmp($strCardsA, $strCardsB);
		$comp = $comp * -1;

		return $comp;

	} else {
		return ($a['ruleRanking'] < $b['ruleRanking']) ? -1 : 1;
	}



}


/**
 * Compare by Counter
 * @param unknown_type $a
 * @param unknown_type $b
 */
function compareByCounter($a, $b) {
	if ($a['counter'] == $b['counter']) {
		return compareByRank($a, $b);
	} else {
		return ($a['counter'] < $b['counter']) ? 1 : -1;
	}

}


/**
 * compareByRank
 * @param <type> $a
 * @param <type> $b
 * @return <type>
 */
function compareByRank($a, $b) {
	if ($a['number'] == $b['number']) {
		return 0;
	} else {
		$a = (int)$a['number'];
		$b = (int)$b['number'];
		$value = ($a < $b) ? 1 : -1;

		return $value;
	}

}





?>
