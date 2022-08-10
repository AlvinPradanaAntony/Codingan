<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="col-lg-6">
            <?php Flasher::flash() ?>
            <h4 class="text-center mb-4">Silahkan Register</h4>
            <div class="card">
                <div class="card-body">
                    <form action="<?= BASE_URL ?>/auth/store" method="POST">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" name="username" class="form-control" id="username">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="password">
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-primary" type="submit">Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>