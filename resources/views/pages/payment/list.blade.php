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
                    <th>Quotation Id</th>
                    <th>Customer Details</th>
                    <th>Amount</th>
                    <th>Payment Date</th>
                    <th>Payment Mode</th>
                    <th>Status</th>
                    <th>Date</th>
                    @if (Auth::user()->role ==2)
                    <th>Actions</th>
                        @endif
                </tr>
                </thead>

                @foreach($payments as $payment)
                    <tr>
                        <td> {{ $payment->id}}</td>
                        <td> {{ $payment->enquiry_id}}</td>
                        <td> {{ $payment->quotation_id }}</td>
                        <td> {{ $payment->user_name}}</td>
                        <td> {{ $payment->amount}}</td>
                        <td> {{ $payment->payment_date}}</td>
                        <td> {{ $payment->payment_mode}}</td>
                        <td>
                            <span class="label

                                @if ($payment->status==1)
                                label-error
                                @else
                                label-success
                                @endif

                                label-pill label-inline mr-2"> {{ $payment->status ==1 ? 'Pending Confirmation' : 'Payment Confirmed'}}</span>
                        </td>
                        <td> {{ $payment->created_at}}</td>
                        @if (Auth::user()->role ==2)
                        <td  >

                                  <a href="{{ route('payment.edit',$payment->id) }} " class="btn btn-light btn-hover-success btn-sm btn-icon mr-2">
                                    <i class="flaticon2-edit text-muted"></i>
                                </a>

                          </td>
                            @endif

                     </tr>
                @endforeach

                </tbody>
            </table>
                {{ $payments->links() }}
        </div>

    </div>

@endsection




