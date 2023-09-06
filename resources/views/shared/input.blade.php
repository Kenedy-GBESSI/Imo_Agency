@php
  $name ??= null;
  $label ??= null;
  $type ??= 'text';
  $value ??= null;
  $placeholder ??=null
@endphp

@if ($type !== 'textarea')
<div class="form-group">

    <label for="{{$name}}">{{ $label }}</label>

    <input @if ($type === 'number') min="0" @endif type="{{$type}}"  class = "form-control @error($name) is-invalid @enderror" name="{{$name}}" id="{{$name}}" value="{{ old($name,$value)}}" placeholder="{{$placeholder}}">

    @error($name)
    <p class="invalid-feedback">
        {{ $message }}
    </p>
    @enderror
</div>
@else
<div class="form-group">
    <label for="{{$name}}">{{ $label }}</label>

    <textarea type="{{$type}}"  class = "form-control @error($name) is-invalid @enderror" name="{{$name}}" id="{{$name}}">{{ old($name,$value)}}</textarea>

    @error($name)
    <p class="invalid-feedback">
        {{ $message }}
    </p>
    @enderror
</div>
@endif


