<?php 
include('function.php');
$id_book = $_GET['id'];
$hasil = query("SELECT * FROM books WHERE id='$id_book'")[0];
session_start();

if (isset($_SESSION['data'])) {
    $id = $_SESSION['data'];
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
    if (edit($_POST) > 0) {
        echo "
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: `<span style='color:#f8f9fa'>Data berhasil Diubah</span>`,
                        background:'#343a40',
                        showConfirmButton: false,
                        timer: 2300
                })
                </script>";
        if ($_POST['tipe'] == 'fiksi') {
            echo "
                <script>
                    setTimeout(() => {
                        window.location.href = 'index.php'
                    }, 2300);
                </script>";
        } elseif ($_POST['tipe'] == 'non-fiksi'){
                echo "
                    <script>
                        setTimeout(() => {
                            window.location.href = 'non-fiksi.php'
                        }, 2350);
                    </script>";
        } else {
                echo "
                    <script>
                        setTimeout(() => {
                            window.location.href = 'pelajaran.php'
                        }, 2350);
                    </script>";
        }
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

    };
    // var_dump($_POST);
    // var_dump($_FILES);  
    // edit($_POST);
};
?>
 <section class="bg-warning py-4">
     <div class="container bg-dark text-white col-md-4 offset-md-4 py-3 rounded-sm">
        <h3 class="text-center">Form Edit Data Buku</h3>
        <div class="row">
            <div class="col">
                <div class="container">
                <form action="" method="POST" enctype="multipart/form-data">
                <!-- hidden input -->
                <input type="hidden" name="id" value="<?= $hasil['id']; ?>">
                <input type="hidden" name="namaGambar" value="<?= $hasil['gambar'] ?>">
                <!-- hidden input -->
                    <img class="img-thumbnail mb-3 mx-auto d-block" width="200px" src="assets/img/books/<?= $hasil['gambar'] ?>" alt="">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customFile" name="buku">
                        <label class="custom-file-label" for="customFile">Ganti gambar</label>
                    </div>
                    <div class="form-group">
                        <label for="kode">Kode</label>
                        <input type="number" class="form-control" id="kode" placeholder="Kode Buku" name="kode" value="<?= $hasil['kode']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="judul">Judul</label>
                        <input type="text" class="form-control" id="judul" placeholder="Judul Buku" name="judul" value="<?= $hasil['judul']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="pengarang">Pengarang</label>
                        <input type="text" class="form-control" id="pengarang" placeholder="Pengarang Buku" name="pengarang" value="<?= $hasil['pengarang']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="penerbit">Penerbit</label>
                        <input type="text" class="form-control" id="penerbit" placeholder="Penerbit Buku" name="penerbit" value="<?= $hasil['penerbit']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="tipe">Tipe Buku</label>
                        <select class="form-control" id="tipe" name="tipe">
                            <option value="<?= $hasil['tipe']; ?>">Buku <?= $hasil['tipe']; ?></option>
                            <option value="fiksi">Buku Fiksi</option>
                            <option value="non-fiksi">Buku Non-Fiksi</option>
                            <option value="pelajaran">Buku Pelajaran</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input type="number" class="form-control" id="harga" placeholder="Harga Buku" name="harga" value="<?= $hasil['harga']; ?>">
                    </div>
                    <button type="submit" class="btn btn-warning w-100" name="edit">Edit</button>
                </form>
            </div>
        </div>
     </div>
 </section>
<?php 
include('templates/footer.php')
?>