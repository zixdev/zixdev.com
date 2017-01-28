<template>
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>{{ $t('system.sites.theme.index_title') }} </h5>
                <div class="ibox-tools">
                    <router-link :to="{name: 'system.sites.theme.add', params: {id: $route.params.id}}"
                                 class="btn btn-success">
                        <i class="fa fa-plus"></i>
                    </router-link>
                </div>
            </div>

            <div class="ibox-content">
                <table class="table table-striped data-table">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Version</th>
                        <th>Status</th>
                        <th>Code Size</th>
                        <th>Assets Size</th>
                        <th>Created At</th>
                        <th></th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
    import Component from 'vue-class-component'

    @Component
    export default class SiteThemes {
        mounted() {
            let table = DataTable;
            table.url = this.$store.state.config.api_url + 'sites/' + this.$route.params.id + '/themes';
            table.edit = false;
            table.delete = false;
            table.actions = '';
            table.columns = [
                {data: 'id'},
                {data: 'version'},
                {
                    render: function (e, v, data) {
                        return data.status ? '<i class="fa fa-circle text-success"></i> active' : '<i class="fa fa-circle text-danger"></i> disabled';
                    }
                },
                {data: 'code_size'},
                {data: 'assets_size'},
                {data: 'created_at'}
            ];
            table.init();
        }

    }
</script>
