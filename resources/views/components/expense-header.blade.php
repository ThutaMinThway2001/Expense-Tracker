<x-header>
    <div class="flex justify-between">
        <h1 class="text-3xl font-bold text-gray-900">Expense</h1>
        <a href="{{route('indexExpenseCategory')}}" class="
            bg-indigo-500 
            text-white p-2 
            text-center 
            rounded 
            hover:bg-blue-800 
            transition-all 
            duration-500">
            See Expense Categories
        </a>
        <a href="{{route('createExpense')}}" class="
            bg-indigo-500 
            text-white p-2 
            text-center 
            rounded 
            hover:bg-blue-800 
            transition-all 
            duration-500">
            Create Expense
        </a>
    </div>
</x-header>