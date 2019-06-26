@php
    $edit = !is_null($dataTypeContent->getKey());
    $add  = is_null($dataTypeContent->getKey());
@endphp

@extends('voyager::master')

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('page_title', __('voyager::generic.'.($edit ? 'edit' : 'add')).' '.$dataType->display_name_singular)

@section('page_header')
    <h1 class="page-title">
        <i class="{{ $dataType->icon }}"></i>
        {{ __('voyager::generic.'.($edit ? 'edit' : 'add')).' '.$dataType->display_name_singular }}
    </h1>
    @include('voyager::multilingual.language-selector')
@stop

@section('content')

    <div class="page-content edit-add container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="panel panel-bordered">
                    <!-- form start -->
                    <form role="form"
                            class="form-edit-add"
                            action="{{ $edit ? route('voyager.'.$dataType->slug.'.update', $dataTypeContent->getKey()) : route('voyager.'.$dataType->slug.'.store') }}"
                            method="POST" enctype="multipart/form-data">
                        <!-- PUT Method if we are editing -->
                        @if($edit)
                            {{ method_field("PUT") }}
                        @endif

                        <!-- CSRF TOKEN -->
                        {{ csrf_field() }}

                        <div class="panel-body">

                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <!-- Adding / Editing -->
                            @php
                                $dataTypeRows = $dataType->{($edit ? 'editRows' : 'addRows' )};
                            @endphp

                            @foreach($dataTypeRows as $row)
                                <!-- GET THE DISPLAY OPTIONS -->
                                @php
                                    $display_options = $row->details->display ?? NULL;
                                    if ($dataTypeContent->{$row->field.'_'.($edit ? 'edit' : 'add')}) {
                                        $dataTypeContent->{$row->field} = $dataTypeContent->{$row->field.'_'.($edit ? 'edit' : 'add')};
                                    }
                                @endphp
                                @if (isset($row->details->legend) && isset($row->details->legend->text))
                                    <legend class="text-{{ $row->details->legend->align ?? 'center' }}" style="background-color: {{ $row->details->legend->bgcolor ?? '#f0f0f0' }};padding: 5px;">{{ $row->details->legend->text }}</legend>
                                @endif

                                <div class="form-group @if($row->type == 'hidden') hidden @endif col-md-{{ $display_options->width ?? 12 }} {{ $errors->has($row->field) ? 'has-error' : '' }}" @if(isset($display_options->id)){{ "id=$display_options->id" }}@endif>
                                    {{ $row->slugify }}
                                    <label class="control-label" for="name">{{ $row->display_name }}</label>
                                    @include('voyager::multilingual.input-hidden-bread-edit-add')
                                    @if (isset($row->details->view))
                                        @include($row->details->view, ['row' => $row, 'dataType' => $dataType, 'dataTypeContent' => $dataTypeContent, 'content' => $dataTypeContent->{$row->field}, 'action' => ($edit ? 'edit' : 'add')])
                                    @elseif ($row->type == 'relationship')
                                        @include('voyager::formfields.relationship', ['options' => $row->details])
                                    @else
                                        {!! app('voyager')->formField($row, $dataType, $dataTypeContent) !!}
                                    @endif

                                    @foreach (app('voyager')->afterFormFields($row, $dataType, $dataTypeContent) as $after)
                                        {!! $after->handle($row, $dataType, $dataTypeContent) !!}
                                    @endforeach
                                    @if ($errors->has($row->field))
                                        @foreach ($errors->get($row->field) as $error)
                                            <span class="help-block">{{ $error }}</span>
                                        @endforeach
                                    @endif
                                </div>
                            @endforeach

                            <div class="form-group col-md-12" style="margin-top:20px;">
                                <h4>Sessions</h4>
                                <label class="control-label" for="session_name">Session Name</label>
                                <input type="text" class="form-control" name="session_name" id="session_name" placeholder="Session Name" value="">
                            </div>

                            <div class="form-group col-md-6">
                                {{-- Start Time --}}
                                <label class="control-label" for="start_time">Start Time</label>
                                <input type="time" name="start_time" id="start_time" class="form-control">
                            </div>

                            <div class="form-group col-md-6">
                                {{-- End Time --}}
                                <label class="control-label" for="end_time">End Time</label>
                                <input type="time" name="end_time" id="end_time" class="form-control">
                            </div>

                            <div class="form-group col-md-6">
                                <button type="button" class="btn btn-primary save" id="add_session_btn">Add Session</button>
                            </div>

                            <div class="form-group col-md-12">
                                <label class="control-label" for="added_sessions">Added Sessions</label>
                                <table class="table" id="added_sessions" name="added_sessions">
                                    <tr>
                                        <th>Name</th>
                                        <th>Start Time</th>
                                        <th>End Time</th>
                                        <th>Delete</th>
                                    </tr>
                                    {{-- Added sessions come here --}}
                                </table>
                            </div>

                        </div><!-- panel-body -->

                        <div class="panel-footer">
                            @section('submit-buttons')
                                <button type="submit" class="btn btn-primary save">{{ __('voyager::generic.save') }}</button>
                            @stop
                            @yield('submit-buttons')
                        </div>
                    </form>

                    <iframe id="form_target" name="form_target" style="display:none"></iframe>
                    <form id="my_form" action="{{ route('voyager.upload') }}" target="form_target" method="post"
                            enctype="multipart/form-data" style="width:0;height:0;overflow:hidden">
                        <input name="image" id="upload_file" type="file"
                                 onchange="$('#my_form').submit();this.value='';">
                        <input type="hidden" name="type_slug" id="type_slug" value="{{ $dataType->slug }}">
                        {{ csrf_field() }}
                    </form>

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade modal-danger" id="confirm_delete_modal">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true">&times;</button>
                    <h4 class="modal-title"><i class="voyager-warning"></i> {{ __('voyager::generic.are_you_sure') }}</h4>
                </div>

                <div class="modal-body">
                    <h4>{{ __('voyager::generic.are_you_sure_delete') }} '<span class="confirm_delete_name"></span>'</h4>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">{{ __('voyager::generic.cancel') }}</button>
                    <button type="button" class="btn btn-danger" id="confirm_delete">{{ __('voyager::generic.delete_confirm') }}</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Delete File Modal -->
