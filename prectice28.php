<?php
$conn = mysqli_connect('localhost', 'root', '', 'haryy');

if (!$conn) {
    die("Database not connected");
}

if (isset($_POST['submit'])) {
    $name   = trim($_POST['name']);
    $num    = trim($_POST['number']);
    $gender = trim($_POST['gender']);
    $email  = trim($_POST['email']);

    if ($name == "") {
        echo "Enter valid name <a href='prectice28.html'>HOME</a>";
    } elseif ($num == "") {
        echo "Enter valid number <a href='prectice28.html'>HOME</a>";
    } else {
    
        ?>
        <form method="post">
            <input type="hidden" name="name" value="<?php echo $name; ?>">
            <input type="hidden" name="number" value="<?php echo $num; ?>">
            <input type="hidden" name="gender" value="<?php echo $gender; ?>">
            <input type="hidden" name="email" value="<?php echo $email; ?>">

            <table border="2">
                <tr><td>Name :</td><td><?php echo $name; ?></td></tr>
                <tr><td>Mobile Number :</td><td><?php echo $num; ?></td></tr>
                <tr><td>Gender :</td><td><?php echo $gender; ?></td></tr>
                <tr><td>Email :</td><td><?php echo $email; ?></td></tr>
                <tr>
                    <td colspan="2">
                        <input type="checkbox" name="ck"> Confirm
                    </td>
                </tr>
                <tr>
                    <td><input type="submit" name="data" value="Confirm"></td>
                    <td><a href="prectice28.html"><input type="button" value="Reset"></a></td>
                </tr>
            </table>
        </form>
        <?php
    }
}

if (isset($_POST['data'])) {
    if (isset($_POST['ck'])) {
        $name   = $_POST['name'];
        $num    = $_POST['number'];
        $gender = $_POST['gender'];
        $email  = $_POST['email'];

        $sql = "INSERT INTO `from_data`(`name`, `mobile_n`, `gender`, `email`) 
                VALUES ('$name','$num','$gender','$email')";

        if (mysqli_query($conn, $sql)) {
            echo "✅ Data Inserted Successfully <a href='prectice28.html'>HOME</a>";
        } else {
            echo " Data not Inserted: " . mysqli_error($conn);
        }
    } else {
        echo "<p style='color:red;'>Please select <b>Checkbox</b></p>";
    }
}
?>
