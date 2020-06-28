{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')

    <div class="card card-custom">


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
            <form action="{{ route('payment.update',$payment->id) }}"  method="POST" >
                {{ csrf_field() }}
                {{ method_field('PATCH') }}
                <div class="card-body">
                    <div class="form-group">
                        <strong class="text-primary">Payment Id :</strong>
                        <span>  {{ $payment->id  }}</span>
                    </div>
                    <div class="form-group">
                        <strong class="text-primary">Enquiry Id :</strong>
                         <span>  {{ $payment->enquiry_id  }}</span>
                    </div>
                    <div class="form-group">
                        <strong class="text-primary">Quotation Id :</strong>
                        <span>  {{ $payment->quotation_id   }}</span>
                    </div>
                    <div class="form-group">
                        <strong class="text-primary">Customer Details :</strong>
                        <span>  {{ $payment->users->name}} ( {{ $payment->users->mobile}}, {{ $payment->users->email}} ) </span>
                    </div>

                    <div class="form-group">
                        <label>Amount :</label>
                        <input  name="amount" type="text"value="{{ old('amount') ? old('amount') : $payment->amount ?? '' }}"
                                class="form-control form-control-solid  @error('amount') is-invalid @enderror"
                                placeholder="Enter paid amount"
                                required
                        />
                        @error('amount')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label>Payment Date :</label>

                        <div class="input-group date" >
                        <input
                            readonly id="kt_datepicker_3"
                            name="payment_date" type="text"value="{{ old('payment_date') ? old('payment_date') : $payment->payment_date ?? '' }}"
                                class="form-control form-control-solid  @error('payment_date') is-invalid @enderror"
                                placeholder="Payment Date"
                                required
                        />
                            <div class="input-group-append">
							<span class="input-group-text">
								<i class="la la-calendar"></i>
							</span>
                            </div>
                        </div>
                        @error('payment_date')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleTextarea">Payment Details</label>
                        <textarea
                            name="payment_mode"
                            class="form-control form-control-solid" rows="3"
                            class="form-control form-control-solid  @error('payment_mode') is-invalid @enderror"
                            placeholder="Payment Details"
                        > {{ old('payment_mode') ? old('payment_mode') : $payment->payment_mode ?? '' }}</textarea>
                        @error('payment_mode')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleTextarea">Payment Status</label>
                        <select name="status"
                                class="form-control form-control-solid" rows="3"
                                class="form-control form-control-solid  @error('status') is-invalid @enderror"
                                 >
                            <option value="1" {{ $payment->status ==1 ? 'selected' : '' }} >Confirmation Pending</option>
                            <option value="2" {{ $payment->status ==2 ? 'selected' : '' }}>Payment Received</option>

                        </select>

                        @error('status')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>



                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary mr-2">Update</button>
                    <a href="{{ route('payment.index') }}">
                        <button type="button" class="btn btn-secondary">Cancel</button>
                    </a>


                </div>
            </form>


        </div>

    </div>

    <script>


        jQuery(document).ready(function() {
            $('#kt_datepicker_3, #kt_datepicker_3_validate').datepicker({
                rtl: KTUtil.isRTL(),
                todayBtn: "linked",
                clearBtn: true,
                todayHighlight: true

            });
        });

    </script>
@endsection




