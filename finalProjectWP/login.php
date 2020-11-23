<?php 
include('function.php');
if (isset($_POST['login'])) {
    $user = $_POST['name'];
    $pass = $_POST['pass'];
    $hasil = mysqli_query($con,"SELECT * FROM users WHERE name='$user'");
    if (mysqli_num_rows($hasil)) {
        $data = mysqli_fetch_assoc($hasil);
        if ($data['password'] == $pass) {
            session_start();
            $_SESSION['data'] = $data['id'];
            $_SESSION['data_role'] = $data['role'];
            header('location:index.php');
        } else {
            $alert = "Wrong password";
        }
    } else {
        $alert = "Username belum terdaftar";
    }
}
include('templates/lil-function.php');
$button = '<li class="nav-item px-2">
                    <a class="nav-link btn btn-warning text-dark" href="register.php">Daftar</a>
                </li>';
include('templates/header.php');
?>
    <div id="login" class="bg-warning">
        <h3 class="text-center text-white pt-5"></h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12 bg-dark">
                        <form id="login-form" class="form" action="" method="post">
                            <h3 class="text-center text-white mb-4">Login</h3>
                            <?php if (isset($alert)) : ?>
                            <div class="alertt"><?= $alert; ?></div>
                            <?php endif ?>
                            <div class="form-group">
                                <label for="name" class="text-white">Username</label><br>
                                <input required type="text" name="name" id="name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="pass" class="text-white">Password</label><br>
                                <input required type="password" name="pass" id="pass" class="form-control">
                            </div>
                            <div class="form-group mt-4">
                                <input type="submit" name="login" class="btn btn-warning w-100" value="Log in">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        let alert = document.querySelector('.alertt')
        setTimeout(() => {
            alert.innerHTML = '';
        }, 4000);
    </script>
<?php include('templates/footer.php') ?>