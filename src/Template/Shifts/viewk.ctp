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
$result = mysqli_query($conn, $que);
if ($row = mysqli_fetch_array($result)){
    $user_name = $row['name'];
}

$que = "select id, name from locations where id ='$location'";
$result = mysqli_query($conn, $que);
if ($row = mysqli_fetch_array($result)){
    $loc_name = $row['name'];
}
?>

<br>
<?= $this->element('navigation') ?>
<br>
<br><br>

<br>
<div class="users view large-9 medium-8 columns content">
<br>
    <h5>Shift for <?= $user_name ?> at <?= $loc_name ?> </h5><br>
    <table class="table table-hover">
        <tr>
            <th scope="row" class="table-info">User ID</th>
            <td class="table-light"><a href="happypc4/users/view/".$user.><?= $user ?></td>
        </tr>
        <tr>
            <th scope="row" class="table-info">User Name</th>
            <td class="table-light"><?= $user_name ?></td>
        </tr>
        <tr>
            <th scope="row" class="table-info">Location ID</th>
            <td class="table-light"><a href="happypc4/locations/view/".$location.><?= $location ?></td>
        </tr>
        <tr>
            <th scope="row" class="table-info">Loc. Name</th>
            <td class="table-light"><?= $loc_name ?></td>
        </tr>
        <tr>
            <th scope="row" class="table-info">Bill ID</th>
            <td class="table-light"><a href="happypc4/bills/view/".$bill.><?= $bill ?></td>
        </tr>
    </table>