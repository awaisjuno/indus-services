<?php

    session_start();
    include '../config/config.php';
    include '../config/session.php';
    include 'temp.php';
    
?>

    <div class="content">

        <div class="card">

            <div class="card-header">
                <h3>Contact Us Form</h3>
            </div>

            <div class="card-body">

                <table class="styled-table">

                    <tr>
                        <th>Contact ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Message</th>
                        <th>Date</th>
                        <th>View</th>
                        <th>Delete</th>
                    </tr>

                    <?php 
                    
                        //Fetch Contact
                        $contact = "SELECT * FROM contact ORDER BY contact_id DESC";
                        $run = mysqli_query($con, $contact);
                        while($row = mysqli_fetch_assoc($run)) {

                            echo "<tr>
                                <td>". $row['contact_id'] ."</td>
                                <td>". $row['name'] ."</td>
                                <td>". $row['email'] ."</td>
                                <td>". $row['message'] ."</td>
                                <td>". $row['date'] ."</td>
                                <td>
                                    <a href='#'>View</a>
                                </td>
                                <td>
                                    <a href='". base_url() ."super/del-contact.php?contact_id=". $row['contact_id'] ."'>Delete</a>
                                </td>
                            </tr>";

                        }
                    
                    ?>

                </table>

            </div>

        </div>

    </div>