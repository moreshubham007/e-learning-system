<?php
if(!isset($_SESSION['sr'])) 
{
    header("Location: ../../../../invalid.php");
    exit();
}
?>
<form method="POST">
  <h2>Student List</h2>
  <label>Sort By:</label>
  <select name="sort" class="inputbox">
    <option value="sid">Id</option>
    <option value="fname">Name</option>
    <option value="semester">Semester</option>
    <option value="status">Active</option>
    <option value="deactive">Deactive</option>
  </select>
  <button class="go" name="go">Go !</button>
    <table>
      <form method="POST">
        <tr>
          <th>Sr</th>
          <th>Id</th>
          <th>Name</th>
          <th>Semester</th>
          <th>Phone</th>
          <th>Status</th>
          <th>Action</th>
        </tr>
      </form>
      <?php
      $qry="SELECT * from student ";
      $ret=mysql_query($qry);
      $sr=0;
      while($row=mysql_fetch_assoc($ret))
      {
        $sr++;
        ?>
        <tr>
          <td><?php echo $sr ?>)</td>
          <td><?php echo $row['sid'] ?></td>
          <td><?php echo $row['fname']." ".$row['mname']." ".$row['lname'] ?></td>
          <td><?php echo $row['semester'] ?></td>
          <td><?php echo $row['sphone'] ?></td>
          <?php
          if($row['status']=="active")
          {
          ?>
          <form method="POST">
          <td><button name="action" value="<?php echo $row['sid'] ?>" style="background-color: #09b300; color: white;" value="<?php echo $sid ?>" class="change"><?php echo $row['status'] ?></button></td>
          <?php
          }
          else
          {
          ?>
          <td><button name="action" value="<?php echo $row['sid'] ?>" style="background-color: #de0202; color: white;" value="<?php echo $sid ?>" class="change"><?php echo $row['status'] ?></button></td>
          <?php
          }
          ?>
          <td><button name="sdel" value="<?php echo $row['sid'] ?>" style="background-color: #de0202; color: white;" value="<?php echo $sid ?>" class="change">Delete</button></td>
          </form>
        </tr>
        <?php
      }
      ?>
    </table>
</form>
<?php
if(isset($_POST['action']))
{
  $count=2;
}
?>