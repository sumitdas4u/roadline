{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')

    <div class="card card-custom">

        <div class="card-header flex-wrap border-0 pt-6 pb-0">
            <div class="card-title">

            </div>
            <div class="card-toolbar">

            </div>
        </div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-custom alert-success fade show" role="alert">
                    <div class="alert-icon"><i class="flaticon-warning"></i></div>
                    <div class="alert-text">{{ session('status') }}</div>
                    <div class="alert-close">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true"><i class="ki ki-close"></i></span>
                        </button>
                    </div>
                </div>

            @endif


            <!--end::Search Form-->
            <table class="table table-bordered table-hover" id="kt_datatable">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Truck Type</th>
                    <th>Goods Type</th>
                    <th>Customer Details</th>
                    <th>Pickup Address</th>
                    <th>Drop Address</th>
                    <th>Shipment Date</th>
                    <th>Shipment Weight</th>
                    <th>Enquiry Date</th>
                    <th>Status</th>
                    @if (Auth::user()->role ==2)
                    <th>Actions</th>
                    @endif
                </tr>
                </thead>

                @foreach($enquiries as $enquiry)
                    <tr>
                        <td> {{ $enquiry->id}}</td>
                        <td> {{ $enquiry->product_name}}</td>
                        <td>

                            @foreach($enquiry->goods_types_list as $goods_type)
                                <span class="m-1 label label-outline-info label-inline  ">  {{ $goods_type->name }}</span>

                            @endforeach

                        </td>
                        <td> {{ $enquiry->users->name}} ( {{ $enquiry->users->mobile}}, {{ $enquiry->users->email}} )  </td>
                        <td> {{ $enquiry->pickup_address}}</td>
                        <td> {{ $enquiry->drop_address}}</td>
                        <td> {{ $enquiry->shipment_date}}</td>
                        <td> {{ $enquiry->shipment_weight}}</td>



                        <td> {{ $enquiry->created_at}}</td>



                        <td>
                            <span class="label

                                @if ($enquiry->status=='Payment')
                                label-success
                                @elseif(($enquiry->status=='Quotation'))
                                label-warning
                                @else
                                label-error
                                @endif

                             label-pill label-inline mr-2"> {{ $enquiry->status}}</span>
                        </td>

                        @if (Auth::user()->role ==2)
                        <td>

                            <form method="POST" action="{{ route('quotation.store') }}">
                                @csrf
                                {{ method_field('POST') }}
                                <input type="hidden" value="{{ $enquiry->id }}" name="enquiry_id">
                                <button type="submit" class="btn delete_confirm btn-light btn-hover-warning btn-sm btn-icon mr-2" data-toggle="tooltip" title='Create Quotation'> <i class="fa fa-file"> </i></button>
                            </form>

                        </td>
                        @endif
                     </tr>
                @endforeach

                </tbody>
            </table>

        </div>

    </div>
    <script>

        $(function() {

            $(".delete_confirm").click(function(e) {
                e.preventDefault();
                var form = $(this).parents('form');
                Swal.fire({
                    title: "Are you sure?",
                    text: "You won t be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Yes, Create New Quotation!"
                }).then(function(result) {
                    if ( result.value) {
                        form.submit();
                    }
                });
            });


        })
    </script>
@endsection




