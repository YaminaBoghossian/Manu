<?php
include_once './Database.php';
include_once './Messages.php';

$db = new DataChat();

echo(json_encode($db->getAllMessages()));

