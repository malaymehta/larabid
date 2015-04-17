@extends('app')

@section('content')
    <!-- Page Content -->
    <div class="container">
        <!-- Portfolio Item Heading -->
        @if(!empty($itemInfo))
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">{!! $itemInfo->title !!}</h1>
                </div>
            </div>
            <!-- /.row -->

            <!-- Portfolio Item Row -->
            <div class="row">
                <div class="col-md-8">
                    <img class="img-responsive" src="http://placehold.it/750x500" alt="">
                </div>
                <div class="col-md-4">
                    <h3>Item Description</h3>
                    <p>{!! $itemInfo->description !!}</p>
                </div>
            </div>
        @else
            <div class="row">
                <div class="alert-info">Invalid Item Info</div>
            </div>
        @endif
        <!-- /.row -->

        <!-- Related Projects Row -->
        @if (!empty($relatedItemInfo) && count($relatedItemInfo) > 0)
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">Related Items</h3>
            </div>
            @foreach($relatedItemInfo as $relatedItem)
                <div class="col-sm-3 col-xs-6">
                    <img class="img-responsive portfolio-item" src="http://placehold.it/500x300" alt="">
                    <h4>{!! HTML::link("item-details/" . $relatedItem->id, $relatedItem->title) !!}</h4>
                </div>
            @endforeach
        </div>
        @else
        <div class="row">
            <div class="col-sm-3 col-xs-6">Invalid Item Request</div>
        </div>
        @endif
        <!-- /.row -->
        <hr>
        <!-- Footer -->
        <footer class="footer">
            <div class="container">
                <p class="text-muted">&copy; 2015, Laravel Bidding Application</p>
            </div>
        </footer>
    </div>
    <!-- /.container -->
@endsection