<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/dataTables.bootstrap5.min.css" />
    <style>
      @import url("https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap");
        body,
        button {
        font-family: "Inter", sans-serif;
        }
        :root {
        --offcanvas-width: 270px;
        --topNavbarHeight: 56px;
        }
        .sidebar-nav {
        width: var(--offcanvas-width);
        }
        .sidebar-link {
        display: flex;
        align-items: center;
        }
        .sidebar-link .right-icon {
        display: inline-flex;
        }
        .sidebar-link[aria-expanded="true"] .right-icon {
        transform: rotate(180deg);
        }
        @media (min-width: 992px) {
        body {
          overflow: auto !important;
        }
        main {
          margin-left: var(--offcanvas-width);
        }
        /* this is to remove the backdrop */
        .offcanvas-backdrop::before {
          display: none;
        }
        .sidebar-nav {
          -webkit-transform: none;
          transform: none;
          visibility: visible !important;
          height: calc(100% - var(--topNavbarHeight));
          top: var(--topNavbarHeight);
        }
        }
    </style>
    <title>Admin Panel</title>
  </head>
  <body>
    <!-- top navigation bar -->
    <x-admin-nav></x-admin-nav>
    <!-- top navigation bar -->
    <x-admin-side-bar></x-admin-side-bar>


    {{$slot}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="./js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
    <script src="./js/jquery-3.5.1.js"></script>
    <script src="./js/jquery.dataTables.min.js"></script>
    <script src="./js/dataTables.bootstrap5.min.js"></script>
    <script>
    const charts = document.querySelectorAll(".chart");

charts.forEach(function (chart) {
  var ctx = chart.getContext("2d");
  var myChart = new Chart(ctx, {
    type: "bar",
    data: {
      labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
      datasets: [
        {
          label: "# of Votes",
          data: [12, 19, 3, 5, 2, 3],
          backgroundColor: [
            "rgba(255, 99, 132, 0.2)",
            "rgba(54, 162, 235, 0.2)",
            "rgba(255, 206, 86, 0.2)",
            "rgba(75, 192, 192, 0.2)",
            "rgba(153, 102, 255, 0.2)",
            "rgba(255, 159, 64, 0.2)",
          ],
          borderColor: [
            "rgba(255, 99, 132, 1)",
            "rgba(54, 162, 235, 1)",
            "rgba(255, 206, 86, 1)",
            "rgba(75, 192, 192, 1)",
            "rgba(153, 102, 255, 1)",
            "rgba(255, 159, 64, 1)",
          ],
          borderWidth: 1,
        },
      ],
    },
    options: {
      scales: {
        y: {
          beginAtZero: true,
        },
      },
    },
  });
});

$(document).ready(function () {
  $(".data-table").each(function (_, table) {
    $(table).DataTable();
  });
});
    </script>
  </body>
</html>