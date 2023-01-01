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
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Description</label>
                                    <textarea name="description" class="form-control" required cols="30" rows="5"></textarea>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Hearing/Appointment Date</label>
                                    <input type="date" class="form-control" name="appointment_hearing_date" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Remarks</label>
                                    <input type="text" class="form-control" name="remarks" required>
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
                        <table class="table table-striped table-sm table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Appointment</th>
                                    <th>Description</th>
                                    <th>Remarks</th>
                                    <th>Attachments</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($case_details as $details)
                                    <tr>
                                        <td>{{ date('F j, Y', $details->appointement_hearing_date) }}</td>
                                        <td>{{ $details->description }}</td>
                                        <td>{{ $details->remarks }}</td>
                                        <td style="font-size:50px;text-align:center;">
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target="#exampleModal">
                                                {{ count($details->attachments) }}
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            ...
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Close</button>
                                                            <button type="button" class="btn btn-primary">Save
                                                                changes</button>
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
