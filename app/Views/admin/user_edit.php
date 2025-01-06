<?= $this->extend('templates/admin_dashboard') ?>

<?= $this->section('content') ?>

<div class="container mt-4">
    <h3>Edit User</h3>

    <!-- Form untuk Edit User -->
    <form action="/admin/user/edit/<?= $user['id'] ?>" method="post">
        <!-- Input Hidden untuk ID (Jika masih diperlukan di form) -->
        <!-- <input type="hidden" name="id" value="<?= $user['id'] ?>"> -->

        <!-- Input untuk Full Name -->
        <div class="form-group">
            <label for="fullname">Full Name</label>
            <input type="text" name="fullname" id="fullname" class="form-control" value="<?= esc($user['fullname']) ?>" required>
        </div>

        <!-- Input untuk Email -->
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="<?= esc($user['email']) ?>" required>
        </div>

        <!-- Input untuk Role -->
        <div class="form-group">
            <label for="role">Role</label>
            <input type="text" name="role" id="role" class="form-control" value="<?= esc($user['role']) ?>">
        </div>

        <!-- Input untuk Password -->
        <div class="form-group">
            <label for="password">Password (Optional)</label>
            <input type="password" name="password" id="password" class="form-control">
        </div>

        <!-- Tombol Submit -->
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>

<?= $this->endSection() ?>