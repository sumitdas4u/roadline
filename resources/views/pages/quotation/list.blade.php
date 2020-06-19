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
                    <th>Enquiry Id</th>
                    <th>Customer Details</th>
                    <th>Pickup Address</th>
                    <th>Drop Address</th>
                    <th>Shipment Date</th>
                    <th>Shipment Weight</th>
                    <th>Price</th>

                    <th>Date</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
                </thead>

                @foreach($quotations as $quotation)
                    <tr>
                        <td> {{ $quotation->id}}</td>
                        <td> {{ $quotation->enquiry_id}}</td>
                           <td> {{ $quotation->users->name}} ( {{ $quotation->users->mobile}}, {{ $quotation->users->email}} )  </td>
                        <td> {{ $quotation->pickup_address}}</td>
                        <td> {{ $quotation->drop_address}}</td>
                        <td> {{ $quotation->shipment_date}}</td>
                        <td> {{ $quotation->shipment_weight}}</td>
                        <td> {{ $quotation->price}}</td>




                        <td> {{ $quotation->created_at}}</td>
                        <td>
                            <span class="label

                                @if ($quotation->status=='Payment')
                                label-success
                                @else
                                label-error
                                @endif

                                label-pill label-inline mr-2"> {{ $quotation->status}}</span>
                        </td>
                        <td width="130px">

                            <form method="POST" action="{{ route('payment.store') }}">
                                @csrf
                                {{ method_field('POST') }}
                                <input type="hidden" value="{{ $quotation->id }}" name="quotation_id">
                                @if (Auth::user()->role ==2)
                                <a href="{{ route('quotation.edit',$quotation->id) }} " class="btn btn-light btn-hover-success btn-sm btn-icon mr-2">
                                    <i class="flaticon2-edit text-muted"></i>
                                </a>
                                @endif
                                <button type="submit" class="btn delete_confirm  btn-light btn-hover-warning btn-sm btn-icon mr-2" data-toggle="tooltip" title='Payment Entry'> <i class="fa fa-file"> </i></button>

                            </form>
                          </td>
                     </tr>
                @endforeach

                </tbody>
            </table>
                {{ $quotations->links() }}
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
                    confirmButtonText: "Yes, Create New Payment Entry!"
                }).then(function(result) {
                    if ( result.value) {
                        form.submit();
                    }
                });
            });


        })
    </script>
@endsection




