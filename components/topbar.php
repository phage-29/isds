<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
        <a href="#" class="logo d-flex align-items-center">
            <img src="assets/img/logo.png" alt="">
            <span class="d-none d-lg-block">NiceAdmin</span>
        </a>
        <?php
        if (isset($_SESSION['id'])) {
        ?>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        <?php
        }
        ?>
    </div><!-- End Logo -->

    <nav class="header-nav ms-auto">
        <?php
        if (isset($_SESSION['id'])) {
        ?>
            <ul class="d-flex align-items-center">

                <li class="nav-item dropdown pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                        <!-- <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle"> -->
                        <span class="dropdown-toggle ps-2"><?= $acc->Email ?></span>
                    </a><!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6><?= $acc->FirstName ?> <?= $acc->LastName ?></h6>
                            <span><?= $acc->Role ?></span>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="profile.php">
                                <i class="bi bi-person"></i>
                                <span>My Profile</span>
                            </a>
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <button class="dropdown-item d-flex align-items-center" id="logout">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Sign Out</span>
                            </button>
                        </li>

                    </ul><!-- End Profile Dropdown Items -->
                </li><!-- End Profile Nav -->

            </ul>
        <?php
        } else {
        ?>
            <ul class="d-flex align-items-center">

                <li class="nav-item dropdown pe-3">

                    <button class="btn btn-primary">
                        Admin Login
                    </button><!-- End Profile Iamge Icon -->

                </li><!-- End Profile Nav -->

            </ul>
        <?php
        }
        ?>
    </nav><!-- End Icons Navigation -->

</header><!-- End Header -->

<script>
    $(document).ready(function() {
        $('#logout').click(function(e) {
            e.preventDefault();

            Swal.fire({
                title: "Are you sure?",
                text: "You will be logged out!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, logout"
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        icon: 'success',
                        title: 'See you again!',
                        showConfirmButton: false,
                        timer: 1000
                    }).then(function() {
                        window.location.href = "includes/logout.php";
                    })
                }
            });

        });
    });
</script>