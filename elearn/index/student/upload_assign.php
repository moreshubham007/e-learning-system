<?php
// Upload Assignment start
   if(isset($_FILES['image'])){
      if(isset($_POST['upload']))
      {
         $sul=$_POST['upload'];
      // echo "<script>alert('$sul $stud');</script>";
      $errors= array();
      $file_name = $_FILES['image']['name'];

      $file_size =$_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
      $file_name=$fname.'_'.$lname.'_'.md5(rand()).'.'.$file_ext;

      // $expensions= array("jpeg","jpg","png","pdf");
      
      // if(in_array($file_ext,$expensions)=== false){
      //    $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      // }
      
      if($file_size > 20971520){
         $errors[]='File size must be excately 20 MB';
      }
      
      if(empty($errors)==true){
         move_uploaded_file($file_tmp,"assignment/".$file_name);
      $qry="INSERT into assignment values('aid','$sid','$file_name','$sul')";

         if(mysql_query($qry))
         { 
           echo "<script>
           alert('Assignment Submitted!');
           window.location.href='index.php';
           </script>";
         }
      }else{
         print_r($errors);
      }
      }
   }
// Upload Assignment end
?>
<!-- <html>
   <body>
      
      <form action="" method="POST" enctype="multipart/form-data">
         <input type="file" name="image" />
         <input type="submit"/>
      </form>
      
   </body>
</html> -->