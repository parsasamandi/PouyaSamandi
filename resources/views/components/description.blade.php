<div class="{{ $class ?? 'col-md-12' }}">

    <label for="descriptions">Description:</label>
    <select id="descriptions" name="descriptions[]" class="custom-select" multiple>
        @foreach ($descriptions as $description)
            <option value="{{ $description->explanation }}">{{ $description->explanation }}</option>
        @endforeach
    </select>

</div>
