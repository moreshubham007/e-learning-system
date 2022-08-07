<?php
if(!isset($_SESSION['sr'])) 
{
    header("Location: ../../../../invalid.php");
    exit();
}

$qry="SELECT * from video where tid='$tid'  ORDER BY id DESC";
$retval=mysql_query(($qry));
?>
<div>
<form method="POST">
  <h2>Posted Video</h2>
        <?php
        if(mysql_num_rows($retval)>0)
        {
          ?>
        <table>
          <th>Sr</th><th>Title</th><th>Semester</th><th>Subject</th><th>Date</th><th>Video</th><th>Documents</th><th>action</th>
          <?php
          $s=1;
          while($row=mysql_fetch_assoc($retval))
          {
            ?>
            <tr>
              <td><?php echo $s.")" ?></td>
              <td>
                <button value="<?php echo $row['id'] ?>" class="vbutton" name="view">
                <?php 
                if(strlen($row['title'])<=20)
                {
                  echo $row['title'];
                } 
                else
                {
                  echo substr($row['title'],0,20)."...";
                }
                ?>
                </button>
              </td>
              <td><?php echo $row['semester'] ?></td>
              <td><?php echo $row['subject'] ?></td>
              <td><?php echo $row['date'] ?></td>
              <td>
                <?php 
              if($row['video']=="")
              {
                echo "No Video";
              }
              else
                {
                  echo "Video Available";
                } 
              ?>  
              </td>
              <td>
                <?php 
              if($row['docs']=="")
              {
                echo "No Documents";
              }
              else
                {
                  if(strlen($row['docs'])<=20)
                  {
                    echo $row['docs'];
                  }
                  else
                  {
                    echo substr($row['docs'],26,5)."...";
                    $ext=explode(".",$row['docs']);
                    echo ".".$ext[1];
                  }
                } 
              ?>  
              </td>
              <td>
                <button class="dbutton" name="delete" value="<?php echo $row['id'] ?>">Delete</button>
              </td>
            </tr>
            <?php
          $s++;
          }
          ?>
            </table>
          <?php
        }
        else
        { ?>
          <h4 style="color: red;">No Video Posted</h4>
          <?php
        }
        ?>

</form>
</div>
<?php
if(isset($_POST['delete']))
{
  $count=1;
  $ok=1;
  $id=$_POST['delete'];
  $qry="SELECT * from video where id='$id'";
  $retval=mysql_query($qry);
  if(mysql_num_rows($retval)>0)
  {
    while($row=mysql_fetch_assoc($retval))
    {
      $video=$row['video'];
      $docs=$row['docs'];
    }
  }

  if($video!="")
  {
  $video="menu/menus/video/".$video;
  if (!unlink($video)) {
    $ok++;
      echo "<script>alert('Video Not found !');</script>";
  }
  }

  if($docs!="")
  {
  $docs="menu/menus/docs/".$docs;
  if (!unlink($docs)) {
      $ok++;
      echo "<script>alert('Document Not found !');</script>";
  }
  } 

  if($ok==1)
  {
    $qry="DELETE from video where id='$id'";
    if(mysql_query($qry))
    {
      echo "<script>alert('Successfully Deleted !');
              window.location.href='index.php';
            </script>";
    }
  }
  else
  {
    $qry="DELETE from video where id='$id'";
    if(mysql_query($qry))
    {
      echo "<script>alert('Successfully Deleted !');
              window.location.href='index.php';
            </script>";
    }
  }
}

if(isset($_POST['view']))
{
    $count=1;
    $id=$_POST['view'];
    $url="menu/menus/manageteacher/update.php?id=".$id;
    echo "<script>window.open('menu/menus/manageteacher/update.php?id=$id');</script>";
}
?>