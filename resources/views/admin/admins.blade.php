<x-admin-layout>
    <x-admin-nav>
        <div class="flex flex-col justify-center mt-10">
            <div class="flex flex-wrap justify-center">
                <table class="w-full border-collapse border border-slate-400 table-auto">
                    <thead class="bg-gray-50 border-b-2 border-gray-200">
                        <th>
                            <h1 class="text-2xl p-4">All Admins</h1>
                        </th>
                    </thead>
                    <thead class="bg-gray-50 border-b-2 border-gray-200">
                        <tr>
                            <th class="p-3 text-sm font-semibold tracking-wide text-left uppercase">id</th>
                            <th class="p-3 text-sm font-semibold tracking-wide text-left uppercase">username</th>
                            <th class="p-3 text-sm font-semibold tracking-wide text-left uppercase">email</th>
                            <th class="p-3 text-sm font-semibold tracking-wide text-left uppercase">isAdmin</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($admins as $admin)
                        <tr>
                            <td class="p-3 ">{{$loop->iteration}}</td>
                            <td class="p-3 text-sm text-gray-700 content-center m-2 ">
                                <span class="col-span-2">{{$admin->name}}</span>
                            </td>
                            <td class=" p-3 text-sm text-gray-700">
                                {{$admin->email}}
                            </td>
                            <td class=" p-3 text-sm text-gray-700">
                                {{$admin->isAdmin}}
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </x-admin-nav>
</x-admin-layout>