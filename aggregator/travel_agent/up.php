<?php
    include('session.php');
    
    $url = $_POST['url'];
    $h = $_POST['name'];
    $name = $_POST['count'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $food = $_POST['food'];

    $code = $_POST['code'];
    
    
    $gh = "insert into qr_url (qr_hotel, qr_code) values ('$date.$food.$time', '$code')";
    $hdp = mysqli_query($link, $gh);
    

    
    
    $path = '../../assets/qr/'.$ta_id_session.$ta_name_session;
    $path1 = '../../assets/qr/'.$ta_id_session.$ta_name_session.'/'.$h;
    $path2 = '../../assets/qr/'.$ta_id_session.$ta_name_session.'/'.$h.'/'.$date.$time.$food;

    $dir2 = '../../assets/qr/'.$ta_id_session.$ta_name_session.'/'.$h.'/'.$date.$time.$food.'/'.$name.'.jpg';
    
    if(is_dir($path)) //or using the single  line code if(is_dir($dir))
    {
        if(is_dir($path1))
        {
            if(is_dir($path2))
            {
                file_put_contents($dir2, file_get_contents($url));

                // if($t)
                // {
                //     $zipcreated = '../../assets/qr/'.$ta_id_session.$ta_name_session.'/'.$h.'/'.$date.$time.$food.'/'.$date.$time.$food.'.zip';

                //     $zip = new ZipArchive; 
                    
                //     if($zip -> open($zipcreated, ZipArchive::CREATE ) === TRUE)
                //     { 
                        
                //         $dir = opendir($pathdir); 
                        
                //         while($file = readdir($dir))
                //         { 
                //             if(is_file($pathdir.$file))
                //             { 
                //                 $zip -> addFile($pathdir.$file, $file); 
                //             } 
                //         } 
                //         $zip ->close();
                //     }
                // }
            }
            else
            {
                mkdir("../../assets/qr/".$ta_id_session.$ta_name_session."/".$h."/".$date.$time.$food);

                $wm = file_put_contents($dir2, file_get_contents($url));

                if($wm)
                {
                    $zipcreated = '../../assets/qr/'.$ta_id_session.$ta_name_session.'/'.$h.'/'.$date.$time.$food.'/'.$date.$time.$food.'.zip';

                    $zip = new ZipArchive; 
                    
                    if($zip -> open($zipcreated, ZipArchive::CREATE ) === TRUE)
                    { 
                        
                        $dir = opendir($pathdir); 
                        
                        while($file = readdir($dir))
                        { 
                            if(is_file($pathdir.$file))
                            { 
                                $zip -> addFile($pathdir.$file, $file); 
                            } 
                        } 
                        $zip ->close();
                    }
                }
            }
        }
        else
        {
            mkdir("../../assets/qr/".$ta_id_session.$ta_name_session."/".$h);

            mkdir("../../assets/qr/".$ta_id_session.$ta_name_session."/".$h."/".$date.$time.$food);

            $pb = file_put_contents($dir2, file_get_contents($url));

            if($pb)
                {
                    $zipcreated = '../../assets/qr/'.$ta_id_session.$ta_name_session.'/'.$h.'/'.$date.$time.$food.'/'.$date.$time.$food.'.zip';

                    $zip = new ZipArchive; 
                    
                    if($zip -> open($zipcreated, ZipArchive::CREATE ) === TRUE)
                    { 
                        
                        $dir = opendir($pathdir); 
                        
                        while($file = readdir($dir))
                        { 
                            if(is_file($pathdir.$file))
                            { 
                                $zip -> addFile($pathdir.$file, $file); 
                            } 
                        } 
                        $zip ->close();
                    }
                }
        }
    }
    else
    {
        mkdir("../../assets/qr/".$ta_id_session.$ta_name_session);
        
        mkdir("../../assets/qr/".$ta_id_session.$ta_name_session."/".$h);

        mkdir("../../assets/qr/".$ta_id_session.$ta_name_session."/".$h."/".$date.$time.$food);

        $di = file_put_contents($dir2, file_get_contents($url));


        if($di)
                {
                    $zipcreated = '../../assets/qr/'.$ta_id_session.$ta_name_session.'/'.$h.'/'.$date.$time.$food.'/'.$date.$time.$food.'.zip';

                    $zip = new ZipArchive; 
                    
                    if($zip -> open($zipcreated, ZipArchive::CREATE ) === TRUE)
                    { 
                        
                        $dir = opendir($pathdir); 
                        
                        while($file = readdir($dir))
                        { 
                            if(is_file($pathdir.$file))
                            { 
                                $zip -> addFile($pathdir.$file, $file); 
                            } 
                        } 
                        $zip ->close();
                    }
                }
    }

    echo("uploaded");
?>