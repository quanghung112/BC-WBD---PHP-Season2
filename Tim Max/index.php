<?php
$arr1=[123,4123,4123,412,412,435,213,54123,23];
$arr2=[321,5423,454,657,326,57,32,42,36,65,4,77,7,65,8,8,54231];
include 'Max.php';
$max = new Max();
$max->findMaxArr($arr1,$arr2);
echo 'max of two Array'.$max->findMaxofTwoArr();
?>
