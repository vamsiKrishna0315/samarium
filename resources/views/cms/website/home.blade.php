@extends ('cms.website.base')

@section ('googleAnalyticsTag')
@endsection

@section ('pageTitleTag')
  @if ($company)
    <title> {{ $company->name }}
    </title>
  @endif
@endsection

@section ('fbOgMetaTags')
@if ($company)
  <meta property="og:url"                content="{{ Request::url() }}" />
  <meta property="og:type"               content="article" />
  <meta property="og:title"              content="Home page of {{ $company->name }}" />
  <meta property="og:description"        content="All details of {{ $company->name }}" />
  <meta property="og:image"              content="{{ asset('storage/' . $company->logo_image_path) }}"/>
@endif
@endsection

@section ('content')

{{-- Latest notice --}}
@if (false)
@if (\App\WebpageCategory::where('name', 'notice')->first())
  @if (count(\App\WebpageCategory::where('name', 'notice')->first()->webpages()->where('is_post', 'yes')->get()) > 0)
    @include ('partials.cms.website.newest-notice-flasher-modal')
    @include ('partials.cms.website.newest-notice-flasher')
  @endif
@endif
@endif

@if (preg_match("/school/i", env('MODULES')))
  <div class="container-fluid o-fade-in" style="background-color: {{ \App\CmsTheme::first()->ascent_bg_color }};">
    <div class="container my-0 my-md-0 px-md-3 py-4 p-0" style="background-color: {{ \App\CmsTheme::first()->ascent_bg_color }};">
      @include ('partials.school.school-quick-links-display')
    </div>
  </div>
@endif

@if (preg_match("/hfn/i", env('MODULES')))
  <div class="container-fluid pb-5 p-0 o-fade-in" style="
  background-color: {{ \App\CmsTheme::first()->ascent_bg_color }};
  color: {{ \App\CmsTheme::first()->ascent_text_color }};
  ">
    <div class="container bg-info-rm p-0">
      <div class="row p-0" style="margin: auto;">
        <div class="col-md-6 p-0">
          <img class="img-fluid h-25-rm w-100-rm mx-auto-rm d-block-rm" src="{{ asset('storage/' . \App\CmsTheme::first()->hero_image_path) }}"
          style="{{--max-height: 200px;width: 1200px;--}}">
        </div>
        <div class="col-md-6 pt-5 px-md-5">
          <div class="d-flex flex-column justify-content-center h-100">
            <h1 class="h1">
              {{ $company->name }}
            </h1>
            <div class="mb-3">
              {{ $company->brief_description }}
            </div>

            <div style="
                    background-color:
                      @if (\App\CmsTheme::first())
                        {{ \App\CmsTheme::first()->ascent_bg_color }}
                      @else
                        orange
                      @endif
                      ;
                    color:
                      @if (\App\CmsTheme::first())
                        {{ \App\CmsTheme::first()->ascent_text_color }}
                      @else
                        white
                      @endif
                      ;
            ">
              <div class="border" style="background-color: rgba(0, 0, 0, 0.5)">
                <a href="{{ \App\Webpage::where('name', 'Contact us')->orWhere('permalink', '/contact-us')->first()->permalink }}"
                    class="btn btn-danger-rm btn-block py-3"
                    style="
                    color:
                      @if (\App\CmsTheme::first())
                        {{ \App\CmsTheme::first()->ascent_text_color }}
                      @else
                        white
                      @endif
                      ;
                    ">
                  Contact us
                </a>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
@endif

<div class="container-fluid bg-white border pt-4 pb-4">
  <div class="container">
    <div class="row" style="margin: auto;">
      <div class="col-md-8 border p-0">
        @if (false)
        <h2 class="font-weight-bold mb-4">
          Upcoming events
        </h2>
        @endif
        @livewire ('calendar.website.upcoming-events-list')
      </div>
      <div class="col-md-4 pt-5 pt-md-0 px-0 px-md-3">
        @if (false)
        <h2 class="font-weight-bold mb-2">
          Latest notices
        </h2>
        @endif
        @livewire ('notice.dashboard.latest-notice-list')
      </div>
    </div>
  </div>
</div>

