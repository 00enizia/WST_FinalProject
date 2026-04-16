<?php

$name = $_POST['NAME'];
$course = $_POST['COURSE'];
$email = $_POST['EMAIL'];
$phone = $_POST['PHONE'];

$xml = simplexml_load_file('names.xml');

$id = "2026-" . rand(100000,999999);

$student = $xml->addChild('STUDENT');
$student->addChild('IDNO', $id);
$student->addChild('NAME', $name);
$student->addChild('COURSE', $course);
$student->addChild('EMAIL', $email);
$student->addChild('PHONE', $phone);

$xml->asXML('names.xml');

header("Location: main.php");