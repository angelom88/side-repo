<?php 
require_once 'lib/ArrowKeyboardUtils.php';

class SpeedTypingTest extends PHPUnit_Framework_TestCase {

    public function testMyNameSequence() {
        
        $keyboardUtils = new ArrowKeyboardUtils();
        
        $string = 'Angelo Matildo';
        $sequenceString = '1DOWN ENTER AND 13RIGHT|13LEFT ENTER,7LEFT ENTER,2LEFT ENTER,7RIGHT ENTER,' .
                        '3RIGHT ENTER,2DOWN|2UP ENTER,1DOWN ENTER AND 2LEFT ENTER,1DOWN ENTER AND '.
                        '12LEFT ENTER,7LEFT ENTER,11LEFT ENTER,3RIGHT ENTER,8LEFT ENTER,11RIGHT ENTER';
        $sequences = $keyboardUtils->getSequenceKey($string);
        $this->assertEquals($sequenceString, $sequences['sequenceString']);
        
    }
}

?>