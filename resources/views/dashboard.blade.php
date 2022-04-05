<x-MasterLayout>
    <x-header>
        <div class="flex justify-between">
            <h1 class="text-3xl font-bold text-gray-900">Dashboard</h1>
            @auth
            @else
            <h1 class="text-3xl font-bold text-red-400">If You Are Not Login ? Login First</h1>

            @endauth
        </div>
    </x-header>
    <x-main>
        <div class="flex flex-wrap justify-center">
            <div class="flex flex-col bg-white rounded-lg shadow-md w-full m-6 overflow-hidden sm:w-52">

                <img src="images/database-icon.svg" alt="" class="h-20 m-6">

                <h2 class="text-center px-2 pb-5">Incomes</h2>

                <a href="{{route('indexIncome')}}"
                    class="bg-blue-500 text-white p-3 text-center hover:bg-blue-800 transition-all duration-500">Get
                    Started!</a>

            </div>

            <div class="flex flex-col bg-white rounded-lg shadow-md w-full m-6 overflow-hidden sm:w-52">

                <img src="images/email-icon.svg" alt="" class="h-20 m-6">

                <h2 class="text-center px-2 pb-5">Expenses</h2>

                <a href="{{route('indexExpense')}}"
                    class="bg-blue-500 text-white p-3 text-center hover:bg-blue-800 transition-all duration-500">Get
                    Started!</a>

            </div>

        </div>
    </x-main>
</x-MasterLayout>