@stop

@section('javascript')
    <script type="text/javascript">
        var params = {};
        var $file;

        function deleteHandler(tag, isMulti) {
          return function() {
            $file = $(this).siblings(tag);

            params = {
                slug:   '{{ $dataType->slug }}',
                filename:  $file.data('file-name'),
                id:     $file.data('id'),
                field:  $file.parent().data('field-name'),
                multi: isMulti,
                _token: '{{ csrf_token() }}'
            }

            $('.confirm_delete_name').text(params.filename);
            $('#confirm_delete_modal').modal('show');
          };
        }


        // -- Custom Code

        // Hide generated sessions field
        $("input[name='sessions']").parent().hide();
        $("input[name='sessions']").attr('id', 'sessions');

        // Get session details
        var session_input = $('#sessions').val();
        var session_rows = session_input.split(',');
        var session_details = [];
        var session_id = 0;


        for(var a=0; a < (session_rows.length - 1); a++)
        {
            var session_fields = session_rows[a].split(';');

            $('#added_sessions').append(
                '<tr id="session_id_' + session_fields[0] + '"><td>' + session_fields[1] + '</td><td>' + session_fields[2] + '</td><td>' + session_fields[3] + '</td><td><button type="button" class="btn btn-danger" onclick="DeleteSession(' + session_fields[0] + ')">Delete</button></td></tr>'
            );

            session_id = parseInt(session_fields[0], 10);
        }

        // Show hide date
        $("select[name='recurrence']").change(function()
        {
            switch($("select[name='recurrence']").val()) {
                case "":
                case "monday":
                case "tuesday":
                case "wednesday":
                case "thursday":
                case "friday":
                case "saturday":
                case "sunday":
                case "day":
                    $("input[name='event_date']").parent().attr("style", "display:none");
                    break;
                case "month":
                case "year":
                case "once":
                    $("input[name='event_date']").parent().attr("style", "display:block");
                    break;
            }
        });

        // Add Session Details
        $('#add_session_btn').click(function()
        {
            session_id = session_id + 1;

            var session_name = $('#session_name').val();
            var start_time = $('#start_time').val();
            var end_time = $('#end_time').val();

            session_input = session_input + session_id + ';' + session_name + ';' + start_time + ';' + end_time + ',';

            $('#added_sessions').append('<tr id="session_id_' + session_id + '"><td>' + session_name + '</td><td>' + start_time + '</td><td>' + end_time +'</td><td><button type="button" class="btn btn-danger" onclick="DeleteSession(' + session_id + ')">Delete</button></td></tr>');

            // Resetting input fields
            $("#session_name").val('');
            $("#start_time").val('');
            $("#end_time").val('');

            $("#session_name").focus();

            $('#sessions').attr('value', session_input);
        });

        // Delete Session Function
        function DeleteSession(del_session_id)
        {
            session_input = $('#sessions').val();
            session_rows = session_input.split(',');
            session_details = [];
            session_input = "";

            for(var a=0; a < (session_rows.length - 1); a++)
            {
                var session_fields = session_rows[a].split(';');

                if(session_fields[0] != del_session_id)
                {
                    session_input = session_input + session_rows[a] + ',';
                }
            }

            $('#sessions').attr('value', session_input);

            var del_session_row = 'tr#session_id_' + del_session_id;

            $(del_session_row).remove();
        }

        // -- Custom Code

        $('document').ready(function () {
            // Voyager Code
            $('.toggleswitch').bootstrapToggle();

            //Init datepicker for date fields if data-datepicker attribute defined
            //or if browser does not handle date inputs
            $('.form-group input[type=date]').each(function (idx, elt) {
                if (elt.type != 'date' || elt.hasAttribute('data-datepicker')) {
                    elt.type = 'text';
                    $(elt).datetimepicker($(elt).data('datepicker'));
                }
            });

            @if ($isModelTranslatable)
                $('.side-body').multilingual({"editing": true});
            @endif

            $('.side-body input[data-slug-origin]').each(function(i, el) {
                $(el).slugify();
            });

            $('.form-group').on('click', '.remove-multi-image', deleteHandler('img', true));
            $('.form-group').on('click', '.remove-single-image', deleteHandler('img', false));
            $('.form-group').on('click', '.remove-multi-file', deleteHandler('a', true));
            $('.form-group').on('click', '.remove-single-file', deleteHandler('a', false));

            $('#confirm_delete').on('click', function(){
                $.post('{{ route('voyager.media.remove') }}', params, function (response) {
                    if ( response
                        && response.data
                        && response.data.status
                        && response.data.status == 200 ) {

                        toastr.success(response.data.message);
                        $file.parent().fadeOut(300, function() { $(this).remove(); })
                    } else {
                        toastr.error("Error removing file.");
                    }
                });

                $('#confirm_delete_modal').modal('hide');
            });
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
@stop
