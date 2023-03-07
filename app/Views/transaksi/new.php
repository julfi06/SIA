<?= $this->extend('layout/backend') ?>


<?= $this->section('content') ?>

<section class="section">
          <div class="section-header">
            <!-- <h1>Blank Page</h1> -->
            <a href="<?=site_url('transaksi')?>" class="btn btn-primary">Back</a>
          </div>

          <div class="section-body">
          <div class="card">
                  <div class="card-header">
                    <h4>Tambah Data Transaksi</h4>
                  </div>
                  <div class="card-body p-4">
                    <form method="post" action="<?= site_url('transaksi') ?>">
                        <?= csrf_field() ?>

                    <div class="form-group">
                        <label> Tanggal </label>
                        <input type="date" class="form-control" name="tanggal" placeholder="Tanggal" required>
                    </div>
                    <div class="form-group">
                        <label> Deskripsi </label>
                        <input type="text" class="form-control" name="deskripsi" placeholder="Deskripsi" required>
                    </div>
                    <div class="form-group">
                        <label> Keterangan Jurnal </label>
                        <input type="text" class="form-control" name="ketjurnal" placeholder="Keterangan Jurnal" required>
                    </div>

                    <div class="box-body">
                        <table class="table table-bordered" id="tableLoop">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Kode Akun</th>
                                    <th scope="col">Debit</th>
                                    <th scope="col">Kredit</th>
                                    <th scope="col">Status</th>
                                    <th>
                                        <button class="btn btn-primary btn-sm btn-block" id="BarisBaru"><i class="fa fa-plus"></i> Add Baris </button>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                
                            </tbody>
                        </table>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-success"><i class="fas fa-paper-plane"></i> Save</button>
                        <button type="reset" class="btn btn-warning"><i class="fas fa-eraser"></i> Reset</button>
                    </div>
                    </form>
                  </div>
                </div>
          </div>

</section>

<?= $this->endSection() ?>


