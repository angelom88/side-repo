<?php
include_once 'lib/PokerUtility.php';
include_once 'lib/Card.php';
include_once 'lib/PokerRank.php';



//one pair
unset ($cards);
$card1 = new Card(CardRank::$NINE, CardSuit::$DIAMOND);
$card2 = new Card(CardRank::$FIVE, CardSuit::$CLUB);
$card3 = new Card(CardRank::$THREE, CardSuit::$HEART);
$card4 = new Card(CardRank::$FOUR, CardSuit::$SPADE);
$card5 = new Card(CardRank::$FIVE, CardSuit::$DIAMOND);

$cards[] =  $card3;
$cards[] =  $card5;
$cards[] =  $card1;
$cards[] =  $card2;
$cards[] =  $card4;
$pokerHand = new PokerHand($cards);
$pokerHands[] = $pokerHand;
//var_dump(PokerUtility::isOnePair($pokerHand));
//-----------------------------------------------------------


//straight flush
unset ($cards);
$card1 = new Card(CardRank::$NINE, CardSuit::$DIAMOND);
$card2 = new Card(CardRank::$K, CardSuit::$DIAMOND);
$card3 = new Card(CardRank::$Q, CardSuit::$DIAMOND);
$card4 = new Card(CardRank::$J, CardSuit::$DIAMOND);
$card5 = new Card(CardRank::$TEN, CardSuit::$DIAMOND);

$cards[] =  $card3;
$cards[] =  $card5;
$cards[] =  $card1;
$cards[] =  $card2;
$cards[] =  $card4;
$pokerHand = new PokerHand($cards);
$pokerHands[] = $pokerHand;
//var_dump(PokerUtility::isStraightFlush($pokerHand));
//-----------------------------------------------------------


//four of a kind
unset ($cards);
$card1 = new Card(CardRank::$NINE, CardSuit::$DIAMOND);
$card2 = new Card(CardRank::$NINE, CardSuit::$CLUB);
$card3 = new Card(CardRank::$NINE, CardSuit::$HEART);
$card4 = new Card(CardRank::$NINE, CardSuit::$SPADE);
$card5 = new Card(CardRank::$TEN, CardSuit::$DIAMOND);

$cards[] =  $card3;
$cards[] =  $card5;
$cards[] =  $card1;
$cards[] =  $card2;
$cards[] =  $card4;
$pokerHand = new PokerHand($cards);
$pokerHands[] = $pokerHand;
//var_dump(PokerUtility::isFourKind($pokerHand));
//-----------------------------------------------------------



//full house
unset ($cards);
$card1 = new Card(CardRank::$NINE, CardSuit::$DIAMOND);
$card2 = new Card(CardRank::$NINE, CardSuit::$CLUB);
$card3 = new Card(CardRank::$NINE, CardSuit::$HEART);
$card4 = new Card(CardRank::$TWO, CardSuit::$SPADE);
$card5 = new Card(CardRank::$TWO, CardSuit::$DIAMOND);

$cards[] =  $card3;
$cards[] =  $card5;
$cards[] =  $card1;
$cards[] =  $card2;
$cards[] =  $card4;
$pokerHand = new PokerHand($cards);
$pokerHands[] = $pokerHand;
//var_dump(PokerUtility::isFullHouse($pokerHand));
//-----------------------------------------------------------



//flush
unset ($cards);
$card1 = new Card(CardRank::$NINE, CardSuit::$DIAMOND);
$card2 = new Card(CardRank::$SIX, CardSuit::$DIAMOND);
$card3 = new Card(CardRank::$THREE, CardSuit::$DIAMOND);
$card4 = new Card(CardRank::$EIGHT, CardSuit::$DIAMOND);
$card5 = new Card(CardRank::$TWO, CardSuit::$DIAMOND);

$cards[] =  $card3;
$cards[] =  $card5;
$cards[] =  $card1;
$cards[] =  $card2;
$cards[] =  $card4;
$pokerHand = new PokerHand($cards);
$pokerHands[] = $pokerHand;
//var_dump(PokerUtility::isFlush($pokerHand));
//-----------------------------------------------------------


//straight
unset ($cards);
$card1 = new Card(CardRank::$FIVE, CardSuit::$DIAMOND);
$card2 = new Card(CardRank::$SIX, CardSuit::$DIAMOND);
$card3 = new Card(CardRank::$THREE, CardSuit::$CLUB);
$card4 = new Card(CardRank::$FOUR, CardSuit::$DIAMOND);
$card5 = new Card(CardRank::$TWO, CardSuit::$DIAMOND);

