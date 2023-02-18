<div class="card h-100 shadow-sm border-0">

  <div class="d-flex flex-column justify-content-between h-100 bg-success-rm">
    <div class="d-flex justify-content-center flex-grow-1 bg-warning-rm">
      @if (true)
      <div class="d-flex flex-column justify-content-center h-100">
        @if ($person->image_path)
          <img class="img-fluid h-25-rm w-100-rm" src="{{ asset('storage/' . $person->image_path) }}" alt="{{ $person->name }}" style="max-height: 150px; {{--max-width: 100px;--}}">
        @else
          <div class="py-3">
            <i class="fas fa-user fa-3x text-secondary"></i>
          </div>
        @endif
      </div>
      @endif
    </div>

    <div class="d-flex flex-column justify-content-between overflow-auto" style="background-color: #f5f5f5;">
      <div class="p-2">
        <h2 class="h5 mt-2 mb-2" style="color: #004; font-family: Arial;">
          {{ $person->name }}
        </h2>

        <div class="my-2">
          <div class="h5 mb-2 text-primary">
            @if ($person->comment)
              {{ $person->comment }}
            @else
              &nbsp;
            @endif
          </div>
          <div class="mb-1 text-secondary">
            <i class="fas fa-phone mr-1"></i>
            @if ($person->phone)
              {{ $person->phone }}
            @else
              <span class="text-muted">
                Not available
              </span>
            @endif
          </div>
          <div class="mb-1 text-secondary">
            <i class="fas fa-envelope mr-1"></i>
            @if ($person->email)
              {{ $person->email }}
            @else
              <span class="text-muted">
                Not available
              </span>
            @endif
          </div>
        </div>

        @if (false)
        <div class="mb-1" style="font-size: 0.7rem;">
          <i class="far fa-star" style="color: orange;"></i>
          <i class="far fa-star" style="color: orange;"></i>
          <i class="far fa-star" style="color: orange;"></i>
          <i class="far fa-star" style="color: orange;"></i>
          <i class="far fa-star" style="color: orange;"></i>
          <span class="mx-1 text-muted">
            (0) reviews
          </span>
        </div>
        @endif
      </div>
    </div>
  </div>

</div>
