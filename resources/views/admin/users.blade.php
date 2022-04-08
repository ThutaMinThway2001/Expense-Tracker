<x-admin-layout>
    <main class="mt-5 pt-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h4 class="text-center h2">Users</h4>
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
                    <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($users as $user)
                    <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>
                            <form action="{{route('deleteUser', $user->name)}}" method="post">
                            @csrf
                            @method('DELETE')
                                <button type="submit" class="btn btn-danger">DELETE</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
                </table>
        </div>
        </div>

      </div>
    </main>
</x-admin-layout>