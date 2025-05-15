<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link <?= (App::$page == 'dashboard') ? 'active' : '' ?>" aria-current="page" href="<?= BASE_URL ?>/dashboard">
                    <span data-feather="home"></span>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= (App::$page == 'dosen') ? 'active' : '' ?>" href="<?= BASE_URL ?>/dosen">
                    <span data-feather="user"></span>
                    Dosen
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= (App::$page == 'kegiatan') ? 'active' : '' ?>" href="<?= BASE_URL ?>/kegiatan">
                    <span data-feather="file"></span>
                    Kegiatan
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <span data-feather="log-out"></span>
                    Log out
                </a>
            </li>
        </ul>
    </div>
</nav>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Log out</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Yakin ingin log out ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <a type="button" href="<?= BASE_URL ?>/auth/logout" class="btn btn-primary">Log out</a>
            </div>
        </div>
    </div>
</div>