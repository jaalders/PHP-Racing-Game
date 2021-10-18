<?php

require_once 'RoundResult.php';


/**
 * The RaceResults class
 * 
 * @category CategoryName
 * @package  PackageName
 * @author   Jeremy Aalders <jdaalders@gmail.com>
 * @license  Unknown www.php.net
 * @link     Unknown
 */
class RaceResult
{
    /**
     * The status of $roundResults
     *
     * @var array
     */
    private $roundResults = [];

    /**
     * The setRoundResult function
     * This is the setter for the $roundResults variable.
     * 
     * @param array $roundResults list of round results to be used by the setter.
     * 
     * @return void 
     */
    public function setRoundResults(array $roundResults): void
    {
        $this->roundResults = $roundResults;
    }

    /**
     * The getRoundResults function
     * This function does the heavy lifting for our race example.
     *
     * @param [object] $track to be used during race event
     * @param [object] $cars  to be used during race event
     * 
     * @return array
     */
    public function getRoundResults($track, $cars): array
    {
        $trackElement = Track::ELEMENTLENGTH;
        $roundCounter = 1;
        $elementsCounter = 0;

        // We know that when all drivers start they will be at position 0. So, we set them now as the first entry in the $roundResults array.
        $currentRound = new RoundResult(0, [0, 0, 0, 0, 0]);
        $roundResults[] = $currentRound;
        $roundInProgress = [];
        $roundInProgress = $currentRound->carsPosition;
        $currentElementType = null;

        // We know the max length of the track so we just calculate until a driver hits 2000 or more.
        while (max($currentRound->carsPosition) <= Track::TRACKLENGTH) {
            // Determine if the element in question is of the type straight or curve.
            if ($track->trackElements[$elementsCounter] === Track::STRAIGHTELEMENT) {
                $currentElementType = Track::STRAIGHTELEMENT;
                $temp = [];

                // Create a 'blank' round and then set the step and position of drivers in the next steps.
                $currentRound = new RoundResult(0, [0, 0, 0, 0, 0]);
                $currentRound->step = $roundCounter;
                
                // Loop through each driver and apply their position to the temp array.
                for ($i=0; $i < 5; $i++) { 
                    $temp[] = $roundInProgress[$i] + $cars[$i]->straightVelocity;
                }

                // Apply the speeds of the drivers from our temp array to the round in progress.
                $roundInProgress = $temp;
                $currentRound->carsPosition = $temp;

            } else if ($track->trackElements[$elementsCounter] === Track::CURVEELEMENT) {
                $currentElementType = Track::CURVEELEMENT;
                $temp = [];

                // Create a 'blank' round and then set the step and position of drivers in the next steps.
                $currentRound = new RoundResult(0, [0, 0, 0, 0, 0]);
                $currentRound->step = $roundCounter;
                
                // Loop through each driver and apply their position to the temp array.
                for ($i=0; $i < 5; $i++) { 
                    $temp[] = $roundInProgress[$i] + $cars[$i]->curveVelocity;
                }

                $roundInProgress = $temp;
                $currentRound->carsPosition = $temp;
            }

            /**
             * We know that the driver has passed the bounds of the element at this point. 
             * We now need to determine if the next element on the track is a curve or straight.
             * Line 102 gets the driver in the 'top position' and compares it to see if it's larger than a increment of 40 which is the length of each element on the track.
             * We increase the counter and the check to see if the next element is a curve or a straight
             * If the next element on the track is of the same type as the previous, keep on trucking.
             * If the next element on the tack is not of the same type, we then use the last rounds values for player position and then the next sequence of values added to the array will be the ones from the other speed type (straight vs curve speed).
             */

            if (max($currentRound->carsPosition) > $trackElement) {
                $elementsCounter++;
                $trackElement = $trackElement + $trackElement;
                // Check for if element type matches previous type.
                if ($currentElementType === $track->trackElements[$elementsCounter]) {
                    $roundResults[] = $currentRound;
                    $roundCounter++;
                } else if ($currentElementType !== $track->trackElements[$elementsCounter]) {
                    // Get the last element in our round results and use it to apply the 
                    $lastRound = end($roundResults);
                    $roundInProgress = $lastRound->carsPosition;

                    // This code could probably be refactored due to the fact that we know the next element would be the sequence due to the element mismatch check above, but I don't want to break things now.
                    if ($track->trackElements[$elementsCounter] === Track::STRAIGHTELEMENT) {
                        $currentElementType = Track::STRAIGHTELEMENT;
                        $temp = [];
                        $currentRound = new RoundResult(0, [0, 0, 0, 0, 0]);
                        $currentRound->step = $roundCounter;
                        for ($i=0; $i < 5; $i++) { 
                            $temp[] = $roundInProgress[$i] + $cars[$i]->straightVelocity;
                        }

                        $roundInProgress = $temp;
                        $currentRound->carsPosition = $temp;

                    } else if ($track->trackElements[$elementsCounter] === Track::CURVEELEMENT) {
                        $currentElementType = Track::CURVEELEMENT;
                        $temp = [];
                        $currentRound = new RoundResult(0, [0, 0, 0, 0, 0]);
                        $currentRound->step = $roundCounter;
                        for ($i=0; $i < 5; $i++) { 
                            $temp[] = $roundInProgress[$i] + $cars[$i]->curveVelocity;
                        }
        
                        $roundInProgress = $temp;
                        $currentRound->carsPosition = $temp;
                    }
                    // Push the results and start the next round.
                    $roundResults[] = $currentRound;
                    $roundCounter++;
                }
            } else {
                // Push the results and start the next round.
                $roundResults[] = $currentRound;
                $roundCounter++;
            }
        }

        // Return the results to the calling function.
        return $roundResults;
    }
}
