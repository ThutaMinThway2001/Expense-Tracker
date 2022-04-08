<x-admin-layout>
    <main class="mt-5 pt-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h4 class="text-center h2">Dashboard</h4>
          </div>
        </div>
        <div class="row mt-5">
            <div class="col-12 col-sm-6 col-md-6">
                <div class="card text-white bg-success mb-3 text-center">
                <div class="card-header h3">Total Users</div>
                <div class="card-body">
                    <h5 class="card-title text-center h1">{{$user_counts}}</h5>
                    <a class="btn btn-light" href="{{route('users')}}">See More</a>
                </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-6">
                <div class="card text-white bg-success mb-3 text-center">
                <div class="card-header h3">Total Admins</div>
                <div class="card-body">
                    <h5 class="card-title text-center h1">{{$admin_counts}}</h5>
                    <a class="btn btn-light" href="{{route('admins')}}">See More</a>
                </div>
                </div>
            </div>
        </div>
      </div>
    </main>
</x-admin-layout>