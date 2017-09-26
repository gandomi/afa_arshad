@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add New Student</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('new.student') }}" method="post" class="form-horizontal" role="form">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="stu_num" class="col-sm-3 control-label">Student Number</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="stu_num" name="stu_num"
                                       placeholder="Student Number" value="{{ old('stu_num') }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="firstname" class="col-sm-3 control-label">Firstname</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="firstname" name="firstname"
                                       placeholder="Firstname" value="{{ old('firstname') }}" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="lastname" class="col-sm-3 control-label">Lastname</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="lastname" name="lastname"
                                       placeholder="Lastname" value="{{ old('lastname') }}" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="area_of_interest" class="col-sm-3 control-label">Area of interest</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="area_of_interest" name="area_of_interest"
                                       placeholder="Area of interest" value="{{ old('area_of_interest') }}" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="memo" class="col-sm-3 control-label">Memo</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" id="memo" name="memo"
                                          placeholder="Memo">{{ old('memo') }}</textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="priority_1" class="col-sm-3 control-label">Priority 1</label>
                            <div class="col-sm-9">
                                <select class="form-control" id="priority_1" name="priority_1">
                                    <option></option>
                                    @foreach($teachers as $teacher)
                                        <option value="{{ $teacher->id }}" @if(old('priority_1') == $teacher->id) selected @endif>{{ $teacher->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="priority_2" class="col-sm-3 control-label">Priority 2</label>
                            <div class="col-sm-9">
                                <select class="form-control" id="priority_2" name="priority_2">
                                    <option></option>
                                    @foreach($teachers as $teacher)
                                        <option value="{{ $teacher->id }}" @if(old('priority_2') == $teacher->id) selected @endif>{{ $teacher->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="priority_3" class="col-sm-3 control-label">Priority 3</label>
                            <div class="col-sm-9">
                                <select class="form-control" id="priority_3" name="priority_3">
                                    <option></option>
                                    @foreach($teachers as $teacher)
                                        <option value="{{ $teacher->id }}" @if(old('priority_3') == $teacher->id) selected @endif>{{ $teacher->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="priority_4" class="col-sm-3 control-label">Priority 4</label>
                            <div class="col-sm-9">
                                <select class="form-control" id="priority_4" name="priority_4">
                                    <option></option>
                                    @foreach($teachers as $teacher)
                                        <option value="{{ $teacher->id }}" @if(old('priority_4') == $teacher->id) selected @endif>{{ $teacher->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="priority_5" class="col-sm-3 control-label">Priority 5</label>
                            <div class="col-sm-9">
                                <select class="form-control" id="priority_5" name="priority_5">
                                    <option></option>
                                    @foreach($teachers as $teacher)
                                        <option value="{{ $teacher->id }}" @if(old('priority_5') == $teacher->id) selected @endif>{{ $teacher->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="priority_6" class="col-sm-3 control-label">Priority 6</label>
                            <div class="col-sm-9">
                                <select class="form-control" id="priority_6" name="priority_6">
                                    <option></option>
                                    @foreach($teachers as $teacher)
                                        <option value="{{ $teacher->id }}" @if(old('priority_6') == $teacher->id) selected @endif>{{ $teacher->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="priority_7" class="col-sm-3 control-label">Priority 7</label>
                            <div class="col-sm-9">
                                <select class="form-control" id="priority_7" name="priority_7">
                                    <option></option>
                                    @foreach($teachers as $teacher)
                                        <option value="{{ $teacher->id }}" @if(old('priority_7') == $teacher->id) selected @endif>{{ $teacher->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-9 col-sm-offset-3">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
