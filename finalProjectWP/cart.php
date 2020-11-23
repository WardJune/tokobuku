<?php 
session_start();
include('function.php');
include('templates/lil-function.php');
$idses = $_SESSION['data'];
$cart = query("SELECT * FROM cart JOIN books ON cart.id_buku =  books.id WHERE cart.id_user = '$idses'");
include('templates/header.php');
?>
<section class="bg-warning">
    <div class="container py-4">
        <?php 
        $total = 0;
        if (!empty($cart)) : ?>
        <h3 class="mb-4">Daftar Buku yang akan dibeli</h3>
        <table class="table table-sm">
            <thead class="thead-dark">
                <tr>
                    <th scope="col"  class="text-center">Gambar</th>
                    <th scope="col">Judul</th>
                    <th scope="col">Pengarang</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cart as $c) : ?>
                    <tr>
                        <td align="center"><img class="img-thumbnail" width="80px" src="assets/img/books/<?= $c['gambar'] ?>" alt="">
                        </td>
                        <td class="align-middle"><?= $c['judul']; ?></td>
                        <td class="align-middle"><?= $c['pengarang']; ?></td>
                        <td class="align-middle" align="center"><?= $c['jumlah']; ?></td>
                        <td class="align-middle">Rp.<?= $c['harga']; ?></td>
                        <td class="align-middle"><a href="?id_del=<?= $c['id_pesan']; ?>" class="btn btn-danger">hapus</a></td>
                    </tr>
                <?php $total += $c['harga'] * $c['jumlah'] ?>
                <?php endforeach ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="5" class="pt-4 align-middle text-right"><h4 class="mr-3">Total : Rp.<?= $total; ?></h4></td>
                    <td class="pt-3" ><button class=" btn btn-dark">Checkout</button></td>
                </tr>
            </tfoot>
        </table>
        <?php else : ?>
            <h2 class="text-center">Tidak ada daftar belanja</h2>
        <?php endif ?>
</section>
<?php include('templates/footer.php') ?>

