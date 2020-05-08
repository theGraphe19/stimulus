<?php

            include('../dbconnection.php');
            
            if(isset($_GET['pdf_id']))
            {
                $id = $_GET['pdf_id'];
                $ui = "delete from visa_pics where id = '$id'";
                $bn = mysqli_query($link, $ui);
                
                echo "<script>alert('PDF removed');</script>";
                echo "<script>location.href='visa_content_edit.php';</script>";
            }
            
            
            if(isset($_GET['images_id']))
            {
                $id1 = $_GET['images_id'];
                $ui1 = "delete from visa_docs where v_doc_id = '$id1'";
                $bn1 = mysqli_query($link, $ui1);
                
                echo "<script>alert('Image removed');</script>";
                echo "<script>location.href='visa_content_edit.php';</script>";
            }

?>