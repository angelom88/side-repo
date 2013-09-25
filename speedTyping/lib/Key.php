<?php 

/**
 *
 * @author angelo
 *
 */
class Key {

    private $value;
    private $row;
    private $col;


    public function __construct($value) {
        $this->value = $value;
    }

    public function setValue($value) {
        $this->value = $value;
    }

    public function getValue() {
        return $this->value;
    }


    public function setRow($row) {
        $this->row = $row;
    }

    public function getRow() {
        return $this->row;
    }

    public function setCol($col) {
        $this->col = $col;
    }

    public function getCol() {
        return $this->col;
    }
}


?>