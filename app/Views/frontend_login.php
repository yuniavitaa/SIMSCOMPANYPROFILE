<?= $this->extend('layout/frontend_template') ?>
<?= $this->section('content') ?>
<div class="container login-container" style="padding-top: 100px;">

    <!-- ROW LOGO -->
    <div class="row justify-content-center mb-3">
        <div class="col-md-5 text-center">
            <img src="<?= base_url('assets/img/SIMS.png') ?>" alt=" logo" width="100" class="shadow-light rounded-circle">
        </div>
    </div>

    <!-- ROW LOGIN BOX -->
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow-sm">
                <div class="card-header text-center">
                    <h4>Login</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="<?= site_url('user/loginProcess') ?>">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input id="email" type="email" class="form-control" name="email" required autofocus>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input id="password" type="password" class="form-control" name="password" required>
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="remember-me" name="remember">
                            <label class="form-check-label" for="remember-me">Remember Me</label>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Login</button>
                    </form>
                </div>
                <div class="card-footer text-center">
                    Don't have an account? <a href="<?= base_url('register') ?>">Create Now</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>