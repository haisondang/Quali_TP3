<?php

use PHPUnit\Framework\TestCase;
use \Marsrover\MarsRover;


class TestMarsRover extends TestCase {

    // TODO We will add the proper self.assertions together.

    /** @test */
    function shouldHaveInitialPosition() {
        //GIVEN
        $marsRover = new MarsRover();
        
        //WHEN
        $position = $marsRover->move("");

        //THEN
        $this->assertEquals("0, 0, N", $position);
    }

    /** @test */
    function shouldTurnRight() {
        //GIVEN
        $marsRover1 = new MarsRover();
        $marsRover2 = new MarsRover();
        $marsRover3 = new MarsRover();
        $marsRover4 = new MarsRover();
        
        //WHEN
        $position1 = $marsRover1->move("R");
        $position2 = $marsRover2->move("RR");
        $position3 = $marsRover3->move("RRR");
        $position4 = $marsRover4->move("RRRR");

        //THEN
        $this->assertEquals("0, 0, E", $position1);
        $this->assertEquals("0, 0, S", $position2);
        $this->assertEquals("0, 0, W", $position3);
        $this->assertEquals("0, 0, N", $position4);
    }

    /** @test */
    function shouldTurnLeft() {
        //GIVEN
        $marsRover1 = new MarsRover();
        $marsRover2 = new MarsRover();
        $marsRover3 = new MarsRover();
        $marsRover4 = new MarsRover();
        
        //WHEN
        $position1 = $marsRover1->move("L");
        $position2 = $marsRover2->move("LL");
        $position3 = $marsRover3->move("LLL");
        $position4 = $marsRover4->move("LLLL");

        //THEN
        $this->assertEquals("0, 0, W", $position1);
        $this->assertEquals("0, 0, S", $position2);
        $this->assertEquals("0, 0, E", $position3);
        $this->assertEquals("0, 0, N", $position4);
    }

    /** @test */
    function shouldAdvance() {
        //GIVEN
        $marsRover1 = new MarsRover();
        $marsRover2 = new MarsRover();
        $marsRover3 = new MarsRover();
        
        //WHEN
        $position1 = $marsRover1->move("M");
        $position2 = $marsRover2->move("MMMMM");
        $position3 = $marsRover3->move("RMM");

        //THEN
        $this->assertEquals("0, 1, N", $position1);
        $this->assertEquals("0, 5, N", $position2);
        $this->assertEquals("2, 0, E", $position3);
    }

    /** @test */
    function shouldGoAround() {
        //GIVEN
        $marsRover1 = new MarsRover();
        
        //WHEN
        $position1 = $marsRover1->move("MMMMMMMMMM");

        //THEN
        $this->assertEquals("0, 0, N", $position1);
    }

    /** @test */
    function shouldHaveObstacle() {
        //GIVEN
        $marsRover1 = new MarsRover();
        $marsRover1.addObstacle(2, 3);

        //WHEN
        $position1 = $marsRover1->move("MMMLMMM");

        //THEN
        $this->assertEquals("1, 3, W", $position1);
    }
}