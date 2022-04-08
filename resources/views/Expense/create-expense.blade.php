{{-- @props(['expense_categories']); --}}
<x-MasterLayout>
    <x-header>
        <div class="flex justify-between">
            <h1 class="text-3xl font-bold text-gray-900">Create Expenses</h1>
        </div>
    </x-header>
    <x-main>
        <x-create-e :categories="$expense_categories" :payments="$payments" />
    </x-main>
</x-MasterLayout>