<div class="border-top bg-white">

  {{-- Brand Info --}}
  <div class="container-fluid py-5" style="background-color: #dcdcdc;">
    <div class="container">
      <div class="d-flex justify-content-center mb-4">
        <div>
          @if (true)
          <img src="{{ asset('storage/' . $company->logo_image_path) }}"
              class="img-fluid-rm"
              alt="{{ $company->name }} logo"
              style="height: 75px !important; width: 75px;">
          @endif
        </div>
      </div>

      <div class="d-flex justify-content-center">
        <div>
          <div>
            <h2 class="h2" style="{{-- font-family: Mono; --}}">
              {{ $company->name }}
            </h2>
          </div>
        </div>
      </div>
      <div class="d-flex flex-column-rm justify-content-center">

        <div class="mr-3 ">
          <i class="fas fa-map-marker-alt mr-2"></i>
          {{ $company->address }}
        </div>

        <div class="mr-3">
          <i class="fas fa-phone mr-2"></i>
          {{ $company->phone }}
        </div>

        <div class="mr-3">
          <i class="fas fa-envelope mr-2"></i>
          {{ $company->email }}
        </div>
      </div>
    </div>
  </div>

  <div class="container-fluid" style="background-color: #ececec;">
    <div class="container">
      <div class="row">
        <div class="col-md-3 py-4">
          @if (false)
          @endif

          <h2 class="h4 text-dark font-weight-bold mb-4-rm">
            About us
          </h2>
          <div class="mb-2-rm">
            <a href="./contact-us"
                class="text-secondary text-decoration-none text-reset h5-rm">
              <i class="fas fa-angle-right mr-2"></i>
              Contact
            </a>
          </div>
          <div class="mb-2-rm">
            <a href="./about-us"
                class="text-secondary text-decoration-none text-reset h5-rm">
              <i class="fas fa-angle-right mr-2"></i>
              About us
            </a>
          </div>
          <div class="mb-2-rm">
            <a href="{{ route('ecomm-collection-webpage-display-privacy') }}"
                class="text-secondary text-decoration-none text-reset h5-rm">
              <i class="fas fa-angle-right mr-2"></i>
              How to buy
            </a>
          </div>
          <div class="mb-2-rm">
            <a href="{{ route('ecomm-collection-webpage-display-sitemap') }}"
                class="text-secondary text-decoration-none text-reset h5-rm">
              <i class="fas fa-angle-right mr-2"></i>
              Location
            </a>
          </div>
          <div class="mb-2-rm">
            <a href="./post"
                class="text-secondary text-decoration-none text-reset h5-rm">
              <i class="fas fa-angle-right mr-2"></i>
              Blog
            </a>
          </div>

        </div>

        <div class="col-md-3 py-4">
          <h2 class="h4 text-dark font-weight-bold mb-4-rm">
            Policy
          </h2>
          <div class="mb-2-rm">
            <a href="{{ route('ecomm-collection-webpage-display-return-policy') }}"
                class="text-secondary text-decoration-none text-reset h5-rm">
              <i class="fas fa-angle-right mr-2"></i>
              Return policy
            </a>
          </div>
          <div class="mb-2-rm">
            <a href="{{ route('ecomm-collection-webpage-display-terms-of-use') }}"
                class="text-secondary text-decoration-none text-reset h5-rm">
              <i class="fas fa-angle-right mr-2"></i>
              Terms of use
            </a>
          </div>
          <div class="mb-2-rm">
            <a href="{{ route('ecomm-collection-webpage-display-privacy') }}"
                class="text-secondary text-decoration-none text-reset h5-rm">
              <i class="fas fa-angle-right mr-2"></i>
              Privacy
            </a>
          </div>
          <div class="mb-2-rm">
            <a href="{{ route('ecomm-collection-webpage-display-sitemap') }}"
                class="text-secondary text-decoration-none text-reset h5-rm">
              <i class="fas fa-angle-right mr-2"></i>
              Sitemap
            </a>
          </div>
        </div>
        <div class="col-md-3">
          <h2 class="h4 mt-4 mb-3 text-center-tm text-secondary-rm">
            Follow us
          </h2>
          <div class="d-flex justify-content-center-rm">
            @if ($company->fb_link)
              <div class="mr-3">
                <a href="{{ $company->fb_link }}" target="_blank">
                  <i class="fab fa-facebook fa-2x text-primary"></i>
                </a>
              </div>
            @endif
            @if ($company->twitter_link)
              <div class="mr-3">
                <a href="{{ $company->twitter_link }}" target="_blank">
                  <i class="fab fa-twitter fa-2x text-info"></i>
                </a>
              </div>
            @endif
            @if ($company->insta_link)
              <div class="mr-3">
                <a href="{{ $company->insta_link }}" target="_blank">
                  <i class="fab fa-instagram fa-2x text-danger"></i>
                </a>
              </div>
            @endif
            @if ($company->youtube_link)
              <div class="mr-3">
                <a href="{{ $company->youtube_link }}" target="_blank">
                  <i class="fab fa-youtube fa-2x text-danger"></i>
                </a>
              </div>
            @endif
            @if ($company->tiktok_link)
              <div class="mr-3">
                <a href="{{ $company->tiktok_link }}" target="_blank">
                  <i class="fab fa-tiktok fa-2x text-danger"></i>
                </a>
              </div>
            @endif
          </div>
        </div>

        <div class="col-md-3 py-4">
          <h2 class="h4 mb-3 text-center-tm text-secondary-rm">
            Subscribe
          </h2>
          <p class="text-secondary">
            Enter your email to get latest updates
            delivered to your inbox.
          </p>
          <input type="text" class="form-control" placeholder="email"/>
          <div class="my-3">
            <button class="btn btn-block btn-danger">
              Subscribe
            </button>
          </div>

        </div>
      </div>
    </div>
  </div>

  <div class="container-fluid bg-info-rm border py-2 pb-2 text-white-rm" style="{{--background-color: #101530;--}}">
    <div class="container">
      <div class="border-top-rm text-center mt-1 pt-1" style="color: #aaa;">
        <div>
          &copy; 2023
          {{ $company->name }}
          @if (false)
          |
          All rights reserved
          @endif
        </div>
        <div>
          Powered by
          <a href="https://oit.com.np">
            OIT
          </a>
          <i class="fas fa-check-circle ml-2"></i> 
        </div>
      </div>
    </div>
  </div>

</div>
