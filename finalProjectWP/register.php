<?php 
include('function.php');
 if (isset($_POST['signup'])) {
     if (register($_POST) > 0) {
         echo "<script>alert('yeay');</script>";
         header('location:login.php');
     }
 } else {
     mysqli_error($con);
 }
include('templates/lil-function.php');
include('templates/header.php');
?>
<div id="reg" class="bg-warning">
        <h3 class="text-center text-white pt-5"></h3>
        <div class="container">
            <div id="reg-row" class="row justify-content-center align-items-center">
                <div id="reg-column" class="col-md-6">
                    <div id="reg-box" class="col-md-12 bg-dark">
                        <form id="reg-form" class="form" action="" method="post">
                            <h3 class="text-center text-white">Daftar</h3>
                            <div class="form-group">
                                <label for="name" class="text-white">Username</label><br>
                                <input type="text" name="name" id="name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="pass" class="text-white">Password</label><br>
                                <input type="password" name="password" id="pass" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="number" class="text-white">No .Telp</label><br>
                                <input type="number" name="number" id="number" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="alamat" class="text-white">Alamat</label><br>
                                <input type="text" name="alamat" id="alamat" class="form-control">
                            </div>
                            <div class="form-group mt-4">
                                <input type="submit" name="signup" class="btn btn-warning w-100" value="Daftar">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include('templates/footer.php');?>