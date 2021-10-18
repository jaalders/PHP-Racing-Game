<?php

/**
 * The RoundResult class
 *  
 * @category CategoryName
 * @package  PackageName
 * @author   Jeremy Aalders <jdaalders@gmail.com>
 * @license  Unknown www.php.net
 * @link     Unknown
 */

class RoundResult
{
    /**
     * The $step variable used to determine what round the player/drivers are on.
     * 
     * @var int 
     */
    public $step;

    /**
     * The $carsPosition variable used to determine which element a player/driver is on.
     * 
     * @var array
     */
    public $carsPosition;

    /**
     * The RoundResult constructor.
     *
     * @param integer $step         variable used to determine what round the player/drivers are on
     * @param array   $carsPosition variable used to determine which element a player/driver is on
     */
    public function __construct(int $step, array $carsPosition)
    {
        $this->step = $step;
        $this->carsPosition = $carsPosition;
    }
}
