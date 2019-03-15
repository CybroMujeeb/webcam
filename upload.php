<?php

//php script

$base64image = $this->input->post('base64image');

$imageName  = generateImage($base64image, 'stu_profile.jpg');

function generateImage($img, $imagename = '.png')
       {

        if(!empty($img)){

          $folderPath = 'local/images/user/';

            if (!file_exists($folderPath)){

                  mkdir($folderPath, 0777, true);

                  if (!file_exists($folderPath.'/index.html')){

                    copy('application/index.html', $folderPath.'/index.html');  
                  }
              }

          $image_parts = explode(";base64,", $img);

          $image_type_aux = explode("image/", $image_parts[0]);

          $image_type = $image_type_aux[1];

          $image_base64 = base64_decode($image_parts[1]);

          $file = $folderPath . uniqid() . $imagename;

          file_put_contents($file, $image_base64);

          return $file;

        }

        return false;

      }


?>