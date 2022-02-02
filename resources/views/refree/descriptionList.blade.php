@extends('layouts.admin')
@section('title', 'the list of descriptions of refres')

@section('content')

    {{-- Header --}}
    <x-admin.header pageName="Refree description">
        <x-slot name="table">
            <x-table :table="$refreeDescriptionTable" />
        </x-slot>
    </x-admin.header>

    {{-- Insert Modal --}}
    <x-admin.insert size="modal-l" formId="refreeDescriptionForm">
        <x-slot name="content">
            <div class="row">
                <div class="col-md-12">
                    {{-- Description --}}
                    <label for="Description">Description:</label>
                    <textarea rows="7" type="text" id="description" name="description" placeholder="Description"
                                class="form-control mt-1"></textarea>
                </div>
            </div>
        </x-slot>
    </x-admin.insert>

    {{-- Delete Modal --}}
    <x-admin.delete title="refree's description" />

@endsection

{{-- Scripts --}}
@section('scripts')

    @parent
    {{-- Refree Table --}}
    {!! $refreeDescriptionTable->scripts() !!}

    <script>
        $(document).ready(function() {
            
            // Admin DataTable And Action Object
            let dt = window.LaravelDataTables['refreeDescriptionTable'];
            let action = new RequestHandler(dt, '#refreeDescriptionForm', 'refreeDescription');

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

                // Clean dropbox
                // action.cleanDropbox('#descriptions');

                action.reloadModal();
                
                $.ajax({
                    url: "{{ url('refreeDescription/edit') }}",
                    method: "get",
                    data: {
                        id: $id
                    },
                    success: function(data) {
                        action.editOnSuccess($id);
                        $('#description').val(data.explanation);
                        $('select[name="description"]').val(data.course_id).trigger('change');
                    }
                })
            }
        });
    </script>

@endsection

