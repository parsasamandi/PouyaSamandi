@extends('layouts.admin')
@section('title', "The list of skills")

@section('content')

    {{-- Header --}}
    <x-admin.header pageName="Skill">
        <x-slot name="table">
            <x-table :table="$skillTable" />
        </x-slot>
    </x-admin.header>

    {{-- Insert Modal --}}
    <x-admin.insert size="modal-l" formId="skillForm">
        <x-slot name="content">
            <div class="row">
                {{-- Title --}}
                <x-input key="title" name="Title" class="col-md-12 mb-2" />

                @include('includes.description', ['multiple' => 'multipe'])
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
    {!! $skillTable->scripts() !!}

    <script>
        $(document).ready(function() {
            
            // Admin DataTable And Action Object
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
                // Clean dropbox
                action.cleanDropbox('#descriptions');
                
                $.ajax({
                    url: "{{ url('skill/edit') }}",
                    method: "get",
                    data: {
                        id: $id
                    },
                    success: function(data) {
                        action.editOnSuccess($id);
                        $('#title').val(data.title);
                        console.log($('select[name="descriptions[]"]').val());
                        $('select[name="descriptions[]"]').val(data.explanations.explanation).trigger('change');

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
