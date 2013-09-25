<?php 
require_once 'Key.php';

/**
 * Default Keyboard Data
 * @author angelo
 *
 */
class KeyData {

    public static $LETTERS = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    public static $UPPER_CASE_LETTERS;
    public static $LOWER_CASE_LETTERS;
    public static $NUMBERS = '0123456789';
    public static $SPECIAL_CHARS;
    public static $SPECIAL_CHAR_SET1;
    public static $SPECIAL_CHAR_SET2;
    public static $SPECIAL_CHAR_SET3;
    public static $ALT = 'ALT';
    public static $SPACE_BAR = ' ';
    public static $BACK_SPACE = 'BS';
    public $keys;


    /**
     * Default Constructor
     */
    public function __construct() {
        $this->init();
    }


    /**
     * Tokenize set of strings into an array
     * @param unknown_type $string
     */
    public function tokenize($string, $row, $colStart = 0) {
        $arr = array();

        $start = 0;
        for ($iteration = 0; $iteration < strlen($string); $iteration++) {
            $tmp = substr($string, $start, 1);
            $key = new Key($tmp);
            $key->setRow($row);
            $key->setCol($colStart + $iteration);
            $arr[] = $key;
            $start = $iteration + 1;
        }

        return $arr;
    }


    public function getKeys() {
        $this->init();

        return $this->keys; 
    }


    private function init() {
        self::$SPECIAL_CHARS = '!@#$%^&*()?/|\+-`~[]{}<>.,;:' . "'" . '"_=';
        self::$UPPER_CASE_LETTERS = self::$LETTERS;
        self::$LOWER_CASE_LETTERS = strtolower(self::$UPPER_CASE_LETTERS);
        self::$SPECIAL_CHAR_SET1 = self::$NUMBERS . substr(self::$SPECIAL_CHARS, 0, 16);
        self::$SPECIAL_CHAR_SET2 = substr(self::$SPECIAL_CHARS, 16, 8);
        self::$SPECIAL_CHAR_SET3 = substr(self::$SPECIAL_CHARS, 24, 8);
        $this->keys = $this->generateKeyList();
    }


    /**
     * Generate KeyList from those default strings given
     */
    private function generateKeyList() {
        $keyList = array();
        $tmpArr = array();
    
        $keyList[] = $this->tokenize(self::$UPPER_CASE_LETTERS, 0);
        $keyList[] = $this->tokenize(self::$LOWER_CASE_LETTERS, count($keyList));
        $keyList[] = $this->tokenize(self::$SPECIAL_CHAR_SET1, count($keyList));
        $tmpKey = new Key(self::$ALT);
        $tmpSpecial = $this->tokenize(self::$SPECIAL_CHAR_SET2, count($keyList));
        $tmpKey->setRow(count($keyList));
        $tmpKey->setCol(count($tmpSpecial));
        $tmpArr[] = $tmpKey;
        $row3Keys = array_merge($tmpSpecial, $tmpArr);
        $row3Keys = array_merge($row3Keys, $this->replicateKey(self::$SPACE_BAR, 7, count($keyList), count($row3Keys)));
        $row3Keys = array_merge($row3Keys, $this->tokenize(self::$SPECIAL_CHAR_SET3, count($keyList), count($row3Keys)));
        $row3Keys = array_merge($row3Keys, $this->replicateKey(self::$BACK_SPACE, 2, count($keyList), count($row3Keys)));
        $keyList[] = $row3Keys;
    
        return $keyList;
    }


    /**
     * Replicate the string into number of times into an array
     * @param unknown_type $string
     * @param unknown_type $numberOfTimes
     */
    private function replicateKey($string, $numberOfTimes, $row, $colStart) {
        $arr = array();

        for ($i = 0 ; $i < $numberOfTimes; $i++) {
            $tmp = $string;
            $key = new Key($tmp);
            $key->setRow($row);
            $key->setCol($colStart + $i);
            $arr[] = $key;
        }

        return $arr;
    }

}


$keyData = new KeyData();

/*

echo '<pre>';
print_r($keyData::$UPPER_CASE_LETTERS);
echo '</pre>';

echo '<pre>';
print_r(strtolower($keyData::$LOWER_CASE_LETTERS));
echo '</pre>';

echo '<pre>';
print_r($keyData::$SPECIAL_CHAR_SET1);
echo '</pre>';


echo '<pre>';
print_r($keyData::$SPECIAL_CHAR_SET2);
echo '</pre>';

 
echo '<pre>';
//s$arr = $keyData->tokenize($keyData::$UPPER_CASE_LETTERS);
print_r($keyData->keys);
echo '</pre>';
*/




