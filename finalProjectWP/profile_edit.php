<?php 
include('function.php');
session_start();
$id = $_SESSION['data'];
$hasil = query("SELECT * FROM users WHERE id='$id'")[0];


if (isset($_SESSION['data'])) {
     $row = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM users WHERE id='$id'")) ;
    //  jika admin set menu tambahan
    if ($row['role'] == 1) {
        $admin = true;
        $tambah = "<button type='button' class='btn btn-primary btn-lg mb-3' data-toggle='modal' data-target='#modalTambah'>Tambah Data Buku</button>";
        $button = '<li class="nav-item px-2">
                        <a class="nav-link btn btn-warning text-dark" href="users.php">Users List</a>
                    </li>';
    // sama seperti admin menampilkan menu tambahan
    } else {
         $query = "SELECT * FROM cart JOIN books ON cart.id_buku =  books.id WHERE cart.id_user = '$id'";
        // ? set variable user untu menampilkan jumlah daftar belanja user
        $badge = mysqli_num_rows(mysqli_query($con,$query));
        $user = true;
        $button = "<li class='nav-item px-2'>
                        <a class='nav-link btn btn-warning text-dark' href='cart.php'>Keranjang <span class='badge badge-dark'>$badge</span></a>
                    </li>";
    }
}

include('templates/header.php');

if (isset($_POST['edit'])) {
    if (editUser($_POST) > 0) {
         echo "
            <script>
                Swal.fire({
                    icon: 'success',
                    title: `<span style='color:#f8f9fa'>Data berhasil Diubah</span>`,
                    background:'#343a40',
                    showConfirmButton: false,
                    timer: 2300
            })
            setTimeout(() => {
                        window.location.href = 'index.php'
                    }, 2300);
            </script>";
    } else {
        echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: `<span style='color:#f8f9fa'>Data Gagal Diubah</span>`,
                    background:'#343a40',
                    showConfirmButton: false,
                    timer: 2300
                })
                </script>";

    }
    // var_dump($_POST);
}
?>
<section class="bg-warning py-4">
     <div class="container bg-dark text-white col-md-4 offset-md-4 py-3 rounded-sm">
        <h3 class="text-center">Form Edit Data User</h3>
        <div class="row">
            <div class="col">
                <div class="container">
                <form action="" method="POST" enctype="multipart/form-data">
                <!-- hidden input -->
                <input type="hidden" name="id" value="<?= $hasil['id']; ?>">
                <input type="hidden" name="imageName" value="<?= $hasil['image'] ?>">  
                <!-- hidden input -->
                    <img class="img-thumbnail mb-3 mx-auto d-block" width="200px" src="assets/img/profile/<?= $hasil['image'] ?>" alt="">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customFile" name="userP">
                        <label class="custom-file-label" for="customFile">Ganti gambar</label>
                    </div>
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" class="form-control" id="name" placeholder="Nama" name="name" value="<?= $hasil['name']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="text" class="form-control" id="password" placeholder="Password" name="password" value="<?= $hasil['password']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control" id="alamat" placeholder="alamat" name="alamat" value="<?= $hasil['alamat']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="number">No. Telp</label>
                        <input type="number" class="form-control" id="number" placeholder="number Buku" name="number" value="<?= $hasil['number']; ?>">
                    </div>
                    <button type="submit" class="btn btn-warning w-100" name="edit">Edit</button>
                </form>
            </div>
        </div>
     </div>
 </section>
<?php include('templates/footer.php'); ?>