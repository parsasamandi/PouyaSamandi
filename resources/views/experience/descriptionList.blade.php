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
                {{-- Description --}}
                <x-textarea key="description" placeholder="Description" rows="7" class="col-md-12" />
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
                    }
                })
            }
        });
    </script>

@endsection
