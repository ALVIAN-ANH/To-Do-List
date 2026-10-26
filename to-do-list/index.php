```php
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To Do List</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #667eea, #764ba2);
            font-family: Arial, sans-serif;
            padding: 50px 0;
        }

        .todo-container {
            background: #ffffff;
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        }

        h1 {
            color: #343a40;
            font-weight: bold;
            margin-bottom: 25px;
        }

        .btn-add {
            display: inline-block;
            background: #667eea;
            color: white;
            padding: 10px 16px;
            border-radius: 10px;
            text-decoration: none;
            margin-bottom: 10px;
        }

        .btn-add:hover {
            background: #4f5fc5;
            color: white;
        }

        .todo-card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.07);
            transition: 0.2s;
        }

        .todo-card:hover {
            transform: translateY(-2px);
        }

        .task-done {
            color: #198754;
            text-decoration: line-through;
        }

        .action-btn {
            display: inline-block;
            padding: 7px 10px;
            border-radius: 8px;
            text-decoration: none;
            margin-left: 3px;
        }

        .btn-done {
            background: #d1e7dd;
            color: #198754;
        }

        .btn-edit {
            background: #fff3cd;
            color: #997404;
        }

        .btn-delete {
            background: #f8d7da;
            color: #dc3545;
        }

        .empty-message {
            color: #6c757d;
            text-align: center;
            padding: 25px 0;
        }
    </style>
</head>

<body>

<section>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">

                <div class="todo-container">
                    <h1 class="text-center">
                        <i class="bi bi-check2-square"></i>
                        Aplikasi To Do List
                    </h1>

                    <a href="tambah.php" class="btn-add">
                        <i class="bi bi-plus-lg"></i> Tambah Tugas
                    </a>

                    <?php
                    include("koneksi.php");

                    $sql = "SELECT * FROM `list` ORDER BY id ASC";
                    $query = mysqli_query($koneksi, $sql)
                        or die("Gagal mengambil data: " . mysqli_error($koneksi));

                    if (mysqli_num_rows($query) > 0) {
                        while ($data = mysqli_fetch_assoc($query)) {
                            $selesai = ($data['status_selesai'] == 1);
                    ?>

                    <div class="card todo-card mt-3">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center gap-3">

                                <div class="<?php echo $selesai ? 'task-done' : ''; ?>">
                                    <?php if ($selesai) { ?>
                                        <i class="bi bi-check-circle-fill"></i>
                                    <?php } else { ?>
                                        <i class="bi bi-circle"></i>
                                    <?php } ?>

                                    <?php echo htmlspecialchars($data['judul']); ?>
                                </div>

                                <div class="d-flex flex-shrink-0">
                                    <a href="set_selesai.php?id=<?php echo $data['id']; ?>"
                                       class="action-btn btn-done"
                                       title="Tandai selesai">
                                        <i class="bi bi-check-lg"></i>
                                    </a>

                                    <a href="edit.php?id=<?php echo $data['id']; ?>"
                                       class="action-btn btn-edit"
                                       title="Edit tugas">
                                        <i class="bi bi-pencil-fill"></i>
                                    </a>

                                    <a href="hapus.php?id=<?php echo $data['id']; ?>"
                                       class="action-btn btn-delete"
                                       title="Hapus tugas"
                                       onclick="return confirm('Yakin ingin menghapus tugas ini?')">
                                        <i class="bi bi-trash-fill"></i>
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>

                    <?php
                        }
                    } else {
                    ?>
                        <div class="empty-message">
                            <i class="bi bi-clipboard-check fs-1"></i>
                            <p>Belum ada tugas. Yuk, tambahkan tugas pertamamu!</p>
                        </div>
                    <?php
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
```
