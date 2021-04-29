<?php
 $dataJson = file_get_contents('php://input');
 $dataArray = json_decode($dataJson);

//  var_dump($dataJson);
//  echo '<br>';
//  var_dump($dataArray);

 $name = $dataArray->name;
 $surname = $dataArray->surname;
 $age = $dataArray->age;

 $br = "<br>";

 echo $name.$br.$surname.$br.$age;