<?php 
require_once 'KeyData.php';
require_once 'Direction.php';

/**
 * Utility Class for Keyboard fast searching manipulations
 * @author angelo
 *
 */
class ArrowKeyboardUtils {

    private $keyData;
    public $keys;
    public $originKey;
    public static $MAX_ROW = '3';
    public static $MAX_COL = '25';
    

    public function __construct() {
        $this->init();
    }

    /**
     * Get the sequences list
     * @param $string
     * @return array
     */
    public function getSequenceKey($string) {
        $sequences = array();
        $mappedKeys = $this->getMappedKeys($string);
        $closestKeys = array();
        $hasSetOrigin = false;
        $index = 0;
        foreach ($mappedKeys as $mappedKey) {
            if ($hasSetOrigin) {
                $nextKey = $this->searchKey($mappedKey->getValue(), true, $currentKey);
                $closestKeys[$index]['key'] = $nextKey;
                $downIterations = $this->getDownIterations($currentKey, $nextKey);
                $upIterations = $this->getUpIterations($currentKey, $nextKey);
                $rightIterations = $this->getRightIterations($currentKey, $nextKey, true);
                $leftIterations = $this->getLeftIterations($currentKey, $nextKey, true);

                // get the least and store the number of iterations of directions/arrowkeys
                if ($downIterations < $upIterations && $downIterations != 0) {
                    $closestKeys[$index - 1][Direction::$DOWN] = $downIterations;
                } elseif ($upIterations < $downIterations && $upIterations != 0) {
                    $closestKeys[$index - 1][Direction::$UP] = $upIterations;
                } else {
                    if ($downIterations != 0 && $upIterations != 0) {
                        $closestKeys[$index - 1][Direction::$DOWN] = $downIterations;
                        $closestKeys[$index - 1][Direction::$UP] = $upIterations;
                    }
                }
                if ($rightIterations < $leftIterations && $rightIterations != 0) {
                    $closestKeys[$index - 1][Direction::$RIGHT] = $rightIterations;
                } elseif ($leftIterations < $rightIterations && $leftIterations != 0) {
                    $closestKeys[$index - 1][Direction::$LEFT] = $leftIterations;
                } else {
                    if ($rightIterations != 0 && $leftIterations != 0) {
                        $closestKeys[$index - 1][Direction::$RIGHT] = $rightIterations;
                        $closestKeys[$index - 1][Direction::$LEFT] = $leftIterations;
                    }
                }

                $currentKey = $nextKey;
            } else {
                $origin = $mappedKey;
                $currentKey = $origin;
                $closestKeys[$index]['key'] = $origin;
                $hasSetOrigin = true;
            }
            $index++;
        }
        $sequences = $this->generateSequence($closestKeys);

        return $sequences;
    }


    private function generateSequence($mappedKeys) {
        $sequences = array();
        $sequenceStr = '';
        $AND = 'AND';
        $index = 0;
        foreach ($mappedKeys as $mappedKey) {
            $tmpSequence = '';
            /**
             * By default the sequence will start in going DOWN or UP AND RIGHT or LEFT
             * eg.
             *     1UP|1DOWN AND 3RIGHT
             *     3UP AND 2RIGHT
             *     3DOWN AND 2LEFT
             *     4DOWN
             *     3LEFT
             *     
             * generated String:
             *     eg. 1UP|1DOWN AND 3RIGHT,3UP AND 2RIGHT,3DOWN AND 2LEFT
             *    
             */
            // DOWN OR UP
            if (isset($mappedKey[Direction::$DOWN])) {
                $tmpSequence = $mappedKey[Direction::$DOWN] . Direction::$DOWN;
                if (isset($mappedKey[Direction::$UP])) {
                    $tmpSequence = $tmpSequence . '|';
                }
            }
            if (isset($mappedKey[Direction::$UP])) {
                $tmpSequence = $tmpSequence . $mappedKey[Direction::$UP] . Direction::$UP;
                
            }
            if (isset($mappedKey[Direction::$DOWN]) || isset($mappedKey[Direction::$UP])) {
                $tmpSequence = $tmpSequence . ' ' . Direction::$ENTER;
                if (isset($mappedKey[Direction::$RIGHT]) || isset($mappedKey[Direction::$LEFT])) {
                    $tmpSequence = $tmpSequence . ' ' . $AND . ' ';
                }
            }

            // RIGHT OR LEFT
            if (isset($mappedKey[Direction::$RIGHT])) {
                $tmpSequence = $tmpSequence . $mappedKey[Direction::$RIGHT] . Direction::$RIGHT;
                if (isset($mappedKey[Direction::$LEFT])) {
                    $tmpSequence = $tmpSequence . '|';
                }
            }
            if (isset($mappedKey[Direction::$LEFT])) {
                $tmpSequence = $tmpSequence . $mappedKey[Direction::$LEFT] . Direction::$LEFT;
            
            }
            if (isset($mappedKey[Direction::$RIGHT]) || isset($mappedKey[Direction::$LEFT])) {
                $tmpSequence = $tmpSequence . ' ' . Direction::$ENTER;
            }

            if (strlen($tmpSequence) > 0) {
                $sequences[] = $tmpSequence;
                $sequenceStr = $sequenceStr . $tmpSequence;
                if ($index < (count($mappedKeys) - 2)) {
                    $sequenceStr = $sequenceStr . ',';
                }
            } else {
                if (count($sequences) < count($mappedKeys) - 1) {
                    $tmpSequence = Direction::$ENTER;
                    $sequences[] = $tmpSequence;
                    $sequenceStr = $sequenceStr . $tmpSequence;
                    if ($index < (count($mappedKeys) - 1)) {
                        $sequenceStr = $sequenceStr . ',';
                    }
                }
            }
            $index++;
        }
        $sequences['sequenceString'] = $sequenceStr; 
        return $sequences;
    }


