<template>

    <GmapMap
        :options="{
   zoomControl: false,
   mapTypeControl: false,
   scaleControl: false,
   streetViewControl: false,
   rotateControl: false,
   fullscreenControl: false,
   disableDefaultUi: false
 }"

        v-bind:style=" this.pickup ? 'height:85%' : 'height:100%' "
        style="width: 100%; " :zoom="5" :center="{lat:20.5937, lng:78.9629}"

    >

        <div></div>

        <GmapMarker
            v-if="this.pickup"
            label="★"
            :position="{
          lat: this.pickup.geometry.location.lat(),
          lng: this.pickup.geometry.location.lng(),
        }"
        />
        <GmapMarker
            v-if="this.drop"
            label="★"
            :position="{
          lat: this.drop.geometry.location.lat(),
          lng: this.drop.geometry.location.lng(),
        }"
        />

        <gmap-polyline v-if="path.length > 0" :path="path"

                       ref="polyline">
        </gmap-polyline>

  <!--      <GmapMarker  v-for="(marker, index) in markers"
                     :key="index"
                     :position="marker.position"
        />-->

    </GmapMap>


</template>

<script>
    import {gmapApi} from 'vue2-google-maps'


    export default {
        computed: {
            google: gmapApi,

        },
        data() {
            return {
                pickup: null,
                drop:null,
                path: [
                ]
            }
        },
        props: {
            pickupLoc: {
                type: Object
            },
            dropLoc: {
                type: Object
            },
        },
        watch: {
            pickupLoc: function() {
                if (this.pickupLoc.geometry.location.lat()) {
                    this.path.splice(0,1,
                        {
                            lat: this.pickupLoc.geometry.location.lat(),
                            lng: this.pickupLoc.geometry.location.lng(),
                        }
                    );
                    this.pickup=this.pickupLoc;
                }

            },
            dropLoc: function() {

                if (this.dropLoc.geometry.location.lat()) {

                    this.path.splice(1,22,{
                            lat: this.dropLoc.geometry.location.lat(),
                            lng: this.dropLoc.geometry.location.lng(),
                        }

                    );
                    this.drop=this.dropLoc;
                }


            },

        },
        methods: {

        }
    }



</script>