$cards[] =  $card3;
$cards[] =  $card5;
$cards[] =  $card1;
$cards[] =  $card2;
$cards[] =  $card4;
$pokerHand = new PokerHand($cards);
$pokerHands[] = $pokerHand;
//var_dump(PokerUtility::isStraight($pokerHand));
//-----------------------------------------------------------


//three of a kind
unset ($cards);
$card1 = new Card(CardRank::$NINE, CardSuit::$DIAMOND);
$card2 = new Card(CardRank::$NINE, CardSuit::$CLUB);
$card3 = new Card(CardRank::$NINE, CardSuit::$HEART);
$card4 = new Card(CardRank::$THREE, CardSuit::$SPADE);
$card5 = new Card(CardRank::$TWO, CardSuit::$DIAMOND);

$cards[] =  $card3;
$cards[] =  $card5;
$cards[] =  $card1;
$cards[] =  $card2;
$cards[] =  $card4;
$pokerHand = new PokerHand($cards);
$pokerHands[] = $pokerHand;
//var_dump(PokerUtility::isThreeKind($pokerHand));
//-----------------------------------------------------------


//two pair
unset ($cards);
$card1 = new Card(CardRank::$NINE, CardSuit::$DIAMOND);
$card2 = new Card(CardRank::$TWO, CardSuit::$CLUB);
$card3 = new Card(CardRank::$THREE, CardSuit::$HEART);
$card4 = new Card(CardRank::$THREE, CardSuit::$SPADE);
$card5 = new Card(CardRank::$TWO, CardSuit::$DIAMOND);

$cards[] =  $card3;
$cards[] =  $card5;
$cards[] =  $card1;
$cards[] =  $card2;
$cards[] =  $card4;
$pokerHand = new PokerHand($cards);
$pokerHands[] = $pokerHand;
//var_dump(PokerUtility::isTwoPair($pokerHand));
//-----------------------------------------------------------





//royal flush
unset ($cards);
$card1 = new Card(CardRank::$A, CardSuit::$DIAMOND);
$card2 = new Card(CardRank::$K, CardSuit::$DIAMOND);
$card3 = new Card(CardRank::$Q, CardSuit::$DIAMOND);
$card4 = new Card(CardRank::$J, CardSuit::$DIAMOND);
$card5 = new Card(CardRank::$TEN, CardSuit::$DIAMOND);

$cards[] =  $card3;
$cards[] =  $card5;
$cards[] =  $card1;
$cards[] =  $card2;
$cards[] =  $card4;
$pokerHand = new PokerHand($cards);
$pokerHands[] = $pokerHand;

//var_dump(PokerUtility::isRoyalFlush($pokerHand));
//-----------------------------------------------------------



//one pair
unset ($cards);
$card1 = new Card(CardRank::$EIGHT, CardSuit::$DIAMOND);
$card2 = new Card(CardRank::$EIGHT, CardSuit::$CLUB);
$card3 = new Card(CardRank::$THREE, CardSuit::$HEART);
$card4 = new Card(CardRank::$FOUR, CardSuit::$SPADE);
$card5 = new Card(CardRank::$FIVE, CardSuit::$DIAMOND);

$cards[] =  $card3;
$cards[] =  $card5;
$cards[] =  $card1;
$cards[] =  $card2;
$cards[] =  $card4;
$pokerHand = new PokerHand($cards);
$pokerHands[] = $pokerHand;
//var_dump(PokerUtility::isOnePair($pokerHand));
//-----------------------------------------------------------


//one pair
unset ($cards);
$card1 = new Card(CardRank::$EIGHT, CardSuit::$DIAMOND);
$card2 = new Card(CardRank::$EIGHT, CardSuit::$CLUB);
$card3 = new Card(CardRank::$THREE, CardSuit::$HEART);
$card4 = new Card(CardRank::$TWO, CardSuit::$SPADE);
$card5 = new Card(CardRank::$FIVE, CardSuit::$DIAMOND);

$cards[] =  $card3;
$cards[] =  $card5;
$cards[] =  $card1;
$cards[] =  $card2;
$cards[] =  $card4;
$pokerHand = new PokerHand($cards);
$pokerHands[] = $pokerHand;
//var_dump(PokerUtility::isOnePair($pokerHand));
//-----------------------------------------------------------





unset ($cards);
$card1 = new Card(CardRank::$EIGHT, CardSuit::$CLUB);
$card5 = new Card(CardRank::$TWO, CardSuit::$DIAMOND);
$card2 = new Card(CardRank::$NINE, CardSuit::$SPADE);
$card3 = new Card(CardRank::$Q, CardSuit::$HEART);
$card4 = new Card(CardRank::$A, CardSuit::$SPADE);

