@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <p class="lead">Menu</p>

                <div class="list-group">
                    <a class="list-group-item" href="add-product">Add Items</a>
                    <a class="list-group-item" href="auth/logout">Logout</a>
                </div>
            </div>

            <div class="col-md-9">

                <div class="row">
                    @if(count($items) > 0)
                        <!-- This is the section to be looped -->
                        @foreach($items as $item_for_sell)
                            <div class="col-sm-4 col-lg-4 col-md-4">
                                <div class="thumbnail">
                                    <img alt="" src="http://placehold.it/320x150">

                                    <div class="caption">
                                        <h5>{!! HTML::link("item-details/" . $item_for_sell->id, $item_for_sell->title) !!}</h5>

                                        <p>{!! $item_for_sell->description !!}</p>
                                        <hr/>
                                        <p>
                                            <span class="glyphicon glyphicon-info-sign"></span>
                                            Total Bids: 15
                                        </p>

                                        <p class="pull-right alert-link">{!! HTML::link("bid-item/" .
                                            $item_for_sell->id, "Bid Now") !!}</p>

                                        <p>Bid Starts from ${!! $item_for_sell->min_bid !!}</p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                                    <!-- This is the section to be looped -->
                            @else
                                <p class='list-group-item-info'>No record found.</p>
                            @endif
                </div>


            </div>
        </div>

    </div>
@endsection
