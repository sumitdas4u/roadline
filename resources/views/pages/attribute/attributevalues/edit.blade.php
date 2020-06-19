{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')

    <div class="card card-custom">


        <div class="card-body">
            <form action="{{ route('attribute-values-update',$attributeValue->id) }}"  method="POST">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="card-body">
                    <div class="form-group">
                        <label>Name :</label>
                        <input  name="value" type="text"value="{{ old('value') ? old('value') : $attributeValue->value }}"
                                class="form-control form-control-solid  @error('value') is-invalid @enderror"
                                placeholder="Enter Name"
                                required
                        />
                        @error('value')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>



                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <a href="{{ route('attribute-values-index',$attributeValue->attribute->id) }}">
                        <button type="button" class="btn btn-secondary">Cancel</button>
                    </a>


                </div>
            </form>


        </div>

    </div>

@endsection




