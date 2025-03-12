<?php

    $conn = mysqli_connect("localhost", "root", "", "cardiology");
    if(!$conn)
    {
        die ("Unable to connect database : ".mysqli_connect_error());
    }
?>