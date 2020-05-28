<?php

require "./connection.php";


$sqlSelect = "SELECT auditorium FROM `lesson`";

$auditoriums = array();

foreach ($dbh->query($sqlSelect) as $auditorium) {
    
    $auditoriums[] = $auditorium['auditorium'];
}

$auditoriums = array_unique($auditoriums);
