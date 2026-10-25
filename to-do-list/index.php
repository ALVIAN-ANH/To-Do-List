<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To Do List</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@6.0.0-alpha.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>

    <section>
        <div class="container">
            <div class="row">
                <div class="coll-md-6 offset-md-3">

                    <h1 class="text-center mb-10">Aplikasi To Do List</h1>

                        <a href="tambah.php" class="btn-icon theme-primary btn-subtle btn-styled">
                            <i class="bi bi-plus"></i>
                        </a>

                    <?php 
                        include("koneksi.php");

                        $sql="select*from list order by id asc";
                        $query=mysqli_query($koneksi, $sql)or die ("Gak masuk blas");
                        while ($data=mysqli_fetch_array($query)){
                    ?>

                    <div class="card mt-4">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">

                                <div>

                                <?php if ($data['status_selesai'] == 1) { ?>    
                                <i class="bi bi-check-square-fill" style="color: green;"></i>
                                <?php }?>

                                    <?php echo $data['judul']; ?>
                                </div>

                                <div>

                                    <a href="set_selesai.php?id=<?php echo $data['id'] ?>" 
                                        class="btn-subtle btn-styled theme-success">
                                        <i class="bi bi-check-square-fill"></i>
                                    </a>

                                    <a href="edit.php?id=<?php echo $data['id'] ?>" class="btn-subtle btn-styled theme-warning">
                                        <i class="bi bi-pen-fill"></i>
                                    </a>

                                    <a href="hapus.php?id=<?php echo $data['id'] ?>" class="btn-subtle btn-styled theme-danger">
                                        <i class="bi bi-backspace-fill"></i>
                                    </a>

                                </div>
                                
                            </div>
                        </div>
                    </div>
                    
                    <?php
                        }
                    ?>

                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@6.0.0-alpha.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>