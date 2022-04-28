<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid px-4">
    <h1 class="mt-4">Static Navigation</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="/admin_bmn"><?= $menu; ?></a></li>
        <li class="breadcrumb-item active">edit data</li>
    </ol>


    <!-- <div class="card mb-4">
        <div class="card-body">
            <p class="mb-0">
                This page is an example of using static navigation. By removing the
                <code>.sb-nav-fixed</code>
                class from the
                <code>body</code>
                , the top navigation and side navigation will become static on scroll. Scroll down this page to see an example.
            </p>
        </div>
    </div>
    <div style="height: 100vh"></div>
    <div class="card mb-4">
        <div class="card-body">When scrolling, the navigation stays at the top of the page. This is the end of the static navigation demo.</div>
    </div> -->

    <div class="card mb-4">
        <div class="card-header text-center">
            <i class="fas fa-table me-1"></i>
            Edit Data
        </div>
        <div class="card-body">
            <form method="POST" action="/admin_bmn/update/<?= $data['id'] ?>" enctype="multipart/form-data">
                <?= csrf_field(); ?>

                <input type="hidden" name="foto_lama" value="<?= $data['foto_barang'] ?>">

                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="row mb-3">
                            <!-- <label for="item_photo" class="form-label">nama foto</label>
                            <input class="form-control" id="item_photo" name="item_photo" type="text" autofocus /> -->

                            <label for="foto_barang" class="col-sm-2 col-form-label">Foto Barang</label>
                            <div class="col-sm-3">
                                <img src="/img/admin_bmn/default.png" alt="" class="img-thumbnail img-preview">
                            </div>
                            <div class="col-sm-7">
                                <div class="input-group mb-3">
                                    <input type="file" class="form-control <?= ($validation->hasError('foto_barang')) ? 'is-invalid' : '' ?>" name="foto_barang" id="foto_barang" onchange="previewImage()">
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        <?= $validation->getError('foto_barang'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="penyedia_perusahaan" class="form-label">Penyedia Perusahaan</label>
                            <input type="text" class="form-control" id="penyedia_perusahaan" name="penyedia_perusahaan" required value="<?= (old('penyedia_perusahaan')) ? old('penyedia_perusahaan') : $data['penyedia_perusahaan']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="nama_direktur" class="form-label">Nama Direktur</label>
                            <input type="text" class="form-control" id="nama_direktur" name="nama_direktur" required value="<?= (old('nama_direktur')) ? old('nama_direktur') : $data['nama_direktur']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="alamat_penyedia" class="form-label">Alamat Penyedia</label>
                            <input type="text" class="form-control" id="alamat_penyedia" name="alamat_penyedia" required value="<?= (old('alamat_penyedia')) ? old('alamat_penyedia') : $data['alamat_penyedia']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="nomor_siupal" class="form-label">Nomor SIUPAL dan SIUP</label>
                            <input type="text" class="form-control" id="nomor_siupal" name="nomor_siupal" required value="<?= (old('nomor_siupal')) ? old('nomor_siupal') : $data['nomor_siupal']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="nilai_kontrak" class="form-label">Nilai Kontrak</label>
                            <input type="text" class="form-control" id="nilai_kontrak" name="nilai_kontrak" required value="<?= (old('nilai_kontrak')) ? old('nilai_kontrak') : $data['nilai_kontrak']; ?>">
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="mb-3">
                            <label for="pekerjaan" class="form-label">Pekerjaan</label>
                            <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" required value="<?= (old('pekerjaan')) ? old('pekerjaan') : $data['pekerjaan']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="nomor_sp2d" class="form-label">Nomor SP2D</label>
                            <input type="text" class="form-control" id="nomor_sp2d" name="nomor_sp2d" required value="<?= (old('nomor_sp2d')) ? old('nomor_sp2d') : $data['nomor_sp2d']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="jumlah_barang" class="form-label">Jumlah Barang</label>
                            <input type="text" class="form-control" id="jumlah_barang" name="jumlah_barang" required value="<?= (old('jumlah_barang')) ? old('jumlah_barang') : $data['jumlah_barang']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="nama_barang" class="form-label">Nama Barang</label>
                            <input type="text" class="form-control" id="nama_barang" name="nama_barang" required value="<?= (old('nama_barang')) ? old('nama_barang') : $data['nama_barang']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="spesifikasi" class="form-label">Spesifikasi</label>
                            <input type="text" class="form-control" id="spesifikasi" name="spesifikasi" required value="<?= (old('spesifikasi')) ? old('spesifikasi') : $data['spesifikasi']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="nilai_satuan" class="form-label">Nilai Satuan</label>
                            <input type="text" class="form-control" id="nilai_satuan" name="nilai_satuan" required value="<?= (old('nilai_satuan')) ? old('nilai_satuan') : $data['nilai_satuan']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="unit_pengguna" class="form-label">Unit Pengguna</label>
                            <input type="text" class="form-control" id="unit_pengguna" name="unit_pengguna" required value="<?= (old('unit_pengguna')) ? old('unit_pengguna') : $data['unit_pengguna']; ?>">
                        </div>
                    </div>
                    <div class="mt-4 mb-0">
                        <a class="btn btn-danger float-start" href="#" onclick="window.history.back()">Kembali</a>
                        <button class="btn btn-primary float-end" type="submit" name="tambah">Edit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection('content'); ?>