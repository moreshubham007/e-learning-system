<?php
if(!isset($_SESSION['sr'])) 
{
    header("Location: ../../../../../invalid.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- <link rel="stylesheet" href="mobile.css"> -->
<style type="text/css">
	* {
  box-sizing: border-box;
}

.row::after {
  content: "";
  clear: both;
  display: table;
}

[class*="col-"] {
  float: left;
  padding: 15px;
}

html {
  font-family: "Calibri";
}

.header {
  background-color: #9933cc;
  color: #ffffff;
  padding: 15px;
  border-radius: 20px;
}

.menu ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
}

.menu li {

  border-radius: 10px;
  padding: 8px;
  font-weight: bold;
  margin-bottom: 7px;
  background-color: #33b5e5;
  color: #ffffff;
  font-size: 20px;
  box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
}

.menu li:hover {
  background-color: #0099cc;
}

.aside {
  background-color: #33b5e5;
  padding: 10px;
  color: #ffffff;
  border-radius: 20px;
  text-align: center;
  font-size: 14px;
  box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
}


/* For mobile phones: */
[class*="col-"] {
  width: 100%;
}

@media only screen and (min-width: 600px) {
  /* For tablets: */
  .col-s-1 {width: 8.33%;}
  .col-s-2 {width: 16.66%;}
  .col-s-3 {width: 25%;}
  .col-s-4 {width: 33.33%;}
  .col-s-5 {width: 41.66%;}
  .col-s-6 {width: 50%;}
  .col-s-7 {width: 58.33%;}
  .col-s-8 {width: 66.66%;}
  .col-s-9 {width: 75%;}
  .col-s-10 {width: 83.33%;}
  .col-s-11 {width: 91.66%;}
  .col-s-12 {width: 100%;}
}
@media only screen and (min-width: 768px) {
  /* For desktop: */
  .col-1 {width: 8.33%;}
  .col-2 {width: 16.66%;}
  .col-3 {width: 25%;}
  .col-4 {width: 33.33%;}
  .col-5 {width: 41.66%;}
  .col-6 {width: 50%;}
  .col-7 {width: 58.33%;}
  .col-8 {width: 66.66%;}
  .col-9 {width: 75%;}
  .col-10 {width: 83.33%;}
  .col-11 {width: 91.66%;}
  .col-12 {width: 100%;}
}

video {
  width: 100%;
  height: auto;
}

.row:after {
  content: "";
  clear: both;
  display: table;
}

[class*="col-"] {
  float: left;
  padding: 15px;
  width: 100%;
}

@media only screen and (min-width: 600px) {
  .col-s-1 {width: 8.33%;}
  .col-s-2 {width: 16.66%;}
  .col-s-3 {width: 25%;}
  .col-s-4 {width: 33.33%;}
  .col-s-5 {width: 41.66%;}
  .col-s-6 {width: 50%;}
  .col-s-7 {width: 58.33%;}
  .col-s-8 {width: 66.66%;}
  .col-s-9 {width: 75%;}
  .col-s-10 {width: 83.33%;}
  .col-s-11 {width: 91.66%;}
  .col-s-12 {width: 100%;}
}

@media only screen and (min-width: 768px) {
  .col-1 {width: 8.33%;}
  .col-2 {width: 16.66%;}
  .col-3 {width: 25%;}
  .col-4 {width: 33.33%;}
  .col-5 {width: 41.66%;}
  .col-6 {width: 50%;}
  .col-7 {width: 58.33%;}
  .col-8 {width: 66.66%;}
  .col-9 {width: 75%;}
  .col-10 {width: 83.33%;}
  .col-11 {width: 91.66%;}
  .col-12 {width: 100%;}
}

.desc
{
	background-color: #9933CC;
	color: white;
	padding-top: 20px;
	padding: 20px;
	border-radius: 20px;
}
</style>
</head>
<body>

<div class="row">
  <div class="col-3 col-s-3 menu">
    <ul>
      <li> Teacher Name: <?php echo $fname." ".$lname ?></li>
      <li><?php echo $semester ?></li>
      <li>Subject: <?php echo $subject ?></li>
      <li>Date: <?php echo $date ?></li>
      <li>
        <b>Assignment Submitted by:</b><br>
        <?php
        // Assignment submitted by start
        $qry="SELECT * from assignment where video_id=$sr";
        $retval=mysql_query(($qry));
        if(mysql_num_rows($retval)>0)
        {
        while($row=mysql_fetch_assoc($retval))
        {
          $roll=$row['roll_no'];
          $ass_file_name=$row['file_name'];
          // Fetch Student Details start
          $qry="SELECT * from student where sid='$roll'";
          $ret=mysql_query($qry);
          if($row=mysql_fetch_assoc($ret))
          {
            // $tid=$row['tid'];
            echo "Name:".$row['fname']." ".$row['lname']."(".$row['sid'].")";
          }
          // Fetch Student Details end
          ?>
          <br>
          <a style="color: white;" href="../student/assignment/<?php echo $ass_file_name ?>" download="<?php echo $ass_file_name ?>">Click to Open</a><br>
          <?php
        }
        }
        else
        {
          echo "No Submission";
        }
        // Assignment submitted by end
        ?>
      </li>
    </ul>
  </div>

  <div class="col-6 col-s-9">
  	<div align="center" class="desc">
    <div align="center">
    <video width="600" controls>
		  <source src="menu/menus/video/<?php echo $video ?>" type="video/mp4">
		  Your browser does not support video player.
		</video>
		<h3>Documents</h3>
		<?php
		if($docs!="")
		{
		?>
			<label>Download available...! </label>
			<a style="color: white;" href="menu/menus/docs/<?php echo $docs ?>" download="<?php echo $docs ?>">Click Here</a>
		<?php
		}
		else
		{
			echo "No downloads";
		}
		?>
    </div>
    </div>
  </div>

  <div class="col-3 col-s-12">
    <div class="aside">
      <h1 align="left">Description:</h1>
    <p style="font-size: 20px; font-weight: bold;"><?php echo $description ?></p>
    </div>
  </div>
</div>

</body>
</html>
