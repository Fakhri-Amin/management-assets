<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid px-4">
    <h1 class="mt-4">Static Navigation</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="/kendaraan_bermotor"><?= $menu; ?></a></li>
        <li class="breadcrumb-item active">tambah data</li>
    </ol>

    <div class="card mb-4">
        <div class="card-header text-center">
            <i class="fas fa-table me-1"></i>
            Tambah Data
        </div>
        <div class="card-body">
            <form method="POST" action="/kendaraan_bermotor/save" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="row mb-3">
                            <label for="foto_barang" class="col-sm-2 col-form-label">Foto Kendaraan</label>
                            <div class="col-sm-3">
                                <img src="/img/kendaraan_bermotor/default.png" alt="" class="img-thumbnail img-preview">
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
                            <label for="no_polisi" class="form-label">No.Polisi</label>
                            <input type="text" class="form-control" id="no_polisi" name="no_polisi" required value="<?= (old('no_polisi')) ? old('no_polisi') : ''; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="merek_tipe" class="form-label">Merek / Tipe</label>
                            <input type="text" class="form-control" id="merek_tipe" name="merek_tipe" required value="<?= (old('merek_tipe')) ? old('merek_tipe') : ''; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="jenis_model" class="form-label">Jenis / Model</label>
                            <input type="text" class="form-control" id="jenis_model" name="jenis_model" required value="<?= (old('jenis_model')) ? old('jenis_model') : ''; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="tahun_pembuatan" class="form-label">Tahun Pembuatan</label>
                            <input type="text" class="form-control" id="tahun_pembuatan" name="tahun_pembuatan" required value="<?= (old('tahun_pembuatan')) ? old('tahun_pembuatan') : ''; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="warna" class="form-label">Warna</label>
                            <input type="text" class="form-control" id="warna" name="warna" required value="<?= (old('warna')) ? old('warna') : ''; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="isi_silinder" class="form-label">Isi Silinder</label>
                            <input type="text" class="form-control" id="isi_silinder" name="isi_silinder" required value="<?= (old('isi_silinder')) ? old('isi_silinder') : ''; ?>">
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="mb-3">
                            <label for="nomor_rangka_nik" class="form-label">Nomor Rangka / NIK</label>
                            <input type="text" class="form-control" id="nomor_rangka_nik" name="nomor_rangka_nik" required value="<?= (old('nomor_rangka_nik')) ? old('nomor_rangka_nik') : ''; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="nomor_mesin" class="form-label">Nomor Mesin</label>
                            <input type="text" class="form-control" id="nomor_mesin" name="nomor_mesin" required value="<?= (old('nomor_mesin')) ? old('nomor_mesin') : ''; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="bahan_bakar" class="form-label">Bahan Bakar</label>
                            <input type="text" class="form-control" id="bahan_bakar" name="bahan_bakar" required value="<?= (old('bahan_bakar')) ? old('bahan_bakar') : ''; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="stnk_bpkb" class="form-label <?= ($validation->hasError('stnk_bpkb')) ? 'is-invalid' : '' ?>">STNK / BPKB (centang bila ada)</label>
                            <br>

                            <!-- Check box : Ada -->
                            <input class="form-check-input" type="checkbox" value="ada" id="cek_stnk" name="cek_stnk" onclick="select_stnk()">
                            <label class="form-check-label form-check-inline" for="ada">
                                Ada
                            </label>

                            <div style="display: none;" id="checkedOptionStnk" class="card-header">
                                <label class="" for="stnk_bpkb">Upload Dokumen</label>
                                <input type="file" class="form-control mt-2" id="stnk_bpkb" name="stnk_bpkb" value="<?= (old('stnk_bpkb')) ? old('stnk_bpkb') : ''; ?>">
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= $validation->getError('stnk_bpkb'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="kondisi" class="form-label">Kondisi Bangunan</label>
                            <!-- <input type="text" class="form-control" id="kondisi" name="kondisi" required value="<?= (old('kondisi')) ? old('kondisi') : ''; ?>"> -->
                            <select class="form-select" aria-label="Default select example" name="kondisi" id="kondisi" required>
                                <option selected>-- Jenis Kerusakan --</option>
                                <option value="<?= (old('kondisi')) ? old('kondisi') : 'Baik'; ?>">Baik</option>
                                <option value="<?= (old('kondisi')) ? old('kondisi') : 'Rusak Ringan'; ?>">Rusak Ringan</option>
                                <option value="<?= (old('kondisi')) ? old('kondisi') : 'Rusak Berat'; ?>">Rusak Berat</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="pejabat_pengguna" class="form-label <?= ($validation->hasError('pejabat_pengguna')) ? 'is-invalid' : '' ?>">Pejabat / Pengguna</label>
                            <br>
                            <label for="">Upload Foto</label>
                            <input type="file" class="form-control" id="pejabat_pengguna" name="pejabat_pengguna" required value="<?= (old('pejabat_pengguna')) ? old('pejabat_pengguna') : ''; ?>">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation->getError('pejabat_pengguna'); ?>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="sopir" class="form-label <?= ($validation->hasError('sopir')) ? 'is-invalid' : '' ?>">Sopir</label>
                            <br>
                            <label for="">Upload Foto</label>
                            <input type="file" class="form-control" id="sopir" name="sopir" required value="<?= (old('sopir')) ? old('sopir') : ''; ?>">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation->getError('sopir'); ?>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="jenis_kepemilikan" class="form-label">Jenis Kepemilikan</label>
                            <input type="text" class="form-control" id="jenis_kepemilikan" name="jenis_kepemilikan" required value="<?= (old('jenis_kepemilikan')) ? old('jenis_kepemilikan') : ''; ?>">
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