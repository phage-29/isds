<?php
$page = "My ICT Request";
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
                        <script>
                            function ehid(id) {
                                // alert('Editted:' + id)
                                $.ajax({
                                    type: "GET",
                                    url: "includes/fetchData/editictrequest.php",
                                    data: {
                                        id: id,
                                        EditICTRequest: ''
                                    },
                                    dataType: 'json',
                                    success: function(response) {
                                        $('#CategoryID').val(response.CategoryID);
                                        $('#SubCategoryID').val(response.SubCategoryID);
                                        $('#PreferredSchedule').val(response.PreferredSchedule);
                                        $('#Complaint').val(response.Complaint);
                                    },
                                    error: function(error) {
                                        console.log(error)
                                    },
                                });
                                $('#RequestDetails').modal('toggle');
                                $('#RequestDetails').modal('show');
                            }

                            function csfhid(id) {
                                // alert('Editted:' + id)
                                // ajax
                                $('#RequestCSF').modal('toggle');
                                $('#RequestCSF').modal('show');
                            }

                            function chid(id) {
                                Swal.fire({
                                    title: "Are you sure?",
                                    text: "You are trying to cancel this request.",
                                    icon: "warning",
                                    showCancelButton: true,
                                    confirmButtonColor: "#3085d6",
                                    cancelButtonColor: "#d33",
                                    confirmButtonText: "Yes, cancel it!"
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        Swal.fire({
                                            title: "Loading",
                                            html: "Please wait...",
                                            allowOutsideClick: false,
                                            didOpen: () => {
                                                Swal.showLoading();
                                            }
                                        });

                                        var formData = {
                                            id: id,
                                            CancelICTRequest: ''
                                        };
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
                                    }
                                });
                            }
                        </script>
                        <table id="table" class="table w-100">
                            <thead>
                                <tr>
                                    <th class="text-nowrap">Request No.</th>
                                    <th class="text-nowrap">Status</th>
                                    <th class="text-nowrap">Division/Office</th>
                                    <th class="text-nowrap">Category</th>
                                    <th class="text-nowrap">Date</th>
                                    <th class="text-nowrap">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                        <!-- Modals -->
                        <div class="modal fade" id="RequestDetails" tabindex="-1" aria-labelledby="RequestDetailsLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="RequestDetailsLabel">Request Overview</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <nav>
                                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                                <button class="nav-link active" id="nav-request-tab" data-bs-toggle="tab" data-bs-target="#nav-request" type="button" role="tab" aria-controls="nav-request" aria-selected="true">request</button>
                                                <button class="nav-link" id="nav-status-tab" data-bs-toggle="tab" data-bs-target="#nav-status" type="button" role="tab" aria-controls="nav-status" aria-selected="false">status</button>
                                            </div>
                                        </nav>
                                        <div class="tab-content" id="nav-tabContent">
                                            <div class="tab-pane fade show active" id="nav-request" role="tabpanel" aria-labelledby="nav-request-tab" tabindex="0">
                                                <!-- <form id="EditICTRequest" enctype="multipart/form-data"> -->
                                                <div class="row mb-3">
                                                    <label class="col-form-label">Nature of Complaint</label>
                                                    <div class="">
                                                        <select class="form-select bg-white" id="CategoryID" name="CategoryID" disabled>
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
                                                    <label class="col-form-label">Complaint/s Category</label>
                                                    <div class="">
                                                        <select class="form-select bg-white" id="SubCategoryID" name="SubCategoryID" disabled>
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

                                                <div class="row mb-3">
                                                    <label class="col-form-label">Preferred Date & Time</label>
                                                    <div class="">
                                                        <input type="datetime-local" class="form-control bg-white" id="PreferredSchedule" name="PreferredSchedule" disabled>
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <label class="col-form-label">Defects/Compliants</label>
                                                    <div class="">
                                                        <textarea class="form-control bg-white" id="Complaint" name="Complaint" style="height: 100px" disabled></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade bg-white" id="nav-status" role="tabpanel" aria-labelledby="nav-status-tab" tabindex="0">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="RequestCSF" tabindex="-1" aria-labelledby="RequestCSFLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="RequestCSFLabel">Client Satisfaction Form</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">

                                        <div class="row mb-3">
                                            <div class="col-lg-6">
                                                <strong>Criteria for rating</strong>
                                            </div>
                                            <div class="col-lg-6 row">
                                                <div class="col-3 text-center"><strong>VS</strong></div>
                                                <div class="col-3 text-center"><strong>S</strong></div>
                                                <div class="col-3 text-center"><strong>D</strong></div>
                                                <div class="col-3 text-center"><strong>VD</strong></div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <p>RESPONSIVENESS, ASSURANCE, AND INTEGRITY</p>
                                                <!-- <p class="small">Delivery of services are on time, friendly, courteous, fair and in a professional manner.</p> -->

                                            </div>
                                            <div class="col-lg-6 row">
                                                <div class="verysatisfied col-3 fs-1 text-center" onclick="alert('verysatisfied')"><i class="bi bi-emoji-smile"></i></div>
                                                <div class="satisfied col-3 fs-1 text-center" onclick="alert('satisfied')"><i class="bi bi-emoji-neutral"></i></div>
                                                <div class="dissatisfied col-3 fs-1 text-center" onclick="alert('dissatisfied')"><i class="bi bi-emoji-frown"></i></div>
                                                <div class="verydisatisfied col-3 fs-1 text-center" onclick="alert('verydisatisfied')"><i class="bi bi-emoji-angry"></i></div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <p>RELIABILITY AND OUTCOME</p>
                                            </div>
                                            <div class="col-lg-6 row">
                                                <div class="col-3 fs-1 text-center"><i class="bi bi-emoji-smile"></i></div>
                                                <div class="col-3 fs-1 text-center"><i class="bi bi-emoji-neutral"></i></div>
                                                <div class="col-3 fs-1 text-center"><i class="bi bi-emoji-frown"></i></div>
                                                <div class="col-3 fs-1 text-center"><i class="bi bi-emoji-angry"></i></div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <p>ACCESS AND FACILITIES</p>
                                            </div>
                                            <div class="col-lg-6 row">
                                                <div class="col-3 fs-1 text-center"><i class="bi bi-emoji-smile"></i></div>
                                                <div class="col-3 fs-1 text-center"><i class="bi bi-emoji-neutral"></i></div>
                                                <div class="col-3 fs-1 text-center"><i class="bi bi-emoji-frown"></i></div>
                                                <div class="col-3 fs-1 text-center"><i class="bi bi-emoji-angry"></i></div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-lg-6">
                                                <p>COMMUNICATION</p>
                                            </div>
                                            <div class="col-lg-6 row">
                                                <div class="col-3 fs-1 text-center"><i class="bi bi-emoji-smile"></i></div>
                                                <div class="col-3 fs-1 text-center"><i class="bi bi-emoji-neutral"></i></div>
                                                <div class="col-3 fs-1 text-center"><i class="bi bi-emoji-frown"></i></div>
                                                <div class="col-3 fs-1 text-center"><i class="bi bi-emoji-angry"></i></div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-lg-6">
                                                <p>OVERALL SATISFACTION RATING</p>
                                            </div>
                                            <div class="col-lg-6 row">
                                                <div class="col-3 fs-1 text-center"><i class="bi bi-emoji-smile"></i></div>
                                                <div class="col-3 fs-1 text-center"><i class="bi bi-emoji-neutral"></i></div>
                                                <div class="col-3 fs-1 text-center"><i class="bi bi-emoji-frown"></i></div>
                                                <div class="col-3 fs-1 text-center"><i class="bi bi-emoji-angry"></i></div>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-form-label">Please write in the space below your reason/s for your "DISSATISFIED" of "VERY DISSATISFIED" rating.</label>
                                            <div class="">
                                                <textarea class="form-control" id="Complaint" name="Complaint" style="height: 100px"></textarea>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-form-label">Please give comments/suggestions to help us improve our service/s.</label>
                                            <div class="">
                                                <textarea class="form-control" id="Complaint" name="Complaint" style="height: 100px"></textarea>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Table with stripped rows -->
                        <script>
                            $(document).ready(function() {
                                new DataTable('#table', {
                                    'processing': true,
                                    'serverSide': true,
                                    'serverMethod': 'post',
                                    'responsive': true,
                                    'order': [
                                        [0, 'desc']
                                    ],
                                    'ajax': {
                                        'url': 'includes/fetchData/ictrequests.php'
                                    },
                                    'columns': [{
                                            data: 'RequestNo'
                                        },
                                        {
                                            data: 'Status'
                                        },
                                        {
                                            data: 'Division'
                                        },
                                        {
                                            data: 'Category'
                                        },
                                        {
                                            data: 'Date'
                                        },
                                        {
                                            data: 'Action'
                                        }
                                    ]
                                });
                            })
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