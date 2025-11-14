<div class="container-md mt-5">
  <div class="row">
    <div class="col-lg-12">
      <?php Flasher::flash(); ?>
    </div>
  </div>
  <div class="card">
    <div class="card-header">
      <div class="row">
        <div class="col-10">
          <h3>Daftar Mahasiswa</h3>
        </div>
        <div class="col-2">
          <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <button class="btn btn-outline-primary" type="button" data-bs-toggle="modal" data-bs-target="#tambahModal" ><i class="fa fa-plus-square" aria-hidden="true"></i> Tambah Data</button>  
          </div>
        </div>
      </div>
    </div>
    <div class="card-body">
      <!-- apabila tidak ada data yang dilooping -->
      <?php if($data['mahasiswa']==null){ ?>
        <h5>Belum ada data mahasiswa</h5>
        <?php }else{ ?>
      <div class="col-12">
        <ol class="list-group list-group-numbered">
          <?php foreach($data['mahasiswa'] as $mahasiswa): ?>
          <li class="list-group-item d-flex justify-content-between align-items-start">
            <div class="ms-2 me-auto">
              <div class="fw-bold"><?= $mahasiswa['nama']; ?></div>
              <?= $mahasiswa['pt']; ?>
            </div>
            <a href="<?= BASEURL. '/home/detail/'.$mahasiswa['id']; ?>"><button type="button" class="btn btn-outline-success">Detail</button></a>
          </li>
          <?php endforeach; ?>
        </ol>
      </div>
      <?php } ?>
    </div>
  </div>

<!-- Modal -->
<div class="modal fade " id="tambahModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
    <form action="<?= BASEURL; ?>/home/insert" method="post" >
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Menambahkan Data Mahasiswa</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">Nomor Induk Mahasiswa</label>
            <input type="number" class="form-control" name="nim" id="formGroupExampleInput" placeholder="Masukan nama mahasiswa disini" required>
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">Nama Mahasiswa</label>
            <input type="text" class="form-control" name="nama" id="formGroupExampleInput" placeholder="Masukan nama mahasiswa disini" required>
        </div>
        <div class="mb-3">
        <label for="formGroupExampleInput2" class="form-label">Program Studi</label>
            <input type="text" class="form-control" name="ps" id="formGroupExampleInput2" placeholder="Masukan prodi mahasiswa disini" required>
        </div>
        <div class="mb-3">
        <label for="formGroupExampleInput2" class="form-label">Perguruan Tinggi</label>
            <input type="text" class="form-control" name="pt" id="formGroupExampleInput2" placeholder="Masukan Universitas mahasiswa disini" required>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
    </form>
    </div>
  </div>
</div>
<!-- end of modal -->