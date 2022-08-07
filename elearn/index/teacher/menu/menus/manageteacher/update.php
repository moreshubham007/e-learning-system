<?php
if(!isset($_SESSION['sr'])) 
{
    header("Location: ../../../../../invalid.php");
    exit();
}

$sr=$id;

$qry="SELECT * from video where id='$sr'";
$ret=mysql_query($qry);
if($row=mysql_fetch_assoc($ret))
{
  $tid=$row['tid'];
  $semester=$row['semester'];
  $subject=$row['subject'];
  $date=$row['date'];
  $title=$row['title'];
  $description=$row['description'];
  $video=$row['video'];
  $docs=$row['docs'];
}

$qry="SELECT * from teacher where tid='$tid'";
$ret=mysql_query($qry);
if($row=mysql_fetch_assoc($ret))
{
  $fname=$row['fname'];
  $lname=$row['lname'];
}

include("menu/menus/manageteacher/view.php"); 
?>