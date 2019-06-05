<?php


class Max
{
    public $arr1;
    public $max1;
    public $arr2;
    public $max2;
    public function findMaxArr($arr1,$arr2){
        $this->arr1=$arr1;
        $this->arr2=$arr2;
        $this->max1=$this->arr1[0];
        $this->max2=$this->arr2[0];
        foreach ($this->arr1 as $value){
            if ($this->max1<$value){
                $this->max1 = $value;
            }
        }
        foreach ($this->arr2 as $value){
            if ($this->max2<$value){
                $this->max2= $value;
            }
        }
    }
    public function findMaxofTwoArr(){
        $max= $this->max1>$this->max2 ? $this->max1: $this->max2;
        return $max;
    }
}