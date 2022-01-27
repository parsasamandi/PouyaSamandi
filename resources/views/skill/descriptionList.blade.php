@extends('layouts.admin')
@section('title', 'Skill description list')

@section('content')

    {{-- Header --}}
    <x-admin.header pageName="Skill description">
        <x-slot name="table">
            <x-table :table="$skillDescriptionTable" />
        </x-slot>
    </x-admin.header>

    {{-- Insert Modal --}}
    <x-admin.insert size="modal-l" formId="skillDescriptionForm">
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
    <x-admin.delete title="skill" />

@endsection

{{-- Scripts --}}
@section('scripts')

    @parent
    {{-- Skill Table --}}
    {!! $skillDescriptionTable->scripts() !!}

    <script>
        $(document).ready(function() {
            
            // Admin DataTable And Action Object
            let dt = window.LaravelDataTables['skillDescriptionTable'];
            let action = new RequestHandler(dt, '#skillDescriptionForm', 'skillDescription');

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
                    url: "{{ url('skillDescription/edit') }}",
                    method: "get",
                    data: {
                        id: $id
                    },
                    success: function(data) {
                        action.editOnSuccess($id);
                        $('#description').val(data.explanation);
                        $('select[name="description"]').val(data.course_id).trigger('change');

                        // values = '';
                        // for(var all of data.descriptions) {
                        //     values += all.description + ' ';
                        // };
                        // $.each(values.split(" "), function(i,e){
                        //     $("#descriptions option[value='" + e + "']").prop("selected", true);
                        // });
                    }
                })
            }
        });
    </script>

@endsection
