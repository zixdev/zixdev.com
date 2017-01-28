<template>
    <div class="ibox" v-if='form'>
        <div class="ibox-title">
            <h5>Manage {{ form.title }} Form Fields</h5>

        </div>
        <div class="ibox-content">
            <div class="row">
                <div class="col-md-5">
                    <div>
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active">
                                <a href="#new-field" aria-controls="home" role="tab" data-toggle="tab">
                                    Create New Field
                                </a>
                            </li>
                            <li role="presentation">
                                <a href="#old-fields" aria-controls="profile" role="tab" data-toggle="tab">
                                    Available Fields
                                </a>
                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="new-field">
                                <br>
                                <form @submit.prevent="add">
                                    <div class="form-group row">
                                        <div class="col-md-4">
                                            <label>Label :</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input required type="text" class="form-control" v-model="input.label">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-4">
                                            <label>Placeholder :</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input required type="text" class="form-control" v-model="input.placeholder">
                                        </div>

                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-4">
                                            <label>Model :</label>
                                        </div>
                                        <div class="col-md-8">
                                            <select v-model="input.model" class="form-control">
                                                <option value="input">Input</option>
                                                <option value="select">Select</option>
                                                <option value="checkbox">Checkbox</option>
                                                <option value="textarea">Text Area</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row" v-if="input.model == 'input'">
                                        <div class="col-md-4">
                                            <label>Input Type :</label>
                                        </div>
                                        <div class="col-md-8">
                                            <select v-model="input.type" class="form-control">
                                                <option value="text">Text</option>
                                                <option value="email">Email</option>
                                                <option value="password">Password</option>
                                                <option value="number">Number</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-primary" type="submit">
                                            Add To Form
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="old-fields">
                                <br>
                                <draggable :list="fields" class="drag-place" :options="{group:'form', clone: 'true'}">
                                    <transition-group>
                                        <div v-for="(el, index) in fields" :key="index" class="form-group component row">
                                            <div class="col-md-4 text-right">
                                                <label>
                                                    {{ el.label }}
                                                </label>
                                            </div>
                                            <div class="col-md-8">
                                                <input
                                                    :type="el.type"
                                                    :placeholder="el.placeholder"
                                                    :name="el.name"
                                                    class="form-control"
                                                />
                                            </div>
                                        </div>
                                    </transition-group>
                                </draggable>
                                <br>
                                <span>
                                    Drag Field To your demo form
                                </span>
                            </div>

                        </div>

                    </div>


                </div>
                <div class="col-md-6 col-md-offset-1">
                    <h3 class="text-center">
                        Form Demo
                    </h3>
                    <div class="hr-line-dashed"></div>
                    <draggable :list="form.fields" class="drag-place" :options="{group:'form'}">
                        <transition-group>
                            <div v-for="(el, index) in form.fields" :key="index" class="form-group component row">
                                <div class="col-md-4 text-right">
                                    <label>
                                        {{ el.label }}
                                    </label>
                                </div>
                                <div class="col-md-8">
                                    <input
                                           :type="el.type"
                                           :placeholder="el.placeholder"
                                           :name="el.name"
                                           class="form-control"
                                    />
                                </div>
                            </div>
                        </transition-group>
                    </draggable>
                    <div class="form-group text-center">
                        <button class="btn btn-success" @click="save">
                            Save Form
                        </button>
                    </div>
                </div>
                <div class="col-md-12">

                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-4">
                    <draggable :options="{group:{ name:'form'}}">
                        <div class="form-group component row">
                            <div class="col-md-4">
                                <label>
                                    {{ input.label }}
                                </label>
                            </div>
                            <div class="col-md-8">
                                <input v-if="input.model == 'input'"
                                       :type="input.type"
                                       :placeholder="input.placeholder"
                                       :name="input.name"
                                       class="form-control"
                                />
                            </div>
                        </div>
                        <br><br>
                        <div class="text-center">
                            Input Preview
                        </div>
                    </draggable>
                </div>
                <div class="col-md-6 col-md-offset-2 text-center">
                    <draggable :options="{group:{ name:'form'}}">
                        <i class="fa fa-trash fa-4x"></i>
                        <br><br>
                        <span>
                            Drag Input here if you want to remove it
                        </span>
                    </draggable>
                </div>
            </div>
        </div>
    </div>
</template>

<script type="text/babel">
    import Component from 'vue-class-component'
    import draggable from 'vuedraggable'

    @Component({
        components: {
            draggable
        }
    })
    export default class Field {
        data() {
            return {
                fields: [],
                form: {
                    fields: [],
                    title: ''
                },

                input: {
                    name: 'username',
                    model: 'input',
                    type: 'text',
                    placeholder: 'Please Enter Your Username',
                    label: 'Username :'
                }
            }
        }

        mounted() {
            this.$http.get(this.$store.state.config.api_url + 'forms/' + this.$route.params.slug)
                .then(response => {
                    this.form = response.data.data
                });

            this.$http.get(this.$store.state.config.api_url + 'forms/' + this.$route.params.slug + '/fields')
                .then(response => {
                    this.fields = response.data.data
                })
                .then(res => {
                    if(!this.form) {
                        this.form = {
                            fields: []
                        };
                    }
                })

            this.$watch('input.label', (name, val) => {
                this.input.name = name.toLowerCase().replace(/ /g,'_').replace(/[^\w-]+/g,'_');
            })
        }

        save() {
            this.$http.post(this.$store.state.config.api_url + 'forms/' + this.$route.params.slug + '/fields', this.form.fields)
                .then(response => {
                    this.$events.$emit('notify', {
                        type: 'info',
                        title: 'Success !',
                        message: 'Form Fields Was Updated Successfully!'
                    });
                    this.$router.push({name: 'system.forms.index'});
                });
        }

        add() {
            let input = this.input;
            this.form.fields.push(input);
            this.input = {
                name: 'username',
                model: 'input',
                type: 'text',
                placeholder: 'Please Enter Your Username',
                label: 'Username'
            }
        }
    }
</script>
<style lang="scss" rel="stylesheet/scss">
    .col-md-5 {
        /*background-color: #666;*/
        /*color: white;*/
        font-weight: bold;
    }

    .drag-place {
        min-height: 200px;
    }

    .component, .component input {
        cursor: pointer;
    }
</style>
