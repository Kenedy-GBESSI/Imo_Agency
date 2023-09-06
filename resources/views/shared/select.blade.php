@php
  $name ??= null;
  $label ??= null;
  $value ??=null;
@endphp

<div class="form-group">
    <label for="{{$name}}">{{ $label }}</label>

    <select name="{{$name}}[]" id="{{$name}}" class="form-control @error($name) is-invalid @enderror" multiple>
        @foreach ($options as $id => $name )
           <option @selected($value->contains($id)) value="{{ $id }}">{{$name}}</option>
        @endforeach
    </select>

    @error($name)
    <p class="invalid-feedback">
        {{ $message }}
    </p>
    @enderror
</div>


