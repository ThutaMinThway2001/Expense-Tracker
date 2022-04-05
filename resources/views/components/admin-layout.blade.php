<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="{{ asset('css/app.css') }}" rel="stylesheet">

  <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>

<body>

  <div class="grid grid-cols-5 ">

    <div class="space-y-5 min-h-screen w-60 px-2 py-4 bg-gray-100">

      <div class="flex justify-center text-indigo-600 text-3xl px-10 mt-10">
        <b>Admin Panel</b>
      </div>

      <div class="grid justify-center mt-10">
        <div class="p-2 hover:bg-pink-100">
          <div class="flex flex-row space-x-3">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-pink-700" fill="none" viewBox="0 0 24 24"
              stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
            </svg>
            <a href="{{route('adminPanel')}}">
              <h4 class="font-bold text-gray-500 hover:text-pink-600 ">Dashboard</h4>
            </a>
          </div>
        </div>
        <div class="p-2 hover:bg-pink-100 mt-5">
          <div class="flex flex-row space-x-3 ">
            <a href="{{route('users')}}">
              <h4 class="font-regular text-gray-500 hover:text-pink-600">Users</h4>
            </a>
            {{-- <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-pink-500 " viewBox="0 0 20 20"
              fill="currentColor">
              <path
                d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
            </svg> --}}
          </div>
        </div>
        <div class="p-2 hover:bg-pink-100 mt-5">
          <div class="flex flex-row space-x-3 ">
            {{-- <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-pink-500 " viewBox="0 0 20 20"
              fill="currentColor">
              <path
                d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
            </svg> --}}
            <a href="{{route('admins')}}">
              <h4 class="font-regular text-gray-500 hover:text-pink-600">Admin</h4>
            </a>
          </div>
        </div>
      </div>
    </div>
    {{$slot}}
  </div>

  <!-- Required chart.js -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <!-- Chart line -->
  <script>
    const labels = ["January", "February", "March", "April", "May", "June"];
        const data = {
          labels: labels,
          datasets: [{
            label: "My First dataset",
            backgroundColor: "hsl(252, 82.9%, 67.8%)",
            borderColor: "hsl(252, 82.9%, 67.8%)",
            data: [0, 10, 5, 2, 20, 30, 45],
          }, ],
        };
    
        const configLineChart = {
          type: "line",
          data,
          options: {},
        };
    
        var chartLine = new Chart(
          document.getElementById("chartLine"),
          configLineChart
        );
  </script>

  <script>
    const dataRadar = {
          labels: [
            "Reservation 1",
            "Reservation 2",
            "Reservation 3",
            "Reservation 4",
            "Reservation 5",
            "Reservation 6",
            "Reservation 7",
          ],
          datasets: [{
              label: "My First Dataset",
              data: [65, 59, 90, 81, 56, 55, 40],
              fill: true,
              backgroundColor: "rgba(255,105,180)",
              borderColor: "rgb(255,20,147)",
              pointBackgroundColor: "rgb(133, 105, 241)",
              pointBorderColor: "#fff",
              pointHoverBackgroundColor: "#fff",
              pointHoverBorderColor: "rgb(133, 105, 241)",
            },
            {
              label: "My Second Dataset",
              data: [28, 48, 40, 19, 96, 27, 100],
              fill: true,
              backgroundColor: "rgba(255,105,180)",
              borderColor: "rgb(0,191,255)",
              pointBackgroundColor: "rgb(54, 162, 235)",
              pointBorderColor: "#fff",
              pointHoverBackgroundColor: "#fff",
              pointHoverBorderColor: "rgb(54, 162, 235)",
            },
          ],
        };
    
        const configRadarChart = {
          type: "radar",
          data: dataRadar,
          options: {},
        };
    
        var chartBar = new Chart(
          document.getElementById("chartRadar"),
          configRadarChart
        );
  </script>
  <script src="{{asset('js/app.js')}}"></script>
</body>

</html>