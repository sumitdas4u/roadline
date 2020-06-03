// App.vue file
<template>
    <div class="d-flex flex-column flex-root"  id="app">
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
                                                    Shipment
                                                </div>
                                                <div class="wizard-desc">
                                                    Details
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
                                                    Account
                                                </div>
                                                <div class="wizard-desc">
                                                    Verification
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
                                                    Personal
                                                </div>
                                                <div class="wizard-desc">
                                                    Details
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
                                                    Complete
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
                                            <form class="form mt-0 mt-lg-10 fv-plugins-bootstrap fv-plugins-framework"  v-on:submit.prevent="createEnquiry"    id="kt_form">
                                                <!--begin: Wizard Step 1-->
                                                <div class="pb-5" data-wizard-type="step-content" data-wizard-state="current">

                                                    <!--begin::Input-->
                                                    <div class="row">
                                                        <div class="col-xl-6">
                                                            <!--begin::Input-->
                                                            <div class="form-group fv-plugins-icon-container">
                                                                <label>Pickup</label>

                                                                <autocompleteTextField
                                                                    @inputData="updatePickup"


                                                                    placeholder="Pickup City"
                                                                    :select-first-on-enter="true">
                                                                </autocompleteTextField>
                                                                <input type="hidden" name="pickup"
                                                                       :value="this.pickupAddress"/>
                                                                <span class="form-text text-muted">Please enter your pickup city.</span>
                                                                <div class="fv-plugins-message-container"></div></div>
                                                            <!--end::Input-->
                                                        </div>
                                                        <div class="col-xl-6">
                                                            <!--begin::Input-->
                                                            <div class="form-group fv-plugins-icon-container">
                                                                <label>Drop</label>
                                                                <autocompleteTextField
                                                                    @inputData="updateDrop"
                                                                    name=""
                                                                    placeholder="Drop City"
                                                                >
                                                                </autocompleteTextField>
                                                                <input type="hidden" name="drop"
                                                                       :value="this.dropAddress"/>
                                                                <span class="form-text text-muted">Please enter your drop city.</span>
                                                                <div class="fv-plugins-message-container"></div></div>
                                                            <!--end::Input-->
                                                        </div>
                                                    </div>

                                                    <div class="form-group fv-plugins-icon-container">

                                                        <label>Date</label>

                                                            <b-form-datepicker  class="form-control form-control-solid form-control-lg"
                                                                                id="datepicker-buttons"
                                                                                v-model="shippingDate" name="shiping_date"
                                                                                today-button
                                                                                reset-button
                                                                                close-button
                                                                                locale="en"
                                                                                placeholder="Select Shipment Date"
                                                            ></b-form-datepicker>


                                                        <div class="fv-plugins-message-container"></div>
                                                    </div>
                                                    <!--end::Input-->

                                                    <!--begin::Input-->
                                                    <div class="form-group fv-plugins-icon-container">



                                                        <b-dropdown id="dropdown-1" text="Select Truck Types"  block variant="warning" >
                                                            <b-dropdown-item >

                                                                <div class="d-flex align-items-center ">
                                                                    <!--begin::Symbol-->
                                                                    <div class="symbol symbol-40  mr-5">
                <span class="symbol-label">
                    <img src="https://truckguru.co.in/uploads/tata%20407.png" class="h-75 align-self-end" alt="">
                </span>
                                                                    </div>
                                                                    <!--end::Symbol-->

                                                                    <!--begin::Text-->
                                                                    <div class="d-flex flex-column flex-grow-1 font-weight-bold">
                                                                        <a href="#" class="text-dark text-hover-primary mb-1 font-size-lg">TATA 407 (2.5 TON)</a>
                                                                        <span class="text-muted">8 Wheel, other, more details</span>
                                                                    </div>
                                                                    <!--end::Text-->


                                                                </div>



                                                            </b-dropdown-item>
                                                            <b-dropdown-item>Second Action</b-dropdown-item>
                                                            <b-dropdown-item>Third Action</b-dropdown-item>
                                                            <b-dropdown-divider></b-dropdown-divider>

                                                        </b-dropdown>



                                                        <div class="fv-plugins-message-container"></div>
                                                    </div>



                                                    <div class="form-group fv-plugins-icon-container">
                                                    <label>Goods Types</label> <br>
                                                        <select  v-model="goods_types"
                                                                 @input="goods_types = $event.target.value"

                                                                 name="goods_types"
                                                                 class="form-control form-control-solid form-control-lg " id="kt_select2_3"   multiple="multiple">
                                                            <option v-for="goodType in goodTypes" :value="goodType.id">{{ goodType.name }}</option>
                                                         </select>


                                                    <div class="fv-plugins-message-container"></div>
                                                </div>
                                                    <!--end::Input-->
                                                    <!--begin::Input-->
                                                    <div class="form-group fv-plugins-icon-container">
                                                        <label>Enter Weight (Kg)</label>
                                                        <input  @value="weight"    @input="weight = $event.target.value" type="text" class="form-control form-control-solid form-control-lg" name="weight" placeholder="Shipment Weight in KG"  >
                                                        <span v-if="parseFloat(weight)" class="form-text "> <span class=" text-primary ">{{(weight/1000) }}</span>  ton</span>
                                                        <div class="fv-plugins-message-container"></div></div>
                                                    <!--end::Input-->

                                                </div>
                                                <!--end: Wizard Step 1-->

                                                <!--begin: Wizard Step 2-->
                                                <div class="pb-5" data-wizard-type="step-content">

                                                    <!--begin::Input-->
                                                    <div class="form-group fv-plugins-icon-container">
                                                        <label>Enter Your Mobile No.</label>
                                                        <input maxlength="10" type="text" class="form-control form-control-solid form-control-lg" name="mobile" v-model="mobile" placeholder="10 digit mobile no for OTP validation">
                                                        <span class="form-text text-muted">Do not add country code.</span>
                                                        <div class="fv-plugins-message-container"></div></div>
                                                    <!--end::Input-->
                                                   <input type="hidden" name="matchcode" v-model="matchCode">

                                                    <transition mode="out-in"
                                                                appear
                                                                enter-active-class="animated bounceIn"
                                                                leave-active-class="animated bounceOut" >
                                                        <div class="row" v-show="otpsend">
                                                            <div class="col-xl-6">
                                                                <!--begin::Input-->
                                                                <div class="form-group fv-plugins-icon-container">

                                                                    <input  maxlength="4" type="text" name="code" class="form-control form-control-solid form-control-lg" v-model="verifyCode"  placeholder="OTP"  >
                                                                    <div class="fv-plugins-message-container"></div>
                                                                   <a href="#"> <span id="skip_mobile_verification_el" v-show="smsValidCount>3" class="form-text text-primary">Skip Verification</span></a>
                                                                </div>
                                                                <!--end::Input-->
                                                            </div>
                                                            <div class="col-xl-6">
                                                                <!--begin::Input-->
                                                                <div class="form-group fv-plugins-icon-container">
                                                                    <button  type="button" @click="sentOTP(mobile)" class="btn btn-success btn-sm font-weight-bold text-uppercase px-9 py-4" >
                                                                        Resend
                                                                    </button>
                                                                </div>
                                                                <!--end::Input-->
                                                            </div>
                                                        </div>

                                                    </transition>





                                                </div>
                                                <!--end: Wizard Step 2-->

                                                <!--begin: Wizard Step 3-->
                                                <div class="pb-5" data-wizard-type="step-content">


                                                    <!--begin::Input-->
                                                    <div class="form-group fv-plugins-icon-container">
                                                        <label>Company / Personal Name</label>
                                                        <input :readonly="mobileLogin" type="text" class="form-control form-control-solid form-control-lg" v-model="name" name="name" placeholder="Your Name" >
                                                        <span class="form-text text-muted">Please enter your  Name.</span>
                                                        <div class="fv-plugins-message-container"></div></div>
                                                    <!--end::Input-->

                                                    <!--begin::Input-->
                                                    <div class="form-group fv-plugins-icon-container">
                                                        <label>Email Address</label>
                                                        <input :readonly="mobileLogin" type="text" class="form-control form-control-solid form-control-lg" v-model="email" name="email_a" placeholder="Email"  >
                                                        <span class="form-text text-muted">Please enter your email.</span>
                                                        <div class="fv-plugins-message-container"></div>
                                                    </div>
                                                    <!--end::Input-->


                                                </div>
                                                <!--end: Wizard Step 3-->

                                                <!--begin: Wizard Step 4-->
                                                <div class="pb-5" data-wizard-type="step-content">
                                                    <!--begin::Section-->
                                                    <h4 class="mb-10 font-weight-bold text-danger">  Final fare will be shared by executives.</h4>
                                                    <h6 class="font-weight-bolder mb-3">
                                                    Shipment Details
                                                    </h6>
                                                    <div class="text-dark-50 line-height-lg">
                                                        <div>Pick Up : <span class="text-primary">{{pickupAddress }}</span>  </div>
                                                        <div>Drop : <span class="text-primary">{{dropAddress }}</span> </div>
                                                        <div>Date : <span class="text-primary">{{shippingDate }}</span> </div>
                                                        <div>Weight : <span class="text-primary">{{weight }} Kg</span>  </div>
                                                       <!-- <div>Material Type : <span class="text-primary">-&#45;&#45;</span>  </div>
                                                        <div>Truck Type : <span class="text-primary">-&#45;&#45;</span>  </div>-->


                                                    </div>
                                                    <br>
                                                    <h6 class="font-weight-bolder mb-3">
                                                        Personal/Company Details
                                                    </h6>
                                                    <div class="text-dark-50 line-height-lg">

                                                        <div>Name : <span class="text-primary">{{name }}</span>  </div>
                                                        <div>Email : <span class="text-primary">{{email }}</span>  </div>
                                                        <div>Phone : <span class="text-primary">{{mobile }}</span>  </div>

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
                                                            Comfirm Booking
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
            <div class="  order-2 order-lg-2 d-flex flex-column w-100 pb-0 "  >

                <div class="container_map ">

                    <MapComponent :pickupLoc="pickupLocation"  :dropLoc="dropLocation"/>

                        <ShipmentDetailsComponent  v-if="this.pickupLocation"
                                                   :pickupLoc="pickupLocation"
                                                   :dropLoc="dropLocation"
                                                   :shippingDate="shippingDate"
                                                   :weight="weight"/>






                </div>

                <!--end::Image-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Login-->
    </div>


