<?php 
session_start();

if (!isset($_SESSION["username"])) {
	echo "Anda harus login dulu <br><a href='login.php'>Klik disini</a>";
	exit;
}

$id=$_SESSION["id"];
$username=$_SESSION["username"];
$nama=$_SESSION["nama"];
  
  include('koneksi.php');
  
  $id = abs($_GET['id']);
  
  $query = "SELECT * FROM siswa WHERE id = $id LIMIT 1";

  $result = mysqli_query($conn, $query);

  $row = mysqli_fetch_array($result);

  ?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <title>Edit Siswa</title>
  </head>

  <body>

    <div class="container" style="margin-top: 80px">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card">
            <div class="card-header">
              EDIT SISWA
            </div>
            <div class="card-body">
              <form action="ups.php" method="POST">
                
                <div class="form-group">
                  <label>NAMA</label>
                  <input type="text" name="nama" value="<?php echo $row['nama'] ?>" placeholder="Masukkan Nama Siswa" class="form-control">
                  <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                </div>

                <div class="form-group">
                  <label>USERNAME</label>
                  <input type="text" name="username" value="<?php echo $row['username'] ?>" placeholder="Masukkan Username Siswa" class="form-control">
                </div>

                <div class="form-group">
                  <label>PASSWORD</label>
                  <input type="text" class="form-control" name="password" placeholder="Masukkan Password Siswa" value="<?php echo $row['password'] ?>">
                </div>
                
                <button type="submit" class="btn btn-success">UPDATE</button>
                <button type="reset" class="btn btn-warning">RESET</button>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  </body>
</html>
