<?php

$conn = mysqli_connect("localhost", "root", "", "proyecto");

if(!$conn){
    echo "El sitio web está experimentado problemas, por favor contacte al administrador.";
}
?>