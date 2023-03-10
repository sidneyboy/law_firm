@extends('layouts.admin')

@section('main-content')
    @if (session('success'))
        <div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger border-left-danger" role="alert">
            <ul class="pl-4 my-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row">
        <div class="col-md-12" style="margin-bottom: 10px;">
            <div class="card">
                <div class="card-header"><b>Client: {{ ucfirst($case->full_name) }}</b></div>
                <form action="{{ route('case_details_process') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Nature of Hearing</label>
                                    <input type="text" class="form-control" name="nature_of_hearing" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Plea</label>
                                    <input type="text" class="form-control" name="plea" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Date of Hearing</label>
                                    <input name="date_of_hearing" class="form-control" required type="text">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Time of Hearing</label>
                                    <input name="time_of_hearing" class="form-control" required type="text">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Attachments</label>
                                    <input type="file" name="attachments[]" multiple class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <input type="hidden" value="{{ $cases_id }}" name="cases_id">
                        <button style="margin-bottom:10px;" class="btn btn-sm float-right btn-success"
                            type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Case Details</div>
                <div class="card-body">
                    <div class="table table-responsive">
                        <table class="table table-bordered table-sm table-hover">
                            <thead>
                                <tr class="table-info">
                                    <th>Date of Hearing</th>
                                    <th>Time</th>
                                    <th>Nature of Hearing</th>
                                    <th>Plea</th>
                                    <th>Attachments</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($case_details as $details)
                                    <tr>
                                        <td>
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn" data-toggle="modal"
                                                data-target="#exampleModaldate_of_hearing{{ $details->id }}">
                                                {{-- {{ date('F j, Y', strtotime($details->date_of_hearing)) }} --}}
                                                {{ $details->date_of_hearing }}
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModaldate_of_hearing{{ $details->id }}"
                                                tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Date of Hearing</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="{{ route('hearing_date_edit') }}" method="post">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <input type="text" value="{{ $details->date_of_hearing }}" class="form-control" required
                                                                    name="date_of_hearing">
                                                                <input type="hidden" name="id"
                                                                    value="{{ $details->id }}">

                                                                <input type="hidden" name="case_id"
                                                                    value="{{ $details->cases_id }}">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-sm btn-secondary"
                                                                    data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-sm btn-primary">Save
                                                                    changes</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn" data-toggle="modal"
                                                data-target="#exampleModaltime_of_hearing{{ $details->id }}">
                                                {{-- {{ date('h:i a', strtotime($details->time_of_hearing)) }} --}}
                                                {{ $details->time_of_hearing }}
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModaltime_of_hearing{{ $details->id }}"
                                                tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Time of Hearing
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="{{ route('time_of_hearing_edit') }}"
                                                            method="post">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <input type="text" value="{{ $details->time_of_hearing }}" class="form-control" required
                                                                    name="time_of_hearing">
                                                                <input type="hidden" name="id"
                                                                    value="{{ $details->id }}">

                                                                <input type="hidden" name="case_id"
                                                                    value="{{ $details->cases_id }}">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-sm btn-secondary"
                                                                    data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-sm btn-primary">Save
                                                                    changes</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn" data-toggle="modal"
                                                data-target="#exampleModalnature_of_hearing{{ $details->id }}">
                                                {{ $details->nature_of_hearing }}
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModalnature_of_hearing{{ $details->id }}"
                                                tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Nature of
                                                                Hearing
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="{{ route('nature_of_hearing_edit') }}"
                                                            method="post">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <input type="text" value="{{ $details->plea }}" class="form-control" required
                                                                    name="nature_of_hearing">
                                                                <input type="hidden" name="id"
                                                                    value="{{ $details->id }}">

                                                                <input type="hidden" name="case_id"
                                                                    value="{{ $details->cases_id }}">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-sm btn-secondary"
                                                                    data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-sm btn-primary">Save
                                                                    changes</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn" data-toggle="modal"
                                                data-target="#exampleModalplea{{ $details->id }}">
                                                {{ $details->plea }}
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModalplea{{ $details->id }}"
                                                tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Plea
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="{{ route('plea_edit') }}"
                                                            method="post">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <input type="text" value="{{ $details->plea }}" class="form-control" required
                                                                    name="plea">
                                                                <input type="hidden" name="id"
                                                                    value="{{ $details->id }}">

                                                                <input type="hidden" name="case_id"
                                                                    value="{{ $details->cases_id }}">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-sm btn-secondary"
                                                                    data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-sm btn-primary">Save
                                                                    changes</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                                data-target="#exampleModal">
                                                <span style="text-align:center;">Show Attachments</span>
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Attachments
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <table class="table table-striped table-hover table-sm">
                                                                <thead>
                                                                    <tr>
                                                                        <th>File</th>
                                                                        <th>File Type</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach ($details->attachments as $attachments)
                                                                        <tr>
                                                                            <td>
                                                                                @if (str_contains($attachments->type, 'image'))
                                                                                    <a href="{{ url('show_image', ['id' => $attachments->id]) }}"
                                                                                        target="_blank">{{ $attachments->attachment_name }}</a>
                                                                                @elseif(str_contains($attachments->type, 'application'))
                                                                                    <a target="_blank"
                                                                                        href="{{ asset('/storage/' . $attachments->attachment_name) }}">{{ $attachments->attachment_name }}</a>
                                                                                @endif
                                                                            </td>
                                                                            <td>{{ $attachments->type }}</td>
                                                                        </tr>
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-sm btn-secondary"
                                                                data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
