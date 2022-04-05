<x-admin-layout>
    <x-admin-nav>
        <div class="flex flex-wrap justify-center">

            <div class="flex flex-col bg-gray-200 rounded-lg shadow-md w-full m-6 overflow-hidden sm:w-52">

                <div class="h-20 m-6">
                    <h2 class="text-center text-3xl px-2 pb-5 mt-5">{{$user_counts}}</h2>
                </div>
                <h2 class="text-center px-2 pb-5 text-2xl">Total Users</h2>
                <a href="{{route('indexExpense')}}"
                    class=" bg-blue-500 text-white p-3 text-center hover:bg-blue-800 transition-all duration-500">See
                    All</a>
            </div>

            <div class="flex flex-col bg-gray-200 rounded-lg shadow-md w-full m-6 overflow-hidden sm:w-52">

                <div class="h-20 m-6">
                    <h2 class="text-center text-3xl px-2 pb-5 mt-5">{{$admin_counts}}</h2>
                </div>
                <h2 class="text-center px-2 pb-5 text-2xl">Total Admins</h2>
                <a href="{{route('indexExpense')}}"
                    class=" bg-blue-500 text-white p-3 text-center hover:bg-blue-800 transition-all duration-500">See
                    All</a>
            </div>
        </div>
    </x-admin-nav>
</x-admin-layout>