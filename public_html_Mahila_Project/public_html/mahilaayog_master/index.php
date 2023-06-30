<?php 
define('mysite',true);
session_start(); 
include "includes/config.php";

if (isset($_POST['login'])) {

    function validate($data){
       $data = trim($data);
       $data = stripslashes($data);
       $data = htmlspecialchars($data);
       return $data;
    }

    $uname = mysqli_real_escape_string($conn,$_POST['uname']);
    $pass = mysqli_real_escape_string($conn,$_POST['password']);
    $role = mysqli_real_escape_string($conn,$_POST['role']);
    $district = mysqli_real_escape_string($conn,$_POST['district']);
    $user=array("$uname","$pass","$role","$district");
    // array_push($userDet,"blue","yellow");
    $_SESSION['user'] = $user;
    // print_r($_SESSION['user'][3]);
    // die();

    if (empty($uname)) {
        header("Location: index.php?error=User Name is required");
        exit();
    }else if(empty($pass)){
        header("Location: index.php?error=Password is required");
        exit();
    }else if(empty($role)){
        header("Location: index.php?error=Role is required");
        exit();
    }else if(empty($district)){
        header("Location: index.php?error=District is required");
        exit();
    }else{
        // hashing the password
        $pass = md5($pass);

        
        $sql = "SELECT * FROM users WHERE username='$uname' AND password='$pass' AND role='$role'";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if ($row['username'] === $uname && $row['password'] === $pass && $row['role'] === $role) {
                $_SESSION['username'] = $row['username'];
                $_SESSION['role'] = $row['role'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['district'] = $_SESSION['user'][3];
                $_SESSION['id'] = $row['id'];
                header("Location: dashboard.php");
                exit();
            }else{
                header("Location: index.php?error=Incorect User name or password");
                exit();
            }
        }else{
            header("Location: index.php?error=Incorect User name or password");
            exit();
        }
    }  
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>LOGIN</title>
    <link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body>
     <form method="post">
        <h2>MAHILAAYOG ADMIN LOGIN</h2>
        <?php if (isset($_GET['error'])) { ?>
            <p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>
        <label for="uname">User Name</label>
        <input type="text" id="uname" name="uname" placeholder="User Name">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Password">
        <label for="role">Role</label>
        <select aria-label="" id="role" name="role">
            <option>--Select Role--</option>
            <option value="admin">Admin</option>
            <option value="operator">Operator</option>
        </select>
        <label for="district">District</label>
        <select name="district">
                                                    <option selected>जिला</option>
                                                    <?php
                                                $query="select*from district";
                                                $result = mysqli_query($conn,$query);
                                                while($row=mysqli_fetch_array($result))
                                                {
                                                ?>
                                                    <option value="<?php echo htmlentities($row['district']);?>"><td><?php echo htmlentities($row['district']);?></option>
                                                    <?php }?>
                                                </select>
        <button type="submit" name="login">Login</button>
     </form>
</body>
</html>