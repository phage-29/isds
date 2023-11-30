<?php
$page = "ICT Request Form";
require_once "includes/session.php";
require_once "components/header.php";
require_once "components/topbar.php";
require_once "components/sidebar.php";
?>
<main id="main" class="main">

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Request Form</h5>
                        <form id="ICTRequest" enctype="multipart/form-data">
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Nature of Complaint</label>
                                <div class="col-sm-10">
                                    <select class="form-select" id="CategoryID" name="CategoryID" required>
                                        <option selected disabled>--</option>
                                        <?php
                                        $result = $conn->query("SELECT * FROM categories");
                                        while ($row = $result->fetch_object()) {
                                        ?>
                                            <option value="<?= $row->id ?>"><?= $row->Category ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Complaint/s Category</label>
                                <div class="col-sm-10">
                                    <select class="form-select" id="SubCategoryID" name="SubCategoryID" required>
                                        <option selected disabled>--</option>
                                        <?php
                                        $result = $conn->query("SELECT * FROM subcategories");
                                        while ($row = $result->fetch_object()) {
                                        ?>
                                            <option data-categoryid="<?= $row->CategoryID ?>" value="<?= $row->id ?>"><?= $row->SubCategory ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <script>
                                $(document).ready(function() {
                                    function filterSubCategories(categoryId) {
                                        $('#SubCategoryID option').each(function() {
                                            if ($(this).data('categoryid') == categoryId || categoryId == "") {
                                                $(this).show();
                                            } else {
                                                $(this).hide();
                                            }
                                        });
                                        $('#SubCategoryID').val('');
                                    }
                                    $('#CategoryID').change(function() {
                                        var categoryId = $(this).val();
                                        filterSubCategories(categoryId);
                                    });
                                    $('#CategoryID').trigger('change');
                                });
                            </script>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Preferred Date & Time</label>
                                <div class="col-sm-10">
                                    <input type="datetime-local" class="form-control" name="PreferredSchedule" value="<?= date('Y-m-d\TH:i') ?>">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Defects/Compliants</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="Complaint" style="height: 100px"></textarea>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">File Upload</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="file" name="Files[]" multiple>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Submit Button</label>
                                <div class="col-sm-10">
                                    <input type="hidden" name="ICTRequest" />
                                    <button type="button" id="RequestBTN" class="btn btn-primary">Submit Form</button>
                                </div>
                            </div>
                        </form>
                        <script>
                            $(document).ready(function() {
                                $("#RequestBTN").on("click", function() {
                                    var formData = new FormData($("#ICTRequest")[0]);
                                    Swal.fire({
                                        title: "Loading",
                                        html: "Please wait...",
                                        allowOutsideClick: false,
                                        didOpen: () => {
                                            Swal.showLoading();
                                        }
                                    });
                                    $.ajax({
                                        type: "POST",
                                        url: "includes/process.php",
                                        data: formData,
                                        contentType: false,
                                        processData: false,
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
    </section>

</main><!-- End #main -->
<?php
require_once "components/footer.php";
?>