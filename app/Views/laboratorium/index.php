<?= $this->extend('layouts/template'); ?>


<?= $this->section('content'); ?>

<div class="container-fluid px-4">
    <h1 class="mt-4">Static Navigation</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="#">profil</a></li>
        <li class="breadcrumb-item active">list</li>
    </ol>

    <div class="card mb-4">
        <div class="card-header text-center">
            <i class="fas fa-table me-1"></i>
            Data Profil
            <a class="btn btn-primary btn-sm float-end" href="/admin/profile/tambah">
                <i class="fas fa-solid fa-plus"></i>
                tambah profil
            </a>
        </div>
        <div class="card-body">
            <table id="datatablesSimple" class="data-profil">
                <thead>
                    <tr>
                        <th>no</th>
                        <th>foto barang</th>
                        <th>nama barang</th>
                        <th>kode barang</th>
                        <th>spesifikasi</th>
                        <th>tahun perolehan</th>
                        <th>nilai satuan</th>
                        <th>kondisi</th>
                        <th>jumlah</th>
                        <th>unit pengguna</th>
                        <th>jenis kepemilian</th>
                        <th>aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>komputer</td>
                        <td>akses point</td>
                        <td>2342$#</td>
                        <td>loremm</td>
                        <td>loremm</td>
                        <td>loremm</td>
                        <td>loremm</td>
                        <td>loremm</td>
                        <td>loremm</td>
                        <td>loremm</td>
                        <td>
                            <a class="btn btn-success btn-sm" href="/laboratorium/edit">ubah</a>
                            <a class="btn btn-danger btn-sm" href="/laboratorium/delete">hapus</a>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>komputer k</td>
                        <td>akses point</td>
                        <td>2342$#</td>
                        <td>loremm</td>
                        <td>loremm</td>
                        <td>loremm</td>
                        <td>loremm</td>
                        <td>loremm</td>
                        <td>loremm</td>
                        <td>loremm</td>
                        <td>
                            <a class="btn btn-success btn-sm" href="/laboratorium/edit">ubah</a>
                            <a class="btn btn-danger btn-sm" href="/laboratorium/delete">hapus</a>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>komputer h</td>
                        <td>akses point</td>
                        <td>2342$#</td>
                        <td>loremm</td>
                        <td>loremm</td>
                        <td>loremm</td>
                        <td>loremm</td>
                        <td>loremm</td>
                        <td>loremm</td>
                        <td>loremm</td>
                        <td>
                            <a class="btn btn-success btn-sm" href="/laboratorium/edit">ubah</a>
                            <a class="btn btn-danger btn-sm" href="/laboratorium/delete">hapus</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection('content'); ?>