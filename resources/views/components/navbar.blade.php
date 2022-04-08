<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top ">
  <div class="container">
    <a class="navbar-brand" href="#">Expense Tracker</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Dashboard</a>
        </li>

        @auth
        <li class="nav-item dropdown">
          <button class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Incomes
          </button>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="{{route('indexIncome')}}">Income</a></li>
            <li><a class="dropdown-item" href="{{route('indexIncomeCategory')}}">Income Categories</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="{{route('create')}}">Create Income</a></li>
          </ul>
        </li>

        <li class="nav-item dropdown">
          <button class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Expenses
          </button>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="{{route('indexExpense')}}">Expense</a></li>
            <li><a class="dropdown-item" href="{{route('indexExpenseCategory')}}">Expense Categories</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="{{route('createExpense')}}">Create Expense</a></li>
          </ul>
        </li>

        <li class="nav-item dropdown">
          <button class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Payment
          </button>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Payment</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="{{route('createPayment')}}">Create Payment</a></li>
          </ul>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="{{route('monthlyReports')}}">Monthly Reports</a>
        </li>
        @endauth

        </ul>
        @auth
        <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                {{auth()->user()->name}}
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <form action="{{route('logout')}}" method="post">
                @csrf
                <li>
                    <button class="dropdown-item">
                    Logout
                    </button>
                </li>
                </form>
                </ul>
            </li>
        </ul>
        @else
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a type="button" href="{{route('loginCreate')}}" class="btn btn-outline-info me-md-2" type="button">Sign In</a>
            <a type="button" href="{{route('createUser')}}" class="btn btn-outline-info" type="button">Register</a>
        </div>
        @endauth
    </div>
  </div>
</nav>