<?php
if(!isset($_SESSION['usr']))
{
    header("Location: ../../../invalid.php");
    exit();
}
$results=0;
$con = mysqli_connect('localhost','root','');
mysqli_select_db($con, 'e-learning');
?>

<form method="POST">
  <h2>All videos:</h2>

  <br>
    <table>
        <tr>
          <th>Sr</th>
          <th>id</th>
          <th>Semester</th>
          <th>Subject</th>
          <th>Title</th>
          <th>Date</th>
          <th>Video</th>
          <th>Docs</th>
          <th></th>
        </tr>
        <?php
        $qry="SELECT * from video ORDER BY id DESC";
        $ret=mysqli_query($con,$qry); 
        if(mysqli_fetch_assoc($ret)>0)
        { 
          $sr=0;
          while($row=mysqli_fetch_array($ret))
            {
              $sr++;
              if($row['video']=="")
                { $video="Not Available"; }
              else
                { $video="Available"; }

              if($row['docs']=="")
                { $docs="Not Available"; }
              else
                { $docs="Available"; }

            ?>
            <tr>
              <td><?php echo $sr ?>)</td>
              <td><?php echo $row['tid'] ?></td>
              <td><?php echo $row['semester'] ?></td>
              <td><?php echo $row['subject'] ?></td>
              <td><?php echo $row['title'] ?></td>
              <td><?php echo $row['date'] ?></td>
              <td><?php echo $video ?></td>
              <td><?php echo $docs ?></td>
              <td><button 
                style="
                background-color: #00d153;
                font-weight: bold;
                " class="vbutton" name="vview" value="<?php echo $row['id'] ?>"><span>view</span></button></td>
            </tr>
            <?php
            }
        }
        else
        {
          echo "<h3>No video !</h3>";
        }
        ?>
    </table>
</form>
