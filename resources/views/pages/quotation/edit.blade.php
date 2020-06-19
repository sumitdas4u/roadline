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
            <form action="{{ route('quotation.update',$quotation->id) }}"  method="POST" >
                {{ csrf_field() }}
                {{ method_field('PATCH') }}
                <div class="card-body">
                    <div class="form-group">
                        <strong class="text-primary">Quotation Id :</strong>
                        <span>  {{ $quotation->id  }}</span>
                    </div>
                    <div class="form-group">
                        <strong class="text-primary">Enquiry Id :</strong>
                         <span>  {{ $quotation->enquiry_id  }}</span>
                    </div>
                    <div class="form-group">
                        <strong class="text-primary">Customer Details :</strong>
                        <span>  {{ $quotation->users->name}} ( {{ $quotation->users->mobile}}, {{ $quotation->users->email}} ) </span>
                    </div>
                    <div class="form-group">
                        <strong class="text-primary"> Truck Type :</strong>
                        <span>  {{  $quotation->product_name}}   </span>
                    </div>
                    <div class="form-group">
                        <strong class="text-primary">Goods Type :</strong>
                        @foreach($quotation->goods_types_list as $goods_type)
                            <span class="m-1 label label-outline-info label-inline  ">  {{ $goods_type->name }}</span>
                        @endforeach
                    </div>
                    <div class="form-group">
                        <strong class="text-primary">Pick up:</strong>
                        <span>  {{  $quotation->pickup_address}}  </span>
                    </div>
                    <div class="form-group">
                        <strong class="text-primary">Drop :</strong>
                        <span>  {{  $quotation->drop_address}} </span>
                    </div>

                    <div class="form-group">
                        <strong class="text-primary">Shiping date:</strong>
                        <span>  {{  $quotation->shipment_date}}   </span>
                    </div>

                    <div class="form-group">
                        <label>Price :</label>
                        <input  name="price" type="text"value="{{ old('price') ? old('price') : $quotation->price }}"
                                class="form-control form-control-solid  @error('price') is-invalid @enderror"
                                placeholder="Enter price"
                                required
                        />
                        @error('price')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Notes :</label>
                        <input  name="notes" type="text"value="{{ old('notes') ? old('notes') : $quotation->notes }}"
                                class="form-control form-control-solid  @error('notes') is-invalid @enderror"
                                placeholder="any related infomation "
                                required
                        />
                        @error('notes')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>



                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary mr-2">Update</button>
                    <a href="{{ route('quotation.index') }}">
                        <button type="button" class="btn btn-secondary">Cancel</button>
                    </a>


                </div>
            </form>


        </div>

    </div>

    <script>
        // Class definition
        var KTUserEdit = function () {
            // Base elements
            var avatar;

            var initUserForm = function() {
                avatar = new KTImageInput('kt_user_edit_avatar');
            }

            return {
                // public functions
                init: function() {
                    initUserForm();
                }
            };
        }();

        jQuery(document).ready(function() {
            KTUserEdit.init();
        });

    </script>
@endsection




