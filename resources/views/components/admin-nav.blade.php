<div class="col-span-4">
    <div class="flex flex-col">
        <div class="flex flex-col bg-white h-24 p-2 drop-shadow-2xl">
            <div class="flex justify-between space-x-3">

                <a href="{{route('adminPanel')}}">
                    <h4 class="font-bold text-gray-500 p-1 text-2xl mt-6">Dashboard</h4>
                </a>
                <div class="flex justify-end ...">
                    <h4 class="font-bold text-gray-500 p-1 text-2xl mt-6">Admin, {{auth()->user()->name}}</h4>
                    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6 mt-3">
                        <form action="{{route('logout')}}" method="post">
                            @csrf
                            <button
                                class="bg-indigo-500 text-white p-2 text-center rounded hover:bg-blue-800 transition-all duration-500">Sign
                                out</button>
                        </form>
                    </div>

                </div>

            </div>
        </div>

        {{$slot}}

    </div>
</div>