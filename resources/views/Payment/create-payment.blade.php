<x-MasterLayout>
    <x-main>
        <div class="container">
        <div class="row">
            {{-- create payment --}}
            <x-create-p></x-create-p>
            
            <div class="col-md-6 col-sm-12 col-12">
                <div class="card">
                    <div class="card-body">
                        <table id="example" class="table table-bordered datatable" style="width:100%">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Delete</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </x-main>
    @section('scripts')
    <script>
        $(function() {
            var table = $('.datatable').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                ajax: '{!! route('createPayment') !!}',
                columns: [
                    { data: 'id', name: 'id', class: 'text-center' },
                    { data: 'name', name: 'name' , class: 'text-center' },
                    { data: 'actions', name: 'actions', class: 'text-center'},
                    { data: 'updated_at', name: 'updated_at', class: 'text-center' }
                ],
                "columnDefs": [ {
                    "targets": 3,
                    "visible": false,
                } ],
                order: [[3, 'desc']],
                "language": {
                    "paginate": {
                    "previous": "<i class='fas fa-angle-left'></i>",
                    "next": "<i class='fas fa-angle-right'></i>"
                    },
                    "processing": "<img src='/image/loading.gif' style='width: 50%; height: 50%;  text-align: center;' />"
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
                            url: `/payment/payment-create/${id}`,
                            })
                            .done(function( response ) {
                                table.ajax.reload();
                            });
                    }
                    });
            })
        });
    </script>
@endsection
</x-MasterLayout>