<?php

$id = $_GET['id'];

$xml = simplexml_load_file('names.xml');

$i = 0;

foreach($xml->STUDENT as $student){
    if($student->IDNO == $id){
        unset($xml->STUDENT[$i]);
        break;
    }
    $i++;
}

$xml->asXML('names.xml');

header("Location: main.php");