<div class="grid grid-cols-5 gap-4">
    <div class="col-span-5 mt-10 sm:mt-0 sm:col-span-5 md:col-span-2">
        <div class="md:grid md:gap-6">
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form action="{{route('storeExpenseCategory')}}" method="POST">
                    @csrf
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-3 bg-indigo-800 text-left text-white sm:px-6">
                            Create Expense Category
                        </div>
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <div class="grid gap-6">
                                <div class="col-span-3 sm:col-span-3">
                                    <label for="first-name" class="block text-sm font-medium text-gray-700">Name</label>
                                    <input type="text" name="name"
                                        class="w-full border border-gray-300 px-3 py-2 rounded-lg shadow-sm ">
                                </div>
                                @error('name')
                                <p class="text-red-700">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <button type="submit"
                                class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-span-5 mt-10 sm:mt-0 sm:col-span-5 md:col-span-3">
        <div class="md:grid md:gap-6">
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form action="{{route('storeExpense')}}" method="POST">
                    @csrf
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-3 bg-indigo-800 text-left text-white sm:px-6">
                            Create Expense Category
                        </div>
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <div class="grid gap-6">
                                <div class="col-span-3 sm:col-span-3">
                                    <label for="first-name" class="block text-sm font-medium text-gray-700">Date
                                        Entry</label>
                                    <input type="date" name="entry_date"
                                        class="w-full border border-gray-300 px-3 py-2 rounded-lg shadow-sm ">
                                        @error('entry_date')
                                        <p class="text-red-700">{{$message}}</p>
                                        @enderror
                                </div>

                                <div class="col-span-3 sm:col-span-3">
                                    <label for="first-name"
                                        class="block text-sm font-medium text-gray-700">Description</label>
                                    <input type="text" name="description"
                                        class="w-full border border-gray-300 px-3 py-2 rounded-lg shadow-sm ">
                                        @error('description')
                                        <p class="text-red-700">{{$message}}</p>
                                        @enderror
                                </div>

                                <div class="col-span-3 sm:col-span-3">
                                    <label for="first-name"
                                        class="block text-sm font-medium text-gray-700">Amount</label>
                                    <input type="text" name="amount"
                                        class="w-full border border-gray-300 px-3 py-2 rounded-lg shadow-sm ">
                                        @error('amount')
                                        <p class="text-red-700">{{$message}}</p>
                                        @enderror
                                </div>

                                <div class="col-span-3 sm:col-span-3">
                                    <div>
                                        <label for="company-size"
                                            class="block text-sm font-medium text-gray-700">Expense
                                            Category</label>
                                        <div class="mt-1">
                                            <select name="expense_category_id" id="company-size"
                                                class="w-full border border-gray-300 px-3 py-2 rounded-lg shadow-sm">
                                                <option value="">Please select</option>
                                                @foreach($categories as $id => $expense_category)
                                                <option value="{{ $id }}">{{ $expense_category }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('expense_category_id')
                                        <p class="text-red-700">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-span-3 sm:col-span-3">
                                    <div>
                                        <label for="company-size"
                                            class="block text-sm font-medium text-gray-700">
                                            Payment Method</label>
                                        <div class="mt-1">
                                            <select name="payment_id" id="company-size"
                                                class="w-full border border-gray-300 px-3 py-2 rounded-lg shadow-sm">
                                                <option value="">Please select</option>
                                                @foreach($payments as $id => $payment)
                                                <option value="{{ $id }}">{{ $payment }}</option>
                                                @endforeach
                                                    
                                            </select>
                                            
                                        </div> <br>
                                            <a href="{{route('createPayment')}}">
                                                <span class="float-left h5">
                                                    OR Create Payment
                                                </span>
                                            </a>
                                        
                                        @error('payment_id')
                                        <p class="text-red-700">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <button type="submit"
                                class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="hidden sm:block" aria-hidden="true">
    <div class="py-5">
        <div class="border-t border-gray-200"></div>
    </div>
</div>