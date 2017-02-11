<template>
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>{{$t('blogs.index_title')}}</h5>
                <div class="ibox-tools">
                    <router-link :to="{name: 'blogs.add'}" class="btn btn-success">
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
                        <th>Status</th>
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
    export default class Blogs {
        mounted() {
            let table = DataTable;
            table.url = '/api/blogs';
            table.edit = 'blogs.edit';
            table.delete = 'blogs.delete';
            table.actions = '';
            table.columns = [
                {data: 'id'},
                {data: 'title'},
                {data: 'slug'},
                {
                    render: function (e, v, data) {
                        return data.status ? '<i class="fa fa-circle text-success"></i> active' : '<i class="fa fa-circle text-danger"></i> disabled';
                    }
                },
                {data: 'created_at'}
            ];
            table.init();
        }

    }
</script>