</template>

<script>
    import autocompleteTextField from "../components/AutoComplete";
    import MapComponent from "../components/MapComponent";
    import ShipmentDetailsComponent from "../components/ShipmentDetailsFooter";
    import Select2Component from "../components/Select2Complete";
    import { DropdownPlugin } from 'bootstrap-vue'
    Vue.use(DropdownPlugin)
    import { FormDatepickerPlugin } from 'bootstrap-vue'
    Vue.use(FormDatepickerPlugin)

    export default {
        name: "App",

        components: {
            autocompleteTextField,
            MapComponent,
            ShipmentDetailsComponent,
            Select2Component
        },
        mounted() {
            this.loadGoodsTypes();

            let vm = this;
            let select = $('#kt_select2_3'); // or document.querySelector('#unit');
            setTimeout( function(){
                $('#kt_datepicker_3').datepicker({
                    format: 'dd-mm-yyyy',
                    autoclose: true
                });
                $('#kt_select2_3')
                    .select2({
                        placeholder: 'Select good types'

                    })
                    .on('change', function () {
                       // console.log(select.val());
                        vm.goods_types=select.val();
                        vm.$emit('input', select.val())
                    })

            },1000);



        },
        data: function() {
            return {
                goodTypes:[],
                pickupLocation: null,
                dropLocation:null,
                shippingDate:'',
                weight:'',
                pickupAddress:'',
                dropAddress:'',
                mobile:'',
                smsValidCount:0,
                otpsend:false,
                verifyCode:'',
                matchCode:false,
                name:'',
                email:'',
                uid:'',
                mobileLogin:false,
                goods_types:[],
                select2data:[]
            };
        },
        watch: {
            mobile(value){
                // binding this to the data value in the email input
                this.mobile = value;
                if (value.length===10) {
                    this.sentOTP(value);
                }else
                {
                    this.otpsend = false;
                }
            },
            verifyCode(value){
                // binding this to the data value in the email input
               this.verifyCode = value;
                if (value.length===4) {
                   this.checkOTP(value);
                }
            }
        },

        methods: {


            loadGoodsTypes() {
                var parent = this;

                axios.get('/api/goods-types').then(response => parent.goodTypes =response.data.data).catch(error => console.log(error));
            },
            updatePickup(variable) {
                this.pickupLocation= variable;
                this.pickupAddress= variable.formatted_address;
            },
            updateDrop(variable) {
                this.dropLocation= variable;
                this.dropAddress= variable.formatted_address;

            },

            createEnquiry() {

                var parent = this;
                axios.post('/api/enquiry', {
                    truck_type_id:1,
                    goods_type_id:parent.goods_types,
                    pickup_address:parent.pickupAddress,
                    drop_address:parent.dropAddress,
                    shipment_date:parent.shippingDate,
                    shipment_weight:parent.weight,
                    mobile_login:parent.mobileLogin,
                    name:parent.name,
                    email:parent.email,
                    mobile:parent.mobile,
                    user_id:parent.uid,
                })
                    .then(function (response) {
                        console.log(response);

                    })
                    .catch(function (error) {
                        console.log(error);

                    });
            },


            async sentOTP(mobile) {
                this.otpsend = false;
                this.smsValidCount++;
               var parent = this;
                    axios.post('/api/get-otp', {
                        mobile:mobile,
                        country_code:'91'
                    })
                        .then(function (response) {
                            console.log('success');
                            parent.otpsend = true;
                        })
                        .catch(function (error) {
                            console.log('error');

                        });
            },
            async checkOTP(code) {
                var parent = this;
                parent.matchCode = false;


                axios.post('/api/mobile-login', {
                    mobile:parent.mobile,
                    code:code
                })
                    .then(function (response) {

                        if (response.status === 200) {

                            parent.name= response.data.data.name;
                            parent.email= response.data.data.email;
                            parent.uid= response.data.data.id;
                            parent.mobileLogin=true;
                        }else{
                            parent.name='';
                            parent.email='';
                            parent.mobile='';
                            parent.uid='';
                        }
                    })
                    .catch(function (error) {
                        console.log('error');
                    });
            }
        }
    };


</script>

