@props(['name'])

<div class="form-floating mb-3">
    <textarea name="{{ $name }}" class="form-control" id="{{ $name }}">

    {{ $slot ?? old($name) }}

    </textarea>
    
    <label for="{{ $name }}">{{ ucwords($name) }}</label>

    @error($name)
    <span class="small text-danger">{{ $message }}</span>
    @enderror
</div>