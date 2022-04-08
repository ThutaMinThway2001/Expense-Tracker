<x-admin-layout>
    <main class="mt-5 pt-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h4 class="text-center h2">Admins</h4>
          </div>
        </div>
        <div class="container">
            <div class="row mt-5">
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($admins as $admin)
                    <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{$admin->name}}</td>
                        <td>{{$admin->email}}</td>
                    </tr>
                @endforeach
                </tbody>
                </table>
        </div>
        </div>

      </div>
    </main>
</x-admin-layout>