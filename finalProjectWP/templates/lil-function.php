<?php
//? default button
$button = '<li class="nav-item px-2">
                    <a class="nav-link btn btn-warning text-dark" href="login.php">Login</a>
                </li>';
//? chekcking session
if (isset($_SESSION['data'])) {
    $id = $_SESSION['data'];
     $row = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM users WHERE id='$id'")) ;
    //  jika admin set menu tambahan
    if ($row['role'] == 1) {
        $admin = true;
        $tambah = "<button type='button' class='btn btn-dark btn-lg mb-3' data-toggle='modal' data-target='#modalTambah'>Tambah Data Buku</button>";
        $button = '<li class="nav-item px-2">
                        <a class="nav-link btn btn-warning text-dark" href="users.php">Users List</a>
                    </li>';
    // sama seperti admin menampilkan menu tambahan
    } else {
        // ? query untuk mengambil jumlah daftar belanja user
        $query = "SELECT * FROM cart JOIN books ON cart.id_buku =  books.id WHERE cart.id_user = '$id'";
        // ? set variable user untu menampilkan jumlah daftar belanja user
        $badge = mysqli_num_rows(mysqli_query($con,$query));
        if ($badge == 0) {
            $badge = '';
        };
        $user = true;
        $button = "<li class='nav-item px-2'>
                        <a class='nav-link btn btn-warning text-dark' href='cart.php'>Keranjang <span class='badge badge-dark'>$badge</span></a>
                    </li>";
    }
}

//? delete daftar cart 
if (isset($_GET['id_del'])) {
    $id = $_GET['id_del'];
    if (del_cart($id) > 0) {
        header('location:cart.php');
    } else {
        echo "<script>alert('no');</script>";
    }
}
?>