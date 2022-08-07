<?php include("connect/connect.php") ?>

<?php
    session_start();
    if(isset($_SESSION['tid']))
    {
      header("Location: index/teacher/index.php");
      exit();
    }

    if(isset($_SESSION['sid']))
    {
      header("Location: index/student/index.php");
      exit();
    }
// Login
  if (isset($_POST['login'])) {
    $login=$_POST['loginto'];
    $user=$_POST['user'];
    $pass=$_POST['pass'];
// Teacher Log

    if($login=="teacher")
    {
      $qry="SELECT * from teacher";
      $ret=mysql_query($qry);
      if(mysql_num_rows($ret)>0)
      {
        while($row=mysql_fetch_assoc($ret))
        {
          $tid=$row['tid'];
          $sr=$row['sr'];
          $tpass=$row['tpass'];
          if(strtoupper($user)==strtoupper($tid))
          {
            if($tpass==$pass)
            {
              if(isset($_SESSION['sr']))
              {
                $url="index/teacher/index.php";
                header("Location:".$url);
                exit();
              }
              else if(isset($sr))
              {
                $_SESSION['sr']=$sr;
                $url="index/teacher/index.php";
                header("Location:".$url);
                exit();
              }
            }
            else
            {
              $stop=1;
            }
          }
          else
           {
              $stop=1;
           }
        }
      }
      if($stop==1)
      {
      echo "<script>alert('Invalid Username or Password');
      </script>";
      }
    }
    // Student
    if($login=="student")
    {
      $qry="SELECT * from student";
      $ret=mysql_query($qry);
      if(mysql_num_rows($ret)>0)
      {
        while($row=mysql_fetch_assoc($ret))
        {
          $sid=$row['sid'];
          $spass=$row['pass'];
          if(strtoupper($sid)==strtoupper($user))
          {
          if($spass==$pass)
          {
            if(isset($_SESSION['sid']))
            {
              $url="index/student/index.php";
              header("Location:".$url);
              exit();
            }
            else if(isset($sid))
            {
              $_SESSION['sid']=$sid;
              $url="index/student/index.php";
              header("Location:".$url);
              exit();
            }
          }
          else
          {
            $stop=1;
          }
          }
          else
          {
            $stop=1;
          }
        }
      }
      if($stop==1)
      {
      echo "<script>alert('Invalid Username or Password');
      </script>";
      }
    }
  }

// SignUp
  if (isset($_POST['create'])) {
    $fname=$_POST['first'];
    $mname=$_POST['middle'];
    $lname=$_POST['last'];
    $sid=$_POST['sid'];
    $semester=$_POST['sem'];
    $sphone=$_POST['sphone'];
    $dob=$_POST['dob'];
    $pass=$_POST['spass'];
$ok=0;
$qry="SELECT sid from student";
$ret=mysql_query($qry);
while($row=mysql_fetch_assoc($ret))
{
  if( strtolower($sid)== strtolower($row['sid']))
  {
      echo "
      <script>
        alert('Already Registered');
      </script>";
    $ok++;
  }
}
    if($semester=="no"){
      echo "
      <script>
        alert('Select Semester');
      </script>";
      $ok++;
    }
    elseif(is_numeric($_POST['sphone'])) 
      {}
      else { echo "<script>
      alert('Invalid Mobile Number');
      </script>";
      $ok++;
      }
if($ok==0)
{
  $status="active";
      $qry="INSERT into student values('sr','$fname','$mname','$lname','$sid','$semester','$sphone','$dob','$pass','$status')";
      if(mysql_query($qry))
      { 
        echo "<script>
        alert('Account Created');
        window.location.href='index.php';
        </script>";
      }
      else
      {
          echo "<script>alert('Something went Wrong');</script>";

      }
    
  }
}
?>