<?php
    // $to = 'sayantanichatterjee67@gmail.com';
    // $subject = 'This is the subject.';
    // $messege = '<h1> Hey there!</h1><p>This is a test email to myself!</p>';

    // $headers = "From: The Sender Name <sayantanichatterjee67@gmail.com>"."\r\n";
    // $headers .= "Reply To: sayantanichatterjee67@gmail.com"."\r\n";
    // $headers .= "Content-type: text/html; charset=UTF-8"."\r\n";

    // mail($to , $subject, $messege, $headers);
?>
<?php

        include('../dbconnection.php');

        // $email = 'sayantanichatterjee67@gmail.com'; // need email from prompt
        $email = $_GET['person'];
        // echo $email;

        // $info = ['4', '3', 'STIAG64801394', 'STIAG12725786']; //need id array
        $info=$_GET['id'];
        // print_r($info);

        // $messege = 'hi';
        $to = $email;
        $subject = 'This is the subject.';

        $messege='<html><body><table> <tr><td>ID</td>
                                        <td>COMPANY</td>
                                        <td>NAME</td>
                                        <td>EMAIL</td>
                                        <td>PHONE</td>
                                        <td>DOCUMENTS</td>
                                        <td>REGISTERED ON</td>
                                        <td>STATUS</td>
                                    </tr>';

        foreach ($info as $id) {
            $id;
    
            $query = "SELECT * FROM `travel_agents` WHERE `ta_id` = '$id' ";
            $result = mysqli_query($link, $query);
    
            if(mysqli_num_rows($result) > 0)
            {
                $row = mysqli_fetch_array($result);
    
                $status = "not registered";
                $st = $row['ta_status'];
                if ($st == 1){
                    $status = "registered";
                }
                $phone = "+" . $row['ta_phn_code'] . " " . $row['ta_phn'];
                $messege .= '<tr>
                                <td>'. $row['ta_id'] .'</td>
                                <td>'. $row['ta_com_name'] .'</td>
                                <td>'. $row['ta_name'] .'</td>
                                <td>'. $row['ta_email'] .'</td>
                                <td>'. $phone .'</td>
                                <td>'. $row['ta_doc'] .'</td>
                                <td>'. $row['ta_registerd_on'] .'</td>
                                <td>'. $status .'</td>
                            </tr>';
            }
        }
                $messege.= '</table>';

            // Defining the headers

            $headers = "MIME-Version: 1.0" . "\r\n";
            //Set Content type HTML
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $headers .= "From: The Sender Name <sayantanichatterjee67@gmail.com>"."\r\n";
            $headers .= "Reply To: " . $email ."\r\n";
            $headers .= "Content-type: text/html; charset=UTF-8"."\r\n";

            // echo $to;
            // echo "<br>";
            // echo $subject;
            // echo "<br>";
            // echo $messege;
            // echo "<br>";
            // echo $headers;
            // echo "<br>";

            mail($to , $subject, $messege, $headers);
?>