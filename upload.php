<?php
   require "predis/autoload.php";
   Predis\Autoloader::register();
   session_start();

   if (isset($_POST['imgBase64'])){
      $img    = $_POST['imgBase64'];
      $imgInfo = explode(';base64,', $img);
      // give jpeg, png, 
      $imgExt = str_replace('data:image/', '', $imgInfo[0]);
      // image string in base 64
      $img = str_replace(' ', '+', $imgInfo[1]);
      // uncompress data 
      $rawImg = base64_decode($img);
      $imgName = time().'.'.$imgExt;
      // output path
      $path = 'img/'.$imgName; 
      // save image
      file_put_contents($path, $rawImg);  
      $_SESSION['imgData'] = $path;
      // echo 'in testing: '.$path;
   }
   function postImageData($name,$imageData) {
      try {
         $redis = new Predis\Client();      
         $redis = new Predis\Client(array(
             "schema" => "tcp",
             "host" => '10.0.0.3',
             "port"=> 6379
         )); 
         echo "Connection to server sucessfully"; 
        // check whether server is running or not 
         echo "<p>Server is running: </p>".$redis->ping(); 
        // save image data to redis
         $redis -> zadd($name, time(), $imageData);
      }
      catch (Exception $e) {
         die($e->getMessage());
      }
   }
   function getImageData($name) {
      try {
         $redis = new Predis\Client();      
         $redis = new Predis\Client(array(
             "schema" => "tcp",
             "host" => '10.0.0.3',
             "port"=> 6379
         )); 
         echo "Connection to server sucessfully"; 
        // check whether server is running or not 
         echo "<p>Server is running: </p>".$redis->ping(); 
        // get image data from redis
        $arlist = $redis->zrange($name, 0, -1);
        echo "<p>Stored image links in redis: </p>";
        print_r($arlist);
      }
      catch (Exception $e) {
         die($e->getMessage());
      }
   }
   $name = 'imgData';
   postImageData($name, $_SESSION['imgData']);
   getImageData($name);
?>