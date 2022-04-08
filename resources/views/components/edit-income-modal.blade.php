<!-- This example requires Tailwind CSS v2.0+ -->
<div class="container">
    <div class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="flex items-end justify-center text-center sm:block sm:p-0">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true">
        </div>

        <div
            class="relative inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
            <div class="justify-center">
                <div class="">
                    <div class="">
                        <form action="{{route('updateIncome', $income->id)}}" method="POST">
                            @csrf
                            <div class="shadow overflow-hidden sm:rounded-md">
                                <div class="px-4 py-3 bg-yellow-500 text-left text-black sm:px-6">
                                    Create Income Category
                                </div>
                                <div class="px-4 py-5 bg-white sm:p-6">
                                    <div class="grid gap-6">
                                        <div class="col-span-3 sm:col-span-3">
                                            <label for="first-name" class="block text-sm font-medium text-gray-700">Date
                                                Entry</label>
                                            <input type="date" name="entry_date" value="{{$income->entry_date}}"
                                                class="w-full border border-gray-300 px-3 py-2 rounded-lg shadow-sm ">
                                        </div>
                                        @error('entry_date')
                                        <p class="text-red-700">{{$message}}</p>
                                        @enderror
                                        <div class="col-span-3 sm:col-span-3">
                                            <label for="first-name"
                                                class="block text-sm font-medium text-gray-700">Description</label>
                                            <input type="text" name="description" value="{{$income->description}}"
                                                class="w-full border border-gray-300 px-3 py-2 rounded-lg shadow-sm ">
                                        </div>
                                        @error('description')
                                        <p class="text-red-700">{{$message}}</p>
                                        @enderror
                                        <div class="col-span-3 sm:col-span-3">
                                            <label for="first-name"
                                                class="block text-sm font-medium text-gray-700">Amount</label>
                                            <input type="text" name="amount" value="{{$income->amount}}"
                                                class="w-full border border-gray-300 px-3 py-2 rounded-lg shadow-sm ">
                                        </div>
                                        @error('amount')
                                        <p class="text-red-700">{{$message}}</p>
                                        @enderror
                                        <div class="col-span-3 sm:col-span-3">
                                            <div>
                                                <label for="company-size"
                                                    class="block text-sm font-medium text-gray-700">Income
                                                    Category</label>
                                                <div class="mt-1">
                                                    <select name="income_category_id" id="company-size"
                                                        class="w-full border border-gray-300 px-3 py-2 rounded-lg shadow-sm">
                                                        <option value="">Please select</option>
                                                        @foreach($categories as $id => $income_category)
                                                        <option value="{{ $id }}">{{ $income_category }}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            @error('income_category_id')
                                            <p class="text-red-700">{{$message}}</p>
                                            @enderror
                                        </div>
                                        <div class="col-span-3 sm:col-span-3">
                                            <div>
                                                <label for="company-size"
                                                    class="block text-sm font-medium text-gray-700">Payment
                                                    Method</label>
                                                <div class="mt-1">
                                                    <select name="payment_id" id="company-size"
                                                        class="w-full border border-gray-300 px-3 py-2 rounded-lg shadow-sm">
                                                        <option value="">Please select</option>
                                                        @foreach($payments as $id => $payment)
                                                        <option value="{{ $id }}">{{ $payment }}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                @error('payment_id')
                                                <p class="text-red-700">{{$message}}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <h1>Or Create A new One.</h1>
                                        <a href="{{route('create')}}">Click Here</a>

                                    </div>
                                </div>
                                <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                    <button type="submit"
                                        class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-yellow-400 hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>