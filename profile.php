<?php
$page = "Profile";
require_once "includes/session.php";
require_once "components/header.php";
require_once "components/topbar.php";
require_once "components/sidebar.php";
?>
<main id="main" class="main">

  <section class="section profile">
    <div class="row">
      <div class="col-xl-4">

        <div class="card">
          <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

            <img src="assets/img/logo.png" alt="Profile">
            <h2><?= $acc->FirstName ?> <?= $acc->MiddleName[0] ?? '' ?> <?= $acc->LastName ?></h2>
            <h3><?= $acc->Role ?></h3>
            <!-- <h3><?= $acc->Status ?></h3> -->
            <!-- <h3><?= $acc->Activation ?></h3> -->
            <div class="social-links mt-2">
              <!-- <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
              <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
              <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
              <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a> -->
            </div>
          </div>
        </div>

      </div>

      <div class="col-xl-8">

        <div class="card">
          <div class="card-body pt-3">
            <!-- Bordered Tabs -->
            <ul class="nav nav-tabs nav-tabs-bordered">

              <li class="nav-item">
                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview"><i class="bi bi-person"></i><span class="d-none d-sm-inline">Overview</span></button>
              </li>

              <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit"><i class="bi bi-person-gear"></i><span class="d-none d-sm-inline">Edit Profile</span></button>
              </li>

              <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password"><i class="bi bi-person-lock"></i><span class="d-none d-sm-inline">Change Password</span></button>
              </li>

            </ul>
            <div class="tab-content pt-2">

              <div class="tab-pane fade show active profile-overview" id="profile-overview">
                <h5 class="card-title">Profile Details</h5>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label ">Full Name</div>
                  <div class="col-lg-9 col-md-8"><?= $acc->FirstName ?> <?= $acc->MiddleName ?? '' ?> <?= $acc->LastName ?></div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label ">Position</div>
                  <div class="col-lg-9 col-md-8"><?= $acc->Position ?></div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Division</div>
                  <div class="col-lg-9 col-md-8"><?= $conn->query("SELECT Division FROM divisions WHERE id = $acc->DivisionID")->fetch_object()->Division ?></div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Email</div>
                  <div class="col-lg-9 col-md-8"><?= $acc->Email ?></div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Date Of Birth</div>
                  <div class="col-lg-9 col-md-8"><?= $acc->DateOfBirth ?></div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Sex</div>
                  <div class="col-lg-9 col-md-8"><?= $acc->Sex ?></div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Address</div>
                  <div class="col-lg-9 col-md-8"><?= $acc->Address ?></div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">ClientType</div>
                  <div class="col-lg-9 col-md-8"><?= $acc->ClientType ?></div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Phone</div>
                  <div class="col-lg-9 col-md-8"><?= $acc->Phone ?></div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">PWD</div>
                  <div class="col-lg-9 col-md-8"><?= $acc->PWD ?></div>
                </div>

              </div>

              <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                <!-- Profile Edit Form -->
                <form id="EditProfile">

                  <div class="row mb-3">
                    <label for="FirstName" class="col-md-4 col-lg-3 col-form-label">First Name</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="FirstName" type="text" class="form-control" id="FirstName" value="<?= $acc->FirstName ?>">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="MiddleName" class="col-md-4 col-lg-3 col-form-label">Middle Name</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="MiddleName" type="text" class="form-control" id="MiddleName" value="<?= $acc->MiddleName ?>">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="LastName" class="col-md-4 col-lg-3 col-form-label">Last Name</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="LastName" type="text" class="form-control" id="LastName" value="<?= $acc->LastName ?>">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="Position" class="col-md-4 col-lg-3 col-form-label">Position</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="Position" type="text" class="form-control" id="Position" value="<?= $acc->Position ?>">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="DivisionID" class="col-md-4 col-lg-3 col-form-label">Division</label>
                    <div class="col-md-8 col-lg-9">
                      <select class="form-select" id="DivisionID" name="DivisionID" required>
                        <option value="" selected disabled></option>
                        <?php
                        $result = $conn->query("SELECT * FROM divisions");
                        while ($row = $result->fetch_object()) {
                        ?>
                          <option value="<?= $row->id ?>" <?= $row->id == $acc->DivisionID ? 'selected' : '' ?>><?= $row->Division ?></option>
                        <?php
                        }
                        ?>
                      </select>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="Email" type="email" class="form-control" id="Email" value="<?= $acc->Email ?>">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="DateOfBirth" class="col-md-4 col-lg-3 col-form-label">Date Of Birth</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="DateOfBirth" type="date" class="form-control" id="DateOfBirth" value="<?= $acc->DateOfBirth ?>">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="Sex" class="col-md-4 col-lg-3 col-form-label">Sex</label>
                    <div class="col-md-8 col-lg-9">
                      <select class="form-select" id="Sex" name="Sex" required>
                        <option selected disabled>--</option>
                        <option value="Male" <?= $acc->Sex == 'Male' ? 'selected' : '' ?>>Male</option>
                        <option value="Female" <?= $acc->Sex == 'Female' ? 'selected' : '' ?>>Female</option>
                      </select>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="Address" class="col-md-4 col-lg-3 col-form-label">Address</label>
                    <div class="col-md-8 col-lg-9">
                      <textarea name="Address" type="text" class="form-control" id="Address" value="USA" style="resize: none;"><?= $acc->Address ?></textarea>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="ClientType" class="col-md-4 col-lg-3 col-form-label">Client Type</label>
                    <div class="col-md-8 col-lg-9">
                      <select class="form-select" id="ClientType" name="ClientType" required>
                        <option selected disabled>--</option>
                        <option value="Citizen" <?= $acc->ClientType == 'Citizen' ? 'selected' : '' ?>>Citizen</option>
                        <option value="Business" <?= $acc->ClientType == 'Business' ? 'selected' : '' ?>>Business</option>
                        <option value="Government" <?= $acc->ClientType == 'Government' ? 'selected' : '' ?>>Government</option>
                      </select>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="Phone" type="text" class="form-control" id="Phone" pattern="^(09|\+639)\d{9}$" value="<?= $acc->Phone ?>">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="PWD" class="col-md-4 col-lg-3 col-form-label">PWD</label>
                    <div class="col-md-8 col-lg-9">
                      <select class="form-select" id="PWD" name="PWD" required>
                        <option selected disabled>--</option>
                        <option value="Yes" <?= $acc->PWD == 'Yes' ? 'selected' : '' ?>>Yes</option>
                        <option value="No" <?= $acc->PWD == 'No' ? 'selected' : '' ?>>No</option>
                      </select>
                    </div>
                  </div>

                  <div class="text-center">
                    <input type="hidden" name="EditProfile" />
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                  </div>
                </form><!-- End Profile Edit Form -->

              </div>

              <div class="tab-pane fade pt-3" id="profile-change-password">
                <!-- Change Password Form -->
                <form id="ChangePassword">

                  <div class="row mb-3">
                    <label for="Password" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="Password" type="password" class="form-control" id="Password">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="NewPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="NewPassword" type="password" class="form-control" id="NewPassword">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="VerPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="VerPassword" type="password" class="form-control" id="VerPassword">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label class="col-md-4 col-lg-3 col-form-label"></label>
                    <div class="col-md-8 col-lg-9">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="ShowPwd" onclick="Password.type=Password.type=='password'?'text':'password';NewPassword.type=NewPassword.type=='password'?'text':'password';VerPassword.type=VerPassword.type=='password'?'text':'password';">
                        <label class="form-check-label" for="ShowPwd" style="user-select: none; cursor: pointer">Show Password</label>
                      </div>
                    </div>
                  </div>

                  <div class="text-center">
                    <input type="hidden" name="ChangePassword" />
                    <button type="submit" class="btn btn-primary">Change Password</button>
                  </div>
                </form><!-- End Change Password Form -->

              </div>

            </div><!-- End Bordered Tabs -->
            <script>
              $(document).ready(function() {

                $("#EditProfile").submit(function(e) {
                  e.preventDefault();
                  processForm("#EditProfile");
                });

                $("#ChangePassword").submit(function(e) {
                  e.preventDefault();
                  processForm("#ChangePassword");
                });
              });
            </script>

          </div>
        </div>

      </div>
    </div>
  </section>

</main><!-- End #main -->
<?php
require_once "components/footer.php";
?>