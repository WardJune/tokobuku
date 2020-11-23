<?php 
include('function.php');
if (isset($_POST['tambah'])) {
    if (tambah($_POST) > 0) {
        echo "<script>
            alert('ok');
        </script>";
        if ($_POST['tipe'] == 'fiksi') {
            header('location:index.php');
        } elseif ($_POST['tipe'] == 'non-fiksi'){
            header('location:non-fiksi.php');
        } else {
            header('location:pelajaran.php');
        }
    } else {
        echo "<script>
            alert('no');
        </script>";

    };
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tambah</title>
</head>
<body>
    <form action="" method="POST">
        <input type="number" name="kode">
        <input type="text" name="judul">
        <input type="text" name="penerbit">
        <input type="text" name="pengarang">
        <select name="tipe" id="">
            <option value="fiksi">Buku fiksi</option>
            <option value="non-fiksi">Buku Non-fiksi</option>
            <option value="pelajaran">Buku Pelajaran</option>
        </select>
        <input type="number" name="harga" id="">
        <button type="submit" name="tambah">tambah</button>
    </form>
</body>
</html>