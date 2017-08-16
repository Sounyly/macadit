<?php 
function checkInput($data) 
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        $data = htmlentities($data);
       
        return $data;
    } ?>