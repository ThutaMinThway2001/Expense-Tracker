<x-MasterLayout>
    <x-main>
        <div class="container">
            <div class="row align-item-center">
                <div class="col-12 col-md-6 d-flex justify-content-center">
                    <div class="card w-75 text-center">
                        <div class="card-body">
                            <h5 class="card-title">Incomes</h5>
                            <p class="card-text">You can make your Incomes.</p>
                            <a href="{{route('indexIncome')}}" class="btn btn-primary">Get Started</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 d-flex justify-content-center">
                    <div class="card w-75 text-center">
                        <div class="card-body">
                            <h5 class="card-title">Expenses</h5>
                            <p class="card-text">You can make your Expenses.</p>
                            <a href="{{route('indexExpense')}}" class="btn btn-primary">Get Started</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-main>
</x-MasterLayout>