$cards[] =  $card3;
$cards[] =  $card1;
$cards[] =  $card2;
$cards[] =  $card4;
$cards[] =  $card5;
$pokerHand = new PokerHand($cards);
$pokerHands[] = $pokerHand;
//-----------------------------------------------------------




unset ($cards);
$card1 = new Card(CardRank::$EIGHT, CardSuit::$DIAMOND);
$card2 = new Card(CardRank::$J, CardSuit::$CLUB);
$card3 = new Card(CardRank::$Q, CardSuit::$HEART);
$card4 = new Card(CardRank::$FIVE, CardSuit::$SPADE);
$card5 = new Card(CardRank::$TWO, CardSuit::$DIAMOND);

$cards[] =  $card3;
$cards[] =  $card5;
$cards[] =  $card1;
$cards[] =  $card2;
$cards[] =  $card4;
$pokerHand = new PokerHand($cards);
$pokerHands[] = $pokerHand;
//-----------------------------------------------------------






unset ($cards);
$card1 = new Card(CardRank::$SEVEN, CardSuit::$DIAMOND);
$card2 = new Card(CardRank::$J, CardSuit::$CLUB);
$card3 = new Card(CardRank::$Q, CardSuit::$HEART);
$card4 = new Card(CardRank::$FIVE, CardSuit::$SPADE);
$card5 = new Card(CardRank::$TWO, CardSuit::$DIAMOND);

$cards[] =  $card3;
$cards[] =  $card5;
$cards[] =  $card1;
$cards[] =  $card2;
$cards[] =  $card4;
$pokerHand = new PokerHand($cards);
$pokerHands[] = $pokerHand;
//-----------------------------------------------------------






unset ($cards);
$card1 = new Card(CardRank::$A, CardSuit::$DIAMOND);
$card2 = new Card(CardRank::$THREE, CardSuit::$CLUB);
$card3 = new Card(CardRank::$SIX, CardSuit::$HEART);
$card4 = new Card(CardRank::$FIVE, CardSuit::$SPADE);
$card5 = new Card(CardRank::$TWO, CardSuit::$DIAMOND);

$cards[] =  $card3;
$cards[] =  $card5;
$cards[] =  $card1;
$cards[] =  $card2;
$cards[] =  $card4;
$pokerHand = new PokerHand($cards);
$pokerHands[] = $pokerHand;
//-----------------------------------------------------------





unset ($cards);
$card1 = new Card(CardRank::$TWO, CardSuit::$DIAMOND);
$card2 = new Card(CardRank::$TEN, CardSuit::$CLUB);
$card3 = new Card(CardRank::$FIVE, CardSuit::$HEART);
$card4 = new Card(CardRank::$NINE, CardSuit::$SPADE);
$card5 = new Card(CardRank::$FOUR, CardSuit::$DIAMOND);

$cards[] =  $card3;
$cards[] =  $card5;
$cards[] =  $card1;
$cards[] =  $card2;
$cards[] =  $card4;
$pokerHand = new PokerHand($cards);
$pokerHands[] = $pokerHand;
//-----------------------------------------------------------





unset ($cards);
$card1 = new Card(CardRank::$TWO, CardSuit::$DIAMOND);
$card2 = new Card(CardRank::$TEN, CardSuit::$CLUB);
$card3 = new Card(CardRank::$FIVE, CardSuit::$HEART);
$card4 = new Card(CardRank::$EIGHT, CardSuit::$SPADE);
$card5 = new Card(CardRank::$FOUR, CardSuit::$DIAMOND);

$cards[] =  $card3;
$cards[] =  $card5;
$cards[] =  $card1;
$cards[] =  $card2;
$cards[] =  $card4;
$pokerHand = new PokerHand($cards);
$pokerHands[] = $pokerHand;
//-----------------------------------------------------------



unset ($cards);
$card1 = new Card(CardRank::$TWO, CardSuit::$DIAMOND);
$card2 = new Card(CardRank::$THREE, CardSuit::$CLUB);
$card3 = new Card(CardRank::$SEVEN, CardSuit::$HEART);
$card4 = new Card(CardRank::$FIVE, CardSuit::$SPADE);
$card5 = new Card(CardRank::$SIX, CardSuit::$DIAMOND);

