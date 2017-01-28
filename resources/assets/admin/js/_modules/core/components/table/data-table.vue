<template>

    <div class="">
        <div class="row">
            <div class="col-sm-4 m-b-xs">
                <div data-toggle="buttons" class="btn-group">
                    <button class="btn btn-sm btn-white"
                            :class="{'active': params[2].value.includes('all')}"
                            @click="filterAction('all')"
                    > All
                    </button>
                    <button class="btn btn-sm btn-white"
                            :class="{'active': params[2].value.includes('deleted')}"
                            @click="filterAction('deleted')"
                    > Deleted
                    </button>
                </div>
            </div>
        </div>
        <div class="loading text-center" v-show="loading">
            <i class="fa fa-circle-o-notch fa-spin fa-3x fa-fw"></i>
        </div>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th
                        v-for="column of columns"
                        @click="filter(column)"
                        :class="{
                        'filterable': column.filterable,
                        'active': params[1].value.includes(column.id),

                    } + ' ' + column.trClass"
                    >
                        {{ $t('table.'+ column.id)}}

                        <i :class="{
                            'fa fa-sort-asc': !orderAsc,
                            'fa fa-sort-desc': orderAsc,
                       }"
                           v-if="params[1].value.includes(column.id) && column.filterable"
                        ></i>

                    </th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="row of rows">
                    <td v-for="column of columns" :class="column.trClass">
                        <div v-if="column.id == '__actions'" class="btn-toolbar">
                            <a v-for="action of column.actions"
                               @click="fireAction(action, row)"
                               :class="'btn btn-sm ' + action.btnClass"
                               :title="action.title"
                            >
                                <i :class="action.icon"></i>
                                {{ action.name }}
                            </a>

                            <a v-if="!params[2].value.includes('deleted')"
                               @click="performAction('delete', row.id)"
                               class="btn btn-sm btn-danger">
                                <i class="fa fa-trash"></i>
                            </a>
                            <a v-if="params[2].value.includes('deleted')"
                               @click="performAction('restore', row.id)"
                               class="btn btn-sm btn-info">
                                <i class="fa fa-refresh"></i>
                            </a>
                            <a v-if="params[2].value.includes('deleted')"
                               @click="performAction('force-delete', row.id)"
                               class="btn btn-sm btn-danger">
                                <i class="fa fa-eraser"></i>
                            </a>

                        </div>
                        <div v-else v-html="column.callback ? column.callback(row) : row[column.id]"
                             @click="fireEvent(column.event, row)"></div>
                    </td>
                </tr>
                <tr v-if="!rows || !rows.length">
                    <td :colspan="columns.length" class="text-center">
                        <h2>
                            {{ $t('table.no_data') }}
                        </h2>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>



        <ul class="pagination pull-right" v-if="response.total > perPage">

            <li class="paginate_button previous " :class="{'disabled': !response.prev_page_url}" >
                <a href="javascript:void(0);" @click="prev()">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>

            <li v-for="page in pages"
                :class="{'active': page == response.current_page}">
                <a href="javascript:void(0);"
                   @click.prevent="changePage(page)">{{ page }}</a>
            </li>

            <li class="paginate_button next" :class="{'disabled': !response.next_page_url}">
                <a href="javascript:void(0);" @click="next()">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>


    </div>
</template>

<script>
    import Component from 'vue-class-component'

    @Component({
        name: 'data-table',
        props: {
            url: {
                type: String,
                required: true
            },
            columns: {
                type: Array,
                required: true
            },
            perPage: {
                type: Number,
                default: 15
            }
        }
    })
    export default class DataTable {
        data() {
            return {
                response: {},
                offset: 4,// left and right padding from the pagination <span>,just change it to see effects,
                params: [
                    {name: 'per_page', value: this.perPage},
                    {name: 'sort', value: ''},
                    {name: 'filter', value: 'all'}
                ],
                orderAsc: true,
                loading: false
            };
        }
        /*
         * Whe Data table is created we need to load the data from the server.
         */
        created() {
            this.loadData(this.url);
        }

        /*
         * return Computed data rows.
         */
        get rows() {
            return this.response.data;
        }

        /*
         * return Computed data pages for paginate.
         */
        get pages() {
            if (!this.response.to) {
                return [];
            }
            var from = this.response.current_page - this.offset;
            if (from < 1) {
                from = 1;
            }
            var to = from + (this.offset * 2);
            if (to >= this.response.last_page) {
                to = this.response.last_page;
            }
            var pagesArray = [];
            while (from <= to) {
                pagesArray.push(from);
                from++;
            }
            return pagesArray;
        }

        /*
         * Get url params for filtering the data.
         */
        param(url) {
            let data = url + (url.includes('?') ? '&' : '?') + this.params.map(param => {
                return param.name + '=' + param.value + '&';
            });
            return data.replace(/,/g, '');
        }

        // change the page (paginator)
        changePage(num) {
            this.loadData(this.url + '?page='+num);
        }


        /*
         * Data loader.
         */
        loadData(url) {
            this.loading = true;
            this.$Progress.start();
            this.$http.get(this.param(url))
                .then(response => {
                    this.response = response.data.data;
                    this.$Progress.finish();
                    this.loading = false;
                });
        }

        /*
         * Get next page.
         */
        next() {
            return this.response.next_page_url ? this.loadData(this.response.next_page_url) : false;
        }

        /*
         * Get prev page.
         */
        prev() {
            return this.response.prev_page_url ? this.loadData(this.response.prev_page_url) : false;
        }

        /*
         * Filter the data 'asc', 'desc'.
         */
        filter(column) {
            if(!column.filterable) return false;
            this.params.filter(param => {
                param.name.match('sort') ? param.value = column.id + '|' + (this.orderAsc ? 'asc': 'desc') : '';
            });
            this.loadData(this.url);
            this.orderAsc = ! this.orderAsc;
        }

        filterAction(type) {
            this.params.filter(param => {
                param.name.match('filter') ? param.value = type : '';
            });
            this.loadData(this.url);
        }

        /*
         * fire the action to the parent.
         */
        fireAction(event, data) {
            this.$emit(event.id, data);
        }

        fireEvent(event, data) {
            event ? this.$emit(event, data) : false;
        }


        performAction(type, id) {
            this.$http.delete(this.url + '/' + id + '?action=' + type);
            this.$events.$emit('notify', {
                type: this.$t('table.notification.type.'+ type),
                title: this.$t('table.notification.title.'+ type),
                message: this.$t('table.notification.message.'+ type)
            })
            this.loadData(this.url);
        }


    }
</script>
<style lang="scss">
    .filterable {

        &:hover {
            cursor: pointer;
        }
        &.active {
            color: #000;
        }
    }

    .loading {
        width: 100%;
        height: 100%;
        position: absolute;
        i {
            position: absolute;
            top: 20%;
        }
    }


</style>
