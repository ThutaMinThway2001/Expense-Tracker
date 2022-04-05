<x-main>
    {{$slot}}
    <div class="justify-center">
        <table class="w-full  border border-slate-400 table-auto">
            <thead class="bg-gray-50 border-b-2 border-gray-200">
                <th>
                    <h1 class="text-2xl p-4">Expense Category</h1>
                </th>
            </thead>
            <thead class="bg-gray-50 border-b-5 border-gray-200">
                <tr>
                    <th class="p-3 text-sm font-semibold text-left uppercase">id</th>
                    <th class="p-3 text-sm font-semibold tracking-wide text-left uppercase">Name</th>
                    <th class="p-3 text-sm font-semibold tracking-wide text-left uppercase">Edit</th>
                    <th class="p-3 text-sm font-semibold tracking-wide text-left uppercase">Delete</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($categories as $category)
                <tr>
                    <td class="p-3 text-sm text-gray-700 content-center m-2 ">{{$loop->iteration}}</td>
                    <td class="p-3 text-sm text-gray-700 content-center m-2 ">
                        {{$category->name}}
                    </td>
                    <td class="p-3 text-sm text-gray-700">
                        <a href="{{route('editExpenseCategory', $category->id)}}" class="bg-yellow-200 
                        text-yellow-800 p-2 
                        text-center
                        text-sm
                        rounded-full
                        uppercase
                        hover:bg-yellow-400 
                        transition-all 
                        duration-500">Edit</a>
                    </td>
                    <td class=" p-3 text-sm text-gray-700">
                        <form action="{{route('deleteExpenseCategory', $category->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-200 
                            text-red-800 p-2 
                            text-center
                            text-sm
                            rounded-full
                            uppercase
                            hover:bg-red-400 
                            transition-all 
                            duration-500">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <h1 class="p-3 text-2xl text-red-700">No Expense Categories Yet</h1>
                @endforelse

            </tbody>
        </table>
    </div>
</x-main>