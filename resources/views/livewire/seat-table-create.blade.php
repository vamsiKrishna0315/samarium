<div class="card shadow-sm">
  <div class="card-body p-3">

    <h1 class="text-white-rm" style="font-size: 1.3rem;">
      Add seat table
    </h1>

    <div class="form-group">
      <label for="">Name</label>
      <input type="text"
          class="form-control"
          wire:model.defer="name"
          style="font-size: 1.3rem;">
      @error ('name') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    @if (false)
    <div class="form-group">
      <label for="">
        Image
        <span class="text-muted ml-1" style="font-size: 0.7rem">
        (Optional)
        </span>
      </label>
      <input type="file" class="form-control" wire:model="image">
      @error('image') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    @endif

    <div class="py-3 m-0" {{--style="background-image: linear-gradient(to right, white, #abc);"--}}>

      @include ('partials.button-store')
      @include ('partials.button-cancel', ['clickEmitEventName' => 'seatTableCreateCancelled',])

      <button wire:loading class="btn">
        <span class="spinner-border text-info mr-3" role="status">
        </span>
      </button>
    </div>
  </div>
</div>
