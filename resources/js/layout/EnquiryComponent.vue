// App.vue file
<template>
    <div class="d-flex flex-column flex-root"  id="app">
        <!--begin::Login-->
        <div class="login login-2 login-signin-on d-flex flex-column flex-lg-row flex-column-fluid bg-white" id="kt_login">
            <!--begin::Aside-->
            <div class="login-aside order-1 order-lg-1 ">

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

                                        </div>
                                    </div>
                                    <!--end::Wizard Step 1 Nav-->

                                    <!--begin::Wizard Step 2 Nav-->
                                    <div class="wizard-step" data-wizard-type="step" data-wizard-state="pending">
                                        <div class="wizard-wrapper">
                                            <div class="wizard-number">
                                                2
                                            </div>

                                        </div>
                                    </div>
                                    <!--end::Wizard Step 2 Nav-->



                                    <!--begin::Wizard Step 4 Nav-->
                                    <div class="wizard-step" data-wizard-type="step" data-wizard-state="pending">
                                        <div class="wizard-wrapper">
                                            <div class="wizard-number">
                                                4
                                            </div>

                                        </div>
                                    </div>
                                    <div class="wizard-step" data-wizard-type="step" data-wizard-state="pending">
                                        <div class="wizard-wrapper">
                                            <div class="wizard-number">
                                                5
                                            </div>

                                        </div>
                                    </div>
                                    <div class="wizard-step" data-wizard-type="step" data-wizard-state="pending">
                                        <div class="wizard-wrapper">
                                            <div class="wizard-number">
                                                6
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
                                    <div class="row justify-content-center  ">
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
                                                                <label>Pickup </label>

                                                                <autocompleteTextField
                                                                    @inputData="updatePickup"


                                                                    :placeholder="this.pickupLocation ? this.pickupLocation.formatted_address : 'Pickup City'"
                                                                    :select-first-on-enter="true">
                                                                </autocompleteTextField>
                                                                <input type="hidden" name="pickup"
                                                                       :value="this.pickupLocation ? this.pickupLocation.formatted_address : ''"/>
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
                                                                    :placeholder="this.dropLocation ? this.dropLocation.formatted_address : 'Drop City'"
                                                                >
                                                                </autocompleteTextField>
                                                                <input type="hidden" name="drop"
                                                                       :value="this.dropLocation ? this.dropLocation.formatted_address : ''"/>
                                                                <span class="form-text text-muted">Please enter your drop city.</span>
                                                                <div class="fv-plugins-message-container"></div></div>
                                                            <!--end::Input-->
                                                        </div>
                                                    </div>

                                                    <div class="form-group fv-plugins-icon-container">

                                                        <label>Date</label>

                                                            <b-form-datepicker   class="form-control-solid form-control-lg"
                                                                                id="datepicker-buttons"
                                                                                v-model="shippingDate" name="shiping_date"
                                                                                today-button
                                                                                reset-button
                                                                                close-button
                                                                                locale="en"
                                                                                placeholder="Select Shipment Date"
                                                            ></b-form-datepicker>

                                                        <input type="hidden" name="drop"
                                                               :value="this.dropLocation ? this.dropLocation.formatted_address : ''"/>

                                                        <div class="fv-plugins-message-container"></div>
                                                    </div>
                                                    <!--end::Input-->

                                                </div>
                                                <!--end: Wizard Step 1-->
                                                <div class="pb-5" data-wizard-type="step-content"  >

                                                    <!--begin::Input-->

                                                    <div    class="form-group fv-plugins-icon-container">
                                                        <label>Category</label> <br>
                                                        <multiselect
                                                            v-model="category"
                                                            @select="seletedCategory"
                                                            @remove="seletedCategory"
                                                            track-by="id" label="name" placeholder="Select Category" :options="categories" :searchable="false" :allow-empty="false">
                                                            <template slot="singleLabel" slot-scope="{ option }"><strong>{{ option.name }}</strong> </template>
                                                        </multiselect>
                                                        <input type="hidden"  v-model="category" name="category"/>
                                                        <div class="fv-plugins-message-container"></div>
                                                    </div>
                                                    <transition mode="out-in"
                                                                appear
                                                                enter-active-class="animated bounceIn"
                                                                leave-active-class="animated bounceOut" >
                                                    <div  v-if="truck_types.length>0" class="form-group fv-plugins-icon-container">
                                                        <label>Truck Types</label> <br>

                                                        <multiselect

                                                            v-model="truck_type"
                                                            placeholder="Select Truck Types"
                                                            label="title" track-by="id"
                                                            :options="truck_types" :option-height="104"
                                                            :custom-label="customLabel" :show-labels="false">
                                                            <template slot="singleLabel" slot-scope="props"><img class="option__image" :src="'storage/uploads/thumb_' +props.option.photos"  ><span class="option__desc"><span class="option__title">{{ props.option.name }}</span></span></template>
                                                            <template slot="option" slot-scope="props">
                                                                <div class="d-flex align-items-center ">
                                                                    <!--begin::Symbol-->
                                                                    <div class="symbol symbol-40  mr-5">

                                                                        <span >
                                                                            <img :src="'storage/uploads/thumb_' +props.option.photos"class="h-75 align-self-end"/>

                                                                        </span>
                                                                    </div>
                                                                    <!--end::Symbol-->

                                                                    <!--begin::Text-->
                                                                    <div class="d-flex flex-column flex-grow-1 font-weight-bold">
                                                                        <a   class="text-dark text-hover-primary mb-1 font-size-lg">{{ props.option.name }}</a>
                                                                        <span class="text-muted"> <span v-for="attribute in  props.option.attributes"> {{ attribute.value }} , </span></span>
                                                                    </div>
                                                                    <!--end::Text-->
                                                                </div>

                                                            </template>
                                                        </multiselect>
                                                        <input type="hidden"  v-model="truck_type" name="truck_type"/>

                                                        <div class="fv-plugins-message-container"></div>
                                                    </div>
                                                    </transition>


                                                    <div class="form-group fv-plugins-icon-container">
                                                        <label>Goods Types</label> <br>
                                                        <multiselect
                                                            v-model="goods_types"
                                                            tag-placeholder="Add"
                                                            placeholder="Select Good Types"
                                                            label="name" track-by="id"
                                                            :options="goodTypes"
                                                            :multiple="true" ></multiselect>

                                                        <input type="hidden"  v-model="goods_types" name="goods_types"/>




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
                                                        <input :readonly="mobileLogin" type="text" class="form-control form-control-solid form-control-lg" v-model="email" name="email" placeholder="Email"  >
                                                        <span class="form-text text-muted">Please enter your email.</span>
                                                        <div class="fv-plugins-message-container"></div>
                                                    </div>
                                                    <!--end::Input-->


                                                </div>
                                                <!--end: Wizard Step 3-->

                                                <!--begin: Wizard Step 4-->
                                                <div class="pb-5" data-wizard-type="step-content">

                                                    <div v-if="this.datasubmit===1" class="alert alert-custom alert-primary fade show" role="alert">
                                                        <div class="alert-icon"><i class="flaticon-warning"></i></div>
                                                        <div class="alert-text">Please wait......</div>
                                                        <div class="alert-close">
                                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                <span aria-hidden="true"><i class="ki ki-close"></i></span>
                                                            </button>
                                                        </div>
                                                    </div>

                                                    <div v-if="this.datasubmit===2" class="alert alert-custom alert-success fade show" role="alert">
                                                        <div class="alert-icon"><i class="flaticon-warning"></i></div>
                                                        <div class="alert-text">Your Enquiry is submited </div>
                                                        <div class="alert-close">
                                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                <span aria-hidden="true"><i class="ki ki-close"></i></span>
                                                            </button>
                                                        </div>
                                                    </div>

                                                    <div v-if="this.datasubmit===3" class="alert alert-custom alert-danger fade show" role="alert">
                                                        <div class="alert-icon"><i class="flaticon-warning"></i></div>
                                                        <div class="alert-text">Something went wrong. Please try again after some time!</div>
                                                        <div class="alert-close">
                                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                <span aria-hidden="true"><i class="ki ki-close"></i></span>
                                                            </button>
                                                        </div>
                                                    </div>

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


                        <ShipmentDetailsComponent  v-if="this.pickupLocation"
                                                   :pickupLoc="pickupLocation"
                                                   :dropLoc="dropLocation"
                                                   :shippingDate="shippingDate"
                                                   :weight="weight"/>

                    <MapComponent :pickupLoc="pickupLocation"  :dropLoc="dropLocation"/>





                </div>

                <!--end::Image-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Login-->
    </div>


