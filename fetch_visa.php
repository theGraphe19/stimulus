<?php

    include('dbconnection.php');
    $id = $_POST['id'];
    $type = $_POST['type'];

    $sql1 = "select * from visa_con where visa_id = '$id'";
    $rt11 = mysqli_query($link, $sql1);
    $row1 = mysqli_fetch_array($rt11, MYSQLI_ASSOC);

    $id1 = $row1['visa_id'];

    $rgh1 = "select * from country where id = '$id1'";
    $gh1 = mysqli_query($link, $rgh1);
    $bv1 = mysqli_fetch_array($gh1, MYSQLI_ASSOC);


    if($type === '1')
    {
        echo $row1['visa_about'];
    }
    elseif($type == '2')
    {
        echo $row1['visa_business'];
    }
    elseif($type == '3')
    {
        echo $row1['visa_tourist'];
    }
    elseif($type == '4')
    {
        echo $row1['visa_transit'];
    }
    elseif($type == '5')
    {
        echo $row1['visa_employment'];
    }
    elseif($type == '6')
    {
        echo $row1['visa_ref'];
    }
    elseif($type == '7')
    {
        echo $row1['visa_electronic'];
    }
    elseif($type == '8')
    {
        echo $row1['visa_link'];
        
        $dfd = "select * from visa_pics where visa_id = '$id'";
        $rty = mysqli_query($link, $dfd);
        while($mew = mysqli_fetch_array($rty, MYSQLI_ASSOC))
        {
            $doc = $mew['visa_pic'];
            $str1 = trim(str_replace(" ", "%20", $doc));
            echo '$ https://stimulustours.com/'.$str1;
        }
    }

?>


