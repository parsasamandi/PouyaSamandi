@extends('layouts.admin')
@section('title', 'Skill list')

@section('content')
    {{-- Header --}}
    <x-admin.header pageName="Skill" secondButton="Description">
        <x-slot name="table">
            <x-table :table="$skillTable" />
        </x-slot>
    </x-admin.header>

    {{-- Insert Modal --}}
    <x-admin.insert size="modal-l" formId="skillForm">
        <x-slot name="content">
            <div class="row">
                {{-- Title --}}
                <div class="col-md-12">
                    <label for="title">Title:</label>
                    <input id="title" name="title" Placeholder="Title" type="text" class="form-control mb-3">

                    <label for="title">Description:</label>
                    <select id="descriptions" name='descriptions[]' class="custom-select" multiple>
                        @foreach ($descriptions as $description)
                            <option value="{{ $description->description }}">{{ $description->description }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </x-slot>
    </x-admin.insert>

    {{-- Delete Modal --}}
    <x-admin.delete title="skill" />

    {{-- Skill description modal --}}
    <x-admin.insert modalId="skillDescriptionModal" size="modal-l" formId="skillDescriptionForm">
        <x-slot name="content">
            <div class="row">
                {{-- Textarea --}}
                <div class="col-md-12">
                    <textarea rows="7" type="text" id="description" name="description" placeholder="Description"
                            class="form-control mt-1"></textarea>
                </div>
            </div>
        </x-slot>
    </x-admin.insert>


@endsection

{{-- Scripts --}}
@section('scripts')
    @parent
    {{-- Skill Table --}}
    {!! $skillTable->scripts() !!}

    <script>
        $(document).ready(function() {
            
            // Admin DataTable And Action Object
            let dt = window.LaravelDataTables['skillTable'];
            let action = new RequestHandler(dt, '#skillForm', 'skill');


            let action2 = new RequestHandler(dt, '#skillDescriptionForm', 'skillDescriptionModal');


            // Record modal
            $('#create_record').click(function() {
                action.cleanDropbox('#descriptions');
                action.openModal();
            });


            // Second button
            $('#second_button').click(function() {
                action2.openModal('#skillDescriptionModal');
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
                action.cleanDropbox('#descriptions');

                action.reloadModal();

                $.ajax({
                    url: "{{ url('skill/edit') }}",
                    method: "get",
                    data: {
                        id: $id
                    },
                    success: function(data) {

                        action.editOnSuccess($id);

                        values = '';
                        for(var all of data.descriptions) {
                            values += all.description + ' ';
                        };

                        $.each(values.split(" "), function(i,e){
                            $("#descriptions option[value='" + e + "']").prop("selected", true);
                        });

                        $('#title').val(data.title);
                    }
                })
            }
        });
    </script>
@endsection
