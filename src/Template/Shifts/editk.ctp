<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Shift $shift
 */

if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }
  if (isset($_SESSION['Auth']['User']['mxid'])){
    if ( ($_SESSION['Auth']['User']['mxid'] == '1')){
        $admin = 1;
    }else {
      $admin = 0;
    }
  }else{
    //tak login takleh view data
    header("Location:users/login");
    die();
  }

$conn = new \mysqli("localhost", "root", "", "happypc");
$user = $_GET["u"];
$location = $_GET["l"];
$bill = $_GET["b"];

$que = "select id, name from users where id ='$user'";
$result_user = mysqli_query($conn, $que);
if ($row = mysqli_fetch_array($result_user)){
    $user_name = $row['name'];
}

$que = "select id, name from locations where id ='$location'";
$result_loc = mysqli_query($conn, $que);
if ($row = mysqli_fetch_array($result_loc)){
    $loc_name = $row['name'];
}

?>

<br>
<?= $this->element('navigation') ?>
<br>
<br><br>

<br>
<div class="users view large-9 medium-8 columns content">
<?php
                     echo "<form method='post' accept-charset='utf-8' action='/happypc4/shifts/editk?u=",$user,
                    "&l=",$location,
                    "&b=",$bill,
                    "'>";
                    ?>
    <fieldset>
        <?php
            echo "<legend>Edit Shift for User ID = $user, Location ID = $location, Bill ID = $bill</legend>";

            $mysqli = NEW MySQLi('localhost','root','','happypc');
            $resultSet = $mysqli->query("SELECT id,name FROM users");
            $resultSet2 = $mysqli->query("SELECT id,name FROM locations");
            $resultSet3 = $mysqli->query("SELECT id FROM bills");
            echo $this->Flash->render();

        ?>

<input type="hidden" name="_csrfToken" autocomplete="off" value="20665da718854259f2ff4a7eea9d42e227080a17cd0ebe520b1085214fa6d3a4d9a3905e005ae256de071970f4765f541a5d80dfa9b7a64b99a5712e1bfbc141">

        <br>
        <h6>Enter User ID:</h6>
        <select name="user_id">
            <?php
                while($rows=$resultSet->fetch_assoc())
                {
                    $user_name = $rows['name'];
                    $user_id = $rows['id'];
                    echo "<option value='$user_id'>$user_id, $user_name</option>";
                }
            ?>
        </select>
        <br><br>
        <h6>Enter Location ID:</h6>
        <select name="location_id">
            <?php
                while($rows=$resultSet2->fetch_assoc())
                {
                    $location_name = $rows['name'];
                    $location_id = $rows['id'];
                    echo "<option value='$location_id'>$location_id, $location_name</option>";
                }
            ?>
        </select>
        <br><br>
        <h6>Enter Bill ID:</h6>
        <select name="bill_id">
            <?php
                while($rows=$resultSet3->fetch_assoc())
                {
                    $bill_id = $rows['id'];
                    echo "<option value='$bill_id'>$bill_id</option>";
                }
            ?>
        </select>
        <br><br>
    <?= $this->Form->submit('Submit', array('class' => 'btn btn-primary btn-lg')); ?>
    <?= $this->Form->end() ?>