<x-landing.layout>
    @section('title')
    {{ $title }}
    @endsection

    <style>
        .captcha-container {
            position: relative;
            display: inline-block;
        }
        .protected-image {
            user-select: none;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            pointer-events: none;
        }
        .captcha-container::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: transparent;
        }
        .no-spinner::-webkit-outer-spin-button,
        .no-spinner::-webkit-inner-spin-button {
          -webkit-appearance: none;
          margin: 0;
        }

        /* Hide spinner for Firefox */
        .no-spinner[type=number] {
          -moz-appearance: textfield;
        }
    </style>
   
    <!-- Page Header Start -->
	<div class="page-header parallaxie" style="background: linear-gradient(180deg, transparent 0%, #0e0d1b8c 40.5%), url('{{ asset('Assets/Landing/images/page-header-bg.jpg') }}') no-repeat center center; background-size: cover;">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<!-- Page Header Box Start -->
					<div class="page-header-box">
						<h1 class="text-anime-style-3" data-cursor="-opaque">{{ __('header.contact_us') }}</h1>
						<nav class="wow fadeInUp">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('header.home') }}</a></li>
								<li class="breadcrumb-item active" aria-current="page"><a href="#contact-us">{{ __('header.contact_us') }}</a></li>
							</ol>
						</nav>
					</div>
					<!-- Page Header Box End -->
				</div>
			</div>
		</div>
	</div>
	<!-- Page Header End -->
    
    <!-- Page Contact Us Start -->
    <div class="page-contact-us" id="contact-us">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <!-- Contact Side Bar Start -->
                    <div class="contact-sidebar">
                        <!-- Contact Info Start -->
                        <div class="contact-info wow fadeInUp" data-wow-delay="0.25s">
                            <div class="contact-info-title">
                                <h3>{{ $contact->city }}</h3>
                                <p>{{ __('general.our_present') }}</p>
                            </div>

                             <!-- Contact Info Box Start -->
                            <div class="contact-info-box">
                                <!-- Contact Info Item Start -->
                                <div class="contact-info-item">
                                    <!-- Icon Box Start -->
                                    <div class="icon-box">
                                        <i class="fa-solid fa-envelope"></i>
                                    </div>
                                    <!-- Icon Box End -->
                                    <p>{{ $contact->email }}</p>
                                </div>
                                <!-- Contact Info Item End -->

                                <!-- Contact Info Item Start -->
                                <div class="contact-info-item">
                                    <!-- Icon Box Start -->
                                    <div class="icon-box">
                                        <i class="fa-solid fa-location-dot"></i>
                                    </div>
                                    <!-- Icon Box End -->
                                    <p>{{ $contact->address }}</p>
                                </div>
                                <!-- Contact Info Item End -->
                    
                                <!-- Contact Info Item Start -->
                                <div class="contact-info-item">
                                    <!-- Icon Box Start -->
                                    <div class="icon-box">
                                        <i class="fa-solid fa-phone"></i>
                                    </div>
                                    <!-- Icon Box End -->
                                    <p>{{ $contact->contact_number }}</p>
                                </div>
                                <!-- Contact Info Item End -->
                            </div>
                             <!-- Contact Info Box End -->
                        </div>
                        <!-- Contact Info End -->

                        <!-- Contact Info Start -->
                        <div class="contact-info wow fadeInUp" data-wow-delay="0.5s">
                            <div class="contact-info-title">
                                <h3>{{ __('general.social_media') }}</h3>
                            </div>

                             <!-- Contact Info Box Start -->
                            <div class="contact-info-box">
                                <!-- Contact Info Item Start -->
                                @if($contact->instagram)
                                <div class="contact-info-item">
                                    <div class="icon-box">
                                        <i class="fa-brands fa-instagram"></i>
                                    </div>
                                    <p>{{ $contact->instagram }}</p>
                                </div>
                                @endif
                                <!-- Contact Info Item End -->

                                <!-- Contact Info Item Start -->
                                @if($contact->youtube)
                                <div class="contact-info-item">
                                    <div class="icon-box">
                                        <i class="fa-brands fa-youtube"></i>
                                    </div>
                                    <p>{{ $contact->youtube }}</p>
                                </div>
                                @endif
                                <!-- Contact Info Item End -->
                                <!-- Contact Info Item Start -->
                                @if($contact->facebook)
                                <div class="contact-info-item">
                                    <div class="icon-box">
                                        <i class="fa-brands fa-facebook-f"></i>
                                    </div>
                                    <p>{{ $contact->facebook }}</p>
                                </div>
                                @endif
                                <!-- Contact Info Item End -->
                    
                                <!-- Contact Info Item Start -->
                                @if($contact->linkedin)
                                <div class="contact-info-item">
                                    <div class="icon-box">
                                        <i class="fa-brands fa-linkedin-in"></i>
                                    </div>
                                    <p>{{ $contact->linkedin }}</p>
                                </div>
                                @endif
                                <!-- Contact Info Item End -->
                            </div>
                            <!-- Contact Info Box End -->
                        </div>
                        <!-- Contact Info End -->
                    </div>
                    <!-- Contact Side Bar End -->
                </div>
                
                <div class="col-lg-8">
                    <!-- Contact Form start -->
                    <div class="contact-us-form">
                        <!-- Section Title Start -->
                        <div class="section-title">
                            <h3 class="wow fadeInUp">{{ __('general.contact_us') }}</h3>
                            <h2 class="text-anime-style-3" data-cursor="-opaque">{{ __('general.how_can_we_help_you') }}</h2>
                        </div>
                        <!-- Section Title End -->

                        <!-- Content Form Content Start -->
                        <div class="contact-form-content wow fadeInUp" data-wow-delay="0.25s">
                            <p>{{ __('general.let_us_know') }}</p>
                        </div>
                        <!-- Content Form Content End -->

                        <form id="contactForm" data-toggle="validator" class="wow fadeInUp" data-wow-delay="0.5s">
                            @csrf
                            <input type="hidden" name="token" value="{{ $token }}">
                            <div class="row">
                                <div class="form-group col-md-4 mb-4">
                                    <label>{{ __('general.your_name_label') }}</label>
                                    <input type="text" name="nama_lengkap" class="form-control" id="nama_lengkap" placeholder="{{ __('general.your_name_input') }}" required>
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="form-group col-md-4 mb-4">
                                    <label>{{ __('general.your_email_label') }}</label>
                                    <input type="email" name ="email" class="form-control" id="email" placeholder="{{ __('general.your_email_input') }}" required>
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="form-group col-md-4 mb-4">
                                    <label>{{ __('general.your_phone_label') }}</label>
                                    <input type="number" name="nomor_handphone" class="form-control no-spinner" id="nomor_handphone" placeholder="{{ __('general.your_phone_input') }}" required>
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="form-group col-md-12 mb-4">
                                    <label>{{ __('general.your_message_label') }}</label>
                                    <textarea name="deskripsi" class="form-control" id="deskripsi" rows="7" placeholder="{{ __('general.your_message_input') }}" required></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <div class="d-flex align-items-center">
                                            <div class="captcha-container">
                                                <img src="{{ $captcha }}" alt="CAPTCHA" id="captcha-image" class="protected-image" draggable="false" oncontextmenu="return false;">
                                            </div>
                                            <button type="button" id="refresh-captcha" class="ms-3">
                                                <i class="fas fa-sync-alt"></i>
                                            </button>
                                        </div>
                                        <input type="text" id="captcha" name="captcha" class="form-control mt-2" placeholder="{{ __('general.captcha_placeholder') }}" required>
                                    </div>
                                </div>

                                <div class="col-lg-12 mt-3">
                                    <div class="contact-form-btn">
                                        <button type="submit" class="btn-default">{{ __('general.send_message') }}</button>
                                        <div id="msgSubmit" class="h3 hidden"></div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- Contact Form end -->
                </div>
            </div>
        </div>
    </div>
    <!-- Page Contact Us End -->

    <!-- Google Map starts -->
    <div class="google-map">
        <div class="container">
            <div class="row section-row">
                <div class="col-md-12">
                    <!-- Section Title Start -->
                    <div class="section-title">
                        <h3 class="wow fadeInUp">{{ __('general.global_present') }}</h3>
                        <h2 class="text-anime-style-3" data-cursor="-opaque">{{ __('general.check_out_office') }}</h2>
                    </div>
                    <!-- Section Title End -->
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <!-- Google Map Iframe Start -->
                    <div class="google-map-iframe">
                        <iframe
                            src="{{ $contact->location_detail }}"
                            allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                    <!-- Google Map Iframe End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Google Map Ends -->

    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
      $(document).ready(function() {
          $('#refresh-captcha').click(function() {
              $.get('{{ route("refresh.captcha") }}', function(data) {
                  $('#captcha-image').attr('src', data.captcha);
              });
          });
      
          $('#contactForm').submit(function(e) {
              e.preventDefault();
              var submitBtn = $(this).find('button[type="submit"]');
              submitBtn.prop('disabled', true);
              
              $.ajax({
                  url: "{{ route('contact.storeInboxContact') }}",
                  method: 'POST',
                  data: new FormData(this),
                  processData: false,
                  contentType: false,
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },
                  success: function(response) {
                      Swal.fire({
                          icon: 'success',
                          title: 'Successful!',
                          text: response.message,
                          allowOutsideClick: false,
                          allowEscapeKey: false
                      }).then((result) => {
                          if (result.isConfirmed) {
                              window.location.href = "{{ route('home') }}";
                          }
                      });
                      $('#contactForm')[0].reset();
                  },
                  error: function(xhr) {
                      submitBtn.prop('disabled', false);
                      if (xhr.status === 422) {
                          var errors = xhr.responseJSON.errors;
                          if (errors && errors.captcha) {
                              Swal.fire({
                                  icon: 'error',
                                  title: "CAPTCHA Doesn't Match !",
                                  text: "The CAPTCHA you entered does not match. Please try again !",
                              });
                          } else if (errors && errors.token) {
                              Swal.fire({
                                  icon: 'error',
                                  title: 'Invalid Form',
                                  text: 'Please refresh the page and try again.',
                              }).then((result) => {
                                  if (result.isConfirmed) {
                                      location.reload();
                                  }
                              });
                          } else {
                              Swal.fire({
                                  icon: 'error',
                                  title: 'Oops...',
                                  text: 'There are some errors in your input. Please check again.',
                              });
                          }
                      } else {
                          Swal.fire({
                              icon: 'error',
                              title: 'Oops...',
                              text: 'An error occurred. Please try again.',
                          });
                      }
                  }
              });
          });
      });
      </script>
    @endpush

</x-landing.layout>