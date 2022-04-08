<x-main>
    {{$slot}}

    <div class="container">
        <div class="table-responsive">
            <table class="table table-dark table-striped p-4">
        <thead >
            <tr>
                <th class="d-flex justify-content-between align-items-center">
                <span class="h3">Incomes Category</span>
                <a href="{{route('create')}}" class="btn btn-primary">Create</a>
                </th>
            </tr>
        </thead>
        <thead>
            <tr>
            <td scope="col">ID</td>
            <th scope="col">Name</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
            @forelse($categories as $category)
        @php
            $disableTrue = $category->income;
            
        @endphp
                <tr>
                    <th>{{$loop->iteration}}</th>
                    <td>{{$category->name}}</td>
                    
                    <td>
                        <a href="{{route('editIncomeCategory', $category)}}" class="btn btn-warning">EDIT</a>
                    </td>
                        <td>
                            <form action="{{route('deleteIncomeCategory', $category)}}" method="post">
                            @csrf
                            @method('DELETE')
                            @if($category->income->isEmpty())
                                <button type="submit" class="btn btn-danger">DELETE</button>  
                            @else     
                                <button type="submit" class="btn btn-danger" disabled>DELETE</button>  
                            @endif
                            </form>
                        </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="text-center h3">No Incomes Category Yet</td>
                </tr>
            @endforelse
        </tbody>
        </table>
        </div>
    </div>

</x-main>