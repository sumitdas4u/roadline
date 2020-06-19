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

                <a href="{{ route('categories.create') }}" class="btn btn-primary font-weight-bolder">
                <span class="svg-icon svg-icon-md">
                    <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg-->
                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <rect x="0" y="0" width="24" height="24"/>
                            <circle fill="#000000" cx="9" cy="15" r="6"/>
                            <path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z" fill="#000000" opacity="0.3"/>
                        </g>
                    </svg>
                    <!--end::Svg Icon-->
                </span>New Record</a>
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
            <form method="get"  action="{{ route('category-search') }}">
            <!--begin::Search Form-->
            <div class="mt-2 mb-5 mt-lg-5 mb-lg-10">
                <div class="row align-items-center">

                    <div class="col-lg-9 col-xl-8 ">
                        <div class="row align-items-center">
                            <div class="col-md-8 my-2 my-md-0">
                                <div class="input-icon">
                                    <input type="text" class="form-control" placeholder="Search..." name="keyword"/>
                                    <span><i class="flaticon2-search-1 text-muted"></i></span>
                                </div>
                            </div>

                            <div class="col-md-4 my-2 my-md-0">
                                <div class="d-flex align-items-center">
                                    <label class="mr-3 mb-0 d-none d-md-block">Status:</label>
                                    <select class="form-control"  name="status">
                                        <option value="">All</option>
                                        <option value="1">Active</option>
                                        <option value="0">Disable</option>

                                    </select>
                                </div>
                            </div>
                        {{--    <div class="col-md-4 my-2 my-md-0">
                                <div class="d-flex align-items-center">
                                    <label class="mr-3 mb-0 d-none d-md-block">Parent</label>
                                    <select name="isparent" class="form-control" >
                                        <option value="0">All</option>
                                        <option value="1">Parent Only</option>

                                    </select>
                                </div>
                            </div>--}}
                        </div>
                    </div>
                    <div class="col-lg-3 col-xl-4 mt-5 mt-lg-0">
                        <button type="submit" class="btn btn-light-primary px-6 font-weight-bold">Search</button>

                    </div>

                </div>
            </div>
            </form>
            <!--end::Search Form-->

            <table class="table table-bordered table-hover" id="kt_datatable">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                 {{--   <th>Slug</th>--}}
                    <th>Description</th>
                 {{--   <th>Parent</th>--}}
                    <th>Status</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
                </thead>

                @foreach($categories as $category)
                    <tr>
                        <td> {{ $category->id}}</td>
                        <td> {{ $category->name}}</td>
                    {{--    <td> {{ $category->slug}}</td>--}}
                        <td> {{ $category->description}}</td>
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
                                               data-id="{{ $category->id }}"
                                               @if($category->is_active)
                                               checked="checked"
                                               @endif
                                               name="select"/>
                                        <span></span>
                                    </label>
                                </span>


                            </div>



                           </td>

                        <td> {{ $category->created_at}}</td>
 <td>
      <!--end::Daterange-->
     <!--begin::Actions-->

     <a href="{{ URL::to('categories/' . $category->id.'/edit') }}" class="btn btn-light btn-hover-success btn-sm btn-icon mr-2">
         <i class="flaticon2-edit text-muted"></i>
     </a>
{{--     <a href="#" class="btn delete_confirm btn-light btn-hover-danger btn-sm btn-icon mr-2">
         <i class="flaticon2-delete text-muted"></i>
     </a>--}}
   {{--  <div class="dropdown dropdown-inline" data-toggle="tooltip" title="Quick actions" data-placement="top">
         <a href="#" class="btn btn-icon btn-light-primary btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
             <i class="ki ki-gear icon-1x"></i>
         </a>
         <div class="dropdown-menu p-0 m-0 dropdown-menu-md dropdown-menu-right">
             <!--begin::Navigation-->
             <ul class="navi navi-hover">
                 <li class="navi-header pb-1">
                     <span class="text-primary text-uppercase font-weight-bold font-size-sm">Action Bar</span>
                 </li>
                 <li class="navi-item">
                     <a href="#" class="navi-link">
														<span class="navi-icon">
															<i class="flaticon2-writing"></i>
														</span>
                         <span class="navi-text">Change Status</span>
                     </a>
                 </li>

             </ul>
             <!--end::Navigation-->
         </div>
     </div>
--}} </td>
                     </tr>
                @endforeach

                </tbody>
            </table>
            {{ $categories->links() }}
        </div>

    </div>
    <script>

        $(function() {

            $(".delete_confirm").click(function(e) {
                alert();
                Swal.fire({
                    title: "Are you sure?",
                    text: "You won t be able to revert this!",
                icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Yes, delete it!"
            }).then(function(result) {
                    if (result.value) {
                        Swal.fire(
                            "Deleted!",
                            "Your file has been deleted.",
                            "success"
                        )
                    }
                });
            });

            $('.toggle-class').change(function() {

                var status = $(this).prop('checked') === true ? 1 : 0;
                let id = $(this).data('id');

                $.ajax({
                    type: "PUT",
                    dataType: "json",
                    url: '{{ route('categories.update.status') }}',
                    data: {'status': status, 'id': id},
                    success: function(data){
                        $.notify('Status updated'  );
                    }
                });
            })
        })
    </script>
@endsection




