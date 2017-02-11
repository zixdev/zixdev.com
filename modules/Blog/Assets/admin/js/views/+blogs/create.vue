<template>
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>
                    <i class="fa fa-pencil"></i> {{ edit ? $t('blogs.edit') : $t('blogs.add') }}
                </h5>
            </div>

            <div class="ibox-content">
                <form class="form-horizontal" @submit.prevent="save()">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">
                            {{ $t('table.title') }} :
                        </label>

                        <div class="col-sm-10">
                            <input class="form-control" type="text"
                                   v-model="blog.title"
                                   required
                                   minlength="3"
                                   maxlength="255"
                                    >
                            <span v-if="form.errors && form.errors.title" class="help-block m-b-none text-danger">{{form.errors.title.toString()}}</span>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">
                            {{ $t('table.slug') }} :
                        </label>

                        <div class="col-sm-10">
                            <input class="form-control" type="text"
                                   v-model="blog.slug"
                                   required
                                   disabled
                                   minlength="3"
                                   maxlength="255"
                                    >
                            <span v-if="form.errors && form.errors.slug" class="help-block m-b-none text-danger">{{form.errors.slug.toString()}}</span>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">
                            {{ $t('table.publish_at') }} :
                        </label>

                        <div class="col-sm-10">
                            <input class="form-control" type="date"
                                   v-model="blog.published_at"
                                   required
                                   disabled
                                   minlength="3"
                                   maxlength="255"
                                    >
                            <span v-if="form.errors && form.errors.published_at" class="help-block m-b-none text-danger">{{form.errors.published_at.toString()}}</span>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">
                            {{ $t('table.sites') }} :
                        </label>

                        <div class="col-sm-10">

                            <multiselect
                                    :value="blog.sites"
                                    :options="sites"
                                    :multiple="true"
                                    :track-by="'id'"
                                    label="name"
                                    @input="updateSelected">
                            </multiselect>
                            <span v-if="form.errors && form.errors.sites" class="help-block m-b-none text-danger">{{form.errors.sites.toString()}}</span>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">
                            {{ $t('table.category') }} :
                        </label>

                        <div class="col-sm-10">
                            <multiselect
                                    :value="blog.category"
                                    :options="categories"
                                    :track-by="'id'"
                                    label="title"
                                    @input="updateSelectedCategory">
                            </multiselect>
                            <span v-if="form.errors && form.errors.sites" class="help-block m-b-none text-danger">{{form.errors.sites.toString()}}</span>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">
                            {{ $t('table.content') }} :
                        </label>

                        <div class="col-sm-10">
                            <html-editor
                                    :content.sync="blog.content"
                                    @change="updateContent"
                                    ></html-editor>
                            <span v-if="form.errors && form.errors.ui" class="help-block m-b-none text-danger">{{form.errors.ui.toString()}}</span>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">
                            {{ $t('seo.title') }} :
                        </label>

                        <div class="col-sm-10">
                            <input class="form-control" type="text"
                                   v-model="blog.seo.title"
                                   minlength="3"
                                   maxlength="255"
                                    >
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">
                            {{ $t('seo.keywords') }} :
                        </label>

                        <div class="col-sm-10">
                            <input class="form-control" type="text"
                                   v-model="blog.seo.keywords"
                                   minlength="3"
                                   maxlength="255"
                                    >
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">
                            {{ $t('seo.description') }} :
                        </label>

                        <div class="col-sm-10">
                            <input class="form-control" type="text"
                                   v-model="blog.seo.description"
                                   minlength="3"
                                   maxlength="255"
                                    >
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">
                            {{ $t('table.status') }} :
                        </label>

                        <div class="col-sm-10">
                            <div class="material-switch">
                                <input id="status" v-model="blog.status" type="checkbox"/>
                                <label for="status" class="label-primary"></label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-4 col-sm-offset-2">
                            <router-link :to="{name: 'blogs.all'}" class="btn btn-white">
                                {{ $t('form.cancel') }}
                            </router-link>
                            <button :disabled="form.submitting" class="btn btn-primary" type="submit">
                                <i v-if="form.submitting" class="fa fa-spinner fa-pulse"></i>
                                {{ edit ? $t('form.edit') : $t('form.create') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script type="text/babel">
    import Component from 'vue-class-component'
    import Multiselect from 'vue-multiselect'


    @Component({
        components: {
            Multiselect
        }
    })
    export default class Create {
        data() {
            return {
                blog: {
                    title: '',
                    slug: '',
                    content: '',
                    sites: [],
                    seo: {
                        title: '',
                        description: '',
                        keywords: ''
                    },
                    status: true
                },
                form: {
                    errors: {}
                },
                sites: [],
                categories: [],
            };
        }

        get edit() {
            return this.$route.params.id ? true : false;
        }

        updateContent(content) {
            this.blog.content = content;
        }

        mounted() {

            /*
             * Initialize The Tiny CME Editor.
             */
            this.$events.$emit('update-tinycme', '');
            /*
             * When the route changes from edit to add
             * we need to update the blog
             */
            this.$watch('edit', () => {
                this.$events.$emit('update-tinycme', '');
                this.blog = {
                    title: '',
                    slug: '',
                    content: '',
                    sites: []
                };
                this.edit ? this.updateEditPBlog() : false;
            });
            /**
             * When form title changes.
             * Slug will be updated.
             */
            this.$watch('blog.title', (title, val) => {
                this.blog.slug = title.toLowerCase().replace(/ /g, '-').replace(/[^\w-]+/g, '-');
            });

            /*
             * Load The Sites Data
             */
            this.$http.get(this.$store.state.config.api_url + 'sites')
                    .then(response => {
                        this.sites = response.data.data;
                    });
            /*
             * Load The Categories Data
             */
            this.$http.get(this.$store.state.config.api_url + 'blogs/categories')
                    .then(response => {
                        this.categories = response.data.data;
                    });


            this.edit ? this.updateEditBlog() : false;
        }

        save() {
            this.form.submitting = true;
            // if form for create
            return this.edit ? this.update() : this.create();
        }

        create() {
            this.$http.post('/api/blogs', this.blog)
                    .then(response => {
                        this.$events.$emit('notify', {
                            type: 'info',
                            title: 'Success !',
                            message: 'Your Blog Was Created Successfully!'
                        });
                        this.$router.push({name: 'blogs.all'})
                    })
                    .catch(error => {
                        this.$events.$emit('notify', {
                            type: 'warning',
                            title: 'Warning !',
                            message: 'Please Check your blog details!'
                        })
                        this.form.errors = error.data;
                        this.form.submitting = false;
                    });
        }

        update() {
            this.$http.put('/api/blogs/' + this.$route.params.id, this.blog)
                    .then(response => {
                        this.$router.push({name: 'blogs.all'});
                        this.$events.$emit('notify', {
                            type: 'info',
                            title: 'Success !',
                            message: 'Your Blog Was Updated Successfully!'
                        })
                    })
                    .catch(error => {
                        this.$events.$emit('notify', {
                            type: 'warning',
                            title: 'Warning !',
                            message: 'Please Check your blog details!'
                        })
                        this.form.errors = error.data;
                        this.form.submitting = false;
                    });
        }

        updateEditBlog() {
            axios.get('/api/blogs/' + this.$route.params.id)
                    .then(response => {
                        this.blog = response.data.data;
                        this.$events.$emit('update-tinycme', response.data.data.content);
                    });
        }

        updateSelected(data) {
            this.blog.sites = data;
        }

        updateSelectedCategory(data) {
            this.blog.blog_category_id = data.id;
        }


    }
</script>
