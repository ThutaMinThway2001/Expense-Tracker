<x-header>
    <div class="flex justify-between">
        <h1 class="text-3xl font-bold text-gray-900">Income</h1>
        <a href="{{route('indexIncomeCategory')}}" class="
            bg-indigo-500 
            text-white p-2 
            text-center 
            rounded 
            hover:bg-blue-800 
            transition-all 
            duration-500">
            See All Income Categories
        </a>
        <a href="{{route('create')}}" class="
            bg-indigo-500 
            text-white p-2 
            text-center 
            rounded 
            hover:bg-blue-800 
            transition-all 
            duration-500">
            Create Income
        </a>
    </div>
</x-header>