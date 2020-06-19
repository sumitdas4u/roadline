{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')

    <div class="card card-custom">


        <div class="card-body">
            <form action="{{ route('categories.store')}}"  method="POST">
                {{ csrf_field() }}

                <div class="card-body">
                    <div class="form-group">
                        <label>Name :</label>
                        <input  name="name" type="text"value="{{ old('name')}}"
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
                    <div class="form-group">
                        <label>Description :</label>
                        <input name="description"  type="text"value="{{ old('name')}}" class="form-control form-control-solid" placeholder="Enter Description"/>

                        <span class="form-text text-muted">Please enter category description</span>
                    </div>


                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <a href="{{ route('categories.index') }}">
                        <button type="button" class="btn btn-secondary">Cancel</button>
                    </a>


                </div>
            </form>


        </div>

    </div>

@endsection




