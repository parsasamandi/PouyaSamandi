@extends('layouts.admin')
@section('title', 'The list of refrees')

@section('content')

    {{-- Header --}}
    <x-admin.header pageName="Refree">
        <x-slot name="table">
            <x-table :table="$refreeTable" />
        </x-slot>
    </x-admin.header>

    {{-- Insert Modal --}}
    <x-admin.insert size="modal-l" formId="refreeForm">
        <x-slot name="content">
            <div class="row">
                {{-- Name --}}
                <x-input key="name" name="Name" class="col-md-12 mb-3" />
                {{-- Image link --}}
                <x-input type="file" key="image" name="Image" class="col-md-12 mb-3" />
                {{-- Link info --}}
                <x-input key="link" name="Information link" class="col-md-12 mb-3" />
                {{-- Description --}}
                @include('includes.description', ['name' => 'descriptions'])
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
            let dt = window.LaravelDataTables['refreeTable'];
            let action = new RequestHandler(dt, '#refreeForm', 'refree');

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
                // Clean dropbox
                action.cleanDropbox('#descriptions');
                
                $.ajax({
                    url: "{{ url('refree/edit') }}",
                    method: "get",
                    data: {
                        id: $id
                    },
                    success: function(data) {
                        action.editOnSuccess($id);
                        $('#name').val(data.name);
                        // console.log(data.explanations.explainable_id);
                        $('select[name="descriptions"]').val(data.explanations.explanation).trigger('change');
                    }
                })
            }
        });
    </script>
@endsection
