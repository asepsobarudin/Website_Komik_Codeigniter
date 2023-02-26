<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title><?= $title['title'] ?></title>
  <link href="<?= base_url('\dist\css\bootstrap.min.css') ?>" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous" />

  <link rel="stylesheet" href="<?= base_url('\dist\css\style.css') ?>">

  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</head>

<body style="height: 100vh;">
<div class="container-fluid">
    <div class="container" style="height: 100vh;">
        <div class="row d-flex justify-content-center align-items-center" style="height: 100vh;">
            <div class="col-md-6 d-flex justify-content-center align-items-center" style="height: 500px; overflow: hidden;">
                <img src="<?= base_url('/dist/profile/login.png') ?>" height="500px" alt="">
            </div>
            <div class="col-md-4 ms-2 pb-4">
                <h1 class="fw-semibold text-center">LOGIN</h1>
                <?= (session()->getFlashdata('pesan')) ?>
                <form action="/login" method="post">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <div class="div">
                        <a href="#" class="btn btn-primary">BUAT AKUN</a>
                        <button type="submit" class="btn btn-success">LOGIN</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="<?= base_url('\dist\js\bootstrap.bundle.min.js') ?>" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>