<?php
include_once 'lib/PokerHand.php';

/*
 * To change this template, choose Tools | Templates
* and open the template in the editor.
*/

/**
 * Description of PokerUtility
 *
 * @author angelo
 */
class PokerUtility {


	//ONE PAIR
	public static function isOnePair($pokerHand) {
		$cards = $pokerHand->getCards();

		if (PokerUtility::has2CardSameRank($cards)) {
			return true;
		} else {
			return false;
		}

	}


	//TWO PAIR
	/**
	 * isTwoPair 
	 * @param unknown_type $pokerHand
	 */
	public static function isTwoPair($pokerHand) {
		$cards = $pokerHand->getCards();
		foreach ($cards as $card) {
			$ranks[] = $card->getRank();
		}
		if (PokerUtility::has2CardSameRank($cards)) {
			$uniqueRanks = array_unique($ranks);
			$expectedPairs = 2;
			$counterTwoSameRankPair = 0;
			foreach ($uniqueRanks as $rank) {
				if (PokerUtility::countCommon($rank, $ranks) >= 2) {
					$counterTwoSameRankPair++;
				}
			}

			//test if expectedPair is equal
			if ($counterTwoSameRankPair >= $expectedPairs) {
				return true;
			} else {
				return false;
			}
		} else {
			return false;
		}

	}



	// THREE OF A KIND
	public static function isThreeKind($pokerHand) {
		$cards = $pokerHand->getCards();
		if (PokerUtility::has3CardSameRank($cards)) {
			return true;
		} else {
			return false;
		}

	}


	//STRAIGHT
	/**	  
	 * isStraight 
	 * @param unknown_type $pokerHand
	 */
	public static function isStraight($pokerHand) {
		$cards = $pokerHand->getCards();
		
		if (PokerUtility::isConsecutive($cards)) {
			return true;
		} else {
			return false;
		}
	}


	//FLUSH
	public static function isFlush($pokerHand) {
		$cards = $pokerHand->getCards();

		if (PokerUtility::isAllSameSuit($cards)) {
			return true;
		} else {
			return false;
		}


	}



	//FULL HOUSE
	public static function isFullHouse($pokerHand) {
		$cards = $pokerHand->getCards();

		if (PokerUtility::has3CardSameRank($cards) && PokerUtility::has2CardSameRank($cards)) {
			return true;
		} else {
			return false;
		}

	}



	//FOUR OF A KIND
	public static function isFourKind($pokerHand) {
		$cards = $pokerHand->getCards();

		if (PokerUtility::has4CardSameRank($cards)) {
			return true;
		} else {
			return false;
		}

	}


	//STRAIGHT FLUSH
	public static function isStraightFlush($pokerHand) {
		$cards = $pokerHand->getCards();
		$isStraightFlush = false;

		if (PokerUtility::isAllSameSuit($cards) && PokerUtility::isConsecutive($cards)) {
			if (PokerUtility::getHighest($cards) != CardRank::$A) {
				$isStraightFlush = true;
			} else {
				$isStraightFlush = false;
			}
		} else {
			$isStraightFlush = false;
		}

		return $isStraightFlush;
	}



	//ROYAL FLUSH
	public static function isRoyalFlush($pokerHand) {
		$cards = $pokerHand->getCards();

		if (PokerUtility::isAllSameSuit($cards) && PokerUtility::isConsecutive($cards)) {
			if (PokerUtility::getHighest($cards) == CardRank::$A &&
					PokerUtility::getLowest($cards) == CardRank::$TEN) {
				$isRoyalFlush = true;
			} else {
				$isRoyalFlush = false;
			}
		} else {
			$isRoyalFlush = false;
		}

		return $isRoyalFlush;
	}



	//============ common utilities ===========
	/**
	*
	* @param <array> $cards
	* @return <type>
	*/
	private static function isAllSameSuit($cards) {
		foreach ($cards as $card) {
			$suits[] = $card->getSuit();
		}

		if ((count(array_unique($suits))) == 1) {
			return true;
		} else {
			return false;
		}

	}


	private static function getHighest($cards) {
		foreach ($cards as $card) {
			$ranks[] = $card->getRank();
		}
		rsort($ranks);

		return $ranks[0];
	}


	private static function getLowest($cards) {
		foreach ($cards as $card) {
			$ranks[] = $card->getRank();
		}
		sort($ranks);

		return $ranks[0];
	}


	private static function isConsecutive($cards) {
		$isConsecutive = true;
		foreach ($cards as $card) {
			$ranks[] = $card->getRank();
		}
		sort($ranks);
		$begin = PokerUtility::getLowest($cards);
		$next = $begin;

		foreach ($ranks as $value) {
			if ($next != $value) {
				$isConsecutive = false;
				break;
			}
			$next++;
		}

		return $isConsecutive;
	}

	private static function has4CardSameRank($cards) {
		foreach ($cards as $card) {
			$ranks[] = $card->getRank();
		}

		if (count(array_unique($ranks)) == 2) {
			return true;
		} else {
			return false;
		}

	}


	private static function has3CardSameRank($cards) {
		$has3CardSameRank = false;
		foreach ($cards as $card) {
			$ranks[] = $card->getRank();
		}

		$uniqueRanks = array_unique($ranks);
		foreach ($uniqueRanks as $uniqueRank) {
			if (PokerUtility::countCommon($uniqueRank, $ranks) == 3) {
				$has3CardSameRank = true;
				break;
			} else {
				$has3CardSameRank = false;
			}

		}

		return $has3CardSameRank;
	}

	
	/**
	 * has2CardSameRank 
	 * @param unknown_type $cards
	 */
	private static function has2CardSameRank($cards) {
		$has2CardSameRank = false;
		foreach ($cards as $card) {
			$ranks[] = $card->getRank();
		}
		$uniqueRanks = array_unique($ranks);
		foreach ($uniqueRanks as $uniqueRank) {
			if (PokerUtility::countCommon($uniqueRank, $ranks) >= 2) {
				$has2CardSameRank = true;
				break;
			} else {
				$has2CardSameRank = false;
			}

		}

		return $has2CardSameRank;
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
?>
