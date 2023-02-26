<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container" style="padding-top: 8.5rem;">
  <div class="conteainer-fluid d-md-flex">
    <div class="col-md-3 d-flex align-items-center justify-content-center" style="width: 500px; height: 500px; overflow-y: auto; background-color: rgb(0, 0, 0, 0.3);">
      <img src="<?= base_url('/dist/img/'.$komik['cover']) ?>" alt="" height="500px" style="object-fit: cover;">
    </div>
    <div class="col-md-7 ms-md-3 mt-3" style="height: 500px; overflow-x: hidden; padding-bottom: 2rem;">
      <h1 class="fw-semibold">Detail <ion-icon name="book-outline"></ion-icon>
      </h1>
      <hr>
      <h3><?= $jenis['jenis'] ?></h3>
      <h2 class="fw-semibold"><?= $komik['judul'] ?></h2>
      <div>
        <h3>Sinopsis : </h3>
        <p><?= $komik['sinopsis'] ?></p>
      </div>
      <hr>
      <?php $hargaAwal = (int)$komik['harga']; ?>
      <h3 class="fw-semibold">Rp. <?= number_format($hargaAwal, 0, ',', '.')?></h3>
      <hr>
      <div>
        <form action="/buy" method="post">
          <input type="hidden" name="slug" value="<?= $komik['slug'] ?>">
          <button type="submit" class="btn btn-primary">BELI</button>
        </form>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection(); ?>