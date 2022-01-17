<div class="container-fluid mt-3">
    {{-- Page Name --}}
    <h1 class="mt-4">{{ $pageName }}</h1>

    {{-- Breadcrumb --}}
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ url('adminHome') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">{{ $pageName }} List</li>
    </ol>

    {{-- Button --}}
    <button type="button" id="create_record"
        class="btn primary_color btn-sm mb-2">Add {{ $pageName }}</button>

    {{-- Second Button --}}
    @if(!empty($secondButton))
        <button type="button" id="skill_description"
            class="btn primary_color btn-sm mb-2">Add {{ $secondButton }}</button>
    @endif

    {{-- Responsive Table --}}
    <div class="table-responsive">
        {{ $table }}
    </div>
</div>
