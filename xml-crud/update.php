<?php

$oldID = $_POST['oldID'];

$xml = simplexml_load_file('names.xml');

foreach($xml->STUDENT as $student){
    if($student->IDNO == $oldID){

        $student->IDNO = $_POST['IDNO'];
        $student->NAME = $_POST['NAME'];
        $student->COURSE = $_POST['COURSE'];
        $student->EMAIL = $_POST['EMAIL'];
        $student->PHONE = $_POST['PHONE'];

        break;
    }
}

$xml->asXML('names.xml');

header("Location: main.php");