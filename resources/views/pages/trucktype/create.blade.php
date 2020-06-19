{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')

    <div class="card card-custom">


        @if (session('error'))
            <div class="alert alert-custom alert-error fade show" role="alert">
                <div class="alert-icon"><i class="flaticon-error"></i></div>
                <div class="alert-text">{{ session('error') }}</div>
                <div class="alert-close">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true"><i class="ki ki-close"></i></span>
                    </button>
                </div>
            </div>

        @endif

        <div class="card-body">
            <form action="{{ route('product.store') }}"  method="POST"  enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="card-body">

                    <div class="form-group row">
                        <label class="col-form-label col-2 text-lg-left text-left">Photo</label>
                        <div class="col-10">
                            <div class="image-input image-input-empty image-input-outline" id="kt_user_edit_avatar" style="background-image: url(assets/media/users/blank.png)">
                                <div class="image-input-wrapper"></div>
                                <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change Photo ">
                                    <i class="fa fa-pen icon-sm text-muted"></i>
                                    <input type="file" name="photo" accept=".png, .jpg, .jpeg" />
                                    <input type="hidden" name="photo_remove" />
                                </label>
                                <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel Photo">
																			<i class="ki ki-bold-close icon-xs text-muted"></i>
																		</span>
                                <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="remove" data-toggle="tooltip" title="Remove Photo">
																			<i class="ki ki-bold-close icon-xs text-muted"></i>
                                </span>

                            </div>
                            @error('photo')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>



                    <div class="form-group">
                        <label>Name</label>
                        <input  name="name" type="text"value="{{ old('value') }}"
                                class="form-control form-control-solid  @error('name') is-invalid @enderror"
                                placeholder="Enter Name"
                                required
                        />
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror

                    </div>
                    <div class="form-group  ">
                        <label>Category</label>

                            <select name="category" required class="form-control form-control-lg form-control-solid">
                                <option value="" selected>Select Categoty</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{--{{ $selectedRole == $role->id ? 'selected="selected"' : '' }}--}}>{{ $category->name }}</option>
                                    @endForeach
                            </select>
                        @error('category')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <h6 class="text-dark  mb-10 mt-10">Attributes</h6>
                    @foreach($attibutes as $attribute)
                        <div class="form-group  ">
                            <label>{{ $attribute->name }}</label>

                            <select name="attributes[]" class="form-control form-control-lg form-control-solid">
                                <option selected>Select {{ $attribute->name }}</option>
                                @foreach($attribute->values as $value)
                                    <option value="{{ $value->id }}" {{--{{ $selectedRole == $role->id ? 'selected="selected"' : '' }}--}}>{{ $value->value }}</option>
                                @endForeach
                            </select>
                        </div>

                    @endForeach


                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <a href="{{ route('product.index') }}">
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




