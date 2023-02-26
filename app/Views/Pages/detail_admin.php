<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container" style="padding-top: 8.5rem;">
  <div class="conteainer-fluid d-md-flex">
    <div class="col-md-3 d-flex align-items-center justify-content-center" style="width: 500px; height: 500px; overflow-y: auto; background-color: rgb(0, 0, 0, 0.3);">
      <img src="<?= base_url('/dist/img/'.$komik['cover']) ?>" alt="" height="500px" style="object-fit: cover;">
    </div>
    <div class="col-md-7 ms-md-3 mt-3" style="height: 500px; overflow-x: hidden; padding-bottom: 2rem;">
      <h1 class="fw-semibold">Detail Komik <ion-icon name="book-outline"></ion-icon>
      </h1>
      <hr>
      <h3><?= $jenis['jenis'] ?></h3>
      <h2 class="fw-semibold mb-3"><?= $komik['judul'] ?></h2>
      <div>
        <h3>Synopsis : </h3>
        <p class="fs-5"><?= $komik['sinopsis'] ?></p>
      </div>
      <hr>
      <?php $hargaAwal = (int)$komik['harga']; ?>
      <h3 class="fw-semibold">Rp. <?= number_format($hargaAwal, 0, ',', '.')?></h3>
      <hr>
      <div>
        <form action="/admin/<?= $komik['id'] ?>" method="post" class="d-inline">
        <?= csrf_field() ?>
        <input type="hidden" name="_method" value="DELETE">
          <button type="submit" class="btn btn-danger fs-5 me-1" onclick="return confirm('Apakah anda yakin?')">HAPUS</button>
        </form>
        <a href="/admin/edit/<?= $komik['slug'] ?>" class="btn btn-warning fs-5">EDIT</a>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection(); ?>