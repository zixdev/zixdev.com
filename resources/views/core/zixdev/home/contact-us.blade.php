<zixdev-home-contact-screen inline-template>
    <div class="container l-contact__us" id="contact-us">
        <div class="row l-contact__us--heading">
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
                                       v-model="contact.name"
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
                                <button type="submit" class="btn btn-primary red waves-effect waves-light" :disabled="form.submitting">
                                    <i v-if="form.submitting" class="fa fa-spinner fa-pulse"></i>
                                    Submit
                                </button>
                            </div>
                        </form>
                    </div>

                </div>
                <!--/Form with header-->
            </div>

            <div class="col-md-7">

                <!--Google map-->
                <div id="map-container" class="z-depth-1-half map-container" style="height: 400px">
                    <div style="width:100%;max-width:100%;overflow:hidden;height:100%;color:red;">
                        <div id="display-google-map" style="height:100%; width:100%;max-width:100%;">
                            <iframe style="height:100%;width:100%;border:0;" frameborder="0"
                                    src="https://www.google.com/maps/embed/v1/place?q=sfax+Immeuble+la+perla&key=AIzaSyAN0om9mFmy1QN6Wf54tXAowK4eT0ZUPrU"></iframe>
                        </div>
                        <a class="google-map-html" rel="nofollow" href="https://www.interserver-coupons.com"
                           id="enable-map-data">InterserverCoupons</a>
                    </div>
                </div>

                <br>
                <!--Buttons-->
                <div class="row text-center">
                    <div class="col-md-5">
                        <a class="btn-floating btn-small red"><i class="fa fa-map-marker"></i></a>
                        <p>AV Lakhmi Im Laprla2 Etage 61 </p>
                        <p>Sfax 3027, Tunisia</p>
                    </div>

                    <div class="col-md-3">
                        <a href="tel:+21622074426" class="btn-floating btn-small red"><i class="fa fa-phone"></i></a>
                        <p>+216 22 074 426</p>
                        <p>Mon - Fri, 8:00-14:00</p>
                    </div>

                    <div class="col-md-4">
                        <a href="mailto:contact@zixdev.com" class="btn-floating btn-small red"><i class="fa fa-envelope"></i></a>
                        <p>contact@zixdev.com</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</zixdev-home-contact-screen>
<br>
<br>
<br>
<br>