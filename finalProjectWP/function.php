<?php 
// ! koneksi database
$host = 'localhost';
$user_db = 'root';
$pass_db = '';
$db = 'juna';

$con = mysqli_connect($host,$user_db,$pass_db,$db);
//! konneksi database

function query($query){
    global $con;
    $rows = [];
    $hasil = mysqli_query($con, $query);
    while ($row = mysqli_fetch_assoc($hasil)) {
        $rows[] = $row;
    };
    return $rows;
}

// ? tamabah data buku
function tambah($data){
    global $con;
    $kode = $data['kode'];
    $judul = $data['judul'];
    $penerbit = $data['penerbit'];
    $pengarang = $data['pengarang'];
    $tipe = $data['tipe'];
    $harga = $data['harga'];
    $gambar = 'default.jpg';
    
    $query = "INSERT INTO books VALUES ('','$kode','$judul','$pengarang','$penerbit','$tipe','$harga','$gambar')";

    mysqli_query($con,$query);

    return mysqli_affected_rows($con);
    // return var_dump($data);
}

// ? edit data buku
function edit($data){
    global $con;
    $id = $data['id'];
    $kode = $data['kode'];
    $judul = $data['judul'];
    $penerbit = $data['penerbit'];
    $pengarang = $data['pengarang'];
    $tipe = $data['tipe'];
    $harga = $data['harga'];
    $oldGambar = $data['namaGambar'];

    if ($_FILES['buku']['name'] == "") {
        $gambar = $oldGambar;
    } else {
        $gambar = upload('buku');
    }

    $query = "UPDATE books SET 
              kode = '$kode',
              judul = '$judul',
              penerbit = '$penerbit',   
              pengarang = '$pengarang',   
              tipe = '$tipe',   
              harga = '$harga',
              gambar = '$gambar'

              WHERE id='$id'
                ";
    mysqli_query($con,$query);
    
    return mysqli_affected_rows($con);
    // return var_dump($data);
}

// ! delete buku
function delete($id){
    global $con;
	mysqli_query($con, "DELETE FROM books WHERE id = '$id'");

	return mysqli_affected_rows($con);
}

// ? Edit data user
function editUser($data){
    global $con;
    $id = $data['id'];
    $name = $data['name'];
    $password = $data['password'];
    $alamat = $data['alamat'];
    $number = $data['number'];
    $oldImage = $data['imageName'];

    if ($_FILES['userP']['name'] == "") {
        $image = $oldImage;
    } else {
        $image = upload('userP');
    }
    
    $query = "UPDATE users SET 
              name = '$name',
              password = '$password',
              alamat = '$alamat',   
              number = '$number',
              image = '$image'

              WHERE id='$id'
                ";
    mysqli_query($con,$query);
    
    return mysqli_affected_rows($con);
    // return var_dump($data);
}

// ! delete user
function deleteUser($id){
    global $con;
    mysqli_query($con, "DELETE FROM users WHERE id = '$id'");

    return mysqli_affected_rows($con);
}

// * register user 
function register($data){
    global $con;
    $name = $data['name'];
    $password = $data['password'];
    $number = $data['number'];
    $alamat = $data['alamat'];

    $hasil = mysqli_query($con, "SELECT * FROM users WHERE name='$name'");
    
    if (mysqli_fetch_assoc($hasil)) {
    echo "<script>alert('Username sudah terdaftar')</script>";
       return false;
    };

    $query = "INSERT INTO users (name,password,number,alamat) VALUES ('$name','$password','$number','$alamat')";

    mysqli_query($con,$query);
    return mysqli_affected_rows($con);
}

// ? upload gambar 
function upload($tipe){
    $fileName = $_FILES[$tipe]['name'];
    $fileTmp = $_FILES[$tipe]['tmp_name'];

    if ($tipe == 'buku') {
        $dirFol = 'assets/img/books/';
    } elseif ($tipe == 'userP'){
        $dirFol = 'assets/img/profile/';
    }
    
    move_uploaded_file($fileTmp,$dirFol.$fileName);

    return $fileName;
}
// * tambah data keranjang
function cart($id_buku,$id_user){
    global $con;
    $query = "INSERT INTO cart (id_user,id_buku) VALUES ('$id_user','$id_buku')";
    // cek jika yang di insert ke keranjang adalah buku yang sama
    $cek = mysqli_query($con, "SELECT * FROM cart WHERE id_user='$id_user' AND id_buku='$id_buku'");

    $fetchdata = mysqli_fetch_assoc($cek);

    if (mysqli_num_rows($cek) > 0) {
        $jumlah = $fetchdata['jumlah'] + 1;
        mysqli_query($con, "UPDATE cart SET jumlah='$jumlah' WHERE id_user='$id_user' AND id_buku='$id_buku'");
    } else {
        mysqli_query($con,$query);
    }
    return mysqli_affected_rows($con);
}

function del_cart($id){
    global $con;
    $fetchData = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM cart WHERE id_pesan='$id'"));

    if ($fetchData['jumlah'] > 1) {
        $jumlah = $fetchData['jumlah'] - 1;
        mysqli_query($con, "UPDATE cart SET jumlah='$jumlah' WHERE id_pesan='$id'");
    } else {
        mysqli_query($con,"DELETE FROM cart WHERE id_pesan='$id'");
    }

    return mysqli_affected_rows($con);
}
?>

