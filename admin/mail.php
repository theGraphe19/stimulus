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

        // $email = $_POST['email'];
        $email = 'sayantanichatterjee67@gmail.com'; // need email from prompt

        // $info=$_POST['id'];
        $info = [3, 4]; //need id array
        $messege = 'hi';
        $to = $email;
        $subject = 'This is the subject.';

        $messege='<html><body><table>';

            foreach ($info as $id) {
                $id;
                $query = "SELECT * FROM `travel_agents` WHERE `ta_id` ='$id'";
                $result = mysqli_query($link, $query);
                if(mysqli_num_rows($result) > 0) {

                    $row = mysqli_fetch_array($result);
               
                    $data[] = array('ta_com_name','ta_name', 'ta_email', 'ta_phn');

                    $messege .= '<tr>
                                    <td>'.$row['ta_id'].'</td>
                                    <td>'.$row['ta_com_name'].'</td>
                                    <td>'.$row['ta_name'].'</td>
                                    <td>'.$row['ta_email'].'</td>
                                    <td>'.$row['ta_phn'].'</td>
                                </tr>';
                }
                $messege .= '</table></body></html>';
                
            }
                

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