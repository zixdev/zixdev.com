<zixdev-home-contact-screen inline-template class="container">
    <section>
        <!--Section heading-->
        <div class="row">
            <div class="col-md-12 text-center">
                <h1 class="section-heading">Contact Us</h1>
            </div>
        </div>
        <br><br><br>
        <div class="row">

            <!--First column-->
            <div class="col-md-5">

                <!--Form with header-->
                <div class="card">

                    <div class="card-block">
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
                            <div class="md-form">
                                <i class="fa fa-user prefix"></i>
                                <input type="text" id="form3"
                                       v-model="contact.full_name"
                                       class="form-control"
                                       required
                                        >
                                <label for="form3">Full Name</label>
                                <span v-if="getError('name')" class="text-danger">@{{ getError('name') }}</span>
                            </div>

                            <div class="md-form">
                                <i class="fa fa-envelope prefix"></i>
                                <input type="email" id="form2"
                                       v-model="contact.email"
                                       class="form-control"
                                       required
                                        >
                                <label for="form2">Email Address</label>
                                <span v-if="getError('email')" class="text-danger">@{{ getError('email') }}</span>
                            </div>

                            <div class="md-form">
                                <i class="fa fa-tag prefix"></i>
                                <input type="text" id="form32"
                                       v-model="contact.subject"
                                       class="form-control">
                                <label for="form32">Subject</label>
                                <span v-if="getError('subject')" class="text-danger">@{{ getError('subject') }}</span>
                            </div>

                            <div class="md-form">
                                <i class="fa fa-pencil prefix"></i>
                                    <textarea type="text" id="form8"
                                              v-model="contact.message"
                                              class="md-textarea"
                                              required
                                              minlength="20"
                                            ></textarea>
                                <label for="form8">Your Message</label>
                                <span v-if="getError('message')" class="text-danger">@{{ getError('message') }}</span>
                            </div>

                            <div class="text-xs-center clearfix">
                                <button type="submit" class="btn btn-primary red" :disabled="form.submitting">
                                    <i v-if="form.submitting" class="fa fa-spinner fa-pulse"></i>
                                    Submit
                                </button>
                            </div>
                        </form>
                    </div>

                </div>
                <!--/Form with header-->

            </div>
            <!--/First column-->

            <!--Second column-->
            <div class="col-md-7">

                <!--Google map-->
                <div id="map-container" class="z-depth-1-half map-container" style="height: 400px">
                    <div style="width:100%;max-width:100%;overflow:hidden;height:100%;color:red;">
                        <div id="display-google-map" style="height:100%; width:100%;max-width:100%;">
                            <iframe style="height:100%;width:100%;border:0;" frameborder="0"
                                    src="https://www.google.com/maps/embed/v1/place?q=Faculty+of+Sciences+of+Sfax,+Sfax,+Tunisia&key=AIzaSyAN0om9mFmy1QN6Wf54tXAowK4eT0ZUPrU"></iframe>
                        </div>
                        <a class="google-map-html" rel="nofollow" href="https://www.interserver-coupons.com"
                           id="enable-map-data">InterserverCoupons</a>
                    </div>
                </div>

                <br>
                <!--Buttons-->
                <div class="row text-xs-center">
                    <div class="col-md-4">
                        <a class="btn-floating btn-small red"><i class="fa fa-map-marker"></i></a>
                        <p>AV Lakhmi Im Laprla2 Etage 6 B:61 </p>
                        <p>Sfax 3027, Tunisia</p>
                    </div>

                    <div class="col-md-4">
                        <a class="btn-floating btn-small red"><i class="fa fa-phone"></i></a>
                        <p>+216 22 074 426</p>
                        <p>Mon - Fri, 8:00-14:00</p>
                    </div>

                    <div class="col-md-4">
                        <a href="mailto:contact@zixdev.com" class="btn-floating btn-small red"><i class="fa fa-envelope"></i></a>
                        <p>contact@zixdev.com</p>
                        <p>sales@zixdev.com</p>
                    </div>
                </div>

            </div>
            <!--/Second column-->

        </div>

    </section>
</zixdev-home-contact-screen>