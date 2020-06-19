<template>
    <div>



        <GmapAutocomplete

            :placeholder="placeholder"

            class="form-control form-control-solid form-control-lg "
            :options="{
            fields: [],
        types: ['(cities)'],
        componentRestrictions: {country: 'in'}
        }"
            @change="setPlace"
            @place_changed="setPlace"
        >
            </GmapAutocomplete>


    </div>
</template>

<script>
    export default {

        props:  {
            placeholder: {
                type: String
            }

        },
        methods: {
            setPlace(place) {

                this.$emit("inputData", place);

            }
        }
    }
</script>
