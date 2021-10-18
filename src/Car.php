<?php

/**
 * The Car class
 *  
 * @category CategoryName
 * @package  PackageName
 * @author   Jeremy Aalders <jdaalders@gmail.com>
 * @license  Unknown www.php.net
 * @link     Unknown
 */

class Car
{
    // We know that the min velocity for any track element is 4, therefore 8 points from the max velocity are minused away, we then allot the remaining 14 points below in the constructor.
    public $straightVelocity;
    public $curveVelocity;
    public $carName;
    const MAXVELOCITY = 22;
    const MINVELOCITY = 4;

    /**
     * The RoundResult constructor.
     * 
     * This will create each of the drivers for the race. This will use the const values above to determine the drivers speed on curves and straight elements.
     *
     * @param string $carName the name of the driver/car.
     */
    public function __construct(string $carName)
    {
        // Ignore this. I thought that I would give a output for driver name, but as per the task, it's not needed. You can still see the name in the object, but it is never applied. Something to refactor out.
        $this->carName = $carName;
        $this->straightVelocity = rand(self::MINVELOCITY, 14);
        $this->curveVelocity = self::MAXVELOCITY - $this->straightVelocity;
    }
}

