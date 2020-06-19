{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')

    <div class="card card-custom">

        <div class="card-header flex-wrap border-0 pt-6 pb-0">
            <div class="card-title">

            </div>
            <div class="card-toolbar">
                <!--begin::Dropdown-->

                <!--end::Dropdown-->
                <!--begin::Button-->

                <a href="{{ route('attribute.index') }}" class="btn btn-dark font-weight-bolder">
            Back</a>
                <!--end::Button-->
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
                    <th>value</th>
                 {{--   <th>Slug</th>--}}

                 {{--   <th>Parent</th>--}}
                    <th>Status</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
                </thead>

                @foreach($attributesValue as $values)
                    <tr>
                        <td> {{ $values->id}}</td>
                        <td> {{ $values->value}}</td>
                    {{--    <td> {{ $category->slug}}</td>--}}

                   {{--     <td>
                            @if(!$category->isParent())
                                {{ $category->parent->name}}
                            @else
                                <span style="width: 110px;"><span class="label font-weight-bold label-lg  label-light-warning label-inline">Parent</span></span>
                            @endif

                        </td>--}}
                        <td>
                            <!-- Default checked -->
                            <div class="custom-control custom-switch">



                                <span class="switch switch-sm switch-icon  ">

                                    <label>
                                        <input class="toggle-class" type="checkbox"
                                               data-id="{{ $values->id }}"
                                               @if($values->is_active)
                                               checked="checked"
                                               @endif
                                               name="select"/>
                                        <span></span>
                                    </label>
                                </span>


                            </div>



                           </td>

                        <td> {{ $values->created_at}}</td>
 <td>
      <!--end::Daterange-->
     <!--begin::Actions-->
     <form method="POST" action="{{ route('attribute-values-delete', $values->id) }}">
     <a href="{{ route('attribute-values-edit',$values->id) }} " class="btn btn-light btn-hover-success btn-sm btn-icon mr-2">
         <i class="flaticon2-edit text-muted"></i>
     </a>
         @csrf
         {{ method_field('DELETE') }}

         <button type="submit" class="btn delete_confirm btn-light btn-hover-danger btn-sm btn-icon mr-2" data-toggle="tooltip" title='Delete'> <i class="fa fa-trash"> </i></button>
     </form>


    </td>
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
                    confirmButtonText: "Yes, delete it!"
            }).then(function(result) {
                    if ( result.value) {
                        form.submit();
                    }
                });
            });

            $('.toggle-class').change(function() {

                var status = $(this).prop('checked') === true ? 1 : 0;
                let id = $(this).data('id');

                $.ajax({
                    type: "PUT",
                    dataType: "json",
                    url: '{{ route('attribute.value.update.status') }}',
                    data: {'status': status, 'id': id},
                    success: function(data){
                        $.notify('Status updated'  );
                    },
                    error: function(data){
                      console.log(data);
                    }
                });
            })
        })
    </script>
@endsection