</template>
<style>

    #app{
        height: 100vh;
    }

    .form-group label {
border:none !important;
    }
    .container_map {

        height: 100%;

    }

@import url('https://unpkg.com/vue-multiselect@2.1.0/dist/vue-multiselect.min.css');
</style>

<script>
    import autocompleteTextField from "../components/AutoComplete";
    import MapComponent from "../components/MapComponent";
    import ShipmentDetailsComponent from "../components/ShipmentDetailsFooter";
    import Select2Component from "../components/Select2Complete";
    import { DropdownPlugin } from 'bootstrap-vue'
    import Multiselect from 'vue-multiselect'

    import { FormDatepickerPlugin } from 'bootstrap-vue'
    Vue.use(FormDatepickerPlugin)
    Vue.use(DropdownPlugin)
    export default {
        name: "App",

        components: {
            autocompleteTextField,
            MapComponent,
            ShipmentDetailsComponent,
            Select2Component,
            Multiselect
        },
        mounted() {
            this.loadGoodsTypes();

            this.loadCategories();
        },
        props:  {

            pickupLocation: {
                type: Object
            },
            dropLocation: {
                type: Object
            }
            ,
            shippingDate: {
                type: String
            },
            shippingDateFormatted: {
                type: String
            },
            category: {
                type: Array
            },


        },
        data: function() {
            return {
                goodTypes:[],
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
                truck_types:[],
                truck_type:[],
                select2data:[],
                categories:[],

                category_id:0,
                datasubmit:0
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
            },
            category(value){

                if(  value){
                    this.loadTruckTypes(value.id);
                }

            },
            pickupLocation(value){
                if(  value) {
                    this.pickupAddress = value.formatted_address;

                }
            },
            dropLocation(value){

                if(  value) {

                    this.dropAddress = value.formatted_address;
                }
            },
        },

        methods: {
            customLabel ({ title, desc }) {
                return `${title} – ${desc}`
            },
            addTag (newTag) {
                const tag = {
                    name: newTag,
                    code: newTag.substring(0, 2) + Math.floor((Math.random() * 10000000))
                }
                this.goodTypes.push(tag)

                this.goods_types.push(tag)
            },
            closeModal() {

                $('.modal-backdrop').remove();
                $('.bd-example-modal-xl').modal('hide');
            },
            loadCategories() {

                var parent = this;
                axios.get('/api/category/list').then(response => parent.categories =response.data).catch(error => console.log(error));
            },
            loadGoodsTypes() {
                var parent = this;

                axios.get('/api/goods-types').then(response => parent.goodTypes =response.data.data).catch(error => console.log(error));
            },

            loadTruckTypes(id) {
                var parent = this;
                axios.get('/api/product/list/'+id).then(response => parent.truck_types =response.data).catch(error => console.log(error));
             },
            seletedCategory(selectedOption, id) {
                this.category_id=selectedOption.id;
                this.truck_type=[];
                this.loadTruckTypes(selectedOption.id);
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
                parent.datasubmit=1;
                axios.post('/api/enquiry/create', {
                    truck_type_id:parent.truck_type.id,
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
                        parent.datasubmit=2;
                        setTimeout( function(){
                            parent.closeModal();

                        },5000);

                    })
                    .catch(function (error) {
                        console.log(error);
                       // parent.datasubmit=3;

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

