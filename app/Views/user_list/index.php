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
            <?php

            use Myth\Auth\Entities\User;

            if (session()->getFlashdata('message')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('message'); ?>
                </div>
            <?php endif; ?>

            <table id="datatablesSimple" class="data-profil">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Role</th>
                        <?php if (in_groups(['admin-master', 'admin-bmn-unkhair', 'admin-bmn-fakultas'])) : ?>
                            <th>Aksi</th>
                        <?php endif; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($users as $user) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <!-- <td><?= ($user->username == User()->username) ? '<h6><?= $user->username; ?><span class="badge bg-secondary">Anda</span></h6>' : $user->username ?></td> -->
                            <?php if ($user->username == User()->username) { ?>
                                <td>
                                    <p><?= $user->username; ?> <span class="badge bg-primary">Anda</span></p>
                                </td>
                            <?php } else { ?>
                                <td><?= $user->username; ?></td>
                            <?php } ?>
                            <td><?= $user->email; ?></td>
                            <td><?= $user->name; ?></td>
                            <?php if (in_groups(['admin-master', 'admin-bmn-unkhair', 'admin-bmn-fakultas'])) : ?>
                                <td>
                                    <a class="btn btn-success btn-sm" href="/user_list/edit/<?= $user->userid; ?>">
                                        <i class="bi bi-pencil-fill"></i>
                                    </a>
                                    <form action="/user_list/<?= $user->userid; ?>" method="POST" class="d-inline">
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