<?php
session_start();

include "_header.php";
include "_conn.php";

if(isset($_SESSION['admin_id']))
{
    header('location: admin_panel.php');
}

if(isset($_GET['submit']))
{
    $user = $_GET['user'];
    $pass = $_GET['pass'];

    $sql = "
        SELECT
            id
        FROM
            admins
        WHERE
            user='$user'
        AND
            pass='$pass'";

    $res = $db->query($sql);
    $res = $res->fetch();

    if($res)
    {
        $_SESSION["admin_id"] = $res['id'];

        header('location: admin_panel.php');
    }
    else
    {
        echo "<p class='error'>نام کاربری یا کلمه عبور اشتبه است.</p>";
    }
}
?>

<form>
    <input name="user" type="text" placeholder="کاربری">
    <input name="pass" type="text" placeholder="گذرواژه" >
    <input name="submit" type="submit" value="ورود" >
</form>

<?php include "_footer.php"; ?>
