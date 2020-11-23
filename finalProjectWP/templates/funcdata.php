<?php 
// ? tambah data buku dengan alert
if (isset($_POST['tambah'])) {
    if (tambah($_POST) > 0) {
         echo "
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: `<span style='color:#f8f9fa'>Data berhasil Ditambahkan</span>`,
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
                        title: `<span style='color:#f8f9fa'>Data Gagal Ditambahkan</span>`,
                        background:'#343a40',
                        showConfirmButton: false,
                        timer: 2300
                })
                </script>";

    };
}

// ! delete data buku dengan alert
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $dats = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM books WHERE id='$id'")) ;
    if (delete($id) > 0) {
         echo "
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: `<span style='color:#f8f9fa'>Data berhasil Dihapus</span>`,
                        background:'#343a40',
                        showConfirmButton: false,
                        timer: 2300
                })
                </script>";
        if ($dats['tipe'] == 'fiksi') {
            echo "
                <script>
                    setTimeout(() => {
                        window.location.href = 'index.php'
                    }, 2300);
                </script>";
        } elseif ($dats['tipe'] == 'non-fiksi'){
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
                        title: `<span style='color:#f8f9fa'>Data Gagal Dihapus</span>`,
                        background:'#343a40',
                        showConfirmButton: false,
                        timer: 2300
                })
                </script>";
    };
}

//? tambah daftar cart
if (isset($_GET['id_buku'])) {
    $id_buku = $_GET['id_buku'];
    $id_user = $_SESSION['data'];
    // fetching buku 
    $bukuInfo =mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM books WHERE id='$id_buku'"));

    if (cart($id_buku,$id_user) > 0) {
        echo "
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: `<span style='color:#f8f9fa'>Dimasukan ke keranjang</span>`,
                        background:'#343a40',
                        showConfirmButton: false,
                        timer: 1500
                })
                </script>";
        if ($bukuInfo['tipe'] == 'fiksi') {
            echo "
                <script>
                    setTimeout(() => {
                        window.location.href = 'index.php'
                    }, 1500);
                </script>";
        } elseif ($bukuInfo['tipe'] == 'non-fiksi'){
                echo "
                    <script>
                        setTimeout(() => {
                            window.location.href = 'non-fiksi.php'
                        }, 1500);
                    </script>";
        } else {
                echo "
                    <script>
                        setTimeout(() => {
                            window.location.href = 'pelajaran.php'
                        }, 1500);
                    </script>";
        }
    } else {
        echo "<script>
                    Swal.fire({
                        icon: 'error',
                        title: `<span style='color:#f8f9fa'>Gagal Dimasukan keranjang</span>`,
                        background:'#343a40',
                        showConfirmButton: false,
                        timer: 1500
                })
                </script>";

    };
}
?>