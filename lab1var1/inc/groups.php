<?php

require "./connection.php";


$sqlSelect = "SELECT * FROM `groups`";

$groups = array();


foreach ($dbh->query($sqlSelect) as $group) {
    
    $groups[] = array(
    	'id'	=> $group['ID_Groups'],
        'title' => $group['title']
    );
}

