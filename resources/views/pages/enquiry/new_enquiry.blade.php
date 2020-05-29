
<!DOCTYPE html>
<!--
Template Name: Metronic - Bootstrap 4 HTML, React, Angular 9 & VueJS Admin Dashboard Theme
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: https://1.envato.market/EA4JP
Renew Support: https://1.envato.market/EA4JP
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" {{ Metronic::printAttrs('html') }} {{ Metronic::printClasses('html') }}>
<!--begin::Head-->
<head>
    <meta charset="utf-8" />
    <title>{{ config('app.name') }} | @yield('title', $page_title ?? '')</title>

    {{-- Meta Data --}}
    <meta name="description" content="@yield('page_description', $page_description ?? '')"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>

    {{-- Favicon --}}
    <link rel="shortcut icon" href="{{ asset('media/logos/favicon.ico') }}" />

{{-- Fonts --}}
{{ Metronic::getGoogleFontsInclude() }}
    <!--end::Fonts-->
    <!--begin::Page Custom Styles(used by this page)-->

    <link href="{{ asset('css/pages/enquiry/new_enquiry_page.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/pages/wizard/wizard-4.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Page Custom Styles-->
    <!--begin::Global Theme Styles(used by all pages)-->
    <link href="{{ asset('plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('plugins/custom/prismjs/prismjs.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Global Theme Styles-->
    <!--begin::Layout Themes(used by all pages)-->

    <link href="{{ asset('css/themes/layout/header/base/light.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/themes/layout/header/menu/light.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/themes/layout/brand/dark.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/themes/layout/aside/dark.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Layout Themes-->
