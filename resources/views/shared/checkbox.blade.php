@php
  $name ?? '';
  $label ?? '';
@endphp

<div class="form-check form-switch">
    <input  type="hidden" name="{{$name}}" value="0">
    <input  type="checkbox"  @checked(old($name, $value ?? false)) class = "form-check-input @error($name) is-invalid @enderror" $name="{{$name}}" id="{{$name}}" value="1" role="switch">
    <label class="form-check-label" for="{{$name}}">{{ $label }}</label>

    @error($name)
    <p class="invalid-feedback">
        {{ $message }}
    </p>
    @enderror

</div>
