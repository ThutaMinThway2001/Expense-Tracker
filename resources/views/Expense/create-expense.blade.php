{{-- @props(['expense_categories']); --}}
<x-MasterLayout>
    <x-header>
        <div class="flex justify-between">
            <h1 class="text-3xl font-bold text-gray-900">Create Income</h1>
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
        </div>
    </x-header>
    <x-main>
        <x-create-e :categories="$expense_categories" :payments="$payments" />
    </x-main>
</x-MasterLayout>