</head>
<!--end::Head-->
<!--begin::Body-->
<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
<!--begin::Main-->
<div class="d-flex flex-column flex-root">
    <!--begin::Login-->
    <div class="login login-2 login-signin-on d-flex flex-column flex-lg-row flex-column-fluid bg-white" id="kt_login">
        <!--begin::Aside-->
        <div class="login-aside order-1 order-lg-1 d-flex  flex-row-auto position-relative overflow-hidden">

            <div class="card card-custom    flex-column-fluid">
                <div class="card-body ">
                    <!--begin: Wizard-->
                    <div class="wizard wizard-4" id="kt_wizard_v4" data-wizard-state="first" data-wizard-clickable="true">
                        <!--begin: Wizard Nav-->
                        <div class="wizard-nav">
                            <div class="wizard-steps">
                                <!--begin::Wizard Step 1 Nav-->
                                <div class="wizard-step" data-wizard-type="step" data-wizard-state="current">
                                    <div class="wizard-wrapper">
                                        <div class="wizard-number">
                                            1
                                        </div>
                                        <div class="wizard-label">
                                            <div class="wizard-title">
                                                Add
                                            </div>
                                            <div class="wizard-desc">
                                                Create
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end::Wizard Step 1 Nav-->

                                <!--begin::Wizard Step 2 Nav-->
                                <div class="wizard-step" data-wizard-type="step" data-wizard-state="pending">
                                    <div class="wizard-wrapper">
                                        <div class="wizard-number">
                                            2
                                        </div>
                                        <div class="wizard-label">
                                            <div class="wizard-title">
                                                Your
                                            </div>
                                            <div class="wizard-desc">
                                                Setup
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end::Wizard Step 2 Nav-->

                                <!--begin::Wizard Step 3 Nav-->
                                <div class="wizard-step" data-wizard-type="step" data-wizard-state="pending">
                                    <div class="wizard-wrapper">
                                        <div class="wizard-number">
                                            3
                                        </div>
                                        <div class="wizard-label">
                                            <div class="wizard-title">
                                                Make
                                            </div>
                                            <div class="wizard-desc">
                                                Add
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end::Wizard Step 3 Nav-->

                                <!--begin::Wizard Step 4 Nav-->
                                <div class="wizard-step" data-wizard-type="step" data-wizard-state="pending">
                                    <div class="wizard-wrapper">
                                        <div class="wizard-number">
                                            4
                                        </div>
                                        <div class="wizard-label">
                                            <div class="wizard-title">
                                                Comple
                                            </div>
                                            <div class="wizard-desc">
                                                Review
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end::Wizard Step 4 Nav-->
                            </div>
                        </div>
                        <!--end: Wizard Nav-->

                        <!--begin: Wizard Body-->
                        <div class="card card-custom  rounded-top-0">
                            <div class="card-body p-0">
                                <div class="row justify-content-center p-10">
                                    <div class="col-xl-12 col-xxl-10">
                                        <!--begin: Wizard Form-->
                                        <form class="form mt-0 mt-lg-10 fv-plugins-bootstrap fv-plugins-framework" id="kt_form">
                                            <!--begin: Wizard Step 1-->
                                            <div class="pb-5" data-wizard-type="step-content" data-wizard-state="current">
                                                <div class="mb-10 font-weight-bold text-dark">Enter your Shipment Details</div>
                                                <!--begin::Input-->
                                                <div class="row">
                                                    <div class="col-xl-6">
                                                        <!--begin::Input-->
                                                        <div class="form-group fv-plugins-icon-container">
                                                            <label>Pickup</label>
                                                            <input type="text" class="form-control form-control-solid form-control-lg" name="pickup" placeholder="Pickup City" value="John">
                                                            <span class="form-text text-muted">Please enter your pickup location.</span>
                                                            <div class="fv-plugins-message-container"></div></div>
                                                        <!--end::Input-->
                                                    </div>
                                                    <div class="col-xl-6">
                                                        <!--begin::Input-->
                                                        <div class="form-group fv-plugins-icon-container">
                                                            <label>Drop</label>
                                                            <input type="text" class="form-control form-control-solid form-control-lg" name="drop" placeholder="Drop City" value="Wick">
                                                            <span class="form-text text-muted">Please enter your drop city.</span>
                                                            <div class="fv-plugins-message-container"></div></div>
                                                        <!--end::Input-->
                                                    </div>
                                                </div>

                                                <div class="form-group fv-plugins-icon-container">

                                                    <label>Date</label>
                                                    <div class="input-group date">
                                                        <input type="text" class="form-control" readonly=""   id="kt_datepicker_3">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">
                                                                <i class="la la-calendar"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <span class="form-text text-muted">Please enter your truck type.</span>
                                                    <div class="fv-plugins-message-container"></div>
                                                </div>
                                                <!--end::Input-->

                                                <!--begin::Input-->
                                                <div class="form-group fv-plugins-icon-container">
                                                    <label>Truck Types</label>
                                                    <input type="text" class="form-control form-control-solid form-control-lg" name="drop" placeholder="truck_type" value="Wick">
                                                    <span class="form-text text-muted">Please enter your truck type.</span>
                                                    <div class="fv-plugins-message-container"></div></div>
                                                <!--end::Input-->

                                            </div>
                                            <!--end: Wizard Step 1-->

                                            <!--begin: Wizard Step 2-->
                                            <div class="pb-5" data-wizard-type="step-content">
                                                <div class="mb-10 font-weight-bold text-dark">Setup Your Address</div>
                                                <!--begin::Input-->
                                                <div class="form-group fv-plugins-icon-container">
                                                    <label>Address Line 1</label>
                                                    <input type="text" class="form-control form-control-solid form-control-lg" name="address1" placeholder="Address Line 1" value="Address Line 1">
                                                    <span class="form-text text-muted">Please enter your Address.</span>
                                                    <div class="fv-plugins-message-container"></div></div>
                                                <!--end::Input-->

                                                <!--begin::Input-->
                                                <div class="form-group">
                                                    <label>Address Line 2</label>
                                                    <input type="text" class="form-control form-control-solid form-control-lg" name="address2" placeholder="Address Line 2" value="Address Line 2">
                                                    <span class="form-text text-muted">Please enter your Address.</span>
                                                </div>
                                                <!--end::Input-->
                                                <div class="row">
                                                    <div class="col-xl-6">
                                                        <!--begin::Input-->
                                                        <div class="form-group fv-plugins-icon-container">
                                                            <label>Postcode</label>
                                                            <input type="text" class="form-control form-control-solid form-control-lg" name="postcode" placeholder="Postcode" value="3000">
                                                            <span class="form-text text-muted">Please enter your Postcode.</span>
                                                            <div class="fv-plugins-message-container"></div></div>
                                                        <!--end::Input-->
                                                    </div>
                                                    <div class="col-xl-6">
                                                        <!--begin::Input-->
                                                        <div class="form-group fv-plugins-icon-container">
                                                            <label>City</label>
                                                            <input type="text" class="form-control form-control-solid form-control-lg" name="state" placeholder="City" value="Melbourne">
                                                            <span class="form-text text-muted">Please enter your City.</span>
                                                            <div class="fv-plugins-message-container"></div></div>
                                                        <!--end::Input-->
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xl-6">
                                                        <!--begin::Input-->
                                                        <div class="form-group fv-plugins-icon-container">
                                                            <label>State</label>
                                                            <input type="text" class="form-control form-control-solid form-control-lg" name="state" placeholder="State" value="VIC">
                                                            <span class="form-text text-muted">Please enter your State.</span>
                                                            <div class="fv-plugins-message-container"></div></div>
                                                        <!--end::Input-->
                                                    </div>
                                                    <div class="col-xl-6">
                                                        <!--begin::Select-->
                                                        <div class="form-group fv-plugins-icon-container">
                                                            <label>Country</label>
                                                            <select name="country" class="form-control form-control-solid form-control-lg">
                                                                <option value="">Select</option>
                                                                <option value="AF">Afghanistan</option>
                                                                <option value="AX">Åland Islands</option>
                                                                <option value="AL">Albania</option>
                                                                <option value="DZ">Algeria</option>
                                                                <option value="AS">American Samoa</option>
                                                                <option value="AD">Andorra</option>
                                                                <option value="AO">Angola</option>
                                                                <option value="AI">Anguilla</option>
                                                                <option value="AQ">Antarctica</option>
                                                                <option value="AG">Antigua and Barbuda</option>
                                                                <option value="AR">Argentina</option>
                                                                <option value="AM">Armenia</option>
                                                                <option value="AW">Aruba</option>
                                                                <option value="AU" selected="">Australia</option>
                                                                <option value="AT">Austria</option>
                                                                <option value="AZ">Azerbaijan</option>
                                                                <option value="BS">Bahamas</option>
                                                                <option value="BH">Bahrain</option>
                                                                <option value="BD">Bangladesh</option>
                                                                <option value="BB">Barbados</option>
                                                                <option value="BY">Belarus</option>
                                                                <option value="BE">Belgium</option>
                                                                <option value="BZ">Belize</option>
                                                                <option value="BJ">Benin</option>
                                                                <option value="BM">Bermuda</option>
                                                                <option value="BT">Bhutan</option>
                                                                <option value="BO">Bolivia, Plurinational State of</option>
                                                                <option value="BQ">Bonaire, Sint Eustatius and Saba</option>
                                                                <option value="BA">Bosnia and Herzegovina</option>
                                                                <option value="BW">Botswana</option>
                                                                <option value="BV">Bouvet Island</option>
                                                                <option value="BR">Brazil</option>
                                                                <option value="IO">British Indian Ocean Territory</option>
                                                                <option value="BN">Brunei Darussalam</option>
                                                                <option value="BG">Bulgaria</option>
                                                                <option value="BF">Burkina Faso</option>




                                                                <option value="ZM">Zambia</option>
                                                                <option value="ZW">Zimbabwe</option>
                                                            </select>
                                                            <div class="fv-plugins-message-container"></div></div>
                                                        <!--end::Select-->
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end: Wizard Step 2-->

                                            <!--begin: Wizard Step 3-->
                                            <div class="pb-5" data-wizard-type="step-content">
                                                <div class="mb-10 font-weight-bold text-dark">Enter your Payment Details</div>
                                                <div class="row">
                                                    <div class="col-xl-6">
                                                        <!--begin::Input-->
                                                        <div class="form-group fv-plugins-icon-container">
                                                            <label>Name on Card</label>
                                                            <input type="text" class="form-control form-control-solid form-control-lg" name="ccname" placeholder="Card Name" value="John Wick">
                                                            <span class="form-text text-muted">Please enter your Card Name.</span>
                                                            <div class="fv-plugins-message-container"></div></div>
                                                        <!--end::Input-->
                                                    </div>
                                                    <div class="col-xl-6">
                                                        <!--begin::Input-->
                                                        <div class="form-group fv-plugins-icon-container">
                                                            <label>Card Number</label>
                                                            <input type="text" class="form-control form-control-solid form-control-lg" name="ccnumber" placeholder="Card Number" value="4444 3333 2222 1111">
                                                            <span class="form-text text-muted">Please enter your Address.</span>
                                                            <div class="fv-plugins-message-container"></div></div>
                                                        <!--end::Input-->
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xl-4">
                                                        <!--begin::Input-->
                                                        <div class="form-group fv-plugins-icon-container">
                                                            <label>Card Expiry Month</label>
                                                            <input type="number" class="form-control form-control-solid form-control-lg" name="ccmonth" placeholder="Card Expiry Month" value="01">
                                                            <span class="form-text text-muted">Please enter your Card Expiry Month.</span>
                                                            <div class="fv-plugins-message-container"></div></div>
                                                        <!--end::Input-->
                                                    </div>
                                                    <div class="col-xl-4">
                                                        <!--begin::Input-->
                                                        <div class="form-group fv-plugins-icon-container">
                                                            <label>Card Expiry Year</label>
                                                            <input type="number" class="form-control form-control-solid form-control-lg" name="ccyear" placeholder="Card Expire Year" value="21">
                                                            <span class="form-text text-muted">Please enter your Card Expiry Year.</span>
                                                            <div class="fv-plugins-message-container"></div></div>
                                                        <!--end::Input-->
                                                    </div>
                                                    <div class="col-xl-4">
                                                        <!--begin::Input-->
                                                        <div class="form-group fv-plugins-icon-container">
                                                            <label>Card CVV Number</label>
                                                            <input type="password" class="form-control form-control-solid form-control-lg" name="cccvv" placeholder="Card CVV Number" value="123">
                                                            <span class="form-text text-muted">Please enter your Card CVV Number.</span>
                                                            <div class="fv-plugins-message-container"></div></div>
                                                        <!--end::Input-->
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end: Wizard Step 3-->

                                            <!--begin: Wizard Step 4-->
                                            <div class="pb-5" data-wizard-type="step-content">
                                                <!--begin::Section-->
                                                <h4 class="mb-10 font-weight-bold text-dark">Review your Details and Submit</h4>
                                                <h6 class="font-weight-bolder mb-3">
                                                    Current Address:
                                                </h6>
                                                <div class="text-dark-50 line-height-lg">
                                                    <div>Address Line 1</div>
                                                    <div>Address Line 2</div>
                                                    <div>Melbourne 3000, VIC, Australia</div>
                                                </div>
                                                <div class="separator separator-dashed my-5"></div>
                                                <!--end::Section-->

                                                <!--begin::Section-->
                                                <h6 class="font-weight-bolder mb-3">
                                                    Delivery Details:
                                                </h6>
                                                <div class="text-dark-50 line-height-lg">
                                                    <div>Package: Complete Workstation (Monitor, Computer, Keyboard &amp; Mouse)</div>
                                                    <div>Weight: 25kg</div>
                                                    <div>Dimensions: 110cm (w) x 90cm (h) x 150cm (L)</div>
                                                </div>
                                                <div class="separator separator-dashed my-5"></div>
                                                <!--end::Section-->

                                                <!--begin::Section-->
                                                <h6 class="font-weight-bolder mb-3">
                                                    Delivery Service Type:
                                                </h6>
                                                <div class="text-dark-50 line-height-lg">
                                                    <div>Overnight Delivery with Regular Packaging</div>
                                                    <div>Preferred Morning (8:00AM - 11:00AM) Delivery</div>
                                                </div>
                                                <div class="separator separator-dashed my-5"></div>
                                                <!--end::Section-->

                                                <!--begin::Section-->
                                                <h6 class="font-weight-bolder mb-3">
                                                    Delivery Address:
                                                </h6>
                                                <div class="text-dark-50 line-height-lg">
                                                    <div>Address Line 1</div>
                                                    <div>Address Line 2</div>
                                                    <div>Preston 3072, VIC, Australia</div>
                                                </div>
                                                <!--end::Section-->
                                            </div>
                                            <!--end: Wizard Step 4-->

                                            <!--begin: Wizard Actions-->
                                            <div class="d-flex justify-content-between border-top mt-5 pt-10">
                                                <div class="mr-2">
                                                    <button class="btn btn-light-primary font-weight-bold text-uppercase px-9 py-4" data-wizard-type="action-prev">
                                                        Previous
                                                    </button>
                                                </div>
                                                <div>
                                                    <button class="btn btn-success font-weight-bold text-uppercase px-9 py-4" data-wizard-type="action-submit">
                                                        Submit
                                                    </button>
                                                    <button class="btn btn-primary font-weight-bold text-uppercase px-9 py-4" data-wizard-type="action-next">
                                                        Next Step
                                                    </button>
                                                </div>
                                            </div>
                                            <!--end: Wizard Actions-->
                                            <div></div><div></div><div></div></form>
                                        <!--end: Wizard Form-->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end: Wizard Bpdy-->
                    </div>
                    <!--end: Wizard-->
                </div>
            </div>


        </div>
        <!--begin::Aside-->
        <!--begin::Content-->
        <div class="  order-2 order-lg-2 d-flex flex-column w-100 pb-0 " style="background-color: yellow;">

            <div id="app" class="container_map ">

                 <test-component class="hide-mobile"></test-component>


                <div class="footer">
                    <div class="  ">
                        <div class="card-body">




                            <!--begin: Items-->
                            <div class="d-flex align-items-center ">
                                <!--begin: Item-->
                                <div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
                <span class="mr-4">
                    <i class="flaticon-piggy-bank icon-2x text-muted font-weight-bold"></i>
                </span>
                                    <div class="d-flex flex-column text-dark-75">
                                        <span class="font-weight-bolder font-size-sm">Earnings</span>
                                        <span class="font-weight-bolder font-size-h5"><span class="text-dark-50 font-weight-bold">$</span>249,500</span>
                                    </div>
                                </div>
                                <!--end: Item-->

                                <!--begin: Item-->
                                <div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
                <span class="mr-4">
                    <i class="flaticon-confetti icon-2x text-muted font-weight-bold"></i>
                </span>
                                    <div class="d-flex flex-column text-dark-75">
                                        <span class="font-weight-bolder font-size-sm">Expenses</span>
                                        <span class="font-weight-bolder font-size-h5"><span class="text-dark-50 font-weight-bold">$</span>164,700</span>
                                    </div>
                                </div>
                                <!--end: Item-->

                                <!--begin: Item-->
                                <div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
                <span class="mr-4">
                    <i class="flaticon-pie-chart icon-2x text-muted font-weight-bold"></i>
                </span>
                                    <div class="d-flex flex-column text-dark-75">
                                        <span class="font-weight-bolder font-size-sm">Net</span>
                                        <span class="font-weight-bolder font-size-h5"><span class="text-dark-50 font-weight-bold">$</span>782,300</span>
                                    </div>
                                </div>
                                <!--end: Item-->

                                <!--begin: Item-->
                                <div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
                <span class="mr-4">
                    <i class="flaticon-file-2 icon-2x text-muted font-weight-bold"></i>
                </span>
                                    <div class="d-flex flex-column flex-lg-fill">
                                        <span class="text-dark-75 font-weight-bolder font-size-sm">73 Tasks</span>
                                        <a href="#" class="text-primary font-weight-bolder">View</a>
                                    </div>
                                </div>
                                <!--end: Item-->

                                <!--begin: Item-->
                                <div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
                <span class="mr-4">
                    <i class="flaticon-chat-1 icon-2x text-muted font-weight-bold"></i>
                </span>
                                    <div class="d-flex flex-column">
                                        <span class="text-dark-75 font-weight-bolder font-size-sm">648 Comments</span>
                                        <a href="#" class="text-primary font-weight-bolder">View</a>
                                    </div>
                                </div>
                                <!--end: Item-->

                                <!--begin: Item-->

                                <!--end: Item-->
                            </div>
                            <!--begin: Items-->
                        </div>
                    </div>
                </div>
            </div>

            <!--end::Image-->
        </div>
        <!--end::Content-->
    </div>
    <!--end::Login-->
</div>
<!--end::Main-->
<style>
    .footer {
height: 15%;
    }

    .container_map {

        height: 100%;

    }


</style>

<!--begin::Global Config(global config for global JS scripts)-->
<script>
    var KTAppSettings = {!! json_encode(config('layout.js'), JSON_PRETTY_PRINT|JSON_UNESCAPED_SLASHES) !!};
</script>
<!--end::Global Config-->
<!--begin::Global Theme Bundle(used by all pages)-->
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('plugins/global/plugins.bundle.js') }} "></script>
<script src="{{ asset('plugins/custom/prismjs/prismjs.bundle.js') }}"></script>
<script src="{{ asset('js/scripts.bundle.js') }}"></script>
<!--end::Global Theme Bundle-->

<!--begin::Page Vendors(used by this page)-->


<!--end::Page Vendors-->
<!--begin::Page Scripts(used by this page)-->

<script src="{{ asset('js/pages/custom/wizard/wizard-4.js') }} "></script>
<!--end::Page Scripts-->
<script>
    jQuery(document).ready(function () {
        $('#kt_datepicker_3').datepicker({
            format: 'mm/dd/yyyy'
        });
    });

</script>
</body>
<!--end::Body-->
</html>
