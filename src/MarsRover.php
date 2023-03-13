<?php
namespace Marsrover;
class MarsRover {

    private $position;
    private $obstacles;
    public function __construc(){
        $this->position=array(0,0,"N");
        $this->obstacles=[];
    }

    public function position() {
        $res = implode(", ", $this->position);
        return $res;
    }

    public function addObstacle($pos){
        array_push($this->obstacles, $pos);
    }

    public function obstacle($pos_obs){
        return implode(", ", $pos_obs);
    }
    public function move($move){
        if (empty($move)){
            return $this->position();
        }

        $moves=str_split($move);
        $stop = false;
        for ($i = 0; $i<count($moves)&&$obs=false; $i++){
            switch(moves[$i]){
                case "L":
                    switch($this->position[2]){
                        case "N":
                            $this->position[2]="W";
                            break;
                        case "E":
                            $this->position[2]="N";
                            break;
                        case "S":
                            $this->position[2]="E";
                            break;
                        case "W":
                            $this->position[2]="S";
                            break;
                        default:
                            echo "erreur!";
                    }
                    break;
                case "R":
                    switch($this->position[2]){
                        case "N":
                            $this->position[2]="E";
                            break;
                        case "E":
                            $this->position[2]="S";
                            break;
                        case "S":
                            $this->position[2]="W";
                            break;
                        case "W":
                            $this->position[2]="N";
                            break;
                        default:
                            echo "erreur!";
                    }
                    break;
                case "M":
                    switch($this->position[2]){
                        case "N":
                            $pos = array($this->position[0], $this->position[1]+1);
                            for ($i = 0; $i<count($this->obstacles); $i++){
                                $diff = array_diff($pos,$this->obstacles[$i]);
                                if (!is_null($diff)){
                                    echo "Obstacle: ".obstacle($this->obstacles[$i]);
                                    $stop = true;
                                    break;
                                }
                            }
                            $this->position[1]++;
                            break;
                        case "E":
                            $pos = array($this->position[0]+1, $this->position[1]);
                            for ($i = 0; $i<count($this->obstacles); $i++){
                                $diff = array_diff($pos,$this->obstacles[$i]);
                                if (!is_null($diff)){
                                    echo "Obstacle: ".obstacle($this->obstacles[$i]);
                                    $stop = true;
                                    break;
                                }
                            }
                            $this->position[0]++;
                            break;
                        case "S":
                            $pos = array($this->position[0], $this->position[1]-1);
                            for ($i = 0; $i<count($this->obstacles); $i++){
                                $diff = array_diff($pos,$this->obstacles[$i]);
                                if (!is_null($diff)){
                                    echo "Obstacle: ".obstacle($this->obstacles[$i]);
                                    $stop = true;
                                    break;
                                }
                            }
                            $this->position[1]--;
                            break;
                        case "W":
                            $pos = array($this->position[0]-1, $this->position[1]);
                            for ($i = 0; $i<count($this->obstacles); $i++){
                                $diff = array_diff($pos,$this->obstacles[$i]);
                                if (!is_null($diff)){
                                    echo "Obstacle: ".obstacle($this->obstacles[$i]);
                                    $stop = true;
                                    break;
                                }
                            }
                            $this->position[0]--;
                            break;
                        default:
                            echo "erreur!";
                    }
                    break;
                default:
                    echo "erreur!";
            }
        }
        $this->position[0]=$this->position[0]%5;
        $this->position[1]=$this->position[1]%5;
        return $this->position();
    }
}