<?php
require "./connection.php";


$sqlSelect = "SELECT * FROM teacher";

$teachers = array();

foreach ($dbh->query($sqlSelect) as $teacher) {
    $teachersArr = array(
        'id' => $teacher['ID_Teacher'],
        'name' => $teacher['name']
    );
    $teachers[] = $teachersArr;
}

