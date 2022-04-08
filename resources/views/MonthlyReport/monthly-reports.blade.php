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

        <div class="container mt-10">
            <div class="row">
                <div class="col-md-4 col-12 col-sm-6">
                    <table class="table table-dark table-striped p-4">
                        <thead >
                            <tr>
                                <th class="d-flex justify-content-between align-items-center">
                                <span class="h3">Profit</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <td>Income</td>
                            <td>{{number_format($income_total_amount, 2, ',', '.')}}</td>
                            </tr>
                            <tr>
                            <td>Expense</td>
                            <td>{{number_format($expense_total_amount, 2, ',', '.')}}</td>
                            </tr>
                            <tr>
                            <td>Profit</td>
                            <td>{{number_format($profit, 2, ',', '.')}}</td>
                            </tr>
                        </tbody>
                        </table>
                </div>

                <div class="col-md-4 col-12 col-sm-6">
                    <table class="table table-dark table-striped p-4">
                        <thead >
                            <tr >
                                <th>
                                <span class="h4">Income Category</span>
                                </th>
                                <th class="h4">
                                {{$income_total_amount}}ks
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse ($income_summary as $income)
                            <tr>
                            <td>{{$income['name']}}</td>
                            <td>{{number_format($income['amount'], 2, ',', '.')}}</td>
                            </tr>
                            <tr>
                        @empty
                            <tr>
                                <td scope="3">No Incomes Category Yet!</td>
                            </tr>
                        @endforelse
                        </tbody>
                        </table>
                </div>

                <div class="col-md-4 col-12 col-sm-6">
                    <table class="table table-dark table-striped p-4">
                        <thead >
                            <tr>
                                <th class="h4">
                                Expense Category
                                </th>
                                <th class="h4">
                                {{$expense_total_amount}}ks
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse ($expense_summary as $expense)
                            <tr>
                            <td>{{$expense['name']}}</td>
                            <td>{{number_format($expense['amount'], 2, ',', ' ')}}</td>
                            </tr>
                        @empty
                            <tr>
                                <td scope="3">No Expense Category Yet!</td>
                            </tr>
                        @endforelse
                        </tbody>
                        </table>
                </div>
            </div>
        </div>
    </x-main>
</x-MasterLayout>