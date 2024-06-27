<?php

    $base_url = "/digitalent"; // Sesuaikan dengan direktori aplikasi Anda

    // ambil pesan jika ada
    // mengecek apakah null atau tidak
    if (isset($_GET["pesan"])) {
        $pesan = $_GET["pesan"];
    }

    // cek apakah form telah di submit
    if (isset($_POST["submit"])) {
        // form telah disubmit, proses data

        // ambil nilai form
        // trim() untuk menghilangkan spasi di awal dan akhir
        // strip_tags() untuk menghilangkan tag html mencegah xss
        // htmlentities() untuk mengubah karakter menjadi entitas html 
        $username = htmlentities(strip_tags(trim($_POST["username"])));
        $password = htmlentities(strip_tags(trim($_POST["password"])));

        // siapkan variabel untuk menampung pesan error
        $pesan_error="";

        // cek apakah "username" sudah diisi atau tidak
        if (empty($username)) {
            $pesan_error .= "Username belum diisi <br>";
        }

        // cek apakah "password" sudah diisi atau tidak
        if (empty($password)) {
            $pesan_error .= "Password belum diisi <br>";
        }

        // buat koneksi ke mysql dari file connection.php
        // Menggunakan __DIR__ untuk memastikan jalur absolut
        include(__DIR__ . "/../../config/connection.php");

        // filter dengan mysqli_real_escape_string
        // untuk menghindari sql injection misalkan karakter khusus ' "
        $username = mysqli_real_escape_string($link,$username);
        $password = mysqli_real_escape_string($link,$password);

        // generate hashing
        $password_sha1 = sha1($password);

        // cek apakah username dan password ada di tabel admin
        $query = "SELECT * FROM admin WHERE username = '$username' AND password = '$password_sha1'";
        $result = mysqli_query($link,$query);

        if(mysqli_num_rows($result) == 0 )  {
            // data tidak ditemukan, buat pesan error
            $pesan_error .= "Username dan/atau Password tidak sesuai";
        }

        // bebaskan memory
        mysqli_free_result($result);

        // tutup koneksi dengan database MySQL
        mysqli_close($link);

        // jika lolos validasi, set session
        if ($pesan_error === "") {
            session_start();
            $_SESSION["nama"] = $username;
            header("Location: ../backend/dashboard.php");
        }
    } else {
        // form belum disubmit atau halaman ini tampil untuk pertama kali
        // berikan nilai awal untuk semua isian form
        $pesan_error = "";
        $username = "";
        $password = "";
    }
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Sistem Wisata</title>
    <link rel="icon" href="favicon.png" type="image/png" >
    <link href="<?= $base_url ?>/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= $base_url ?>/assets/css/sign-in.css" rel="stylesheet">
</head>
<body class="d-flex align-items-center py-4 bg-body-tertiary">
    <div class="container">
        <main class="form-signin w-100 m-auto">
            <form action="login.php" method="post">
                <img class="mb-4" src="<?= $base_url ?>/assets/img/island.png" alt="" width="35%" height="90">
                <?php
                // tampilkan pesan jika ada
                if (isset($pesan)) {
                    echo "<div class=\"pesan\">$pesan</div>";
                }

                // tampilkan error jika ada
                if ($pesan_error !== "") {
                    echo "<div class=\"error\">$pesan_error</div>";
                }
                ?>
                <h1 class="h3 mb-3 fw-normal">Silahkan Login</h1>

                <div class="form-floating">
                    <input type="text" class="form-control" name="username" id="username" value="<?php echo $username ?>" placeholder="sigit">
                    <label for="username">Username</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" name="password" id="password" value="<?php echo $username ?>" placeholder="....">
                    <label for="password">Password</label>
                </div>

                <div class="form-check text-start my-3">
                    <input class="form-check-input" type="checkbox" value="remember-me" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        Remember me
                    </label>
                </div>
                <input class="btn btn-primary w-100 py-2" type="submit" name="submit" value="Login Sekarang">
                <p class="mt-3 mb-3 text-body-secondary">&copy; 2024</p>
            </form>
        </main>
    </div>
</body>
</html>
