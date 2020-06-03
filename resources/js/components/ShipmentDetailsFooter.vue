<template>

    <div class="footer">
        <div class="  ">
            <div class="card-body">




                <!--begin: Items-->
                <div class="d-flex align-items-center ">
                    <!--begin: Item-->
                    <transition mode="out-in"
                                appear
                                enter-active-class="animated bounceIn"
                                leave-active-class="animated bounceOut" >
                        <div  :key="this.distanceResults"  v-if="this.distanceResults.duration" class="d-flex align-items-center flex-lg-fill mr-5 my-1">
                        <span class="mr-4">
                            <i class="flaticon-clock-2 icon-2x text-muted font-weight-bold"></i>
                        </span>
                            <div class="d-flex flex-column text-dark-75">
                                <span class="font-weight-bolder font-size-h6 text-primary">{{this.distanceResults.duration.text }} </span>
                                <span class="  font-size-sm">{{this.distanceResults.distance.text }} </span>

                            </div>
                        </div>

                    </transition>
                    <transition mode="out-in"
                                appear
                                enter-active-class="animated bounceIn"
                                leave-active-class="animated bounceOut" >
                        <div  :key="this.pickupLoc.formatted_address"  v-if="this.pickupLoc" class="d-flex align-items-center flex-lg-fill mr-5 my-1">
                        <span class="mr-4">
                            <i class="flaticon-map-location icon-2x text-muted font-weight-bold"></i>
                        </span>
                            <div class="d-flex flex-column text-dark-75">
                                <span class="font-weight-bolder font-size-h6 text-primary"> PickUp  </span>
                                <span class="  font-size-sm">{{this.pickupLoc.formatted_address}}</span>

                            </div>
                        </div>

                    </transition>
                    <transition mode="out-in"
                                appear
                                enter-active-class="animated bounceIn"
                                leave-active-class="animated bounceOut" >
                        <div  :key= "this.dropLoc.formatted_address"  v-if="this.dropLoc" class="d-flex align-items-center flex-lg-fill mr-5 my-1">
                        <span class="mr-4">
                            <i class="flaticon-placeholder-3 icon-2x text-muted font-weight-bold"></i>
                        </span>
                            <div class="d-flex flex-column text-dark-75">
                                <span class="font-weight-bolder font-size-h6 text-primary"> Drop  </span>
                                <span class="  font-size-sm">{{this.dropLoc.formatted_address}}</span>

                            </div>
                        </div>

                    </transition>
                    <transition mode="out-in"
                                appear
                                enter-active-class="animated bounceIn"
                                leave-active-class="animated bounceOut" >
                        <div  :key="this.shippingDate"  v-if="this.shippingDate" class="d-flex align-items-center flex-lg-fill mr-5 my-1">
                        <span class="mr-4">
                            <i class="flaticon-calendar-1 icon-2x text-muted font-weight-bold"></i>
                        </span>
                            <div class="d-flex flex-column text-dark-75">
                                <span class="font-weight-bolder font-size-h6 text-primary"> Date  </span>
                                <span class="  font-size-sm">{{this.shippingDate}}</span>

                            </div>
                        </div>

                    </transition>
                    <transition mode="out-in"
                                appear
                                enter-active-class="animated bounceIn"
                                leave-active-class="animated bounceOut" >
                        <div  :key="this.weight"  v-if="this.weight" class="d-flex align-items-center flex-lg-fill mr-5 my-1">
                        <span class="mr-4">
                            <i class="flaticon-web icon-2x text-muted font-weight-bold"></i>
                        </span>
                            <div class="d-flex flex-column text-dark-75">
                                <span class="font-weight-bolder font-size-h6 text-primary"> Weight  </span>
                                <span class="  font-size-sm">{{this.weight}} Kg</span>

                            </div>
                        </div>

                    </transition>

                    <!--end: Item-->


                </div>
                <!--begin: Items-->
            </div>
        </div>
    </div>

</template>

<style>
    .footer {
        height: 15%;
    }
    .card-body {

         padding: 1.25rem;
    }
</style>

<script>


    export default {

        props:  {
            shippingDate: {
                type: String
            },
            pickupLoc: {
                type: Object
            },
            dropLoc: {
                type: Object
            },
            weight: {
                type: String
            },

        },
        data: function() {
            return {
                distanceResults: []
            };
        },

        watch: {
            pickupLoc: function () {
                if (this.dropLoc && this.pickupLoc) {
                    this.getDistance();
                }

            },
            dropLoc: function () {
                if (this.dropLoc && this.pickupLoc) {
                    this.getDistance();
                }

            }
        },
        methods: {
            async  getDistance() {
                const proxyurl = "https://cors-anywhere.herokuapp.com/";

                axios.get(proxyurl+"https://maps.googleapis.com/maps/api/distancematrix/json?units=metric" +
                    "&origins="+this.pickupLoc.geometry.location.lat()+"," + this.pickupLoc.geometry.location.lng()+
                    "&destinations="+this.dropLoc.geometry.location.lat()+"," + this.dropLoc.geometry.location.lng()+
                    "&mode=bus&key=AIzaSyAvlP1l2JB-5J93HXQRKUAZ7lsqu9F5Uf4")
                    .then(response => {
                        console.log(response.data.rows[0].elements[0]);
                        this.distanceResults = response.data.rows[0].elements[0];
                    })


            }
        }


    }



</script>
