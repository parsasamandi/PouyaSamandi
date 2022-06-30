{{-- Select Box --}}
<div class="col-md-{{ $colSize }}">
    <label for="{{ $key }}">{{ $name }}:</label>
    <select id="{{ $key }}" name="{{ $key }}" class="custom-select">
        {{ $content }}
    </select>
</div>