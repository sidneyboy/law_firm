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
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    List of Cases
                </div>
                <div class="card-body">
                    <a href="{{ url('case') }}" style="margin-bottom: 10px;"
                        class="btn btn-secondary btn-sm float-right">New Case Profile (+)</a>
                    <div class="table table-responsive">
                        <table class="table table-bordered table-sm">
                            <thead>
                                <tr class="table-info">
                                    <th>Status</th>
                                    <th>Nature</th>
                                    <th>Title</th>
                                    <th>Client</th>
                                    <th>Action</th>
                                    <th>Docket No</th>
                                    <th>Date of Order</th>
                                    <th>Order</th>
                                    <th>Created</th>
                                    <th>Case Details</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($case as $data)
                                    <tr>
                                        <td style="white-space:nowrap;">
                                            <button type="button" class="btn" data-toggle="modal"
                                                data-target="#exampleModalremarks{{ $data->id }}">
                                                {{ $data->remarks }}
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModalremarks{{ $data->id }}"
                                                tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Remarks
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="{{ route('case_remarks_update') }}" method="post">
                                                            @csrf
                                                            <div class="modal-body">
                                                                {{-- <input type="text" value="{{ $data->remarks }}" class="form-control" name="remarks" required> --}}

                                                                <select name="remarks" class="form-control" required>
                                                                    <option value="" default>Select</option>
                                                                    <option value="On Going">On Going</option>
                                                                    <option value="Closed">Closed</option>
                                                                </select>

                                                                <input type="hidden" name="id"
                                                                    value="{{ $data->id }}">
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
                                        <td style="white-space:nowrap;">
                                            <button type="button" class="btn" data-toggle="modal"
                                                data-target="#exampleModalnature_of_case{{ $data->id }}">
                                                {{ Str::ucfirst($data->nature_of_case->nature_of_case) }}
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModalnature_of_case{{ $data->id }}"
                                                tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Nature of Case
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="{{ route('case_nature_of_case_update') }}"
                                                            method="post">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <select name="nature_of_case_id" class="form-control"
                                                                    required>
                                                                    <option value="" default>Select</option>
                                                                    <option value="{{ $data->id }}">
                                                                        {{ $data->nature_of_case->nature_of_case }}
                                                                    </option>
                                                                    @foreach ($nature_of_case as $nature_of_case_data)
                                                                        @if ($nature_of_case_data->nature_of_case != $data->nature_of_case->nature_of_case)
                                                                            <option value="{{ $nature_of_case_data->id }}">
                                                                                {{ ucfirst($nature_of_case_data->nature_of_case) }}
                                                                            </option>
                                                                        @endif
                                                                    @endforeach
                                                                </select>

                                                                <input type="hidden" name="id"
                                                                    value="{{ $data->id }}">
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
                                            <button type="button" style="text-align: left" class="btn"
                                                data-toggle="modal" data-target="#exampleModaltitle{{ $data->id }}">
                                                {{ Str::ucfirst($data->title) }}
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModaltitle{{ $data->id }}"
                                                tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Client Name
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="{{ route('case_client_title_update') }}"
                                                            method="post">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <input type="text" class="form-control" name="title"
                                                                    value="{{ Str::ucfirst($data->title) }}" required>

                                                                <input type="hidden" name="id"
                                                                    value="{{ $data->id }}">
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
                                        <td style="white-space:nowrap;">
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn" data-toggle="modal"
                                                data-target="#exampleModalfull_name{{ $data->id }}">
                                                {{ Str::ucfirst($data->full_name) }}
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModalfull_name{{ $data->id }}"
                                                tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Client Name
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="{{ route('case_client_name_update') }}"
                                                            method="post">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <input type="text" class="form-control"
                                                                    name="full_name"
                                                                    value="{{ Str::ucfirst($data->full_name) }}" required>

                                                                <input type="hidden" name="id"
                                                                    value="{{ $data->id }}">
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
                                            <button type="button" style="text-align: left" class="btn"
                                                data-toggle="modal" data-target="#exampleModalaction{{ $data->id }}">
                                                {{ Str::ucfirst($data->action) }}
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModalaction{{ $data->id }}"
                                                tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Action
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="{{ route('case_client_action_update') }}"
                                                            method="post">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <input type="text" class="form-control" name="action"
                                                                    value="{{ Str::ucfirst($data->action) }}" required>

                                                                <input type="hidden" name="id"
                                                                    value="{{ $data->id }}">
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
                                        <td style="white-space:nowrap;">
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn" data-toggle="modal"
                                                data-target="#exampleModaldocket_no{{ $data->id }}">
                                                {{ Str::ucfirst($data->docket_no) }}
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModaldocket_no{{ $data->id }}"
                                                tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Docket No
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="{{ route('case_client_docket_no_update') }}"
                                                            method="post">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <input type="text" class="form-control"
                                                                    name="docket_no"
                                                                    value="{{ Str::ucfirst($data->docket_no) }}" required>

                                                                <input type="hidden" name="id"
                                                                    value="{{ $data->id }}">
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
                                        <td style="white-space:nowrap;">
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn" data-toggle="modal"
                                                data-target="#exampleModaldate_of_order{{ $data->id }}">
                                                {{-- {{ date('F j, Y', strtotime($data->date_of_order)) }} --}}
                                                {{ $data->date_of_order }}
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModaldate_of_order{{ $data->id }}"
                                                tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Date of Order
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="{{ route('case_client_date_of_order_update') }}"
                                                            method="post">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <input type="text" class="form-control"
                                                                    name="date_of_order" required>

                                                                <input type="hidden" name="id"
                                                                    value="{{ $data->id }}">
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
                                            <button type="button" style="text-align:left" class="btn"
                                                data-toggle="modal" data-target="#exampleModalorder{{ $data->id }}">
                                                {{ $data->order }}
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModalorder{{ $data->id }}"
                                                tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Order
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="{{ route('case_client_order_update') }}"
                                                            method="post">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <input type="text" class="form-control" name="order"
                                                                    value="{{ Str::ucfirst($data->order) }}" required>

                                                                <input type="hidden" name="id"
                                                                    value="{{ $data->id }}">
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
                                        <td><span class="btn">{{ date('F j, Y', strtotime($data->created_at)) }}</span>
                                        </td>
                                        <td>
                                            <a href="{{ url('case_details', ['id' => $data->id]) }}"
                                                style="margin-bottom: 5px;"
                                                class="btn btn-sm btn-info btn-block">Show</a>



                                        </td>
                                        <td> <button type="button" style="margin-bottom:5px;"
                                                class="btn btn-sm btn-primary btn-block" style="margin-bottom:5px;"
                                                data-toggle="modal"
                                                data-target="#exampleModalremarks{{ $data->id }}">
                                                Update
                                            </button>


                                            <div class="modal fade" id="exampleModalremarks{{ $data->id }}"
                                                tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Remarks
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="{{ route('case_remarks_update') }}" method="post">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <textarea name="remarks" class="form-control" cols="30" rows="5" required>{{ $data->remarks }}</textarea>

                                                                <input type="hidden" value="{{ $data->id }}"
                                                                    name="id">
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
