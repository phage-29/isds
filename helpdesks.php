<?php
$page = "Helpdesks";
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
            <h5 class="card-title">Datatables</h5>
            <p class="d-inline-flex gap-1 text-end">
              <button class="btn btn-primary" data-bs-toggle="collapse" href="#filter" role="button">Toggle first element</button>
            </p>
            <div class="row">
              <div class="col">
                <div class="collapse multi-collapse" id="filter">
                  <div id="table_filter" class="dataTables_filter">
                    <form class="small row">
                      <div class="mb-3 col-lg-6">
                        <label for="s tartDate" class="form-label">From Date:</label>
                        <input type="date" class="form-control" id="startDate" name="startDate" placeholder="Select From Date" autocomplete="off">
                      </div>

                      <div class="mb-3 col-lg-6">
                        <label for="endDate" class="form-label">To Date:</label>
                        <input type="date" class="form-control" id="endDate" name="endDate" placeholder="Select To Date" autocomplete="off">
                      </div>
                      <div class="mb-3 col-lg-4">
                        <label for="category" class="form-label">Category:</label>
                        <select class="form-select" id="category" name="category">
                          <option value="" selected disabled>--</option>
                        </select>
                      </div>
                      <div class="mb-3 col-lg-4">
                        <label for="subCategory" class="form-label">Sub Category:</label>
                        <select class="form-select" id="subCategory" name="subCategory">
                          <option id="" value="" selected disabled>--</option>
                        </select>
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
                      <div class="mb-3 col-lg-4">
                        <label for="status" class="form-label">Status:</label>
                        <select class="form-select" id="status" name="status">
                          <option id="" value="" selected disabled>--</option>
                          <option value="Pending" class="text-warning">Pending</option>
                          <option value="On Going" class="text-primary">On Going</option>
                          <option value="Completed" class="text-success">Completed</option>
                          <option value="Denied" class="text-danger">Denied</option>
                          <option value="Cancelled" class="text-secondary">Cancelled</option>
                          <option value="Unserviceable" class="text-info">Unserviceable</option>
                        </select>
                      </div>

                      <div class="mb-3 text-end">
                        <label for="endDate" class="form-label"></label>
                        <input type="hidden" name="Filter" />
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <!-- Table with stripped rows -->
            <table id="table" class="table w-100">
              <thead>
                <tr>
                  <th class="text-nowrap">Request No.</th>
                  <th class="text-nowrap">Status</th>
                  <th class="text-nowrap">Division/Office</th>
                  <th class="text-nowrap">Requestor</th>
                  <th class="text-nowrap">Category</th>
                  <th class="text-nowrap">Date</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="text-nowrap">REQ-202311-00001</td>
                  <td class="text-nowrap"><span class="badge bg-primary">On Going</span></td>
                  <td class="text-nowrap">ORD</td>
                  <td class="text-nowrap">Jane Doe</td>
                  <td class="text-nowrap">ICT Equipment Service</td>
                  <td class="text-nowrap">24/11/2023</td>
                </tr>
              </tbody>
              <tbody>

              </tbody>
            </table>
            <!-- End Table with stripped rows -->
            <script>
              $(document).ready(function() {
                new DataTable('#table', {
                  colReorder: true,
                  responsive: true,
                  // searching: false
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