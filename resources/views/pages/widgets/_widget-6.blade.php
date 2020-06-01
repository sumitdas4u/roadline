{{-- Advance Table Widget 2 --}}

<div class="card card-custom {{ @$class }}">
    {{-- Header --}}
    <div class="card-header border-0 pt-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label font-weight-bolder text-dark">New Quotation</span>

        </h3>

    </div>

    {{-- Body --}}
    <div class="card-body pt-3 pb-0">
        {{-- Table --}}
        <div class="table-responsive">
            <table class="table table-borderless table-vertical-center">
                <thead>
                    <tr>
                        <th class="p-0" style="width: 50px"></th>
                        <th class="p-0" style="min-width: 200px"></th>
                        <th class="p-0" style="min-width: 100px"></th>
                        <th class="p-0" style="min-width: 125px"></th>
                        <th class="p-0" style="min-width: 110px"></th>
                        <th class="p-0" style="min-width: 150px"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="pl-0 py-4">
                            <div class="symbol symbol-50 symbol-light mr-1">
                                <span class="font-weight-bolder">Email:</span>
                                <a class="text-muted font-weight-bold text-hover-primary" href="#">bprow@bnc.cc</a>
                            </div>
                        </td>
                        <td class="pl-0 py-4">
                            <a href="#" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg"> Outstanding</a>
                            <div>
                                <span class="font-weight-bolder">Email:</span>
                                <a class="text-muted font-weight-bold text-hover-primary" href="#">bprow@bnc.cc</a>
                            </div>
                        </td>
                        <td class="text-right">
                            <span class="text-dark-75 font-weight-bolder d-block font-size-lg">
                                $2,000,000
                            </span>
                            <span class="text-muted font-weight-bold">
                                Paid
                            </span>
                        </td>
                        <td class="text-right">
                            <span class="text-muted font-weight-500">
                            ReactJs, HTML
                            </span>
                        </td>
                        <td class="text-right">
                            <span class="label label-lg label-light-primary label-inline">Approved</span>
                        </td>
                        <td class="text-right pr-0">

                            <a href="#" class="btn btn-icon btn-light btn-sm mx-3">
                                {{ Metronic::getSVG("media/svg/icons/Communication/Write.svg", "svg-icon-md svg-icon-primary") }}
                            </a>

                        </td>
                    </tr>


                </tbody>
            </table>
        </div>
    </div>
</div>
