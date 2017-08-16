<?php 
function checkInput($data) 
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        $data = html_entity_decode($data);
        return $data;
    } ?>