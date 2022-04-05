<x-MasterLayout>
    <x-header>
        <h1 class="text-3xl font-bold text-gray-900">Monthly Reports</h1>
    </x-header>
    <x-main>
        <form action="{{route('monthlyReports')}}" method="get">
            <div class="grid grid-cols-6 gap-6">

                <div class="">
                    <div>
                        <label for="company-size" class="block text-sm font-medium text-gray-700">Year</label>
                        @php
                        $years = collect(range(2,0))->map(function($item){
                        return date('Y') - $item;
                        });

                        $months = cal_info(0)['months'];

                        @endphp
                        <div class="mt-1">
                            <select name="y" id="company-size"
                                class="w-full border border-gray-300 px-3 py-2 rounded-lg shadow-sm">
                                <option value="">Please select</option>
                                @foreach ($years as $year)
                                <option value="{{$year}}">{{$year}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="">
                    <div>
                        <label for="company-size" class="block text-sm font-medium text-gray-700">Month</label>
                        <div class="mt-1">
                            <select name="m" id="company-size"
                                class="w-full border border-gray-300 px-3 py-2 rounded-lg shadow-sm">
                                <option value="">Please select</option>
                                @foreach ($months as $month)
                                <option value="{{$month}}">{{$month}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="pt-6 mr-10 bg-gray-50 text-right sm:px-6">
                    <button type="submit" class="py-2 px-4 border border-transparent shadow-sm text-sm font-medium
                        rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2
                        focus:ring-offset-2 focus:ring-indigo-500">Submit</button>
                </div>
            </div>
        </form>

        <div class="mt-10">
            <div class="grid grid-cols-12 gap gap-10    ">
                <table class="col-span-4 w-full border-collapse border border-slate-400 table-auto">
                    <thead class="bg-gray-50 border-b-2 border-gray-200">
                        <th>
                            <h1 class="text-2xl p-4">Profit</h1>
                        </th>
                    </thead>
                    <thead class="bg-gray-50 border-b-2 border-gray-200">
                        <tr>
                            <th class="p-3 text-sm font-semibold tracking-wide text-left uppercase">Income</th>
                            <th class="p-3 text-sm font-semibold tracking-wide text-left uppercase">
                                {{$income_total_amount}}</th>
                        </tr>
                        <tr>
                            <th class="p-3 text-sm font-semibold tracking-wide text-left uppercase">Expense</th>
                            <th class="p-3 text-sm font-semibold tracking-wide text-left uppercase">
                                {{$expense_total_amount}}</th>
                        </tr>
                        <tr>
                            <th class="p-3 text-sm font-semibold tracking-wide text-left uppercase">Profit</th>
                            <th class="p-3 text-sm font-semibold tracking-wide text-left uppercase">
                                {{$profit}}</th>
                        </tr>
                    </thead>
                </table>

                <table class="col-span-4 w-full border-collapse border border-slate-400 table-auto">
                    <thead class="bg-gray-50 border-b-2 border-gray-200">
                        <tr>
                            <th class="p-3 text-sm font-semibold tracking-wide text-left uppercase">Income Category</th>
                            <th class="p-3 text-sm font-semibold tracking-wide text-left uppercase">
                                {{$income_total_amount}}ks</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($income_summary as $income)
                        <tr>
                            <td class="p-3 ">{{$income['name']}}</td>
                            <td class="p-3 text-sm text-gray-700content-center m-2 ">
                                <span class="col-span-2">{{$income['amount']}}</span>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>

                <table class="col-span-4 w-full border-collapse border border-slate-400 table-auto">
                    <thead class="bg-gray-50 border-b-2 border-gray-200">
                        <tr>
                            <th class="p-3 text-sm font-semibold tracking-wide text-left uppercase">Expense Category
                            </th>
                            <th class="p-3 text-sm font-semibold tracking-wide text-left uppercase">
                                {{$expense_total_amount}}ks</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($expense_summary as $expense)
                        <tr>
                            <td class="p-3 ">{{$expense['name']}}</td>
                            <td class="p-3 text-sm text-gray-700content-center m-2 ">
                                <span class="col-span-2">{{$expense['amount']}}</span>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </x-main>
</x-MasterLayout>