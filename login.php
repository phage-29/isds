<?php
require_once "includes/conn.php";
require_once "components/header.php";
?>
<main>
  <div class="container">

    <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

            <div class="d-flex justify-content-center py-4">
              <a href="index.html" class="logo d-flex align-items-center w-auto">
                <img src="assets/img/logo.png" alt="">
                <span class="d-none d-lg-block"><?= $website ?></span>
              </a>
            </div><!-- End Logo -->

            <div class="card mb-3">

              <div class="card-body">

                <div class="pt-4 pb-2">
                  <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                  <p class="text-center small">Enter your username & password to login</p>
                </div>

                <form class="row g-3" id="Login">

                  <div class="col-12">
                    <label for="Username" class="form-label">Username</label>
                    <div class="input-group">
                      <span class="input-group-text" id="usernameInputGroupPrepend">
                        <i class="bi bi-person"></i>
                      </span>
                      <input type="text" name="Username" class="form-control" id="Username" required>
                    </div>
                  </div>

                  <div class="col-12">
                    <label for="Password" class="form-label">Password</label>
                    <div class="input-group">
                      <span class="input-group-text" id="passwordInputGroupPrepend">
                        <i class="bi bi-shield-lock"></i>
                      </span>
                      <input type="password" name="Password" class="form-control" id="Password" required>
                    </div>
                  </div>


                  <div class="col-12">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="ShowPwd" onclick="Password.type=Password.type=='password'?'text':'password'">
                      <label class="form-check-label" for="ShowPwd" style="user-select: none; cursor: pointer">Show Password</label>
                    </div>
                  </div>

                  <div class="col-12">
                    <input type="hidden" name="Login" />
                    <button class="btn btn-primary w-100" type="submit">Login</button>
                  </div>

                  <div class="col-12">
                    <p class="small mb-0">Don't have an account? <a href="register.php">Create an account</a></p>
                  </div>
                </form>
                <script>
                  $(document).ready(function() {
                    $("#Login").submit(function(e) {
                      Swal.fire({
                        title: "Loading",
                        html: "Please wait...",
                        didOpen: () => {
                          Swal.showLoading();
                        }
                      });
                      e.preventDefault();
                      var formData = $(this).serialize();
                      $.ajax({
                        type: "POST",
                        url: "includes/process.php",
                        data: formData,
                        dataType: 'json',
                        success: function(response) {
                          setTimeout(function() {
                            Swal.fire({
                              icon: response.status,
                              title: response.message,
                              showConfirmButton: false,
                              timer: 1000
                            }).then(function() {
                              if (response.redirect) {
                                window.location.href = response.redirect
                              }
                            })
                          }, 1000)
                        },
                        error: function(error) {
                          // Handle errors here
                          console.log("Error:", error);
                          setTimeout(function() {
                            Swal.fire({
                              icon: 'error',
                              title: 'Something went wrong',
                              showConfirmButton: false,
                              timer: 750
                            }).then(function() {
                              if (response.redirect) {
                                window.location.href = response.redirect
                              }
                            })
                          }, 1000)
                        },
                      });
                    });
                  });
                </script>
              </div>
            </div>

          </div>
        </div>
      </div>

    </section>

  </div>
</main>

<?php
require_once "components/footer.php";
?>