{{-- Hero/Featured Div --}}
<div class="container-fluid bg-white-rm p-0 pt-3" 
  style="
           {{--
           background-image: @if (\App\CmsTheme::first())
             url({{ asset('storage/' . \App\CmsTheme::first()->hero_image_path) }})
           @else
             url({{ asset('img/school-5.jpg') }})
           @endif
           ;
           background-size: cover;
           background-repeat: no-repeat;
           background-position: center;
           background-attachment: fixed;
           height: 500px;
           --}}
           "
>
  <div class="container bg-dark-rm">

    <div class="row bg-danger-rm" style="margin: auto;">
      <div class="col-md-8 mb-4 p-0 border-rm">

        {{--
        |
        | Show a cool grid of pages
        |
        --}}
        @if (true)
        @if (\App\Webpage::whereHas('webpageCategories', function ($query) { $query->where('name', 'featured');})->where('visibility', 'public')->count() > 0)
        <div class="mb-4 px-2">
          <div class="row">
            @foreach (\App\Webpage::whereHas('webpageCategories', function ($query) { $query->where('name', 'featured');})->where('visibility', 'public')->orderBy('webpage_id', 'desc')->limit('4')->get() as $webpage)

              <div class="col-6 mb-1 p-0 pr-1"> <a href="{{ route('website-webpage-' . $webpage->permalink) }}">
                  <div style="
                    background-image: @if (\App\CmsTheme::first())
                      url({{ asset('storage/' . $webpage->featured_image_path) }})
                    @else
                      url({{ asset('img/school-5.jpg') }})
                    @endif
                    ;
                    background-size: cover;
                    background-repeat: no-repeat;
                    background-position: center;
                    height: 300px;
                    {{--
                    background-attachment: fixed;
                    --}}
                  ">
                    <div class="o-overlay p-3-rm h-100 d-flex flex-column justify-content-end">
                      <div class="p-3" style="background-color: rgba(0, 0, 0, 0.5);">
                        <h2 class="text-white h4 font-weight-bold">
                          {{ $webpage->name }}
                        </h2>
                      </div>
                    </div>

                  </div>
                </a>
              </div>
            @endforeach
          </div>
        </div>
        @endif
        @endif

        {{--
        |
        | Show latest posts.
        |
        --}}
        <div class="bg-warning-rm px-3-rm px-md-0">
          <div class="mb-0">
            <h2 class="h5 font-weight-bold bg-primary-rm text-white-rm p-3 mb-0" style="
                background-color:
                  @if (\App\CmsTheme::first())
                    {{ \App\CmsTheme::first()->ascent_bg_color }}
                  @else
                    orange
                  @endif
                  ;
                color:
                  @if (\App\CmsTheme::first())
                    {{ \App\CmsTheme::first()->ascent_text_color }}
                  @else
                    white
                  @endif
                  ;
            ">
              Latest posts
            </h2>
          </div>
          @livewire ('cms.website.latest-post-list-grid', ['ctaButton' => 'no',])
        </div>


      </div>
      <div class="col-md-4 px-2-rm mb-4">
        @livewire ('cms.website.contact-component', ['onlyForm' => 'yes',])
        @if (false)
        <div class="container mb-4 p-0">
          @livewire ('calendar.website.today-display')
        </div>
        @livewire ('notice.dashboard.latest-notice-list')
        <div class="my-3">
          @livewire ('cms.website.latest-post-list')
        </div>
        @endif

      </div>
    </div>
  </div>

</div>







{{--
|
|
|
| Display the home webpage.
|
|
|
--}}
@if (preg_match("/bgc/i", env('MODULES')))
  {{-- This is temporary workaround for BGC --}} 
  {{-- If BGC --}}
  @if (\App\Team::where('team_type', 'playing_team')->first())
    <div class="container my-4">
      @include ('partials.team.team-block-display')
    </div>
  @endif
@else
  @if (false)
  {{-- All other cases --}}
  @if (\App\Webpage::where('name', 'Home')->where('visibility', 'public')->first())
    @livewire ('cms.website.webpage-display', ['webpage' => \App\Webpage::where('name', 'Home')->where('visibility', 'public')->first(),])
  @elseif (\App\Webpage::where('name', 'Post')->where('visibility', 'public')->first())
    @livewire ('cms.website.webpage-display', ['webpage' => \App\Webpage::where('name', 'Post')->where('visibility', 'public')->first(),])
  @else
    @include ('partials.cms.website.home-page-not-set-yet')
  @endif
  @endif
@endif

@endsection
