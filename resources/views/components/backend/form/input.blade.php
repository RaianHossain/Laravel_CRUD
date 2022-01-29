@props(['name'])

<div class="form-floating mb-3">
    
    <input name="{{ $name }}" class="form-control" id="{{ $name }}" {{ $attributes }}>

    <label for="{{ $name }}">{{ ucwords($name) }}</label>

    @error($name)
    <span class="small text-danger">{{ $message }}</span>
    @enderror
</div>