<?php
$page = "Login";
require_once "includes/conn.php";
require_once "components/header.php";
?>
<main>
  <div class="container">

    <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-8 col-md-10 d-flex flex-column align-items-center justify-content-center">

            <div class="d-flex justify-content-center py-4">
              <a href="#" class="logo d-flex align-items-center w-auto">
                <img src="assets/img/logo.png" alt="">
                <span class="d-none d-lg-block"><?= $website ?></span>
              </a>
            </div><!-- End Logo -->

            <div class="card mb-3">

              <div class="card-body">

                <div class="pt-4 pb-2">
                  <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
                  <p class="text-center small">Enter your personal details to create account</p>
                </div>

                <form class="row g-3" id="Registration">

                  <div class="col-md-4 mb-3">
                    <label for="FirstName" class="form-label">First Name</label>
                    <div class="input-group">
                      <span class="input-group-text">
                        <i class="bi bi-person"></i>
                      </span>
                      <input type="text" name="FirstName" class="form-control" id="FirstName" required>
                    </div>
                  </div>

                  <div class="col-md-4 mb-3">
                    <label for="MiddleName" class="form-label">Middle Name</label>
                    <div class="input-group">
                      <span class="input-group-text">
                        <i class="bi bi-person"></i>
                      </span>
                      <input type="text" name="MiddleName" class="form-control" id="MiddleName">
                    </div>
                  </div>

                  <div class="col-md-4 mb-3">
                    <label for="LastName" class="form-label">Last Name</label>
                    <div class="input-group">
                      <span class="input-group-text">
                        <i class="bi bi-person"></i>
                      </span>
                      <input type="text" name="LastName" class="form-control" id="LastName" required>
                    </div>
                  </div>

                  <div class="col-md-12 mb-3">
                    <label for="Position" class="form-label">Position</label>
                    <div class="input-group">
                      <span class="input-group-text">
                        <i class="bi bi-person"></i>
                      </span>
                      <input type="text" name="Position" class="form-control" id="Position" required>
                    </div>
                  </div>

                  <div class="col-md-6 mb-3">
                    <label for="DivisionID" class="form-label">Division</label>
                    <div class="input-group">
                      <span class="input-group-text">
                        <i class="bi bi-envelope"></i>
                      </span>
                      <select class="form-select" id="DivisionID" name="DivisionID" required>
                        <option value="" selected disabled></option>
                        <?php
                        $result = $conn->query("SELECT * FROM divisions");
                        while ($row = $result->fetch_object()) {
                        ?>
                          <option value="<?= $row->id ?>"><?= $row->Division ?></option>
                        <?php
                        }
                        ?>
                      </select>
                    </div>
                  </div>

                  <div class="col-md-6 mb-3">
                    <label for="Email" class="form-label">Email</label>
                    <div class="input-group">
                      <span class="input-group-text">
                        <i class="bi bi-envelope"></i>
                      </span>
                      <input type="email" name="Email" class="form-control" id="Email" required>
                    </div>
                  </div>

                  <div class="col-md-12 mb-3">
                    <label for="DateOfBirth" class="form-label">Date of Birth</label>
                    <div class="input-group">
                      <span class="input-group-text">
                        <i class="bi bi-calendar-event"></i>
                      </span>
                      <input type="date" name="DateOfBirth" class="form-control" id="DateOfBirth">
                    </div>
                  </div>

                  <div class="col-md-6 mb-3">
                    <label for="ClientType" class="form-label">Client Type</label>
                    <div class="input-group">
                      <span class="input-group-text">
                        <i class="bi bi-building"></i>
                      </span>
                      <select class="form-select" id="ClientType" name="ClientType" required>
                        <option selected disabled>--</option>
                        <option value="Citizen">Citizen</option>
                        <option value="Business">Business</option>
                        <option value="Government">Government</option>
                      </select>
                    </div>
                  </div>

                  <div class="col-md-6 mb-3">
                    <label for="Sex" class="form-label">Sex</label>
                    <div class="input-group">
                      <span class="input-group-text">
                        <i class="bi bi-gender-ambiguous"></i>
                      </span>
                      <select class="form-select" id="Sex" name="Sex" required>
                        <option selected disabled>--</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                      </select>
                    </div>
                  </div>

                  <div class="col-md-6 mb-3">
                    <label for="Phone" class="form-label">Phone</label>
                    <div class="input-group">
                      <span class="input-group-text">
                        <i class="bi bi-phone"></i>
                      </span>
                      <input type="tel" name="Phone" class="form-control" id="Phone">
                    </div>
                  </div>

                  <div class="col-md-6 mb-3">
                    <label for="PWD" class="form-label">PWD</label>
                    <div class="input-group">
                      <span class="input-group-text">
                        <i class="bi bi-gender-ambiguous"></i>
                      </span>
                      <select class="form-select" id="PWD" name="PWD" required>
                        <option selected disabled>--</option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                      </select>
                    </div>
                  </div>

                  <div class="col-12 mb-3">
                    <label for="Address" class="form-label">Address</label>
                    <div class="input-group">
                      <span class="input-group-text">
                        <i class="bi bi-house-door"></i>
                      </span>
                      <textarea type="text" name="Address" class="form-control" id="Address" style="resize:none"></textarea>
                    </div>
                  </div>
                  <hr>
                  <div class="col-md-6">
                    <label for="Username" class="form-label">Username</label>
                    <div class="input-group">
                      <span class="input-group-text">
                        <i class="bi bi-person"></i>
                      </span>
                      <input type="text" name="Username" class="form-control" id="Username" required>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <label for="Password" class="form-label">Password</label>
                    <div class="input-group">
                      <span class="input-group-text">
                        <i class="bi bi-shield-lock"></i>
                      </span>
                      <input type="password" name="Password" class="form-control" id="Password" required>
                    </div>
                  </div>
                  <div class="col-md-6 m-0 p-0"></div>

                  <div class="col-md-6 mb-3">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="ShowPwd" onclick="Password.type=Password.type=='password'?'text':'password'">
                      <label class="form-check-label" for="ShowPwd" style="user-select: none; cursor: pointer">Show Password</label>
                    </div>
                  </div>

                  <div class="col-12">
                    <input type="hidden" name="Registration" />
                    <button class="btn btn-primary w-100" type="submit">Register</button>
                  </div>

                  <div class="col-12">
                    <p class="small mb-0">Already have an account? <a href="login.php">Login</a></p>
                  </div>

                </form>

                <script>
                  $(document).ready(function() {

                    $("#Registration").submit(function(e) {
                      e.preventDefault();
                      processForm("#Registration");
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
</main><!-- End #main -->
<?php
require_once "components/footer.php";
?>