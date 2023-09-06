@php
  $name ??= null;
  $label ??= null;
  $type ??= 'text';
  $value ??= null;
  $placeholder ??=null
@endphp

<div class="form-group">

    <label for="{{$name}}">{{ $label }}</label>
    <input  type="file" multiple  class = "form-control @error($name) is-invalid @enderror" name="{{$name}}[]" id="{{$name}}" placeholder="{{$placeholder}}" value="{{old($name,$value)}}">

    @error($name)
    <p class="invalid-feedback">
        {{ $message }}
    </p>
    @enderror
</div>



