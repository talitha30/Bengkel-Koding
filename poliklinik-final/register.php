<?php
// register
if (isset($_POST['daftar'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];

    // tambah ke db
    if ($password == $password2) {
        $hash_password = md5($password);
        $query = mysqli_query($mysqli, "INSERT INTO user (username, password) VALUES ('$username', '$hash_password')");

        // Mencocokan dengan database
        if ($query) {
            // Registrasi berhasil, arahkan pengguna ke halaman login
            header('Location: index.php?page=login');
            exit();
        } else {
            // Registrasi gagal, tampilkan pesan kesalahan
            $error_message = "Registrasi gagal!";
        }
    } else {
        $error_message = "Password tidak sama!!!";
    }
}

// Tampilkan pesan kesalahan jika ada
if (isset($error_message)) {
    echo '<div class="alert alert-danger">' . $error_message . '</div>';
}
?>


<div class="container mt-5">
    <form method="post" class="register-form">
        <div class="mb-3">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" class="form-control" placeholder="Enter your username" required>
        </div>
        <div class="mb-3">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="Enter your password" required>
        </div>
        <div class="mb-3">
            <label for="password2">Confirm Password</label>
            <input type="password" name="password2" id="password2" class="form-control" placeholder="Verify your password" required>
        </div>
        <input type="submit" name="daftar" class="btn btn-primary btn-lg btn-block w-100" value="Register">
        <p class="mt-3 text-secondary text-center">Anda sudah punya akun? Silahkan <a href="index.php?page=login" class="text-primary">Login</a></p>
    </form>
</div>


<style>
    .register-form {
        max-width: 400px;
        margin: 0 auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    }

    .register-form h2 {
        text-align: center;
        margin-bottom: 20px;
    }

    .register-form input[type="text"],
    .register-form input[type="password"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .register-form input[type="submit"] {
        width: 100%;
        padding: 10px;
        background-color: #007BFF;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .register-form input[type="submit"]:hover {
        background-color: #0056b3;
    }

    .register-form .register-link {
        text-align: center;
        margin-top: 15px;
    }
</style>
