<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container" style="padding-top: 8.5rem;">
  <div class="conteainer-fluid">
    <h1 class="fw-semibold">Pesanan<ion-icon name="book-outline"></ion-icon>
    </h1>
    <hr>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Image</th>
          <th scope="col">Detail</th>
          <th scope="col">Status</th>
          <th scope="col">Batal</th>
        </tr>
      </thead>
      <tbody>
        <?php $i = 1; ?>
        <?php foreach ($pesanan as $pesan) : ?>
          <tr style="vertical-align: middle;">
            <th scope="row"><?= $i++ ?></th>
            <td>
              <div class="d-flex align-items-center justify-content-center" style="width: 100px; height: 100px;">
                <img src="/dist/img/<?= $pesan['cover'] ?>" height="100px" alt="">
              </div>
            </td>
            <td style="width: 500px;">
              <div class="fw-semibold"><?= $pesan['judul'] ?></div>
              <?= $pesan['alamat'] ?><br>
              <?php $hargaAwal = (int)$pesan['harga']; ?>
              Rp. <?= number_format($hargaAwal, 0, ',', '.')?>
            </td>
            <td>
              <div class="fw-semibold">
                <?= $pesan['kirim'] ?>
              </div>
            </td>
            <td style="width: 260px;">
              <form action="/pesanan/batal" method="post">
                <input type="hidden" name="id" value="<?= $pesan['id'] ?>">
                <button type="submit" class="btn btn-danger">Batal</button>
              </form>
            </td>
          <?php endforeach; ?>
          </tr>
      </tbody>
    </table>
  </div>
</div>

<?= $this->endSection(); ?>