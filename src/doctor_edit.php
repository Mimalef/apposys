<?php
include "_doctor_permission.php";
include "_header.php";
include "_conn.php";

$doctor_id = $_SESSION['doctor_id'];

if(isset($_GET['submit']))
{
    $name = $_GET['name'];
    $spec = $_GET['spec'];
    $pass = $_GET['pass'];
    $user = $_GET['user'];
    $tele = $_GET['tele'];
    $addr = $_GET['addr'];

    $sql = "
        UPDATE
            doctors
        SET
            name='$name',
            username='$user',
            password='$pass',
            specialist='$spec',
            telephone=$tele,
            address='$addr'
        WHERE
            id=$doctor_id";

    $res = $db->query($sql);

    if($res)
    {
        echo "<p>با موفقیت انجام شد.</p>";
    }
    else
    {
        echo "<p class='erro>خطا</p>";
    }
}

$sql = "
    SELECT
        name,
        specialist,
        password,
        username,
        telephone,
        address
    FROM
        doctors
    WHERE
        id = $doctor_id";

$res = $db->query($sql);
$res = $res->fetch();
?>

<form>
    <input name="name" type="text" value="<?php echo $res['name'] ?>" placeholder="نام">
    <input name="spec" type="text" value="<?php echo $res['specialist'] ?>" placeholder="تخصص">
    <input name="pass" type="text" value="<?php echo $res['password'] ?>" placeholder="گذرواژه">
    <input name="user" type="text" value="<?php echo $res['username'] ?>" placeholder="نام کاربری">
    <input name="tele" type="text" value="<?php echo $res['telephone'] ?>" placeholder="تلفن">
    <input name="addr" type="text" value="<?php echo $res['address'] ?>" placeholder="آدرس">
    <input name="submit" type="submit"  value="ثبت">
</form>

<?php include "_footer.php"; ?>
