// App.vue file
<template>
    <div class="box876">

        <h2>Book A Truck &</h2>
        <h3>FULL Load Service</h3>
        <p>India’s 1st Online Booking Platform with Live Pricing</p>

            <div class="form-box">


                <aside >

                    <autocompleteTextField
                        @inputData="updatePickup"
                        placeholder="Pickup City"
                        :select-first-on-enter="true">
                    </autocompleteTextField>
                </aside>

                <aside >
                    <autocompleteTextField
                        placeholder="Drop City"
                        @inputData="updateDrop"
                        >
                    </autocompleteTextField>


                </aside>
                <aside>




                        <div class="input-group">
                            <input type="text"  readonly="true"  v-model="formatted=='No date selected'?'':formatted" class="form-control" placeholder="Select Shiping Date">

                                <b-form-datepicker
                                    class="input-group-append"
                                    v-model="value"
                                    button-only
                                    right
                                    locale="en-US"
                                    aria-controls="example-input"
                                    @context="onContext"
                                ></b-form-datepicker>

                        </div>



                </aside>
                <aside >
                    <b-dropdown  v-model="selectedCategory"
                        aria-role="list"
                        size="lg" :text="selectedCategory.name  ? selectedCategory.name:  'Select Truck Types' "    block variant="warning" >

                        <b-dropdown-item

                            v-for="category in categories" :key="category.id"
                            @click="selectedCategory = category"
                        >{{category.name}}</b-dropdown-item>



                    </b-dropdown>



                </aside>


                <aside>

                    <input type="button" data-target=".bd-example-modal-xl" data-toggle="modal"     class="submit22"  value="CHECK INSTANT PRICE"></aside>


            </div>



        <div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" >
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <EnquiryComponent

                        :dropLocation="dropLoc"
                        :pickupLocation="pickupLoc"
                        :shippingDate="value"
                        :shippingDateFormatted="formatted"
                        :category="selectedCategory"

                    ></EnquiryComponent>
                </div>
            </div>
        </div>
        <!-- Button trigger modal -->

    </div>
</template>
<style>
    div.pac-container {
        z-index: 99999999999 !important;
    }
</style>
<script>
    import autocompleteTextField from "../components/AutoComplete";
    import EnquiryComponent from "../layout/EnquiryComponent";
    import { DropdownPlugin } from 'bootstrap-vue'
    Vue.use(DropdownPlugin)
    import { FormDatepickerPlugin } from 'bootstrap-vue'
    Vue.use(FormDatepickerPlugin)

    export default {
        name: "App",

        components: {
            autocompleteTextField,
            EnquiryComponent
        },
        mounted() {


            this.loadCategories();
        }
        , data() {
            return {
                pickupLoc: null,
                dropLoc: null,
                value: '',
                formatted: '',
                selected: '',
                categories:[],
                selectedCategory:[],
            }
        },
        methods: {
            onContext(ctx) {
                // The date formatted in the locale, or the `label-no-date-selected` string
                this.formatted = ctx.selectedFormatted
                // The following will be an empty string until a valid date is entered
                this.selected = ctx.selectedYMD
            },
            updatePickup(variable) {
                this.pickupLoc= variable;

            }
            ,
            updateDrop(variable) {
                this.dropLoc= variable;

            },
            loadCategories() {

                var parent = this;
                axios.get('/api/category/list').then(response => parent.categories =response.data).catch(error => console.log(error));
            }
        }
    };


</script>


