<?php include('function.php');
session_start();
if (isset($_SESSION['data'])) {
    if ($_SESSION['data_role'] == 2) {
        header('location:403.php');
    }
} else {
    header('location:403.php');
}
$hasil = query("SELECT * FROM users");
include('templates/lil-function.php');
include('templates/header.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if (deleteUser($id) > 0) {
        echo " <script>
                    Swal.fire({
                        icon: 'success',
                        title: `<span style='color:#f8f9fa'>Data berhasil Dihapus</span>`,
                        background:'#343a40',
                        showConfirmButton: false,
                        timer: 1500
                })
                setTimeout(() => {
                        window.location.href = 'users.php'
                    }, 1500);
                </script>";
    } else {
        echo "<script>alert('ok')</script>";
        header('location:users.php');
    }
}
?>
<section class="bg-warning">
    <div class="container py-4">
        <table class="table ">
            <thead class="thead-dark">
                <tr >
                    <th scope="col" class="text-center">Gambar</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Password</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Number</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1 ?>
                <?php foreach ($hasil as $h) : ?>
                <tr >
                    <td align="center"><img class="img-thumbnail" width="60px" src="assets/img/profile/<?= $h['image'] ?>" alt="">
                    </td>
                    <td class="align-middle"><?= $h['name']; ?></td>
                    <td class="align-middle"><?= $h['password']; ?></td>
                    <td class="align-middle"><?= $h['alamat']; ?></td>
                    <td class="align-middle"><?= $h['number']; ?></td>
                    <td class="align-middle">
                        <a class="badge btn badge-dark" href="edit_user.php?id=<?= $h['id']; ?>">Edit</a>
                        <?php if ($h['role'] == 1) : ?>
                            <a class="del badge btn disabled badge-danger" href="?id=<?= $h['id']; ?>">delete</a>
                        <?php else : ?>
                            <a class="del badge btn badge-danger" href="?id=<?= $h['id']; ?>">delete</a>
                        <?php endif ?>
                    </td>
                </tr>
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
                            confirmButtonText: 'Yakin!'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                location.href = this.href
                            }
                        })
                        e.preventDefault(); 
                    });
                </script>  
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</section>
<?php include('templates/footer.php') ?>