$cards[] =  $card3;
$cards[] =  $card5;
$cards[] =  $card1;
$cards[] =  $card2;
$cards[] =  $card4;
$pokerHand = new PokerHand($cards);
$pokerHands[] = $pokerHand;
//-----------------------------------------------------------



unset ($cards);
$card1 = new Card(CardRank::$TWO, CardSuit::$DIAMOND);
$card2 = new Card(CardRank::$EIGHT, CardSuit::$CLUB);
$card3 = new Card(CardRank::$SEVEN, CardSuit::$HEART);
$card4 = new Card(CardRank::$FIVE, CardSuit::$SPADE);
$card5 = new Card(CardRank::$SIX, CardSuit::$DIAMOND);

$cards[] =  $card3;
$cards[] =  $card5;
$cards[] =  $card1;
$cards[] =  $card2;
$cards[] =  $card4;
$pokerHand = new PokerHand($cards);
$pokerHands[] = $pokerHand;
//-----------------------------------------------------------



unset ($cards);
$card1 = new Card(CardRank::$TWO, CardSuit::$DIAMOND);
$card2 = new Card(CardRank::$EIGHT, CardSuit::$CLUB);
$card3 = new Card(CardRank::$SEVEN, CardSuit::$HEART);
$card4 = new Card(CardRank::$FOUR, CardSuit::$SPADE);
$card5 = new Card(CardRank::$SIX, CardSuit::$DIAMOND);

$cards[] =  $card3;
$cards[] =  $card5;
$cards[] =  $card1;
$cards[] =  $card2;
$cards[] =  $card4;
$pokerHand = new PokerHand($cards);
$pokerHands[] = $pokerHand;
//-----------------------------------------------------------



unset ($cards);
$card1 = new Card(CardRank::$TWO, CardSuit::$DIAMOND);
$card2 = new Card(CardRank::$THREE, CardSuit::$CLUB);
$card3 = new Card(CardRank::$K, CardSuit::$HEART);
$card4 = new Card(CardRank::$TWO, CardSuit::$SPADE);
$card5 = new Card(CardRank::$NINE, CardSuit::$DIAMOND);

$cards[] =  $card3;
$cards[] =  $card5;
$cards[] =  $card1;
$cards[] =  $card2;
$cards[] =  $card4;
$pokerHand = new PokerHand($cards);
$pokerHands[] = $pokerHand;
//-----------------------------------------------------------



unset ($cards);
$card1 = new Card(CardRank::$TWO, CardSuit::$DIAMOND);
$card2 = new Card(CardRank::$NINE, CardSuit::$CLUB);
$card3 = new Card(CardRank::$EIGHT, CardSuit::$HEART);
$card4 = new Card(CardRank::$NINE, CardSuit::$SPADE);
$card5 = new Card(CardRank::$Q, CardSuit::$DIAMOND);

$cards[] =  $card3;
$cards[] =  $card4;
$cards[] =  $card1;
$cards[] =  $card2;
$cards[] =  $card5;
$pokerHand = new PokerHand($cards);
$pokerHands[] = $pokerHand;
//-----------------------------------------------------------



unset ($cards);
$card1 = new Card(CardRank::$TWO, CardSuit::$DIAMOND);
$card2 = new Card(CardRank::$THREE, CardSuit::$CLUB);
$card3 = new Card(CardRank::$A, CardSuit::$HEART);
$card4 = new Card(CardRank::$NINE, CardSuit::$SPADE);
$card5 = new Card(CardRank::$NINE, CardSuit::$DIAMOND);

$cards[] =  $card3;
$cards[] =  $card5;
$cards[] =  $card1;
$cards[] =  $card2;
$cards[] =  $card4;
$pokerHand = new PokerHand($cards);
$pokerHands[] = $pokerHand;
//-----------------------------------------------------------






unset ($cards);
$card1 = new Card(CardRank::$TWO, CardSuit::$DIAMOND);
$card2 = new Card(CardRank::$THREE, CardSuit::$CLUB);
$card3 = new Card(CardRank::$FIVE, CardSuit::$HEART);
$card4 = new Card(CardRank::$NINE, CardSuit::$SPADE);
$card5 = new Card(CardRank::$NINE, CardSuit::$DIAMOND);

$cards[] =  $card3;
$cards[] =  $card5;
$cards[] =  $card1;
$cards[] =  $card2;
$cards[] =  $card4;
$pokerHand = new PokerHand($cards);
$pokerHands[] = $pokerHand;
//-----------------------------------------------------------



