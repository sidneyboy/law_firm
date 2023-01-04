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
                <div class="card-header">New Case Profile</div>
                <form action="{{ route('cases_process') }}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Client Full Name</label>
                                    <input type="text" class="form-control" required name="full_name">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Nature of Case</label>
                                    <select class="form-control" required name="nature_of_case_id">
                                        <option value="" default>Select</option>
                                        @foreach ($nature_of_case as $data)
                                            <option value="{{ $data->id }}">{{ Str::ucfirst($data->nature_of_case) }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Title</label>
                                    <input type="text" class="form-control" required name="title">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Court</label>
                                    <input type="text" class="form-control" required name="court">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Action</label>
                                    <input type="text" class="form-control" required name="action">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Docket No</label>
                                    <input type="text" class="form-control" required name="docket_no">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Order</label>
                                    <input type="text" class="form-control" required name="order">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Date of Order</label>
                                    <input type="date" class="form-control" required name="date_of_order">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Presiding Judge</label>
                                    <input type="text" class="form-control" required name="presiding_judge">
                                </div>
                            </div>


                            {{-- <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Category</label>
                                    <select class="form-control" required name="category_id">
                                        <option value="" default>Select</option>
                                        @foreach ($category as $data)
                                            <option value="{{ $data->id }}">{{ Str::ucfirst($data->category) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div> --}}

                            {{-- <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Case Description</label>
                                    <textarea name="case_description" class="form-control" cols="30" rows="5" required></textarea>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-sm btn-success float-right" style="margin-bottom: 10px;"
                            type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
