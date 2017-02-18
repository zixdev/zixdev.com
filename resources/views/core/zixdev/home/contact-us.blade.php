<zixdev-home-contact-screen inline-template  class="l-contact_us" id="contact-us">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h2>
                    Contact Us
                </h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5">
                <!--Form with header-->
                <div class="card">

                    <div class="card-content">
                        <!--Header-->
                        <div class="form-header red">
                            <h3>
                                <i class="fa fa-envelope"></i>

                                @{{ getError('success') ? 'Message Was Sent' : 'Write To Us'  }}
                            </h3>
                        </div>
                        <div v-if="getError('message')" class="alert alert-danger">
                            @{{ getError('message') }}
                        </div>

                        <div v-if="getError('success')" class="alert alert-success">
                            Thank you for contacting us @{{ contact.full_name }} ! <br>
                            We will respond to your email as soon as possible.
                        </div>
                        <form v-if="!getError('success')" @submit.prevent="send">
                            <!--Body-->
                            <div class="input-field">
                                <i class="material-icons prefix">account_circle</i>
                                <input type="text" id="form3"
                                       v-model="contact.full_name"
                                       required
                                        >
                                <label for="form3">Full Name</label>
                                <span v-if="getError('name')" class="text-danger">@{{ getError('name') }}</span>
                            </div>

                            <div class="input-field">
                                <i class="fa fa-envelope prefix"></i>
                                <input type="email" id="form2"
                                       v-model="contact.email"
                                       required
                                        >
                                <label for="form2">Email Address</label>
                                <span v-if="getError('email')" class="text-danger">@{{ getError('email') }}</span>
                            </div>

                            <div class="input-field">
                                <i class="fa fa-tag prefix"></i>
                                <input type="text" id="form32"
                                       v-model="contact.subject">
                                <label for="form32">Subject</label>
                                <span v-if="getError('subject')" class="text-danger">@{{ getError('subject') }}</span>
                            </div>

                            <div class="input-field">
                                <i class="fa fa-pencil prefix"></i>
                                    <textarea type="text" id="form8"
                                              v-model="contact.message"
                                              class="materialize-textarea"
                                              required
                                              minlength="20"
                                            ></textarea>
                                <label for="form8">Your Message</label>
                                <span v-if="getError('message')" class="text-danger">@{{ getError('message') }}</span>
                            </div>

                            <div class="text-xs-center clearfix">
                                <button type="submit" class="btn btn-primary waves-effect waves-light" :disabled="form.submitting">
                                    <i v-if="form.submitting" class="fa fa-spinner fa-pulse"></i>
                                    Submit
                                </button>
                            </div>
                        </form>
                    </div>

                </div>
                <!--/Form with header-->
            </div>
        </div>
    </div>
</zixdev-home-contact-screen>
<br>
<br>
<br>
<br>