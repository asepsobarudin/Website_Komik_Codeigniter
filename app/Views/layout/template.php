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
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg bg-dark flex-column fixed-top">
    <div class="container-fluid mt-1">
      <a class="navbar-brand text-white fw-semibold fs-3" href="#">Komiku.com</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav w-100 justify-content-end me-3">
          <li class="nav-item">
            <a class="nav-link fw-semibold <?= $h['h'] ?>" aria-current="page" href="/<?= $home['home'] ?>">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link fw-semibold <?= $p['p'] ?>" href="/<?= $pesan['pesan'] ?>">Pesanan</a>
          </li>
          <li class="nav-item ms-2 d-lg-flex d-sm-none ">
            <a href="#" class="d-flex text-decoration-none">
              <div class="border border-3 rounded-circle d-flex justify-content-center align-items-center" style="width: 58px; height: 58px; overflow: hidden;">
                <img src="<?= base_url('/dist/profile/profile.png') ?>" height="58px" class="" style="object-fit: cover;">
              </div>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="container-fluid w-100 mt-2 bg-white" style="transform: translateY(8px);">
      <div class="col text-black d-flex justify-content-end">
        <ion-icon name="wallet-outline" class="mt-2 me-2 fs-5"></ion-icon>
        <?php $hargaAwal = (int)$user['saldo']; ?>
        <div class="mt-1 fs-6 fw-semibold">RP. <?= number_format($hargaAwal, 0, ',', '.')?></div>
        <a href="#">
          <ion-icon name="add-circle-outline" class="mt-2 ms-2 fs-5 text-black"></ion-icon>
        </a>
      </div>
    </div>
  </nav>
  <!-- End Navbar -->

  <?= $this->renderSection('content') ?>

  <script src="<?= base_url('\dist\js\bootstrap.bundle.min.js') ?>" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

  <script>
    function preview() {
      const cover = document.querySelector('#cover');
      const imagePreview = document.querySelector('.img-preview');

      const fileCover = new FileReader();
      fileCover.readAsDataURL(cover.files[0]);

      fileCover.onload = function(e) {
        imagePreview.src = e.target.result;
      }
    }
  </script>
</body>

</html>