<?php
require 'config.php'; 

    $us = mysqli_real_escape_string($con,$_POST['yourUsername']);
    $pa = mysqli_real_escape_string($con,sha1($_POST['yourPassword']));

    

    $query="SELECT 
                User,Pass,tipoUser,nombres,apePaterno
            FROM 
                Usuarios u
            WHERE 
                u.User = '".$us."'
            AND u.Pass = '".$pa."'    
            ";


    $resp = mysqli_query($con,$query);

    if(mysqli_num_rows($resp)==1){
        session_start();
        while ($row = mysqli_fetch_array($resp)){
            $_SESSION['username'] = $row['User']; 
            $_SESSION['tipo'] = $row['tipoUser'];                      
        }                    
        echo 1;
    }else{         
        echo"mal";
        
    }

?>