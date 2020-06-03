<div id="app1">
    <single-select inline-template>
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <select-2 :options="options" name="test" v-model="selected"></select-2>
                    <pre class="code">
              <p v-text="selected"></p>
            </pre>
                </div>
            </div>
        </div>
    </single-select>

</div>

<script>


</script>
