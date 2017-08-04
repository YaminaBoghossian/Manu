<?php
include_once './Database.php';
include_once './Messages.php';

$db = new DataChat();
    echo($_POST["textare"]);

    $date = date("Y-m-d H:i:s");
    $post = new Messages($_POST['textare'], $date);
    $db->createMessage($post);
?>