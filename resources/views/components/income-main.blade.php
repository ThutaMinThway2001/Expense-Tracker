<x-main>
    {{$slot}}
    <div class="container">
        <div class="card">
            <div class="card-body">
                
                <div class="row">
                    <div class="col-md-4 col-sm-12">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-info text-white" id="basic-addon1"><i
                                        class="fas fa-calendar-alt"></i></span>
                            </div>
                            <input type="text" class="form-control" name="startDate" id="start_date" placeholder="Start Date" readonly>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-12">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-info text-white" id="basic-addon1"><i
                                        class="fas fa-calendar-alt"></i></span>
                            </div>
                            <input type="text" class="form-control" name="endDate" id="end_date" placeholder="End Date" readonly>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-12">
                        <div>
                            <button id="filter" class="btn btn-outline-info btn-sm">Filter</button>
                            <button id="clearFilter" class="btn btn-outline-warning btn-sm">Reset</button>
                        </div>
                    </div>
                </div>


                <table id="example" class="table table-bordered datatable" style="width:100%">
                    <thead>
                        <tr>
                            <td class="text-center">ID</td>
                            <th class="text-center">Income Category</th>
                            <th class="text-center">Description</th>
                            <th class="text-center">Date</th>
                            <th class="text-center">Amount</th>
                            <th class="text-center">Payment Method</th>
                            <th class="text-center">Actions</th>
    
                            <th class="text-center">Updated_At</th>
                            </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

</x-main>

@section('scripts')
    <script>
        $(document).ready(function(){
            $('#start_date').daterangepicker({
                    "singleDatePicker": true,
                    "locale": {
                        "format": "YYYY-MM-DD",
                    },
                    "autoApply": true,
                    "maxDate" : moment(),
                    "showDropdowns": true,
            });
            $('#end_date').daterangepicker({
                    "singleDatePicker": true,
                    "locale": {
                        "format": "YYYY-MM-DD",
                    },
                    "autoApply": true,
                    "maxDate" : moment(),
                    "showDropdowns": true,
            });

            load();
            function load(start_date = '', end_date = '')
            {
                var table = $('.datatable').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'pdf'
                ],
                processing: true,
                serverSide: true,
                responsive: true,
                ajax: {
                    url : '{!! route('indexIncome') !!}',
                    data:{
                        start_date,
                        end_date
                    }
                },
                columns: [
                    { data: 'id', name: 'id', class: 'text-center' },
                    { data: 'category_name', name: 'category_name' , class: 'text-center' },
                    { data: 'description', name: 'description' , class: 'text-center' },
                    { data: 'entry_date', name: 'entry_date' ,class: 'text-center' },
                    { data: 'amount', name: 'amount', class: 'text-center' },
                    { data: 'payment_method', name: 'payment_method', class: 'text-center'},
                    { data: 'actions', name: 'actions', class: 'text-center'},
                    { data: 'updated_at', name: 'updated_at', class: 'text-center' }
                ],
                "columnDefs": [ {
                    "targets": 7,
                    "visible": false,
                } ],
                order: [[7, 'desc']],
                "language": {
                    "paginate": {
                    "previous": "<i class='fas fa-angle-left'></i>",
                    "next": "<i class='fas fa-angle-right'></i>"
                    },
                    "processing": "Loading ..."
                }
                });

                $(document).on('click', '.delete-btn', function(event){
                    event.preventDefault();
                    var id = $(this).data('id');
                    

                    swal({
                        title: "Are you sure?",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                        })
                        .then((willDelete) => {
                        if (willDelete) {
                            $.ajax({
                                method: "DELETE",
                                url: `/income/${id}`,
                                })
                                .done(function( response ) {
                                    table.ajax.reload();
                                });
                        }
                        });


                });
            }

            $(document).on("click", "#filter", function(e) {
            e.preventDefault();
            // alert('hi');
            var start_date = $("#start_date").val();
            var end_date = $("#end_date").val();
            if (start_date == "" || end_date == "") {
                alert("Both date required");
            } else {
                $('.datatable').DataTable().destroy();
                load(start_date, end_date);
            }
        });

            $('#clearFilter').click(function(){
                $('.start_date').val('');
                $('.end_date').val('');
                $('.datatable').DataTable().destroy();
                load();
            })
        })
    </script>
@endsection