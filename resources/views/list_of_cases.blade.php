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
                        <table class="table table-striped table-sm table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Title</th>
                                    <th>Client</th>
                                    <th>Category</th>
                                    <th>Nature</th>
                                    <th>Description</th>
                                    <th>Remarks</th>
                                    <th>Decision</th>
                                    <th>Created</th>
                                    <th>Option</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($case as $data)
                                    <tr>
                                        <td>
                                            <button type="button" class="btn" data-toggle="modal"
                                                data-target="#exampleModaltitle{{ $data->id }}">
                                                {{ Str::ucfirst($data->title) }}
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModaltitle{{ $data->id }}"
                                                tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Client Name</h5>
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
                                                            <h5 class="modal-title" id="exampleModalLabel">Client Name</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="{{ route('case_client_name_update') }}"
                                                            method="post">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <input type="text" class="form-control" name="full_name"
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
                                        <td style="white-space:nowrap;">
                                            <button type="button" class="btn" data-toggle="modal"
                                                data-target="#exampleModalcategory{{ $data->id }}">
                                                {{ Str::ucfirst($data->category->category) }}
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModalcategory{{ $data->id }}"
                                                tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Categories</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="{{ route('case_category_update') }}"
                                                            method="post">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <select name="category_id" class="form-control" required>
                                                                    <option value="" default>Select</option>
                                                                    <option value="{{ $data->id }}">
                                                                        {{ $data->category->category }}</option>
                                                                    @foreach ($category as $category_data)
                                                                        @if ($category_data->category != $data->category->category)
                                                                            <option value="{{ $category_data->id }}">
                                                                                {{ ucfirst($category_data->category) }}
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
                                                                            <option
                                                                                value="{{ $nature_of_case_data->id }}">
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
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn" style="text-align: justify"
                                                data-toggle="modal"
                                                data-target="#exampleModalcase_description{{ $data->id }}">
                                                {{ $data->case_description }}
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModalcase_description{{ $data->id }}"
                                                tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Case
                                                                Description
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="{{ route('case_description_update') }}"
                                                            method="post">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <textarea name="case_description" class="form-control" required cols="30" rows="10">{{ $data->case_description }}</textarea>

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
                                        <td>{{ $data->remarks }}</td>
                                        <td>{{ $data->decision }}</td>
                                        <td>{{ date('F j, Y h:i a', strtotime($data->created_at)) }}</td>
                                        <td>
                                            <a href="{{ url('case_details', ['id' => $data->id]) }}"
                                                style="margin-bottom: 5px;"
                                                class="btn btn-sm btn-info btn-block">Details</a>

                                            <!-- Button trigger modal -->
                                            <button type="button" style="text-align: justify;margin-bottom:5px;"
                                                class="btn btn-sm btn-primary" style="margin-bottom:5px;"
                                                data-toggle="modal"
                                                data-target="#exampleModalremarks{{ $data->id }}">
                                                Remarks
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

                                            <!-- Button trigger modal -->
                                            <button type="button" style="text-align: justify"
                                                class="btn btn-block btn-sm btn-success" style="margin-bottom:5px;"
                                                data-toggle="modal"
                                                data-target="#exampleModaldecision{{ $data->id }}">
                                                Verdict
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModaldecision{{ $data->id }}"
                                                tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Verdict
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="{{ route('case_verdict_update') }}" method="post">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <textarea name="verdict" class="form-control" cols="30" rows="5" required>{{ $data->decision }}</textarea>

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
