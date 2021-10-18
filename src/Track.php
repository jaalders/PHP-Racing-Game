<?php

/**
 * The Track class
 *  
 * @category CategoryName
 * @package  PackageName
 * @author   Jeremy Aalders <jdaalders@gmail.com>
 * @license  Unknown www.php.net
 * @link     Unknown
 */

class Track
{
    // We know from the test description that there are some variables that will not ever change so we just assign them as const values to ensure nothing changes along the way.
    const STRAIGHTELEMENT = 0;
    const CURVEELEMENT = 1;
    const TRACKLENGTH = 2000;
    const ELEMENTLENGTH = 40;

    public $trackElements;
    
    public function __construct()
    {
        // This will make a 50 element array with a fill of 25 1's and 25 0's. The 1's and 0's correspond to the const's listed above.
        // After the array is filled and merged, we then just shuffle the array to make our track elements unique per race.
        $this->trackElements = array_merge(
            array_fill(0, 25, self::STRAIGHTELEMENT), 
            array_fill(0, 25, self::CURVEELEMENT)
        );

        // shake, shake, shake!
        shuffle($this->trackElements);
    }
}

