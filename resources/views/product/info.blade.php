@extends('app')

@section('content')
    <!-- Page Content -->
    <div class="container">

        <!-- Portfolio Item Heading -->
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
        <!-- /.row -->

        <!-- Related Projects Row -->
        <div class="row">

            <div class="col-lg-12">
                <h3 class="page-header">Related Items</h3>
            </div>
            @if (count($relatedItemInfo) > 0)
                @foreach($relatedItemInfo as $relatedItem)
                    <div class="col-sm-3 col-xs-6">
                        <img class="img-responsive portfolio-item" src="http://placehold.it/500x300" alt="">
                        <h4>{!! HTML::link("item-details/" . $relatedItem->id, $relatedItem->title) !!}</h4>
                    </div>
                @endforeach
                else
                <div class="col-sm-3 col-xs-6">Invalid Item Request</div>
            @endif
        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Laravel Bidding Application</p>
                </div>
            </div>
            <!-- /.row -->
        </footer>

    </div>
    <!-- /.container -->

@endsection