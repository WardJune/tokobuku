<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Books Shop</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <!-- <script src="https://kit.fontawesome.com/03101affa7.js" crossorigin="anonymous"></script> -->
</head>

<body>
<!-- bassic navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark py-4">
        <div class="container">
            <a class="navbar-brand" href="#">Travis</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item px-2">
                        <a class="nav-link btn btn-warning text-dark" href="index.php">Buku Fiksi</a>
                    </li>
                    <li class="nav-item px-2">
                        <a class="nav-link btn btn-warning text-dark" href="non-fiksi.php">Buku Non-Fiksi</a>
                    </li>
                    <li class="nav-item px-2">
                        <a class="nav-link btn btn-warning text-dark" href="pelajaran.php">Buku Pelajaran</a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <!-- jika sesion terdapat value maka tampilkkan menu berikut -->
                    
                    <?php if (isset($_SESSION['data'])) : ?>
                    <li class="nav-item">
                            <img class="p-1 bg-warning mr-2 rounded"  src="assets/img/profile/<?= $row['image'] ?>" alt=""
                                loading="lazy">
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle btn btn-warning text-dark" href="#" id="navbarDropdown"
                            role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?= $row['name'] ?>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="profile_edit.php">Edit Profile</a>
                            <a class="dropdown-item" href="logout.php">Log Out</a>
                        </div>
                    </li>
                    <?php endif ?>
                    <!-- menampilkan menu button yang telah dipilih sesuai kondisi -->
                    <?= $button; ?>
                </ul>
            </div>
        </div>
    </nav>
