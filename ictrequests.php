<?php
$page = "My ICT Request";
require_once "includes/session.php";
require_once "components/header.php";
require_once "components/topbar.php";
require_once "components/sidebar.php";
switch ($_SESSION['Role']) {
    case 'Employee':
?>
        <main id="main" class="main">

            <section class="section">
                <div class="row">
                    <div class="col-lg-12">

                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Requests</h5>
                                <nav>
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                        <button class="nav-link text-primary active" id="nav-open-tab" data-bs-toggle="tab" data-bs-target="#nav-open" type="button" role="tab" aria-controls="nav-open" aria-selected="true">Open</button>
                                        <button class="nav-link text-warning" id="nav-pending-tab" data-bs-toggle="tab" data-bs-target="#nav-pending" type="button" role="tab" aria-controls="nav-pending" aria-selected="false">Pending</button>
                                        <button class="nav-link text-success" id="nav-completed-tab" data-bs-toggle="tab" data-bs-target="#nav-completed" type="button" role="tab" aria-controls="nav-completed" aria-selected="false">Completed</button>
                                        <button class="nav-link text-secondary" id="nav-denied-tab" data-bs-toggle="tab" data-bs-target="#nav-denied" type="button" role="tab" aria-controls="nav-denied" aria-selected="false">Denied</button>
                                        <button class="nav-link text-danger" id="nav-unserviceable-tab" data-bs-toggle="tab" data-bs-target="#nav-unserviceable" type="button" role="tab" aria-controls="nav-unserviceable" aria-selected="false">Unserviceable</button>
                                        <button class="nav-link text-danger" id="nav-cancelled-tab" data-bs-toggle="tab" data-bs-target="#nav-cancelled" type="button" role="tab" aria-controls="nav-cancelled" aria-selected="false">Cancelled</button>
                                        <button class="nav-link text-info" id="nav-prerepair-tab" data-bs-toggle="tab" data-bs-target="#nav-prerepair" type="button" role="tab" aria-controls="nav-prerepair" aria-selected="false">Pre-Repair</button>
                                    </div>
                                </nav>
                                <div class="tab-content" id="nav-tabContent">
                                    <div class="m-3 tab-pane fade show active" id="nav-open" role="tabpanel" aria-labelledby="nav-open-tab" tabindex="0">
                                        <table id="tableopen" class="table w-100">
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
                                    </div>
                                    <div class="m-3 tab-pane fade" id="nav-pending" role="tabpanel" aria-labelledby="nav-pending-tab" tabindex="0">
                                        <table id="tablepending" class="table w-100">
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
                                    </div>
                                    <div class="m-3 tab-pane fade" id="nav-completed" role="tabpanel" aria-labelledby="nav-completed-tab" tabindex="0">
                                        <table id="tablecompleted" class="table w-100">
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
                                    </div>
                                    <div class="m-3 tab-pane fade" id="nav-denied" role="tabpanel" aria-labelledby="nav-denied-tab" tabindex="0">
                                        <table id="tabledenied" class="table w-100">
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
                                    </div>
                                    <div class="m-3 tab-pane fade" id="nav-unserviceable" role="tabpanel" aria-labelledby="nav-unserviceable-tab" tabindex="0">
                                        <table id="tableunserviceable" class="table w-100">
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
                                    </div>
                                    <div class="m-3 tab-pane fade" id="nav-cancelled" role="tabpanel" aria-labelledby="nav-cancelled-tab" tabindex="0">
                                        <table id="tablecancelled" class="table w-100">
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
                                    </div>
                                    <div class="m-3 tab-pane fade" id="nav-prerepair" role="tabpanel" aria-labelledby="nav-prerepair-tab" tabindex="0">
                                        <table id="tableprerepair" class="table w-100">
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
                                    </div>
                                </div>
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

                                                $('#RequestType').val(response.RequestType);
                                                $('#ServicePriority').val(response.ServicePriority);
                                                $('#RepairType').val(response.RepairType);
                                                $('#RepairClassification').val(response.RepairClassification);
                                                $('#AssignedStaff').val(response.AssignedStaff);
                                                $('#DateReceived').val(response.DateReceived);
                                                $('#DateScheduled').val(response.DateScheduled);
                                                $('#DatetimeStarted').val(response.DatetimeStarted);
                                                $('#DatetimeFinished').val(response.DatetimeFinished);
                                                $('#Diagnosis').val(response.Diagnosis);
                                                $('#Remarks').val(response.Remarks);
                                                $('#ServicedBy').val(response.ServicedBy);


                                                switch (response.Status) {
                                                    case 'Open':
                                                        $('#Status').html("(<strong class='text-primary'>" + response.Status + "</strong>)");
                                                        $('#Status2').html("(<strong class='text-primary'>" + response.Status + "</strong>)");
                                                        break;
                                                    case 'Pending':
                                                    case 'Pre-Repair':
                                                        $('#Status').html("(<strong class='text-warning'>" + response.Status + "</strong>)");
                                                        $('#Status2').html("(<strong class='text-warning'>" + response.Status + "</strong>)");
                                                        break;
                                                    case 'Completed':
                                                        $('#Status').html("(<strong class='text-success'>" + response.Status + "</strong>)");
                                                        $('#Status2').html("(<strong class='text-success'>" + response.Status + "</strong>)");
                                                        break;
                                                    case 'Denied':
                                                    case 'Cancelled':
                                                    case 'Unserviceable':
                                                        $('#Status').html("(<strong class='text-danger'>" + response.Status + "</strong>)");
                                                        $('#Status2').html("(<strong class='text-danger'>" + response.Status + "</strong>)");
                                                        break;
                                                }

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
                                        $('#HelpdeskID').val(id);
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

                                    $(document).ready(function() {
                                        // Function to initialize DataTable
                                        function initializeDataTable(tableId, status) {
                                            new DataTable(`#${tableId}`, {
                                                'processing': true,
                                                'serverSide': true,
                                                'serverMethod': 'post',
                                                'responsive': true,
                                                'order': [
                                                    [0, 'desc']
                                                ],
                                                'ajax': {
                                                    'url': 'includes/fetchData/ictrequests.php',
                                                    'data': {
                                                        Status: status
                                                    },
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

                                            $("#CSF").submit(function(e) {
                                                e.preventDefault();
                                                processForm("#CSF");
                                            });
                                        }

                                        // Call the function for each tab
                                        initializeDataTable('tableopen', 'Open');
                                        initializeDataTable('tablepending', 'Pending');
                                        initializeDataTable('tablecompleted', 'Completed');
                                        initializeDataTable('tabledenied', 'Denied');
                                        initializeDataTable('tableunserviceable', 'Unserviceable');
                                        initializeDataTable('tablecancelled', 'Cancelled');
                                        initializeDataTable('tableprerepair', 'Pre-Repair');
                                    });
                                </script>
                                <!-- Modals -->
                                <div class="modal fade" id="RequestDetails" tabindex="-1" aria-labelledby="RequestDetailsLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="RequestDetailsLabel">Request Overview <span id="Status2"></span></h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
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
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#RequestStatus">View Status</button>
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal fade" id="RequestStatus" tabindex="-1" aria-labelledby="RequestDetailsLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-scrollable">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="RequestDetailsLabel">Request Status <span id="Status"></span></h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="row mb-3 col-6 m-0 p-0">
                                                        <label class="col-form-label">Request Type</label>
                                                        <div class="">
                                                            <input class="form-control bg-white" id="RequestType" name="RequestType" disabled />
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3 col-6 m-0 p-0">
                                                        <label class="col-form-label">Priority</label>
                                                        <div class="">
                                                            <input class="form-control bg-white" id="ServicePriority" name="ServicePriority" disabled />
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3 col-6 m-0 p-0">
                                                        <label class="col-form-label">Repair Type</label>
                                                        <div class="">
                                                            <input class="form-control bg-white" id="RepairType" name="RepairType" disabled />
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3 col-6 m-0 p-0">
                                                        <label class="col-form-label">Repair Classification</label>
                                                        <div class="">
                                                            <input class="form-control bg-white" id="RepairClassification" name="RepairClassification" disabled />
                                                        </div>
                                                    </div>

                                                    <div class="row mb-3 col-12 m-0 p-0">
                                                        <label class="col-form-label">Assigned Staff</label>
                                                        <div class="">
                                                            <select class="form-select bg-white" id="AssignedStaff" name="AssignedStaff" disabled>
                                                                <?php
                                                                $result = $conn->query("SELECT * FROM users");
                                                                while ($row = $result->fetch_object()) {
                                                                ?>
                                                                    <option value="<?= $row->id ?>"><?= $row->FirstName ?> <?= $row->LastName ?></option>
                                                                <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="row mb-3 col-6 m-0 p-0">
                                                        <label class="col-form-label">Date Received</label>
                                                        <div class="">
                                                            <input type="datetime-local" class="form-control bg-white" id="DateReceived" name="DateReceived" disabled>
                                                        </div>
                                                    </div>

                                                    <div class="row mb-3 col-6 m-0 p-0">
                                                        <label class="col-form-label">Date Scheduled</label>
                                                        <div class="">
                                                            <input type="datetime-local" class="form-control bg-white" id="DateScheduled" name="DateScheduled" disabled>
                                                        </div>
                                                    </div>

                                                    <div class="row mb-3 col-12 m-0 p-0">
                                                        <label class="col-form-label">Datetime Started</label>
                                                        <div class="">
                                                            <input type="datetime-local" class="form-control bg-white" id="DatetimeStarted" name="DatetimeStarted" disabled>
                                                        </div>
                                                    </div>

                                                    <div class="row mb-3 col-12 m-0 p-0">
                                                        <label class="col-form-label">Datetime Finished</label>
                                                        <div class="">
                                                            <input type="datetime-local" class="form-control bg-white" id="DatetimeCompleted" name="DatetimeCompleted" disabled>
                                                        </div>
                                                    </div>

                                                    <div class="row mb-3 col-12 m-0 p-0">
                                                        <label class="col-form-label">Diagnosis</label>
                                                        <div class="">
                                                            <textarea class="form-control bg-white" id="Diagnosis" name="Diagnosis" style="height: 100px" disabled></textarea>
                                                        </div>
                                                    </div>

                                                    <div class="row mb-3 col-12 m-0 p-0">
                                                        <label class="col-form-label">Remarks</label>
                                                        <div class="">
                                                            <textarea class="form-control bg-white" id="Remarks" name="Remarks" style="height: 100px" disabled></textarea>
                                                        </div>
                                                    </div>

                                                    <div class="row mb-3 col-12 m-0 p-0">
                                                        <label class="col-form-label">Serviced By</label>
                                                        <div class="">
                                                            <select class="form-select bg-white" id="ServicedBy" name="ServicedBy" disabled>
                                                                <?php
                                                                $result = $conn->query("SELECT * FROM users");
                                                                while ($row = $result->fetch_object()) {
                                                                ?>
                                                                    <option value="<?= $row->id ?>"><?= $row->FirstName ?> <?= $row->LastName ?></option>
                                                                <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#RequestDetails">View Details</button>
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
                                            <form id="CSF" class="modal-content">
                                                <div class="modal-body">
                                                    <div class="row mb-3">
                                                        <div class="col-lg-6 d-none d-md-block">
                                                            <strong>Criteria for rating</strong>
                                                        </div>
                                                        <div class="col-lg-6 row">
                                                            <div class="col-3 fs-1"><strong><i class="bi bi-emoji-smile"></i></strong></div>
                                                            <div class="col-3 fs-1"><strong><i class="bi bi-emoji-neutral"></i></strong></div>
                                                            <div class="col-3 fs-1"><strong><i class="bi bi-emoji-frown"></i></strong></div>
                                                            <div class="col-3 fs-1"><strong><i class="bi bi-emoji-angry"></i></strong></div>
                                                        </div>
                                                    </div>
                                                    <div class="row border-top mb-3">
                                                        <div class="col-lg-6">
                                                            <p>RESPONSIVENESS, ASSURANCE, AND INTEGRITY</p>
                                                            <!-- <p class="small">Delivery of services are on time, friendly, courteous, fair and in a professional manner.</p> -->

                                                        </div>
                                                        <div class="col-lg-6 row">
                                                            <div class="col-3 d-flex justify-content-center">
                                                                <div class="form-check form-check-inline text-center">
                                                                    <input type="checkbox" name="Rating1" value="4" class="form-check-input fs-1">
                                                                </div>
                                                            </div>
                                                            <div class="col-3 d-flex justify-content-center">
                                                                <div class="form-check form-check-inline text-center">
                                                                    <input type="checkbox" name="Rating1" value="3" class="form-check-input fs-1">
                                                                </div>
                                                            </div>
                                                            <div class="col-3 d-flex justify-content-center">
                                                                <div class="form-check form-check-inline text-center">
                                                                    <input type="checkbox" name="Rating1" value="2" class="form-check-input fs-1">
                                                                </div>
                                                            </div>
                                                            <div class="col-3 d-flex justify-content-center">
                                                                <div class="form-check form-check-inline text-center">
                                                                    <input type="checkbox" name="Rating1" value="1" class="form-check-input fs-1">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <script>
                                                            $(document).ready(function() {
                                                                $('input[name="Rating1"]').change(function() {
                                                                    if ($(this).is(':checked')) {
                                                                        $('input[name="Rating1"]').not(this).prop('checked', false);
                                                                    }
                                                                });
                                                            });
                                                        </script>


                                                    </div>
                                                    <div class="row border-top mb-3">
                                                        <div class="col-lg-6">
                                                            <p>RELIABILITY AND OUTCOME</p>
                                                        </div>
                                                        <div class="col-lg-6 row">
                                                            <div class="col-3 d-flex justify-content-center">
                                                                <div class="form-check form-check-inline text-center">
                                                                    <input type="checkbox" name="Rating2" value="4" class="form-check-input fs-1">
                                                                </div>
                                                            </div>
                                                            <div class="col-3 d-flex justify-content-center">
                                                                <div class="form-check form-check-inline text-center">
                                                                    <input type="checkbox" name="Rating2" value="3" class="form-check-input fs-1">
                                                                </div>
                                                            </div>
                                                            <div class="col-3 d-flex justify-content-center">
                                                                <div class="form-check form-check-inline text-center">
                                                                    <input type="checkbox" name="Rating2" value="2" class="form-check-input fs-1">
                                                                </div>
                                                            </div>
                                                            <div class="col-3 d-flex justify-content-center">
                                                                <div class="form-check form-check-inline text-center">
                                                                    <input type="checkbox" name="Rating2" value="1" class="form-check-input fs-1">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <script>
                                                            $(document).ready(function() {
                                                                $('input[name="Rating2"]').change(function() {
                                                                    if ($(this).is(':checked')) {
                                                                        $('input[name="Rating2"]').not(this).prop('checked', false);
                                                                    }
                                                                });
                                                            });
                                                        </script>

                                                    </div>
                                                    <div class="row border-top mb-3">
                                                        <div class="col-lg-6">
                                                            <p>ACCESS AND FACILITIES</p>
                                                        </div>
                                                        <div class="col-lg-6 row">
                                                            <div class="col-3 d-flex justify-content-center">
                                                                <div class="form-check form-check-inline text-center">
                                                                    <input type="checkbox" name="Rating3" value="4" class="form-check-input fs-1">
                                                                </div>
                                                            </div>
                                                            <div class="col-3 d-flex justify-content-center">
                                                                <div class="form-check form-check-inline text-center">
                                                                    <input type="checkbox" name="Rating3" value="3" class="form-check-input fs-1">
                                                                </div>
                                                            </div>
                                                            <div class="col-3 d-flex justify-content-center">
                                                                <div class="form-check form-check-inline text-center">
                                                                    <input type="checkbox" name="Rating3" value="2" class="form-check-input fs-1">
                                                                </div>
                                                            </div>
                                                            <div class="col-3 d-flex justify-content-center">
                                                                <div class="form-check form-check-inline text-center">
                                                                    <input type="checkbox" name="Rating3" value="1" class="form-check-input fs-1">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <script>
                                                            $(document).ready(function() {
                                                                $('input[name="Rating3"]').change(function() {
                                                                    if ($(this).is(':checked')) {
                                                                        $('input[name="Rating3"]').not(this).prop('checked', false);
                                                                    }
                                                                });
                                                            });
                                                        </script>

                                                    </div>
                                                    <div class="row border-top mb-3">
                                                        <div class="col-lg-6">
                                                            <p>COMMUNICATION</p>
                                                        </div>
                                                        <div class="col-lg-6 row">
                                                            <div class="col-3 d-flex justify-content-center">
                                                                <div class="form-check form-check-inline text-center">
                                                                    <input type="checkbox" name="Rating4" value="4" class="form-check-input fs-1">
                                                                </div>
                                                            </div>
                                                            <div class="col-3 d-flex justify-content-center">
                                                                <div class="form-check form-check-inline text-center">
                                                                    <input type="checkbox" name="Rating4" value="3" class="form-check-input fs-1">
                                                                </div>
                                                            </div>
                                                            <div class="col-3 d-flex justify-content-center">
                                                                <div class="form-check form-check-inline text-center">
                                                                    <input type="checkbox" name="Rating4" value="2" class="form-check-input fs-1">
                                                                </div>
                                                            </div>
                                                            <div class="col-3 d-flex justify-content-center">
                                                                <div class="form-check form-check-inline text-center">
                                                                    <input type="checkbox" name="Rating4" value="1" class="form-check-input fs-1">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <script>
                                                            $(document).ready(function() {
                                                                $('input[name="Rating4"]').change(function() {
                                                                    if ($(this).is(':checked')) {
                                                                        $('input[name="Rating4"]').not(this).prop('checked', false);
                                                                    }
                                                                });
                                                            });
                                                        </script>

                                                    </div>
                                                    <div class="row border-top mb-3">
                                                        <div class="col-lg-6">
                                                            <p>OVERALL SATISFACTION RATING</p>
                                                        </div>
                                                        <div class="col-lg-6 row">
                                                            <div class="col-3 d-flex justify-content-center">
                                                                <div class="form-check form-check-inline text-center">
                                                                    <input type="checkbox" name="Rating5" value="4" class="form-check-input fs-1">
                                                                </div>
                                                            </div>
                                                            <div class="col-3 d-flex justify-content-center">
                                                                <div class="form-check form-check-inline text-center">
                                                                    <input type="checkbox" name="Rating5" value="3" class="form-check-input fs-1">
                                                                </div>
                                                            </div>
                                                            <div class="col-3 d-flex justify-content-center">
                                                                <div class="form-check form-check-inline text-center">
                                                                    <input type="checkbox" name="Rating5" value="2" class="form-check-input fs-1">
                                                                </div>
                                                            </div>
                                                            <div class="col-3 d-flex justify-content-center">
                                                                <div class="form-check form-check-inline text-center">
                                                                    <input type="checkbox" name="Rating5" value="1" class="form-check-input fs-1">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <script>
                                                            $(document).ready(function() {
                                                                $('input[name="Rating5"]').change(function() {
                                                                    if ($(this).is(':checked')) {
                                                                        $('input[name="Rating5"]').not(this).prop('checked', false);
                                                                    }
                                                                });
                                                            });
                                                        </script>

                                                    </div>
                                                    <div class="row mb-3">
                                                        <label class="col-form-label">Please write in the space below your reason/s for your "DISSATISFIED" of "VERY DISSATISFIED" rating.</label>
                                                        <div class="">
                                                            <textarea class="form-control" id="Comment" name="Comment" style="height: 100px"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label class="col-form-label">Please give comments/suggestions to help us improve our service/s.</label>
                                                        <div class="">
                                                            <textarea class="form-control" id="Suggestion" name="Suggestion" style="height: 100px"></textarea>
                                                        </div>
                                                    </div>
                                                    <input type="hidden" name="HelpdeskID" id="HelpdeskID" />
                                                    <input type="hidden" name="CSF" />
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Table with stripped rows -->

                            </div>
                        </div>

                    </div>
                </div>
            </section>

        </main><!-- End #main -->
    <?php
        break;
    default:
    ?>
        <main id="main" class="main">

            <section class="section">
                <div class="row">
                    <div class="col-lg-12">

                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title text-center">This page is not available</h5>
                            </div>
                        </div>

                    </div>
                </div>
            </section>

        </main><!-- End #main -->
<?php
        break;
}

require_once "components/footer.php";
?>