<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit data</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@6.0.0-alpha.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>

    <section>
        <div class="container">
            <div class="row">
                <div class="coll-md-6 offset-md-3">
                    <h3 class="text-center mb-10">Edit data</h3>

                    <?php
                        include('koneksi.php');

                        $id = $_GET['id'];

                        $sql = "select*from list where id='$id'";
                        $query = mysqli_query($koneksi, $sql) or die("gagal koneksi");
                        $data = mysqli_fetch_array($query);
                    ?>
                    
                    <form action="edit_data.php" method="POST">

                        <input type="hidden" name="id" value="<?php echo $id ?>">

                        <div class="mb-3">
                                <label for="judul" class="form-label">Judul</label>
                                <input type="text" class="form-control" id="judul" name="judul" 
                                value="<?php echo $data['judul'] ?>">
                        </div>
                        
                        <button type="submit" class="btn-subtle btn-styled theme-primary">Simpan</button>
                        <a href="index.php" class="btn-subtle btn-styled theme-danger">Batal</a>
                    </form>

                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@6.0.0-alpha.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>