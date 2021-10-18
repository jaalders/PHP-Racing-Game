<?php

require_once 'Track.php';
require_once 'Car.php';
require_once 'RaceResult.php';

/**
 * The Race class
 *  
 * @category CategoryName
 * @package  PackageName
 * @author   Jeremy Aalders <jdaalders@gmail.com>
 * @license  Unknown www.php.net
 * @link     Unknown
 */
class Race
{
    // We know always there there will be 5 drivers in each race, so we want to make sure this variable does not change.
    const NUMBEROFDRIVERS = 5;

    /**
     * The getTrack function
     * 
     * This function is used to return a track object to be used later on in the race.
     *
     * @return Track
     */
    public function getTrack(): Track
    {
        $currentTrack = new Track;
        return $currentTrack;
    }

    /**
     * The getCars function
     * 
     * This function is used to return a cars object that will contain five drivers with curveVelocity and straightVelocity for each driver/player.
     *
     * @return Track
     */
    public function getCars(): Array
    {
        $i = 1;
        $listOfDrivers = [];
        while ($i <= self::NUMBEROFDRIVERS) {
            $listOfDrivers[] = new Car('Driver ' . $i);
            $i++;
        }

        return $listOfDrivers;
    }

    /**
     * The runRace function
     * 
     * This function will make calls out to the track class as well as the car class.
     * Each call wil return an object. car will return a object with information about each of the drivers in the race: name, straightVelocity and curveVelocity
     * The track object returned will contain information about the track: number of elements, element length, const values for straight and curve elements.
     * The function will then use the two objects and pass them into the function to begin evaluating each drivers position per round.
     *
     * @return RaceResult
     */
    public function runRace(): RaceResult
    {
        $race = new Race;
        $track = Race::getTrack();
        $cars = Race::getCars();

        $raceResults = new RaceResult;

        $finalRaceResults = $raceResults->getRoundResults($track, $cars);

        $raceResults->setRoundResults($finalRaceResults);

        return $raceResults;
    }
}
