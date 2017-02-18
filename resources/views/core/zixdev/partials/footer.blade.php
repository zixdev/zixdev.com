<footer class="main-footer">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-6">
                <h2 class="footer-logo">
                    {{ config('app.name') }}
                </h2>
                <p>
                    {{ config('site.description') }}
                </p>

                <p>
                    <i class="fa fa-map-pin"></i>
                    {{ config('site.contact.address') }}
                </p>

                <p>
                    <i class="fa fa-phone"></i>
                    Phone :
                    <a href="tel:{{ config('site.contact.phone') }}">
                        {{ config('site.contact.phone') }}
                    </a>
                </p>

                <p>
                    <i class="fa fa-envelope"></i>
                    E-mail :
                    <a href="tel:{{ config('site.contact.email') }}">
                        {{ config('site.contact.email') }}
                    </a>
                </p>

            </div>
            <div class="col-md-2 col-sm-6">
                <h6 class="heading7">GENERAL LINKS</h6>
                <ul class="list-unstyled">
                    <li>
                        <a href="{{ url('/') }}">Home</a>
                    </li>
                    <li>
                        <a href="{{ url('about-us') }}">About Us</a>
                    </li>
                    <li>
                        <a href="{{ url('contact-us') }}">Contact Us</a>
                    </li>
                    @if(\Auth::user())
                        <li>
                            <a href="{{ url('settings') }}">My Account</a>
                        </li>
                        <li>
                            <a href="{{ url('auth/logout') }}">Logout</a>
                        </li>
                    @else

                        <li>
                            <a href="{{ url('login') }}">Login</a>
                        </li>
                        <li>
                            <a href="{{ url('register') }}">Register</a>
                        </li>
                    @endif
                </ul>
            </div>
            <div class="col-md-3 col-sm-6">
                <h6 class="heading7">Our Services</h6>
                @if(Menu::get('footer'))
                    {!! Menu::get('footer')->asUl(['class' => 'list-unstyled']) !!}
                @endif
            </div>

            <div class="col-md-3 col-sm-6 paddingtop-bottom">
                <div class="fb-page" data-href="https://www.facebook.com/zixdev" data-tabs="timeline"
                     data-height="300" data-small-header="false"
                     data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                    <div class="fb-xfbml-parse-ignore">
                        <blockquote cite="https://www.facebook.com/zixdev">
                            <a target="_blank" href="https://www.facebook.com/zixdev">Facebook</a>
                        </blockquote>
                    </div>
                </div>
                <div class="fb-page" data-href="https://www.facebook.com/zixdev" data-tabs="timeline"
                     data-height="300" data-small-header="false"
                     data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                    <div class="fb-xfbml-parse-ignore">
                        <blockquote cite="https://www.facebook.com/zixdev">
                            <a target="_blank" href="https://www.facebook.com/zixdev">Linkedin</a>
                        </blockquote>
                    </div>
                </div>
                <div class="fb-page" data-href="https://www.facebook.com/zixdev" data-tabs="timeline"
                     data-height="300" data-small-header="false"
                     data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                    <div class="fb-xfbml-parse-ignore">
                        <blockquote cite="https://www.facebook.com/zixdev">
                            <a target="_blank" href="https://www.facebook.com/zixdev">Github</a>
                        </blockquote>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--footer start from here-->

<footer class="copyright-footer">
    <div class="container">
        <div class="col-md-6">
            <p>Copyright © 2016 - {{ \Carbon\Carbon::now()->year }} {{ config('company.name') }}, All Rights reserved.</p>
        </div>
        <div class="col-md-6">
            <p class="pull-right">
                Designed By: <a target="_blank" href="https://zixdev.com/">Zix Development</a>
            </p>
        </div>
    </div>
</footer>