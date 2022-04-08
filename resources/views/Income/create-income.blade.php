{{-- @props(['income_categories']); --}}
<x-MasterLayout>
    <x-header>
        <div class="flex justify-between">
            <h1 class="text-3xl font-bold text-gray-900">Create Income</h1>
        </div>
    </x-header>
    <x-main>
        <x-create-i :categories="$income_categories" :payments="$payments"></x-create-i>
    </x-main>
</x-MasterLayout>