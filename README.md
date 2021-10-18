# PHP Racing Game

This was the result of a coding test that I was asked to complete as part of a job application. 

The rules:

 - A track is a random list of straights and curves called elements.
   Each element has the same length, regardless if it’s a straight or a
   curve.
 - A track is made up of approximately 50% curves and approximately 50%
   straights.
 - A track has exactly 2000 elements in total.
 - The elements on the track come in multiples of 40 of the same type.
   So the minimum length of a series of elements is 40. For example, if
   the first element of a track is a curve, 39 curves must follow it. If
   element 41 is again a curve, then again 39 curve elements must
   follow. If element 81 is a straight, then 39 straight elements must
   follow.
 - Each car has two types of speeds:
	 - speed on straight
	 - speed on curve.
 - The speed is the number of elements a car can advance per round on a
   particular element type. Each car has a total speed of 22. The
   minimum speed of each type, curve and straight, is 4. This means that
   if a car has a curve speed of 10, then it must have a straight speed
   equal to 12.
	 - Curve and straight speeds are chosen randomly, but according to the
	   rule as per point 7.
 - The outcome of a race is represented by the class RaceResult, which
   in turn contains a list of RoundResult objects.
	 - A RoundResult is an object with two elements, a round number and a
	   cars position array. The cars position array represents the position
	   on the track of each car on a given round.
 - If a car starts a round on an element type, it can only end the round
   on the same element type, or on the first element of the next
   sequence of elements, if it has enough speed to reach it.
	 - So, for example, let’s assume that car1 speed on straight is 18, and
	   that the track starts with straights. Then at round 0, the car is on
	   element 0. At round 1, the car is on element 18, at round 2 the car
	   is on element 36. If element 40 is a straight, then on round 3 the
	   car is on element 54. If element 40 is a curve, then on round 3 the
	   car is on element 40

 - The first car that arrives at the last element wins. If two or more
   cars arrive at the last element at the same time, it's a draw.
 - There are 5 cars in total.

# Files

This was designed to be ran from the terminal with minimal setup. As long as a individual has PHP installed, they should be able to pass the `run.php` variable and watch the script run.

