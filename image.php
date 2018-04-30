<!doctype>
<html>
<head>
    <meta charset="utf-8">
    <title>
    </title>
    <link rel="stylesheet" href="css/stylesheet.css">
</head>

<body>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        Select image to upload:
        <input type="file" name="image"/>
        <input type="submit" name="submit" value="UPLOAD"/>
    </form>




    <?php
    $imageName='' ;
    if(isset($_POST['submit'])) {
      mysql_connect('localhost', 'root', '');
      mysql_select_db('insert_photo');

      $imageName=mysql_real_escape_string($_FILES[ 'image'][ 'name']);
      $imageData=mysql_real_escape_string(file_get_contents($_FILES[ 'image'][ 'tmp_name']));
      $imageType=mysql_real_escape_string($_FILES[ 'image'][ 'type']);
      $imageSize =mysql_real_escape_string($_FILES['img']['size']);


      if(substr($imageType,0,5)=='image' ) {
        if(mysql_query( "INSERT INTO `images` values('','$imageName','$imageData')")) {
          echo 'file uploaded<br>';
        } else{
          echo mysql_error();
        }
      } else {
        echo 'its not an image<br>';
      }
    } ?>
    <img src="showImage.php?name=<?php echo $imageName?>">
</body>

</html> showImage.php
<?php mysql_connect( 'localhost', 'root', '');
      mysql_select_db( 'insert_photo');
      if(isset($_GET[ 'name'])) {
        $name=mysql_real_escape_string($_GET[ 'name']);
        $query_run=mysql_query( "SELECT * FROM `images` WHERE `name`='$name'");
        while($row=mysql_fetch_assoc($query_run)){
          $imageData=$ row[ 'image'];
          }
        header( 'content-type:image/jpeg');
        echo $imageData; } ?>
        
        


<?php
//===== alternatywnie'
    if(isset($_POST["submit"])){
      

    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false){
        $image = $_FILES['image']['tmp_name'];
        $imgContent = addslashes(file_get_contents($image));

        /*
         * Insert image data into database
         */
        
        //DB details
        $dbHost     = 'localhost';
        $dbUsername = 'root';
        $dbPassword = '*****';
        $dbName     = 'codexworld';
        
        //Create connection and select DB
        $db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
        
        // Check connection
        if($db->connect_error){
            die("Connection failed: " . $db->connect_error);
        }
        
        $dataTime = date("Y-m-d H:i:s");
        
        //Insert image content into database
        $insert = $db->query("INSERT into images (image, created) VALUES ('$imgContent', '$dataTime')");
        if($insert){
            echo "File uploaded successfully.";
        }else{
            echo "File upload failed, please try again.";
        } 
    }else{
        echo "Please select an image file to upload.";
    }
}
?>