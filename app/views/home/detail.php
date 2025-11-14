<div class="container-md mt-5">
  <div class="row">
    <div class="col-lg-12">
      <?php Flasher::flash(); ?>
    </div>
  </div>
<div class="card">
  <div class="card-header">
    <div class="row">
        <div class="col-8">
            <h3>Detail Mahasiswa </h3>
        </div>
        <div class="col-4">
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button class="btn btn-outline-primary" type="button" data-bs-toggle="modal" data-bs-target="#editModal" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Update Data</button> 
                <button class="btn btn-outline-danger" type="button" data-bs-toggle="modal" data-bs-target="#hapusModal" ><i class="fa fa-trash-o" aria-hidden="true"></i> Delete Data</button> 
            </div>
        </div>
    </div>
  </div>
  <div class="card-body">
    <h5 class="card-title"><?= $data['mahasiswa'] ['nama']; ?></h5>
    <div class="row mb-2">
        <div class="col-3">
            <p class="card-text">Nomor Induk Mahasiswa</p>
            <p class="card-text">Program Studi</p>
            <p class="card-text">Perguruan Tinggi</p>
        </div>
        <div class="col-9">
            <p class="card-text">: <?= $data ['mahasiswa'] ['nim']; ?></p>
            <p class="card-text">: <?= $data ['mahasiswa'] ['prodi']; ?></p>
            <p class="card-text">: <?= $data ['mahasiswa'] ['pt']; ?></p>
        </div>
    </div>
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a href="<?= BASEURL; ?>"><button class="btn btn-outline-primary"><i class="fa fa-backward" aria-hidden="true"></i></i> Back</button></a>
    </div>
  </div>
</div>
</div>

<!-- Modal -->
<div class="modal fade " id="editModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
    <form action="<?= BASEURL; ?>/home/update" method="post" >
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Memperbarui Data Mahasiswa</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">NIS Mahasiswa</label>
            <input type="number" class="form-control" name="nim" id="formGroupExampleInput" value="<?= $data ['mahasiswa'] ['nim']; ?>" placeholder="Masukan nama mahasiswa disini" required>
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">Nama Mahasiswa</label>
            <input type="text" class="form-control" name="nama" id="formGroupExampleInput" value="<?= $data ['mahasiswa'] ['nama']; ?>" placeholder="Masukan nama mahasiswa disini" required>
        </div>
        <div class="mb-3">
        <label for="formGroupExampleInput2" class="form-label">Program Studi</label>
            <input type="text" class="form-control" name="ps" id="formGroupExampleInput2" value="<?= $data ['mahasiswa'] ['prodi']; ?>" placeholder="Masukan prodi mahasiswa disini" required>
        </div>
        <div class="mb-3">
        <label for="formGroupExampleInput2" class="form-label">Perguruan Tinggi</label>
            <input type="text" class="form-control" name="pt" id="formGroupExampleInput2" value="<?= $data ['mahasiswa'] ['pt']; ?>" placeholder="Masukan Universitas mahasiswa disini" required>
        </div>
        <input type="hidden" name="id" id="id" value="<?= $data['mahasiswa']['id']; ?>">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </form>
    </div>
  </div>
</div>
<!-- end of modal -->

<!-- Modal Hapus-->
<div class="modal fade" id="hapusModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="<?= BASEURL; ?>/home/hapus" method="post">
      <div class="modal-header bg-warning">
        <h5 class="modal-title" id="staticBackdropLabel">Konfirmasi hapus data mahasiswa</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Apakah anda yakin untuk menghapus data mahasiswa atas nama 
        <b><?= $data['mahasiswa']['nama']; ?> ?</b>
      </div>
      <!-- id yang dikirim ke kontroler disembunyikan -->
       <input type="hidden" name="id" id="id" value="<?= $data['mahasiswa']['id']; ?>">
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-danger">Delete</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- end of modal hapus -->