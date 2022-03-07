@extends('layouts.admin')
@section('title', "The list of descriptions of skills")

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
                {{-- Textarea --}}
                <x-textarea key="description" placeholder="Description" rows="7" class="col-md-12" />

                {{-- Skill selectBox --}}
                <x-admin.selectBox colSize="12" name="Skill" key="skill">
                    <x-slot name="content">
                        @foreach ($skills as $skill)
                            <option value="{{ $skill->id }}">{{ $skill->title }}</option>
                        @endforeach
                    </x-slot>
                </x-admin.selectBox>
            </div>
        </x-slot>
    </x-admin.insert>

    {{-- Delete Modal --}}
    <x-admin.delete title="skill's description" />

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
                    }
                })
            }
        });
    </script>

@endsection
