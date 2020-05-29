<template>

            <GmapMap  ref="mapRef"
                      :center="{lat:22, lng:10}"
                :zoom="8"

                style="width: 100%; height: 85%"
            >
                <gmap-polygon :paths="paths" :editable="false"  >
                </gmap-polygon>
                <GmapMarker ref="myMarker"
                            :position="google && new google.maps.LatLng(1.38, 103.8)" />
            </GmapMap>

</template>

<script>
    import {gmapApi} from 'vue2-google-maps'


    export default {
        computed: {
            google: gmapApi,
            paths: [
                [ {lat: 1.380, lng: 103.800}, {lat:1.380, lng: 103.810}, {lat: 1.390, lng: 103.810}, {lat: 1.390, lng: 103.800} ],
                [ {lat: 1.382, lng: 103.802}, {lat:1.382, lng: 103.808}, {lat: 1.388, lng: 103.808}, {lat: 1.388, lng: 103.802} ],
            ]
        },
        mounted() {
            console.log('Component mounted.')
            this.$refs.mapRef.$mapPromise.then((map) => {
                map.panTo({lat: 1.38, lng: 103.80})
            })
        }
    }
</script>
