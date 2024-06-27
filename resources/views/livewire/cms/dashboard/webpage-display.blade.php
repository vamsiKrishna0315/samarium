<div class="p-0 pl-3 bg-white border shadow-sm">

  <div class="row">
    <div class="col-md-8">
      {{-- Webpage name --}}
      <div class="mt-3 mb-4">
        <h2>
          {{ $webpage->name }}
        </h2>
      </div>

      @if ($webpage->name == 'Post')
        <div>
          <i class="fas fa-exclamation-circle mr-3" ></i>
          You cannot add content to this page.
          This page will show list of all the posts.
        </div>
      @elseif ($webpage->name == 'Gallery')
        <div>
          <i class="fas fa-exclamation-circle mr-3" ></i>
          You cannot add content to this page.
          This page will show all the galleries.
        </div>
      @else

        {{-- Toolbar --}}
        <x-toolbar-classic toolbarTitle="" toolbarAlign="left">
          @include ('partials.dashboard.tool-bar-button-pill', [
              'btnClickMethod' => "enterMode('createWebpageContent')",
              'btnIconFaClass' => 'fas fa-plus-circle',
              'btnText' => 'Add content',
              'btnCheckMode' => 'createWebpageContent',
              'borderLess' => 'yes',
          ])

          @if (true)
          @include ('partials.dashboard.tool-bar-button-pill', [
              'btnClickMethod' => "clearModes",
              'btnIconFaClass' => 'fas fa-times',
              'btnText' => '',
              'btnCheckMode' => '',
              'borderLess' => 'yes',
          ])
          @endif

          @include ('partials.dashboard.spinner-button')
        </x-toolbar-classic>


        <div class="">
          @if ($modes['createWebpageContent'])
            @livewire ('cms.dashboard.webpage-display-webpage-content-create', [ 'webpage' => $webpage, ])
          @else
            <div class="" style="">
              @foreach ($webpage->webpageContents()->orderBy('position', 'ASC')->get() as $webpageContent)
                @livewire ('cms.dashboard.webpage-content-display', ['webpageContent' => $webpageContent,], key(rand()))
              @endforeach
            </div>
          @endif
        </div>
      @endif
    </div>

    {{--
    |
    | Sidebar
    |
    --}}
    <div class="col-md-4 border-left">

      <div class="border">
        @if (true)
        {{-- Basic details --}}
        <div class="border mb-4-rm">
          <div class="table-responsive">
            <table class="table mb-0">
              <tbody>
                <tr class="border-0">
                  <th class="border-0"> Created at </th>
                  <th class="border-0"> {{ $webpage->created_at }} </th>
                </tr>
                <tr>
                  <th class="border-0"> Updated at </th>
                  <th class="border-0"> {{ $webpage->updated_at }} </th>
                </tr>
                <tr>
                  <th class="border-0"> Permalink </th>
                  <th class="border-0"> {{ $webpage->permalink }} </th>
                </tr>
                <tr>
                  <th class="border-0"> Visibility </th>
                  <th class="border-0">
                    @if ($modes['editVisibilityMode'])
                      @livewire ('cms.dashboard.webpage-edit-visibility', ['webpage' => $webpage,])
                    @else
                      <div class="d-flex justify-content-between">
                        <div>
                          @if ($webpage->visibility == null)
                            @if (true)
                            <i class="fas fa-exclamation-circle mr-1"></i>
                            @endif
                            Not set
                          @elseif ($webpage->visibility == 'public')
                            Public
                          @elseif ($webpage->visibility == 'private')
                            Private
                          @else
                            Whoops
                          @endif
                        </div>

                        <div>
                          <button class="btn btn-light border-rm mx-3" wire:click="enterModeSilent('editVisibilityMode')">
                            <i class="fas fa-pencil-alt"></i>
                          </button>
                        </div>
                      </div>
                    @endif
                  </th>
                </tr>
                <tr>
                  <th class="border-0"> Category </th>
                  <th class="border-0">
                    @if ($modes['editWebpageCategoryMode'])
                      @livewire ('cms.dashboard.webpage-edit-webpage-category', ['webpage' => $webpage,])
                    @else
                      <div class="d-flex justify-content-between">
                        <div>
                          @if (count($webpage->webpageCategories) > 0)
                            @foreach ($webpage->webpageCategories as $category)
                              <span class="badge badge-primary mr-3">
                                {{ $category->name }}
                              </span>
                            @endforeach
                          @else
                            None
                          @endif
                        </div>

                        <button class="btn btn-light border-rm mx-3" wire:click="enterModeSilent('editWebpageCategoryMode')">
                          <i class="fas fa-plus-circle"></i>
                        </button>
                      </div>
                    @endif
                  </th>
                </tr>
                <tr>
                  <th class="border-0"> Featured </th>
                  <th class="border-0">
                    <div class="d-flex justify-content-between">
                      <div>
                        @if ($webpage->featured_webpage == 'yes')
                          YES
                        @else
                          NO
                        @endif
                      </div>
                      <div>
                        @if ($webpage->featured_webpage == 'yes')
                          <button class="btn btn-light mx-3" wire:click="makeWebpageFeaturedWebpageUndo">
                            <i class="fas fa-toggle-off"></i>
                          </button>
                        @else
                          <button class="btn btn-light mx-3" wire:click="makeWebpageFeaturedWebpage">
                            <i class="fas fa-toggle-on"></i>
                          </button>
                        @endif
                      </div>
                    </div>
                  </th>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        @endif


        @if (true)
        {{-- Featured Image --}}
        <div class="border">
          <h2 class="h6 font-weight-bold py-3 px-2 bg-light">
            Featured image
            @if (! $modes['editFeaturedImageMode'])
              @if ($webpage->featured_image_path)
                <button class="btn btn-light" wire:click="removeFeaturedImage">
                  Remove
                </button>
              @endif
            @endif
          </h2>

          @if ($modes['editFeaturedImageMode'])
            <div class="p-2">
              @livewire ('cms.dashboard.webpage-edit-featured-image', ['webpage' => $webpage,])
            </div>
          @else
            @if ($webpage->featured_image_path)
              <div>
                <img src="{{ asset('storage/' . $webpage->featured_image_path) }}"
                    class="img-fluid rounded-circle-rm"
                    style=""
                >
              </div>
            @else
              <div class="p-2 form-group">
                  <label for="">Featured Image</label>
                  <input type="file" class="form-control" wire:model="featured_image">
                  @error('featured_image') <span class="text-danger">{{ $message }}</span> @enderror
              </div>

              <div class="p-2 my-2">
                <button class="btn btn-success" wire:click="addFeaturedImage">
                  Save
                </button>
                <button wire:loading class="btn">
                  <span class="spinner-border text-info mr-3" role="status">
                  </span>
                </button>
              </div>
            @endif
          @endif

        </div>
        @endif

        @if ($webpage->is_post != 'yes')
        {{-- Post page part --}}
        <div class="p-2">
          Post page
          <div>
            @if ($modes['editWebpageCategoryPostpageMode'])
              @livewire ('cms.dashboard.webpage-edit-webpage-category-postpage', ['webpage' => $webpage,])
            @else
              <div class="d-flex justify-content-between">
                <div>
                  @if (count($webpage->webpageCategoriesPostpage) > 0)
                    @foreach ($webpage->webpageCategoriesPostpage as $category)
                      <span class="badge badge-primary mr-3">
                        {{ $category->name }}
                      </span>
                    @endforeach
                  @else
                    None
                  @endif
                </div>

                <button class="btn btn-light border-rm mx-3" wire:click="enterModeSilent('editWebpageCategoryPostpageMode')">
                  <i class="fas fa-plus-circle"></i>
                </button>
              </div>
            @endif
          </div>
        </div>

        {{-- Team page part --}}
        <div class="p-2">
          Team page
          <div>
            @if ($modes['editTeamTeampageMode'])
              @livewire ('cms.dashboard.webpage-edit-team-teampage', ['webpage' => $webpage,])
            @else
              <div class="d-flex justify-content-between">
                <div>
                  @if (count($webpage->webpageTeams) > 0)
                    @foreach ($webpage->webpageTeams as $team)
                      <span class="badge badge-primary mr-3">
                        {{ $team->name }}
                      </span>
                    @endforeach
                  @else
                    None
                  @endif
                </div>

                <button class="btn btn-light border-rm mx-3" wire:click="enterModeSilent('editTeamTeampageMode')">
                  <i class="fas fa-plus-circle"></i>
                </button>
              </div>
            @endif
          </div>
        </div>
        @endif

      </div>

    </div>
  </div>

</div>
