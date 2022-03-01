@extends('layouts.admin')
@section('title', "The list of experiences")

@section('content')

    {{-- Header --}}
    <x-admin.header pageName="Experience">
        <x-slot name="table">
            <x-table :table="$experienceTable" />
        </x-slot>
    </x-admin.header>

    {{-- Insert Modal --}}
    <x-admin.insert size="modal-l" formId="experienceForm">
        <x-slot name="content">
            <div class="row">
                {{-- Title --}}
                <x-input key="headline" name="Headline" class="col-md-12 mb-2" />

                @include('includes.description', ['multiple' => 'multiple'])
            </div>
        </x-slot>
    </x-admin.insert>

    {{-- Delete Modal --}}
    <x-admin.delete title="experience" />


@endsection

{{-- Scripts --}}
@section('scripts')

    @parent
    {{-- Experience Table --}}
    {!! $experienceTable->scripts() !!}

    <script>
        $(document).ready(function() {
            
            // Admin DataTable And Action Object
            let dt = window.LaravelDataTables['experienceTable'];
            let action = new RequestHandler(dt, '#experienceForm', 'experience');

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
                    url: "{{ url('experience/edit') }}",
                    method: "get",
                    data: {
                        id: $id
                    },
                    success: function(data) {
                        action.editOnSuccess($id);
                        $('#headline').val(data.headline);
                        $('select[name="descriptions[]"]').val(data.explanations.explanation).trigger('change');
                    }
                })
            }
        });
    </script>

@endsection
