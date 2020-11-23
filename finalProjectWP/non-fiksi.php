<?php include('function.php');
session_start();
include('templates/lil-function.php');
// query data berdasarkan tipe
$hasil = query("SELECT * FROM books WHERE tipe='non-fiksi'");
include('templates/header.php');
include('templates/funcdata.php');
?>
    <!-- section content -->
    <section class="bg-warning">
        <div class="container py-4">
            <!-- jika admin tampil button tambah -->
            <?php if (isset($tambah)) {
                echo $tambah;
            } ?>
            <!-- row col looping  -->
            <?php 
                $numOfCols = 4;
                $rowCount = 0;
                $bootstrapColWidth = 12 / $numOfCols;
             ?>
            <div class="row">
                <?php $i = 1;
            foreach ($hasil as $h){
            ?>
                <div class="mb-3 col-sm-<?= $bootstrapColWidth ?>">
                    <div class="card bg-dark">
                        <img src="assets/img/books/<?= $h['gambar']; ?>" class="card-img-top w-w-auto" alt="...">
                        <div class="card-body bg-light">
                            <h5 class="card-title"><?= $h['judul']; ?></h5>
                            <h6 class="card-subtitle text-muted">Kode : <?= $h['kode'] .' | '. $h['tipe'] ?></h6>
                            <h6 class="card-text mb-2"><?= $h['pengarang'] ?></h6>
                            <h4 class="card-title">Rp. <?= $h['harga'] ?></h4>
                             <?php if (isset($admin)) : ?>
                            <div class="text-center">
                                <a href="edit.php?id=<?= $h['id']; ?>" class="btn btn-warning w-100 mb-2">Edit</a>
                                <a href="?id=<?= $h['id']; ?>" class="del btn btn-danger w-100">Delete</a>
                            </div>
                            <?php elseif (isset($user)) : ?>
                                <a href="?id_buku=<?= $h['id'] ?>" class="btn btn-dark w-100">Beli</a>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
                <?php $i++ ?>
                <script>
                    document.getElementsByClassName('del')[<?= $i-2 ?>].addEventListener('click',function (e){
                        Swal.fire({
                             title: '<span style="color:#f8f9fa">Yakin nich?</span>',
                            html:'<span style="color:lightgray">Data ga bakal balik loh!</span>',
                            showCancelButton: true,
                            background: '#343a40',
                            confirmButtonColor: '#ffc107',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Yes, delete it!'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                location.href = this.href
                            }
                        })
                        e.preventDefault();
                    });
                </script>  
                <?php
                $rowCount++;
                if($rowCount % $numOfCols == 0) echo '</div><div class="row">';
                }
            ?>
            </div>
        </div>
    </section>
<?php 
include('templates/modal-tambah.php');
include('templates/footer.php');
?>
<!-- end of section content-->