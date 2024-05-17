<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->
    <title>Website Login</title>
    <!-- <link rel="stylesheet" href="css/style1.css" /> -->
    <link rel="stylesheet" href="<?= base_url('./css/style1.css') ?>" />
</head>

<body>
    <!-- Header -->
    <header class="header">
        <nav class="nav">
            <a href="" class="nav_logo">CodingLab</a>

            <!-- <ul class="nav_items">
                <li class="nav_item">
                    <a href="#" class="nav_link">Home</a>
                    <a href="#" class="nav_link">Product</a>
                    <a href="#" class="nav_link">Services</a>
                    <a href="#" class="nav_link">Contact</a>
                </li>
            </ul> -->

            <button class="button" id="form-open">Login</button>
        </nav>
    </header>

    <!-- Home -->
    <section class="home">
        <div class="form_container">
            <i class="uil uil-times form_close"></i>
            <!-- Login From -->
            <div class="form login_form">
                <form method="post" action="Auth/login">
                    <h2>Login</h2>

                    <div class="input_box">
                        <input type="username" name="username" placeholder="Enter your username" required />
                        <i class="uil uil-envelope-alt username "></i>
                    </div>
                    <div class="input_box">
                        <input type="password" name="password" placeholder="Enter your password" required />
                        <i class="uil uil-lock password"></i>
                        <i class="uil uil-eye-slash pw_hide"></i>
                    </div>

                    <div class="option_field">
                        <span class="checkbox">
                            <input type="checkbox" id="check" />
                            <label for="check" class="remember">Remember me</label>
                        </span>
                        <a href="#" class="forgot_pw">Forgot password?</a>
                    </div>

                    <button class="button">Login Now</button>

                    <div class="login_signup">Don't have an account? <a href="#" id="signup">Signup</a></div>
                </form>
            </div>

            <!-- Signup From -->
            <div class="form signup_form">
                <form action="auth/register" method="post">
                    <?= csrf_field(); ?>

                    <h2>Signup</h2>
                    <?php if (session()->getFlashdata('success')) : ?>
                        <div><?= session()->getFlashdata('success') ?></div>
                    <?php endif; ?>
                    <?php if (isset($validation)) : ?>
                        <div><?= $validation->listErrors() ?></div>
                    <?php endif; ?>
                    <div class="input_box">
                        <input type="text" name="name" placeholder="Enter your name" required />
                        <i class="uil uil-envelope-alt username"></i>
                    </div>
                    <div class="input_box">
                        <input type="text" name="telp" placeholder="Enter your telp" required />
                        <i class="uil uil-envelope-alt username"></i>
                    </div>
                    <div class="input_box">
                        <label for="gender">Gender</label>
                        <select name="gender" id="gender">
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="input_box">
                        <label for="role">Role</label>
                        <select name="role" id="role">
                            <option value="Petugas">Petugas</option>
                            <option value="Anggota">Anggota</option>
                        </select>
                    </div>
                    <div class="input_box">
                        <input type="text" name="alamat" placeholder="Enter your addres" required />
                        <i class="uil uil-envelope-alt username"></i>
                    </div>
                    <div class="input_box">
                        <input type="text" name="username" placeholder="Create your username" required />
                        <i class="uil uil-envelope-alt username"></i>
                    </div>
                    <div class="input_box">
                        <input type="text" name="password" placeholder="Create your password" required />
                        <i class="uil uil-lock password"></i>
                        <i class="uil uil-eye-slash pw_hide"></i>
                    </div>

                    <button type="submit" class="button">Signup Now</button>

                    <div class="login_signup">Already have an account? <a href="#" id="login">Login</a></div>
                </form>
            </div>
        </div>
    </section>

    <script src="js/script.js"></script>
</body>

</html>