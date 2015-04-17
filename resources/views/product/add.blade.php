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

                            <form class="form-horizontal" role="form" method="POST" action="save-product" enctype="multipart/form-data">
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
                                            <div class='input-group date' class='datetimepicker'>
                                                <input type='text' class="form-control" name="bid_start_time" id="bid_start_time" value="{{ old('bid_start_time') }}"/>
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-time"></span>
                                        </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label">Bidding Ends on: </label>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class='input-group date' class='datetimepicker'>
                                                <input type='text' class="form-control" name="bid_end_time" id="bid_end_time" value="{{ old('bid_end_time') }}"/>
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-time"></span>
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
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">

    </script>
@stop