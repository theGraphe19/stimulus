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

        // $info= [33, 37, 38];
        $info=$_GET['id'];
        // print_r($info);

        $messege='';

        $to = $email;
        $subject = 'This is the subject.';
        foreach ($info as $id) {
            $id; //this is only the id of one user
    
            $query = "SELECT * FROM `visa` WHERE `v_id` = $id";
            $result = mysqli_query($link, $query);
            if(mysqli_num_rows($result) > 0)
            {
                $row = mysqli_fetch_array($result);
                    
                $query1 = " SELECT `nicename` FROM `country` WHERE `id` = '$row[v_destination]' ";
                $country = mysqli_fetch_row(mysqli_query($link, $query1));
    
                $request ="null";
                $req = $row['v_request'];
                if ($req == 1){
                    $request = "accepted";
                } else if ($req == 2){
                    $request = "verified";
                } else if ($req == 3){
                    $request = "processed";
                } else if ($req == 4){
                    $request = "shipped";
                }
                $phone = "+" . $row['v_phone_code'] . " " . $row['v_phone'];
                
                $messege .= '<tr>
                                <td>'. $row['v_id'] .'</td>
                                <td>'. $row['v_name'] .'</td>
                                <td>'. $country[0] .'</td>
                                <td>'. $row['v_purpose'] .'</td>
                                <td>'. $row['v_email'] .'</td>
                                <td>'. $phone .'</td>
                                <td>'. $row['v_docs'] .'</td>
                                <td>'. $row['v_remarks'] .'</td>
                                <td>'. $request .'</td>
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