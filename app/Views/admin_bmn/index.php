<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid px-4">
    <h1 class="mt-4">Static Navigation</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="#"><?= $menu; ?></a></li>
        <li class="breadcrumb-item active">list</li>
    </ol>

    <div class="card mb-4">
        <div class="card-header text-center">
            <i class="fas fa-table me-1"></i>
            Data <?= $menu; ?>
            <a class="btn btn-primary btn-sm float-end" href="/admin_bmn/create">
                <i class="fas fa-solid fa-plus"></i>
                Tambah Data
            </a>
        </div>
        <div class="card-body">
            <!-- jika ada flash data -->
            <?php if (session()->getFlashdata('message')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('message'); ?>
                </div>
            <?php endif; ?>

            <table id="datatablesSimple" class="data-profil">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Foto Barang</th>
                        <th>Penyedia / Perusahaan</th>
                        <th>Nama Direktur</th>
                        <th>Alamat Penyedia</th>
                        <th>Nomor SIUPAL dan SIUP</th>
                        <th>Nilai Kontrak</th>
                        <th>Pekerjaan</th>
                        <th>Nomor SP2D</th>
                        <th>Jumlah Barang</th>
                        <th>Nama Barang</th>
                        <th>Spesifikasi</th>
                        <th>Nilai Satuan</th>
                        <th>Unit Pengguna</th>
                        <?php if (in_groups(['admin-master', 'admin-bmn-unkhair', 'admin-bmn-fakultas'])) : ?>
                            <th>Aksi</th>
                        <?php endif; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($datas as $data) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td>
                                <img src="/img/admin_bmn/<?= $data['foto_barang'] ?>" alt="<?= $data['foto_barang'] ?>" title="<?= $data['foto_barang'] ?>" width="100">
                            </td>
                            <td><?= $data['penyedia_perusahaan']; ?></td>
                            <td><?= $data['nama_direktur']; ?></td>
                            <td><?= $data['alamat_penyedia']; ?></td>
                            <td><?= $data['nomor_siupal']; ?></td>
                            <td><?= $data['nilai_kontrak']; ?></td>
                            <td><?= $data['pekerjaan']; ?></td>
                            <td><?= $data['nomor_sp2d']; ?></td>
                            <td><?= $data['jumlah_barang']; ?></td>
                            <td><?= $data['nama_barang']; ?></td>
                            <td><?= $data['spesifikasi']; ?></td>
                            <td><?= $data['nilai_satuan']; ?></td>
                            <td><?= $data['unit_pengguna']; ?></td>
                            <?php if (in_groups(['admin-master', 'admin-bmn-unkhair', 'admin-bmn-fakultas'])) : ?>
                                <td>
                                    <a class="btn btn-success btn-sm" href="/admin_bmn/edit/<?= $data['id']; ?>">
                                        <i class="bi bi-pencil-fill"></i>
                                    </a>
                                    <form action="/admin_bmn/<?= $data['id']; ?>" method="POST" class="d-inline">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-sm btn-danger mt-1" onclick="return confirm('apakah anda yakin ingin dihapus?')">
                                            <i class="bi bi-trash-fill"></i>
                                        </button>
                                    </form>
                                </td>
                            <?php endif; ?>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection('content'); ?>