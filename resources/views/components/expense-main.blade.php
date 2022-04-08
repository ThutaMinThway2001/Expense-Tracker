<x-main>
    {{$slot}}
    <div class="container">
        <div class="table-responsive">
            <table class="table table-dark table-striped p-4">
        <thead >
            <tr>
                <th class="d-flex justify-content-between align-items-center">
                <span class="h3">Expenses</span>
                <a href="{{route('createExpense')}}" class="btn btn-primary">Create</a>
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
            @forelse($expenses as $expense)
                <tr>
                    <th>{{$loop->iteration}}</th>
                    <td>{{$expense->expense_category->name ?? 'မရှိပါ'}}</td>
                    <td>{{$expense->description}}</td>
                    <td>{{$expense->entry_date}}</td>
                    @php 
                        $amount = $expense->amount;
                        setlocale(LC_MONETARY,"en_US");

                    @endphp
                    <td>{{number_format($amount, 2, ',', '.')}}</td>
                    <td>{{$expense->payment->name}}</td>
                    <td>
                        <a href="{{route('editExpense', $expense->id)}}" class="btn btn-warning">EDIT</a>
                    </td>
                    <td>
                        <form action="{{route('deleteExpense', $expense->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">DELETE</button>

                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="text-center h3">No Expenses Yet</td>
                </tr>
            @endforelse
        </tbody>
        </table>
        </div>
    </div>
</x-main>