@extends('layouts.admin')
@section('title', 'The list of descriptions of experiences')

@section('content')

    {{-- Header --}}
    <x-admin.header pageName="Experience description">
        <x-slot name="table">
            <x-table :table="$experienceDescriptionTable" />
        </x-slot>
    </x-admin.header>

    {{-- Insert Modal --}}
    <x-admin.insert size="modal-l" formId="experienceDescriptionForm">
        <x-slot name="content">
            <div class="row">
                {{-- Description textarea --}}
                <x-textarea key="description" placeholder="Description" rows="7" class="col-md-12 mb-2" />

                {{-- Experience selectBox --}}
                <x-admin.selectBox colSize="12" name="Experience" key="experience">
                    <x-slot name="content">
                        @foreach ($experiences as $experience)
                            <option value="{{ $experience->id }}">{{ $experience->headline }}</option>
                        @endforeach
                    </x-slot>
                </x-admin.selectBox>
            </div>
        </x-slot>
    </x-admin.insert>

    {{-- Delete Modal --}}
    <x-admin.delete title="experience's description" />

@endsection

{{-- Scripts --}}
@section('scripts')

    @parent
    {{-- Experience description Table --}}
    {!! $experienceDescriptionTable->scripts() !!}

    <script>
        $(document).ready(function() {

            // Admin DataTable And Action Object
            let dt = window.LaravelDataTables['experienceDescriptionTable'];
            let action = new RequestHandler(dt, '#experienceDescriptionForm', 'experienceDescription');

            // Record modal
            $('#create_record').click(function() {
                action.openModal();
                action.cleanDropbox('#experience');
            });

            // Insert
            action.insert();

            // Delete
            window.showConfirmationModal = function showConfirmationModal(url) {
                action.delete(url);
            }

            // Edit
            window.showEditModal = function showEditModal(id) {
                edit(id);
            }

            function edit($id) {

                // action.cleanDropbox('#experience');
                action.reloadModal();

                $.ajax({
                    url: "{{ url('experienceDescription/edit') }}",
                    method: "get",
                    data: {
                        id: $id
                    },
                    success: function(data) {
                        action.editOnSuccess($id);
                        $('#description').val(data.explanation);
                        $('select[name="experience"]').val(data.explainable_id).trigger('change');
                    }
                })
            }
        });
    </script>

@endsection
