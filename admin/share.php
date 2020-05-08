<?php
        
        include('../dbconnection.php');

            $email = $_POST['email'];

            $query = "SELECT * from travel_agents where ta_status = '1'";
             
            //loop the fetch and concactenate into string
            if ($result = $link->query($query)) {
                    
                    $data[] = array('ta_com_name','ta_name', 'ta_email', 'ta_phn');
                      while ($row = $result->fetch_assoc()) {
                $data[] = array($row['ta_com_name'], $row['ta_name'], $row['ta_email'], $row['ta_phn']);
                }
                $result->free();
            }
             
            function create_csv_string($data2) {
              // Open temp file pointer
              if (!$fp = fopen('php://temp', 'w+')) return FALSE;
              // Loop data and write to file pointer
              foreach ($data2 as $line) fputcsv($fp, $line);
              // Place stream pointer at beginning
              rewind($fp);
              // Return the data
              return stream_get_contents($fp);
            }
            function send_csv_mail ($csvData, $body, $to = '$email', $from = 'rohit@thegraphe.com', $subject = 'Stimulus email with attachment' ) {
              // This will provide plenty adequate entropy
              $multipartSep = '-----'.md5(time()).'-----';
              // Arrays are much more readable
              $headers = array(
                "From: $from",
                "Reply-To: $from",
                "Content-Type: multipart/mixed; boundary=\"$multipartSep\""
              );
              // Make the attachment
             
             $attachment = chunk_split(base64_encode(create_csv_string($csvData))); 
              // Make the body of the message
              $body = "--$multipartSep\r\n"
                    . "Content-Type: text/plain; charset=ISO-8859-1; format=flowed\r\n"
                    . "Content-Transfer-Encoding: 7bit\r\n"
                    . "\r\n"
                    . "$body\r\n"
                    . "--$multipartSep\r\n"
                    . "Content-Type: text/csv\r\n"
                    . "Content-Transfer-Encoding: base64\r\n"
                    . "Content-Disposition: attachment; filename=\"AFILE.csv\"\r\n"
                    . "\r\n"
                    . "$attachment\r\n"
                    . "--$multipartSep--";
               // Send the email, return the result
               return @mail($to, $subject, $body, implode("\r\n", $headers)); 
            }
              
            echo "emaling now <br>";
            $resp=send_csv_mail($data, "Travel Agents List");
        
        
        
        
        
        if(isset($_POST['person']))
        {
            $query = "SELECT * from travel_agents where ta_status = '1'";
             
            //loop the fetch and concactenate into string
            if ($result = $link->query($query)) {
                    
                    $data[] = array('ta_com_name','ta_name', 'ta_email', 'ta_phn');
                      while ($row = $result->fetch_assoc()) {
                $data[] = array($row['ta_com_name'], $row['ta_name'], $row['ta_email'], $row['ta_phn']);
                }
                $result->free();
            }
             
            function create_csv_string($data2) {
              // Open temp file pointer
              if (!$fp = fopen('php://temp', 'w+')) return FALSE;
              // Loop data and write to file pointer
              foreach ($data2 as $line) fputcsv($fp, $line);
              // Place stream pointer at beginning
              rewind($fp);
              // Return the data
              return stream_get_contents($fp);
            }
            function send_csv_mail ($csvData, $body, $to = '.$email.', $from = 'rohit@thegraphe.com', $subject = 'Stimulus email with attachment' ) {
              // This will provide plenty adequate entropy
              $multipartSep = '-----'.md5(time()).'-----';
              // Arrays are much more readable
              $headers = array(
                "From: $from",
                "Reply-To: $from",
                "Content-Type: multipart/mixed; boundary=\"$multipartSep\""
              );
              // Make the attachment
             
             $attachment = chunk_split(base64_encode(create_csv_string($csvData))); 
              // Make the body of the message
              $body = "--$multipartSep\r\n"
                    . "Content-Type: text/plain; charset=ISO-8859-1; format=flowed\r\n"
                    . "Content-Transfer-Encoding: 7bit\r\n"
                    . "\r\n"
                    . "$body\r\n"
                    . "--$multipartSep\r\n"
                    . "Content-Type: text/csv\r\n"
                    . "Content-Transfer-Encoding: base64\r\n"
                    . "Content-Disposition: attachment; filename=\"AFILE.csv\"\r\n"
                    . "\r\n"
                    . "$attachment\r\n"
                    . "--$multipartSep--";
               // Send the email, return the result
               return @mail($to, $subject, $body, implode("\r\n", $headers)); 
            }
              
            echo "emaling now <br>";
            $resp=send_csv_mail($data, "Travel Agents List");
        }

 


?> 