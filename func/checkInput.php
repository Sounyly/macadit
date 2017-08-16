<?php 
function checkInput($data) 
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
<<<<<<< HEAD
        $data = htmlentities($data);
       
=======
        $data = html_entity_decode($data);
>>>>>>> markitup
        return $data;
    } ?>