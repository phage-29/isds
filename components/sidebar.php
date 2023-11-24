<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link collapsed" href="dashboard.php">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-heading">Pages</li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="profile.php">
                <i class="bi bi-person"></i>
                <span>Profile</span>
            </a>
        </li><!-- End Profile Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="helpdesks.php">
                <i class="bi bi-question-circle"></i>
                <span>Helpdesks</span>
            </a>
        </li><!-- End F.A.Q Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="tasks.php">
                <i class="bi bi-envelope"></i>
                <span>Tasks</span>
            </a>
        </li><!-- End Contact Page Nav -->

    </ul>

</aside><!-- End Sidebar-->

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Get the current URL
        var currentURL = window.location.href.split('/');
        currentURL = currentURL[currentURL.length - 1].split('?');
        currentURL = currentURL[0];

        // Get all anchor elements in the navigation
        var navLinks = document.querySelectorAll('.nav-link');

        // Loop through each anchor element
        navLinks.forEach(function(link) {
            // Check if the href attribute matches the current URL
            if (link.getAttribute('href') === currentURL) {
                // Remove "collapsed" class and add "active" class
                link.classList.remove('collapsed');
                link.classList.add('active');
            }

        });
    });
</script>