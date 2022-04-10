<?= $this->extend('layouts/template'); ?>


<?= $this->section('content'); ?>

<div class="container-fluid px-4">
    <h1 class="mt-4">Static Navigation</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="#">profil</a></li>
        <li class="breadcrumb-item active">list</li>
    </ol>

    <!-- jika ada flash data -->
    <?php if (session()->getFlashdata('message')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('message'); ?>
        </div>
    <?php endif; ?>

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
                        <th>nama</th>
                        <th>isi</th>
                        <th>aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($dataProfile as $data) : ?>
                        <tr>
                            <td><?= $data['id_profile']; ?></td>
                            <td><?= $data['name']; ?></td>
                            <td><?= $data['content']; ?></td>
                            <td>
                                <a class="btn btn-success btn-sm" href="/admin/profile/ubah">ubah</a>
                                <a class="btn btn-danger btn-sm" href="#">hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection('content'); ?>