<!-- ScrollUp Button Start -->
<div class="back-to-top-button">
    <a href="#top">
      <i class="fas fa-chevron-up"></i>
    </a>
  </div>
  <!-- ScrollUp Button End -->

<!-- Footer Start -->
<footer class="main-footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-12">
                <!-- About Footer Start -->
                <div class="about-footer">
                    <!-- Footer Logo Start -->
                    <div class="footer-logo">
                        <figure>
                            <img src="{{ asset('Assets/Landing/images/footer-logo.png') }}" alt="">
                        </figure>
                    </div>
                    <!-- Footer Logo End -->

                    <!-- Footer Content Start -->
                    <div class="footer-content">
                        <p>{{ __('footer.description') }}</p>
                    </div>
                    <!-- Footer Content End -->

                    <!-- Footer Social Links Start -->
                    <div class="footer-social-links">
                        <ul>
                            <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fa-brands fa-linkedin-in"></i></a></li>
                            <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>                                                                
                            <li><a href="#"><i class="fa-brands fa-youtube"></i></a></li>                                                                
                        </ul>
                    </div>
                    <!-- Footer Social Links End -->
                </div>
                <!-- About Footer End -->
            </div>

            <div class="col-lg-2 col-md-3">
                <!-- Footer Quick Links Start -->
                <div class="footer-quick-links">
                    <h2>{{ __('footer.useful_links') }}</h2>
                    <ul>                            
                        <li><a href="{{ route('about') }}">{{ __('footer.about_us') }}</a></li>
                        <li><a href="{{ route('services') }}">{{ __('footer.services') }}</a></li>
                        <li><a href="{{ route('news') }}">{{ __('footer.news') }}</a></li>
                        <li><a href="{{ route('contact') }}">{{ __('footer.contact_us') }}</a></li>
                    </ul>
                </div>
                <!-- Footer Quick Links End -->
            </div>

            <div class="col-lg-3 col-md-5">
                <!-- Footer Newsletter Start -->
                <div class="footer-quick-links">
                    <h2>Media</h2>
                    <ul>                            
                        <li><a href="{{ route('activities') }}">{{ __('footer.activities') }}</a></li>
                        <li><a href="{{ route('education') }}">{{ __('footer.education') }}</a></li>
                        <li><a href="{{ route('projects') }}">{{ __('footer.projects') }}</a></li>
                    </ul>
                </div>
                <!-- Footer Newsletter End -->
            </div>

            <div class="col-lg-3 col-md-4">
                <!-- Footer Contact Details Start -->
                <div class="footer-contact-details">
                    <h2>{{ __('footer.contact') }}</h2>
                    <!-- Footer Contact Info Box Start -->
                    <div class="footer-contact-box">
                        <!-- Info Box Start -->
                        <div class="footer-info-box">
                            <!-- Icon Box Start -->
                            <div class="icon-box">
                                <i class="fa-solid fa-phone"></i>
                            </div>
                            <!-- Icon Box End -->
                            <p>{{ $contact->contact_number }}</p>
                        </div>
                        <!-- Info Box End -->

                        <!-- Info Box Start -->
                        <div class="footer-info-box">
                            <!-- Icon Box Start -->
                            <div class="icon-box">
                                <i class="fa-solid fa-envelope-open-text"></i>
                            </div>
                            <!-- Icon Box End -->
                            <p>{{ $contact->email }}</p>
                        </div>
                        <!-- Info Box End -->

                        <!-- Info Box Start -->
                        <div class="footer-info-box">
                            <!-- Icon Box Start -->
                            <div class="icon-box">
                                <i class="fa-solid fa-location-dot"></i>
                            </div>
                            <!-- Icon Box End -->
                            <p>{{ $contact->address }}</p>
                        </div>
                        <!-- Info Box End -->
                    </div>
                    <!-- Footer Contact Info Box End -->
                </div>
                <!-- Footer Contact Details End -->
            </div>

        </div>
    </div>
     <!-- Footer Copyright Section Start -->
     <div class="footer-copyright">
        <div class="row">
            <div class="col-lg-12">
                <!-- Footer Copyright Start -->
                <div class="footer-copyright-text">
                    <p>Copyright © 2024 Hadiwana Tirta Lestari. All Rights Reserved.</p>
                </div>
                <!-- Footer Copyright End -->
            </div>
        </div>
    </div>
    <!-- Footer Copyright Section End -->
</footer>
<!-- Footer End -->