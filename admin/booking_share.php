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

        $email = $_POST['email'];
        // $email = 'sayantanichatterjee67@gmail.com'; // need email from prompt
        // echo $email;

        $info=$_POST['id'];
        // $info = ['43671', '68547']; //need id array
        // print_r($info);
        
        $messege = '';
        
        $to = $email;
        $subject = 'This is the subject.';

        $messege='<html><body><table>';
                
        foreach ($info as $id) {
            $id; //this is only the id of one user
    
            $query = "SELECT * FROM `package_users` WHERE `pc_id` = '$id' ";
            
    
            $result = mysqli_query($link, $query);
    
            if(mysqli_num_rows($result) > 0)
            {
                $row = mysqli_fetch_array($result);
                
                $query1 = "SELECT `pc_b_code` FROM `package_booking` WHERE `pc_id` = '$id' ";
                $pkgcode = mysqli_fetch_row(mysqli_query($link, $query1));
    
                $st = $row['pc_status'];
                if($st == 1){
                    $status = "Accepted";
                } else if($st == 2){
                    $status = "Paid";
                } else if($st == 3){
                    $status = "Flights Booked";
                } else if($st == 4){
                    $status = "Confirmed";
                } else {
                    $status = "Requested";
                }
    
                $messege .= '<tr>
                                <td>'. $row['pc_id'] .'</td>
                                <td>'. $row['pc_name'] .'</td>
                                <td>'. $pkgcode[0] .'</td>
                                <td>'. $row['pc_email'] .'</td>
                                <td>'. $row['pc_phone'] .'</td>
                                <td>'. $status .'</td>
                                <td>'. $row['pc_registered'] .'</td>
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