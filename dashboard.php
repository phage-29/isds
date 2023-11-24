<?php
$page = "Dashboard";
require_once "includes/session.php";
require_once "components/header.php";
require_once "components/topbar.php";
require_once "components/sidebar.php";
?>

<main id="main" class="main">

  <section class="section dashboard">
    <div class="row">

      <!-- Left side columns -->
      <div class="col-lg-12">
        <div class="row">
          <!-- Customers Card -->
          <div class="col-xxl-4 col-xl-12">

            <div class="card info-card customers-card">

              <div class="card-body">
                <h5 class="card-title">Pending Requests</h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-people-fill"></i>
                  </div>
                  <div class="ps-3">
                    <h6 id="CountPending" data-target="" class="count"></h6>
                  </div>
                </div>

              </div>
            </div>
          </div><!-- End Customers Card -->

          <!-- Sales Card -->
          <div class="col-xxl-4 col-md-6">
            <div class="card info-card sales-card">

              <div class="card-body">
                <h5 class="card-title">On Going Requests</h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-people-fill"></i>
                  </div>
                  <div class="ps-3">
                    <h6 id="CountOnGoing" data-target="" class="count"></h6>
                  </div>
                </div>
              </div>

            </div>
          </div><!-- End Sales Card -->

          <!-- Revenue Card -->
          <div class="col-xxl-4 col-md-6">
            <div class="card info-card revenue-card">

              <div class="card-body">
                <h5 class="card-title">Completed Requests</h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-people-fill"></i>
                  </div>
                  <div class="ps-3">
                    <h6 id="CountCompleted" data-target="" class="count"></h6>
                  </div>
                </div>
              </div>

            </div>
          </div><!-- End Revenue Card -->

          <div class="col-lg-6">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title"></h5>

                <!-- Line Chart -->
                <div id="lineChart"></div>
                <!-- End Line Chart -->

              </div>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title"></h5>

                <!-- Bar Chart -->
                <div id="barChart"></div>
                <!-- End Bar Chart -->

              </div>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title"></h5>

                <!-- Pie Chart -->
                <div id="pieChart"></div>
                <!-- End Pie Chart -->

              </div>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title"></h5>

                <!-- Donut Chart -->
                <div id="donutChart"></div>
                <!-- End Donut Chart -->

              </div>
            </div>
          </div>

        </div>
      </div><!-- End Left side columns -->


      <script>
        $(document).ready(function() {
          $.ajax({
            type: "GET",
            url: "includes/process.php",
            data: {
              Dashboard: ''
            },
            dataType: 'json',
            success: function(response) {

              // widget counts
              $("#CountPending").html(response.CountPending);
              console.log(response.CountPending);

              $("#CountOnGoing").html(response.CountOnGoing);
              console.log(response.CountOnGoing);

              $("#CountCompleted").html(response.CountCompleted);
              console.log(response.CountCompleted);

              // line chart
              new ApexCharts($("#lineChart")[0], {
                title: {
                  text: 'MONTHLY ICT SERVICES',
                  align: 'left',
                },
                subtitle: {
                  text: 'Displaying Monthly ICT Services Through Line Graph',
                  align: 'left',
                },
                series: [{
                  name: "Desktops",
                  data: response.monthscount
                }],
                chart: {
                  height: 350,
                  type: 'line',
                  zoom: {
                    enabled: false
                  }
                },
                dataLabels: {
                  enabled: false
                },
                stroke: {
                  curve: 'straight'
                },
                grid: {
                  row: {
                    colors: ['#f3f3f3', 'transparent'],
                    opacity: 0.5
                  },
                },
                xaxis: {
                  categories: response.months,
                }
              }).render();

              // bar chart
              new ApexCharts($("#barChart")[0], {
                title: {
                  text: 'ICT SERVICES PER DIVISIONS',
                  align: 'left',
                },
                subtitle: {
                  text: 'Displaying ICT Services Across Divisions Through Bar Graph',
                  align: 'left',
                },
                series: [{
                  data: response.divisionscount
                }],
                chart: {
                  type: 'bar',
                  height: 350
                },
                plotOptions: {
                  bar: {
                    borderRadius: 4,
                    horizontal: true,
                  }
                },
                dataLabels: {
                  enabled: false
                },
                xaxis: {
                  categories: response.divisions,
                }
              }).render();

              new ApexCharts($("#pieChart")[0], {
                title: {
                  text: 'ICT SERVICES BY CATEGORY',
                  align: 'left',
                },
                subtitle: {
                  text: 'Displaying ICT Services By Category Through Pie Chart',
                  align: 'left',
                },
                series: response.categoriescount,
                chart: {
                  height: 350,
                  type: 'pie',
                  toolbar: {
                    show: true
                  }
                },
                labels: response.categories
              }).render();

              new ApexCharts($("#donutChart")[0], {
                title: {
                  text: 'ICT SERVICES BY STATUS',
                  align: 'left',
                },
                subtitle: {
                  text: 'Displaying ICT Services By Status Through Donut Chart',
                  align: 'left',
                },
                series: response.statuscount,
                chart: {
                  height: 350,
                  type: 'donut',
                  toolbar: {
                    show: true
                  }
                },
                labels: response.status,
              }).render();
            },
            error: function(error) {
              // Handle errors here
              console.log("Error:", error);
            },
          });
        });
      </script>

    </div>
  </section>

</main><!-- End #main -->

<?php
require_once "components/footer.php";
?>