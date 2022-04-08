<x-main>
    {{$slot}}
    <div class="container">
        <div class="table-responsive">
            <table class="table table-dark table-striped p-4">
        <thead >
            <tr>
                <th class="d-flex justify-content-between align-items-center">
                <span class="h3">Incomes</span>
                <a href="{{route('create')}}" class="btn btn-primary">Create</a>
                </th>
            </tr>
        </thead>
        <thead>
            <tr>
            <td scope="col">ID</td>
            <th scope="col">Income Category</th>
            <th scope="col">Description</th>
            <th scope="col">Date</th>
            <th scope="col">Amount</th>
            <th scope="col">Payment Method</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
            @forelse($incomes as $income)
                <tr>
                    <th>{{$loop->iteration}}</th>
                    <td>{{$income->income_category->name}}</td>
                    <td>{{$income->description}}</td>
                    <td>{{$income->entry_date}}</td>
                    @php 
                        $amount = $income->amount;
                        setlocale(LC_MONETARY,"en_US");
                    @endphp
                    <td>{{number_format($amount,2, ',', '.')}}</td>
                    <td>{{$income->payment->name}}</td>
                    <td>
                        <a href="{{route('editIncome', $income->id)}}" class="btn btn-warning">EDIT</a>
                    </td>
                    <td>
                        <form action="{{route('deleteIncome', $income->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">DELETE</button>

                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="text-center h3">No Incomes Yet</td>
                </tr>
            @endforelse
        </tbody>
        </table>
        </div>
    </div>

</x-main>