    private function searchKey($value, $hasPreviousKey = false, $currentKey = NULL) {
        if (!isset($this->keyData) && !isset($this->keys)) {
            $this->init();
        }

        if (!$hasPreviousKey) {
            foreach ($this->keys as $rows) {
                foreach ($rows as $key) {
                    if ($key->getValue() == $value) {
                        return $key;
                    }
                }
            }
        } else {
            return $this->searchClosestKey($currentKey, $value);
        }
    }

    private function searchClosestKey($currentKey, $nextvalue) {
        if (!isset($this->keyData) && !isset($this->keys)) {
            $this->init();
        }
        $index = 0;
        $leastIterations = array();
        foreach ($this->keys as $rows) {
            foreach ($rows as $key) {
                if ($key->getValue() == $nextvalue) {
                    $moving[$index]['key'] = $key;
                    $rightIterations = $this->getRightIterations($currentKey, $key, false);
                    $leftIterations = $this->getLeftIterations($currentKey, $key, false);
                    
                    if ($leftIterations > $rightIterations) {
                        $moving[$index]['iterations'] = $rightIterations;
                    } else {
                        $moving[$index]['iterations'] = $leftIterations;
                    }
                    $index++;
                }
            }
        }
        usort($moving, $this->compareBy('iterations'));

        return $moving[0]['key'];
    }

    /**
     * 
     * @param array $string
     */
    private function getCharacters($string) {
        $arr = array();

        $start = 0;
        for ($i = 0; $i < strlen($string); $i++) {
            $tmp = substr($string, $start, 1);
            $arr[] = $tmp;
            $start = $i + 1;
        }

        return $arr; 
    }

    /**
     * Get the corresponding Key object from string
     * @param array $string
     */
    private function getMappedKeys($string) {
        $mappedKeys = array();

        $characters = $this->getCharacters($string);
        foreach ($characters as $character) {
            $mappedKeys[] = $this->searchKey($character);
        }
        $this->originKey = $mappedKeys[0];

        return $mappedKeys;
    }

    /**
     * Initialize data keys
     */
    private function init() {
        $this->keyData = new KeyData();
        $this->keys = $this->keyData->getKeys();
    }


    private function getDownIterations($key, $nextKey) {
        $searchRow = $key->getRow();
        $nextRow = $nextKey->getRow();
        $found = false;
        $iterations = 0;
        while (!$found) {
            if ($searchRow == $nextRow) {
                $found = true;
                break;
            }
            $iterations++;
            $searchRow++;
            if ($searchRow == self::$MAX_ROW + 1) {
                $searchRow = 0;
            }
        }

        return $iterations;
    }

    private function getUpIterations($key, $nextKey) {
        $searchRow = $key->getRow();
        $nextRow = $nextKey->getRow();
        $found = false;
        $iterations = 0;
        while (!$found) {
            if ($searchRow == $nextRow) {
                $found = true;
                break;
            }
            $iterations++;
            $searchRow--;
            if ($searchRow == -1) {
                $searchRow = self::$MAX_ROW;
            }
        }
    
        return $iterations;
    }


    private function getRightIterations($key, $nextKey, $isFindClosestKey = true) {
        if ($isFindClosestKey && $this->hasFoundMultipleKey($nextKey)) {
            $nextKey = $this->searchClosestKey($key, $nextKey->getValue());
        }

        $searchCol = $key->getCol();
        $nextCol = $nextKey->getCol();
        $found = false;
        $iterations = 0;
        while (!$found) {
            if ($searchCol == $nextCol) {
                $found = true;
                break;
            }
            $iterations++;
            $searchCol++;
            if ($searchCol == self::$MAX_COL + 1) {
                $searchCol = 0;
            }
        }
    
        return $iterations;
    }
    
    private function getLeftIterations($key, $nextKey, $isFindClosestKey = true) {
        if ($isFindClosestKey && $this->hasFoundMultipleKey($nextKey)) {
            $nextKey = $this->searchClosestKey($key, $nextKey->getValue());
        }

        $searchCol = $key->getCol();
        $nextCol = $nextKey->getCol();
        $found = false;
        $iterations = 0;
        while (!$found) {
            if ($searchCol == $nextCol) {
                $found = true;
                break;
            }
            $iterations++;
            $searchCol--;
            if ($searchCol == -1) {
                $searchCol = self::$MAX_COL;
            }
        }
    
        return $iterations;
    }


    private function hasFoundMultipleKey($key) {
        $counter = 0;
        $foundKeys = array();

        foreach ($this->keys as $rows) {
            foreach ($rows as $tmpKey) {
                if ($tmpKey->getValue() == $key->getValue()) {
                    $foundKeys[] = $tmpKey;
                    $counter++;
                }
                if ($counter > 1) {
                    break;
                }
            }
        }

        return ($counter > 1); 
    }

    /**
     * Compare by Iterations
     * @param int $a
     * @param int $b
     */
    private function compareBy($key) {
        return function ($a, $b) use ($key) {
            return strnatcmp($a[$key], $b[$key]);
        };
    }
}










