<?php

    include('../dbconnection.php');
    $info=$_GET['id'];
    $output= '<table> <tr><td>ID</td>
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
            $output .= '<tr>
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
            $output.= '</table>';
            header("Content-Type: application/xls");
            header("Content-Disposition: attachment; filename=aggregatordoc.xls");
            
            echo $output;
?>
