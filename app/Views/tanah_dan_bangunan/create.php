<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid px-4">
    <h1 class="mt-4">Static Navigation</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="/tanah_dan_bangunan"><?= $menu; ?></a></li>
        <li class="breadcrumb-item active">tambah data</li>
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
            Tambah Data
        </div>
        <div class="card-body">
            <form method="POST" action="/tanah_dan_bangunan/save" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="row mb-3">
                            <label for="foto_barang" class="col-sm-2 col-form-label">Foto Barang</label>
                            <div class="col-sm-3">
                                <img src="/img/tanah_dan_bangunan/default.png" alt="" class="img-thumbnail img-preview">
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
                            <label for="kondisi" class="form-label">Kondisi</label>
                            <!-- <input type="text" class="form-control" id="kondisi" name="kondisi" value="<?= (old('kondisi')) ? old('kondisi') : ''; ?>"> -->
                            <select class="form-select" aria-label="Default select example" name="kondisi" id="kondisi">
                                <option selected>-- Jenis Kerusakan --</option>
                                <option value="<?= (old('kondisi')) ? old('kondisi') : 'Baik'; ?>">Baik</option>
                                <option value="<?= (old('kondisi')) ? old('kondisi') : 'Rusak Ringan'; ?>">Rusak Ringan</option>
                                <option value="<?= (old('kondisi')) ? old('kondisi') : 'Rusak Berat'; ?>">Rusak Berat</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="luas_tanah" class="form-label">Luas Tanah (km<sup>2</sup>)</label>
                            <input type="number" class="form-control" id="luas_tanah" name="luas_tanah" value="<?= (old('luas_tanah')) ? old('luas_tanah') : ''; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="luas_bangunan" class="form-label">Luas Bangunan</label>
                            <input type="number" class="form-control" id="luas_bangunan" name="luas_bangunan" value="<?= (old('luas_bangunan')) ? old('luas_bangunan') : ''; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="jumlah_bangunan" class="form-label">Jumlah Bangunan</label>
                            <input type="number" class="form-control" id="jumlah_bangunan" name="jumlah_bangunan" value="<?= (old('jumlah_bangunan')) ? old('jumlah_bangunan') : ''; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="jumlah_ruangan" class="form-label">Jumlah Ruangan</label>
                            <input type="number" class="form-control" id="jumlah_ruangan" name="jumlah_ruangan" value="<?= (old('jumlah_ruangan')) ? old('jumlah_ruangan') : ''; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="peruntukan_ruang" class="form-label">Peruntukan Ruang</label>
                            <input type="text" class="form-control" id="peruntukan_ruang" name="peruntukan_ruang" value="<?= (old('peruntukan_ruang')) ? old('peruntukan_ruang') : ''; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="tahun_perolehan" class="form-label">Tahun Perolehan</label>
                            <input type="number" class="form-control" id="tahun_perolehan" name="tahun_perolehan" value="<?= (old('tahun_perolehan')) ? old('tahun_perolehan') : ''; ?>">
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="mb-3">
                            <label for="nilai_bangunan_pekerjaan" class="form-label">Nilai Bangunan / Nilai Pekerjaan</label>
                            <input type="number" class="form-control" id="nilai_bangunan_pekerjaan" name="nilai_bangunan_pekerjaan" value="<?= (old('nilai_bangunan_pekerjaan')) ? old('nilai_bangunan_pekerjaan') : ''; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="nilai_satuan_tanah" class="form-label">Nilai Satuan / Nilai Tanah</label>
                            <input type="number" class="form-control" id="nilai_satuan_tanah" name="nilai_satuan_tanah" value="<?= (old('nilai_satuan_tanah')) ? old('nilai_satuan_tanah') : ''; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="luas_halaman_taman" class="form-label">Luas Halaman / Taman</label>
                            <input type="number" class="form-control" id="luas_halaman_taman" name="luas_halaman_taman" value="<?= (old('luas_halaman_taman')) ? old('luas_halaman_taman') : ''; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="nomor_kepemilikan_sertifikat" class="form-label <?= ($validation->hasError('nomor_kepemilikan_sertifikat')) ? 'is-invalid' : '' ?>">Nomor Kepemilikan / Sertifikat</label>
                            <input type="file" class="form-control" id="nomor_kepemilikan_sertifikat" name="nomor_kepemilikan_sertifikat" value="<?= (old('nomor_kepemilikan_sertifikat')) ? old('nomor_kepemilikan_sertifikat') : ''; ?>">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation->getError('nomor_kepemilikan_sertifikat'); ?>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" value="<?= (old('alamat')) ? old('alamat') : ''; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="batas_lahan" class="form-label">Batas Lahan</label>
                            <!-- <input type="text" class="form-control" id="batas_lahan" name="batas_lahan" value="<?= (old('batas_lahan')) ? old('batas_lahan') : ''; ?>"> -->
                            <select class="form-select" aria-label="Default select example" name="batas_lahan" id="batas_lahan">
                                <option selected>-- Batas Lahan --</option>
                                <option value="<?= (old('batas_lahan')) ? old('batas_lahan') : 'Utara'; ?>">Utara</option>
                                <option value="<?= (old('batas_lahan')) ? old('batas_lahan') : 'Selatan'; ?>">Selatan</option>
                                <option value="<?= (old('batas_lahan')) ? old('batas_lahan') : 'Barat'; ?>">Barat</option>
                                <option value="<?= (old('batas_lahan')) ? old('batas_lahan') : 'Timur'; ?>">Timur</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="denah_gedung" class="form-label <?= ($validation->hasError('denah_gedung')) ? 'is-invalid' : '' ?>">Denah Gedung</label>
                            <input type="file" class="form-control" id="denah_gedung" name="denah_gedung" value="<?= (old('denah_gedung')) ? old('denah_gedung') : ''; ?>">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation->getError('denah_gedung'); ?>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="nomor_imb" class="form-label <?= ($validation->hasError('nomor_imb')) ? 'is-invalid' : '' ?>">Nomor IMB</label>
                            <input type="file" class="form-control" id="nomor_imb" name="nomor_imb" value="<?= (old('nomor_imb')) ? old('nomor_imb') : ''; ?>">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation->getError('nomor_imb'); ?>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="jenis_kepemilikan" class="form-label">Jenis Kepemilikan</label>
                            <input type="text" class="form-control" id="jenis_kepemilikan" name="jenis_kepemilikan" value="<?= (old('jenis_kepemilikan')) ? old('jenis_kepemilikan') : ''; ?>">
                        </div>
                    </div>
                    <div class="mt-4 mb-0">
                        <a class="btn btn-danger float-start" href="#" onclick="window.history.back()">Kembali</a>
                        <button class="btn btn-primary float-end" type="submit" name="tambah">Tambah</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection('content'); ?>