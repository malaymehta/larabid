@extends('app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Add Product</div>
                    <div class="panel-body">

                        <!--This is for showing the notifications and errors -->
                        @if (Session::has('message.arrayErrors'))
                            <div class="alert alert-danger">
                                @foreach (Session::get('message.arrayErrors') as $message)
                                    <p>{!! $message !!}</p>
                                @endforeach
                            </div>
                            @endif
                            <!--This is for showing the notifications and errors -->

                            {!! Form::open(array('class' => 'form-horizontal', 'role' =>'form', 'enctype' => 'multipart/form-data')) !!}
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <div class="form-group">
                                <label class="col-md-4 control-label">Title</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Description</label>

                                <div class="col-md-6">
                                    <textarea class="form-control" name="description" id="description">{{ old('description') }}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Minimum Bid Amount</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="min_bid" id="min_bid" value="{{ old('min_bid') }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Bidding Starts on: </label>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class='input-group date' id='datetimepicker6'>
                                            <input type='text' class="form-control" name="bid_start_time"/>
                                                    <span class="input-group-addon">
                                                        <span class="glyphicon glyphicon-calendar"></span>
                                                    </span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Bidding Ends on: </label>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class='input-group date' id='datetimepicker7'>
                                            <input type='text' class="form-control" name="bid_end_time"/>
                                                    <span class="input-group-addon">
                                                        <span class="glyphicon glyphicon-calendar"></span>
                                                    </span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Image</label>

                                <div class="col-md-6">
                                    <input type="file" class="form-control" name="image">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                    <button type="clear" class="btn btn-primary">Clear</button>
                                </div>
                            </div>
                            {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" language="javascript">
        // jquery datetimepicker
    </script>

@stop