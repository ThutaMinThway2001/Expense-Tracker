<x-MasterLayout>
    <x-main>
        <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-12 col-12">
                <div class="card">
                    <div class="card-header h3">
                        Create Payment
                    </div>
                    <div class="card-body">
                        <form action="{{route('storePayment')}}" method="post">
                        @csrf
                        <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" id="exampleFormControlInput1" placeholder="Enter Payment Name">
                        </div>
                        @error('name')
                        <p class="text-red-700">{{$message}}</p>
                        @enderror

                        <button class="btn btn-primary float-right">Save</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-12 col-12">
                <table class="table">
                    <thead >
                        <tr>
                            <th class="d-flex justify-content-between align-items-center">
                            <span class="h3">Payment</span>
                            </th>
                        </tr>
                    </thead>
                    <thead>
                        <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($payments as $payment)
                            <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td>{{$payment->name}}</td>
                            <td>
                                <form action="{{route('deletePayment', $payment)}}" method="post">
                                @csrf
                                @method('DELETE')
                                @if($payment->income->isEmpty() && $payment->expense->isEmpty())
                                    <button type="submit" class="btn btn-danger">DELETE</button>  
                                @else     
                                    <button type="submit" class="btn btn-danger" disabled>DELETE</button>  
                                @endif
                                {{-- <button type="submit" class="btn btn-danger">DELETE</button> --}}
                                </form>
                            </td>
                            </tr>
                        @empty
                            <tr>
                                <td scope="2">No Payments Yet!</td>
                            </tr>
                        @endforelse
                    </tbody>
                    </table>
            </div>
        </div>
    </div>
    </x-main>
</x-MasterLayout>