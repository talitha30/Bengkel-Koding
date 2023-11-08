<?php
// login
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    // mencocokan data dengan yang terdapat pada database
    $hasil = mysqli_query($mysqli, "SELECT * FROM user where username='$username' and password='$password'");
    //hitung jumlah data
    $hitung = mysqli_num_rows($hasil);
    if ($hitung > 0) {
        $_SESSION['login'] = 'True';
        $data = mysqli_fetch_array($hasil);
        $_SESSION['user_id'] = $data['id'];
        header('location:index.php');
    } else {
        $error_message = "Username atau Password salah!";
    }
}
?>

<div class="container mt-5">
    <form method="post" class="login-form">
        <?php
        if (isset($error_message)) {
            echo '<div class="alert alert-danger">' . $error_message . '</div>';
        }
        ?>
        <div class="mb-3">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" class="form-control" placeholder="Enter your username" required>
        </div>
        <div class="mb-3">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="Enter your password" required>
        </div>
        <input type="submit" name="login" class="btn btn-primary btn-lg btn-block w-100" value="Login">
        <p class="mt-3 text-secondary text-center">Anda belum punya akun? Silahkan <a href="index.php?page=register" class="text-primary">Register</a></p>
    </form>
</div>



<style>
    .login-form {
        max-width: 400px;
        margin: 0 auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    }

    .login-form h2 {
        text-align: center;
        margin-bottom: 20px;
    }

    .login-form input[type="text"],
    .login-form input[type="password"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .login-form input[type="submit"] {
        width: 100%;
        padding: 10px;
        background-color: #007BFF;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .login-form input[type="submit"]:hover {
        background-color: #0056b3;
    }

    .login-form .register-link {
        text-align: center;
        margin-top: 15px;
    }
</style>
