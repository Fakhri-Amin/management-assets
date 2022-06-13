<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid px-4">
    <h1 class="mt-4">Static Navigation</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="/user_list"><?= $menu; ?></a></li>
        <li class="breadcrumb-item active">edit data</li>
    </ol>

    <div class="card mb-4">
        <div class="card-header text-center">
            <i class="fas fa-table me-1"></i>
            Edit Data
        </div>
        <div class="card-body">
            <form method="POST" action="/user_list/update/<?= $data['id'] ?>" enctype="multipart/form-data">
                <?= csrf_field(); ?>

                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" required value="<?= (old($data['username'])) ? old($data['username']) : $data['username']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control" id="email" name="email" required value="<?= (old($data['email'])) ? old($data['email']) : $data['email']; ?>">
                        </div>

                        <div class="mb-3">
                            <label for="role" class="form-label">Role</label>
                            <select class="form-select" aria-label="Default select example" name="role" id="role" required>
                                <?php for ($i = 0; $i < count($all_users); $i++) : ?>
                                    <option <?= ($user->name == $all_users[$i]['name']) ? 'selected' : '' ?> value=<?= $all_users[$i]['id']; ?>><?= $all_users[$i]['name']; ?></option>
                                <?php endfor; ?>
                            </select>
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