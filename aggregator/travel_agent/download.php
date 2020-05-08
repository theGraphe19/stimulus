<?php

      include('session.php');
          
      $h = $_POST['name'];
      $date = $_POST['date'];
      $time = $_POST['time'];
      $food = $_POST['food'];

      
      $pathdir = "../../assets/qr/'.$ta_id_session.$ta_name_session.'/'.$h.'/'.$date.$time.$food.'/'";  
        
      // Enter the name to creating zipped directory 
      $zipcreated = "../../assets/qr/'.$ta_id_session.$ta_name_session.'/'.$h.'/'.$date.$time.$food.'/'qr.zip"; 
        
      // Create new zip class 
      $zip = new ZipArchive; 
        
      if($zip -> open($zipcreated, ZipArchive::CREATE ) === TRUE)
      { 
            
          // Store the path into the variable 
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
?>