@extends('layouts.admin')
@section('title', 'Skill List')

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
                    <select id='descriptions' name='descriptions' class="custom-select" multiple>
                        @foreach ($descriptions as $description)
                            <option value="{{ $description->description }}">{{ $description->description }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </x-slot>
    </x-admin.insert>

    {{-- Delete Modal --}}
    <x-admin.delete title="Do you confirm to delete this skill?" />

    <!-- Skill description modal -->
    <div id="skillDescriptionModal" class="modal fade bd-example-modal">
        <div class="modal-dialog modal-l">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form id="skillDescriptionForm" class="form-horizontal" enctype="multipart/form-data">
                        <span id="form_output2"></span>
                        {{ csrf_field() }}

                        <textarea rows="7" type="text" id="description" name="description" placeholder="Description"
                            class="form-control mt-1"></textarea>

                        <br />
                        <div class="form-group" align="center">
                            {{-- <input type="hidden" name="id" id="id" value="" /> --}}
                            {{-- <input type="hidden" id="button_action2" value="insert" /> --}}
                            <input type="submit" name="submit" id="action2" value="Insert" class="btn btn-primary" />
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
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
                    url: "{{ url('skill/edit') }}",
                    method: "get",
                    data: {
                        id: $id
                    },
                    success: function(data) {

                        action.editOnSuccess($id);

                        show = '';
                        for(var all of data.descriptions) {
                            show += all.description + ' ';
                        };

                        $.each(show.split(" "), function(i,e){
                            $("#descriptions option[value='" + e + "']").prop("selected", true);
                        });

                        $('#descriptions').val('').trigger('change');

                        $('#title').val(data.title);
                    }
                })
            }
        });
    </script>
@endsection
