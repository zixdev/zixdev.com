<template>
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>{{$t('system.forms.index_title')}}</h5>
                <div class="ibox-tools">
                    <router-link :to="{name: 'system.forms.add'}" class="btn btn-success">
                        <i class="fa fa-plus"></i>
                    </router-link>
                </div>
            </div>
            <div class="ibox-content">
                <table class="table table-striped data-table">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Title</th>
                        <th>Slug</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</template>

<script type="text/babel">
    import Component from 'vue-class-component'

    @Component
    export default class IndexForms {
        mounted() {
        	var self = this;
            let table = DataTable;
            table.url = this.$store.state.config.api_url + 'forms';
            table.edit = 'system.forms.edit';
            table.delete = 'system.forms.delete';
            table.actions = `<a title="${this.$t('system.forms.fields.index')}" class="config btn btn-default"> <i class="fa fa-cog"></i></a>`;
            table.columns = [
                {data: 'id'},
                {data: 'title'},
                {data: 'slug'},
                {data: 'created_at'}
            ];
            table.init()
                .on('click', 'a.config', function (e) {
                    self.$router.push({name: 'system.forms.fields.index', params: {slug: $(this).parent().data('href')}});
                });
        }

    }
</script>
