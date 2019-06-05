<?php


class Min {
    public $arr;
    public function findMin($arr){
        $this->arr=$arr;
        $min=$this->arr[0];
        foreach ($this->arr as $value){
            if ($min>$value){
                $min = $value;
            }
        }
        return $min;
    }
}