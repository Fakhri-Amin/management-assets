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
            Data Persediaan
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
                        <th>kode barang</th>
                        <th>nama barang</th>
                        <th>spesifikasi</th>
                        <th>tahun perolehan</th>
                        <th>nilai satuan</th>
                        <th>Jumlah Barang Masuk</th>
                        <th>Jumlah Barang Keluar</th>
                        <th>Sisa Barang</th>
                        <th>Unit Pengguna Barang</th>
                        <th>aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data as $d) : ?>
                        <tr>
                            <td><?= $d['id']; ?></td>
                            <td><?= $d['foto_barang']; ?></td>
                            <td><?= $d['kode_barang']; ?></td>
                            <td><?= $d['nama_barang']; ?></td>
                            <td><?= $d['nilai_satuan']; ?></td>
                            <td><?= $d['spesifikasi']; ?></td>
                            <td><?= $d['tahun_perolehan']; ?></td>
                            <td><?= $d['jumlah_barang_masuk']; ?></td>
                            <td><?= $d['jumlah_barang_keluar']; ?></td>
                            <td><?= $d['sisa_barang']; ?></td>
                            <td><?= $d['unit_pengguna_barang']; ?></td>
                            <td>
                                <a class="btn btn-success btn-sm" href="/persediaan/edit">ubah</a>
                                <a class="btn btn-danger btn-sm" href="/persediaan/delete">hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection('content'); ?>