unset ($cards);
$card1 = new Card(CardRank::$TWO, CardSuit::$DIAMOND);
$card2 = new Card(CardRank::$THREE, CardSuit::$CLUB);
$card3 = new Card(CardRank::$K, CardSuit::$HEART);
$card4 = new Card(CardRank::$NINE, CardSuit::$SPADE);
$card5 = new Card(CardRank::$NINE, CardSuit::$DIAMOND);

$cards[] =  $card3;
$cards[] =  $card5;
$cards[] =  $card1;
$cards[] =  $card2;
$cards[] =  $card4;
$pokerHand = new PokerHand($cards);
$pokerHands[] = $pokerHand;
//-----------------------------------------------------------






unset ($cards);
$card1 = new Card(CardRank::$TWO, CardSuit::$DIAMOND);
$card2 = new Card(CardRank::$THREE, CardSuit::$CLUB);
$card3 = new Card(CardRank::$K, CardSuit::$HEART);
$card4 = new Card(CardRank::$THREE, CardSuit::$SPADE);
$card5 = new Card(CardRank::$NINE, CardSuit::$DIAMOND);

$cards[] =  $card3;
$cards[] =  $card5;
$cards[] =  $card1;
$cards[] =  $card2;
$cards[] =  $card4;
$pokerHand = new PokerHand($cards);
$pokerHands[] = $pokerHand;
//-----------------------------------------------------------





unset ($cards);
$card1 = new Card(CardRank::$TWO, CardSuit::$DIAMOND);
$card2 = new Card(CardRank::$TWO, CardSuit::$CLUB);
$card3 = new Card(CardRank::$K, CardSuit::$HEART);
$card4 = new Card(CardRank::$TWO, CardSuit::$SPADE);
$card5 = new Card(CardRank::$NINE, CardSuit::$DIAMOND);

$cards[] =  $card3;
$cards[] =  $card5;
$cards[] =  $card1;
$cards[] =  $card2;
$cards[] =  $card4;
$pokerHand = new PokerHand($cards);
$pokerHands[] = $pokerHand;
//-----------------------------------------------------------



unset ($cards);
$card1 = new Card(CardRank::$TWO, CardSuit::$DIAMOND);
$card2 = new Card(CardRank::$TWO, CardSuit::$CLUB);
$card3 = new Card(CardRank::$K, CardSuit::$HEART);
$card4 = new Card(CardRank::$TWO, CardSuit::$SPADE);
$card5 = new Card(CardRank::$Q, CardSuit::$DIAMOND);

$cards[] =  $card3;
$cards[] =  $card5;
$cards[] =  $card1;
$cards[] =  $card2;
$cards[] =  $card4;
$pokerHand = new PokerHand($cards);
$pokerHands[] = $pokerHand;
//-----------------------------------------------------------






unset ($cards);
$card1 = new Card(CardRank::$TWO, CardSuit::$DIAMOND);
$card2 = new Card(CardRank::$TWO, CardSuit::$CLUB);
$card3 = new Card(CardRank::$K, CardSuit::$HEART);
$card4 = new Card(CardRank::$TWO, CardSuit::$SPADE);


unset ($cards);
$card1 = new Card(CardRank::$TWO, CardSuit::$DIAMOND);
$card2 = new Card(CardRank::$TWO, CardSuit::$CLUB);
$card3 = new Card(CardRank::$THREE, CardSuit::$HEART);
$card4 = new Card(CardRank::$TWO, CardSuit::$SPADE);
$card5 = new Card(CardRank::$A, CardSuit::$DIAMOND);

$cards[] =  $card3;
$cards[] =  $card5;
$cards[] =  $card1;
$cards[] =  $card2;
$cards[] =  $card4;
$pokerHand = new PokerHand($cards);
$pokerHands[] = $pokerHand;
//-----------------------------------------------------------


unset ($cards);
$card1 = new Card(CardRank::$TWO, CardSuit::$DIAMOND);
$card2 = new Card(CardRank::$TWO, CardSuit::$CLUB);
$card3 = new Card(CardRank::$K, CardSuit::$HEART);
$card4 = new Card(CardRank::$TWO, CardSuit::$SPADE);
$card5 = new Card(CardRank::$J, CardSuit::$DIAMOND);

$cards[] =  $card3;
$cards[] =  $card5;
$cards[] =  $card1;
$cards[] =  $card2;
$cards[] =  $card4;
$pokerHand = new PokerHand($cards);
$pokerHands[] = $pokerHand;
//-----------------------------------------------------------




//rank 
$pokerRank = new PokerRank($pokerHands);
//var_dump($expression)
echo '<pre>';
print_r($pokerRank->computeRanking());
echo '</pre>';