<?php
    include('../dbconnection.php');
    $info=$_GET['id']; // this is the id array 
    // $info= [43671, 68547];
    $output= '<table> <tr><td>ID</td>
                        <td>NAME</td>
                        <td>PACKAGE CODE</td>
                        <td>EMAIL</td>
                        <td>PHONE</td>
                        <td>STATUS</td>
                        <td>REGISTERED ON</td>
                    </tr>';
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

            $output .= '<tr>
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
            $output.= '</table>';
            header("Content-Type: application/xls");
            header("Content-Disposition: attachment; filename=bookingdoc.xls");
            
            echo $output;
?>
