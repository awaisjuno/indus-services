<?php 

    function base_url()
    {
        return 'http://localhost/indus-services/';
    }

    //Database Connection
    $con = mysqli_connect('localhost', 'root', '', 'indus_services');
    
    if(!$con) {
        echo "<script>alert('Some Went Wrong.. DB Connection..')</script>";
    }

?>