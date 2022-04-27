<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid px-4">
    <h1 class="mt-4">Static Navigation</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="/meubellair">meubellair</a></li>
        <li class="breadcrumb-item active">edit data</li>
    </ol>

    <div class="card mb-4">
        <div class="card-header text-center">
            <i class="fas fa-table me-1"></i>
            Edit Data
        </div>
        <div class="card-body">
            <form method="post" action="/meubellair/update/<?= $data['id'] ?>" enctype="multipart/form-data">
                <?= csrf_field(); ?>

                <input type="hidden" name="foto_lama" value="<?= $data['foto_barang'] ?>">

                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="row mb-3">

                            <label for="foto_barang" class="col-sm-2 col-form-label">Foto Barang</label>
                            <div class="col-sm-3">
                                <img src="/img/meubellair/<?= $data['foto_barang'] ?>" alt="" class="img-thumbnail img-preview">
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
                            <label for="kode_barang" class="form-label">Kode barang</label>
                            <input class="form-control" id="kode_barang" name="kode_barang" type="text" value="<?= (old('kode_barang')) ? old('kode_barang') : $data['kode_barang'] ?>" required autofocus />
                        </div>
                        <div class="mb-3">
                            <label for="nama_barang" class="form-label">Nama barang</label>
                            <input class="form-control" id="nama_barang" name="nama_barang" type="text" value="<?= (old('nama_barang')) ? old('nama_barang') : $data['nama_barang'] ?>" required autofocus />
                        </div>
                        <div class="mb-3">
                            <label for="spesifikasi" class="form-label">Spesifikasi / Jenis / Merek</label>
                            <input class="form-control" id="spesifikasi" name="spesifikasi" type="text" value="<?= (old('spesifikasi')) ? old('spesifikasi') : $data['spesifikasi'] ?>" required autofocus />
                        </div>
                        <div class="mb-3">
                            <label for="tahun_perolehan" class="form-label">Tahun Perolehan</label>
                            <input class="form-control" id="tahun_perolehan" name="tahun_perolehan" type="text" value="<?= (old('tahun_perolehan')) ? old('tahun_perolehan') : $data['tahun_perolehan'] ?>" required autofocus />
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="mb-3">
                            <label for="nilai_satuan" class="form-label">Nilai Satuan / Harga</label>
                            <input class="form-control" id="nilai_satuan" name="nilai_satuan" type="text" value="<?= (old('nilai_satuan')) ? old('nilai_satuan') : $data['nilai_satuan'] ?>" required autofocus />
                        </div>
                        <div class="mb-3">
                            <label for="kondisi" class="form-label">Kondisi</label>
                            <input class="form-control" id="kondisi" name="kondisi" type="text" value="<?= (old('kondisi')) ? old('kondisi') : $data['kondisi'] ?>" required autofocus />
                        </div>
                        <div class="mb-3">
                            <label for="jumlah" class="form-label">Total</label>
                            <input class="form-control" id="jumlah" name="jumlah" type="text" value="<?= (old('jumlah')) ? old('jumlah') : $data['jumlah'] ?>" required autofocus />
                        </div>
                        <div class="mb-3">
                            <label for="pengguna" class="form-label">Pengguna</label>
                            <input class="form-control" id="pengguna" name="pengguna" type="text" value="<?= (old('pengguna')) ? old('pengguna') : $data['pengguna'] ?>" required autofocus />
                        </div>
                        <div class="mb-3">
                            <label for="unit_pengguna" class="form-label">Unit Pengguna</label>
                            <input class="form-control" id="unit_pengguna" name="unit_pengguna" type="text" value="<?= (old('unit_pengguna')) ? old('unit_pengguna') : $data['unit_pengguna'] ?>" required autofocus />
                        </div>
                        <div class="mb-3">
                            <label for="jenis_kepemilikan" class="form-label">Jenis Kepemilikan</label>
                            <input class="form-control" id="jenis_kepemilikan" name="jenis_kepemilikan" type="text" value="<?= (old('jenis_kepemilikan')) ? old('jenis_kepemilikan') : $data['jenis_kepemilikan'] ?>" required autofocus />
                        </div>
                    </div>
                </div>
                <div class="mt-4 mb-0">
                    <a class="btn btn-danger float-start" href="#" onclick="window.history.back()">Kembali</a>
                    <button class="btn btn-primary float-end" type="submit" name="edit">Edit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection('content'); ?>