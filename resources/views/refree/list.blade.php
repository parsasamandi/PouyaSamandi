@extends('layouts.admin')
@section('title', 'Experience List')

@section('content')

    {{-- Header --}}
    <x-admin.header pageName="Refree">
        <x-slot name="table">
            <x-table :table="$refreeTable" />
        </x-slot>
    </x-admin.header>

    {{-- Insert Modal --}}
    <x-admin.insert size="modal-xl" formId="refreeForm">
        <x-slot name="content">

            <div class="row">
                
                {{-- Name --}}
                <x-input key="name" name="Name" class="col-md-6 mb-3" />

                {{-- Image --}}
                <div class="col-md-6">
                    <input id="image" name="image" type="file">
                </div>
            </div>

        </x-slot>
    </x-admin.insert>

    {{-- Delete Modal --}}
    <x-admin.delete title="refree" />

@endsection

{{-- Scripts --}}
@section('scripts')
    @parent
    {{-- Refree Table --}}
    {!! $refreeTable->scripts() !!}

    <script>
        $(document).ready(function() {
            
            // Refree DataTable And Action Object
            let dt = window.LaravelDataTables['skillTable'];
            let action = new RequestHandler(dt, '#skillForm', 'skill');

            // Record modal
            $('#create_record').click(function() {
                action.cleanDropbox('#descriptions');
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
                // // Clean dropbox
                action.cleanDropbox('#descriptions');
                
                $.ajax({
                    url: "{{ url('refree/edit') }}",
                    method: "get",
                    data: {
                        id: $id
                    },
                    success: function(data) {
                        action.editOnSuccess($id);
                        $('#title').val(data.title);
                        $('select[name="#descriptions"]').val(data.explanation.explanation).trigger('change');
                    }
                })
            }
        });
    </script>
@endsection
