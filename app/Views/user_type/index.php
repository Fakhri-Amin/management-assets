<?= $this->extend('layouts/template'); ?>


<?= $this->section('content'); ?>

<div class="container-fluid px-4">
    <h1 class="mt-4">Data <?= $menu; ?></h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="#"><?= $menu; ?></a></li>
        <li class="breadcrumb-item active">list</li>
    </ol>

    <div class="card mb-4">
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
                        <th>Nama</th>
                        <th>Deskripsi</th>
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
                            <td><?= $data['name']; ?></td>
                            <td><?= $data['description']; ?></td>
                            <?php if (in_groups(['admin-master', 'admin-bmn-unkhair', 'admin-bmn-fakultas'])) : ?>
                                <td>
                                    <a class="btn btn-success btn-sm" href="/user_type/edit/<?= $data['id']; ?>">
                                        <i class="bi bi-pencil-fill"></i>
                                    </a>
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