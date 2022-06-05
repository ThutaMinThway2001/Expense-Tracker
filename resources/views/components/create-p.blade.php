<div class="col-md-6 col-sm-12 col-12">
    <div class="card">
        <div class="card-header h3">
            Create Payment
        </div>
        <div class="card-body">
            <form action="{{route('storePayment')}}" method="post">
            @csrf
            <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" id="exampleFormControlInput1" placeholder="Enter Payment Name">
            </div>
            @error('name')
            <p class="text-red-700">{{$message}}</p>
            @enderror

            <button class="btn btn-primary float-right">Save</button>
            </form>
        </div>
    </div>
</div>