{{-- Description --}}
<div class="{{ $class ?? 'col-md-12' }}">

    <label for="descriptions">Description:</label>

    <select id="descriptions" name="{{ $name ?? 'descriptions[]' }}" class="custom-select" {{ $multiple ?? null }}>
        @foreach ($descriptions as $description)
            <option value="{{ $description->explanation }}">{{ $description->explanation }}</option>
        @endforeach
    </select>

</div>
