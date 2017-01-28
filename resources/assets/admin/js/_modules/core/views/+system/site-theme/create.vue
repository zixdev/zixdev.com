<template>
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>
                    <i class="fa fa-pencil"></i>
                    {{ $t('system.sites.theme.add_title', {site: site.name}) }}
                </h5>

            </div>

            <div class="ibox-content">
                <div v-if="form.errors && form.errors.theme" class="alert alert-danger">
                    {{form.errors.theme}}
                </div>
                <div class="form-group">
                    <select class="form-control m-b" @change="updateType" v-model="type">
                        <option v-for="option in types" :value="option.value">
                            {{ option.text }}
                        </option>
                    </select>
                    <span v-if="form.errors && form.errors.type" class="help-block m-b-none text-danger">{{form.errors.type.toString()}}</span>
                </div>

                <div class="hr-line-dashed"></div>

                <form class="dropzone">

                    <div class="fallback">
                        <input name="file" type="file"/>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    import Component from 'vue-class-component';
    import Dropzone from 'dropzone';

    @Component
    export default class CreateTheme {
        data() {
            return {
                site: {},
                form: {},
                dropZone: {},
                type: 'vue',
                types: [
                    { text: 'Vue Js Based Ui', value: 'vue' },
                    { text: 'Angular Based Ui', value: 'angular' },
                    { text: 'React Based Ui', value: 'react' }
                ]
            };
        }
        created() {
            this.$http.get(this.$store.state.config.api_url + 'sites/' + this.$route.params.id)
                .then(response => {
                    this.site = response.data.data;
                    this.setUpDropZone(this.type);
                });
        }

        updateType() {
            this.setUpDropZone(this.type);
        }

        setUpDropZone(type) {
        	let $this = this;
            this.dropZone = new Dropzone('form.dropzone', {
                url:  $this.$store.state.config.api_url + 'sites/' + $this.$route.params.id + '/themes?type='+type,
                dictDefaultMessage: "<strong class='text-center'>Drop your UI zip file here. </strong>",
                headers: {
                    Authorization: 'Bearer ' + localStorage.getItem('token'),
                },
                paramName: "ui", // The name that will be used to transfer the file
                maxFilesize: 100, // MB,

                success: () => {
                    this.$router.push({name: 'system.sites.theme.index', params: {id: this.site.id}});
                },

                error: (item, err) => {
                    console.log(err);
                    this.form.errors = err;
                }
            });
        }
    }

</script>
<style>

</style>
