<?php
    include('../dbconnection.php');
     $info=$_GET['id']; // this is the id array 
    // $info= [33, 37, 38];
    $output= '<table> <tr><td>ID</td>
                        <td>NAME</td>
                        <td>DESTINATION</td>
                        <td>PURPOSE</td>
                        <td>EMAIL</td>
                        <td>PHONE</td>
                        <td>DOCUMENTS</td>
                        <td>REMARKS</td>
                        <td>STATUS</td>
                    </tr>';
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
            
            $output .= '<tr>
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
            $output.= '</table>';
            header("Content-Type: application/xls");
            header("Content-Disposition: attachment; filename=visadoc.xls");
            
            echo $output;
?>
