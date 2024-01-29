@extends('sr.masterSr')
@section('content')

    <!-- BEGIN: Page heading-->
    <div class="page-heading">
        <div class="page-breadcrumb">
            <h1 class="page-title">মার্কেট</h1>
        </div>
    </div><!-- BEGIN: Page content-->
    <div>
        <div class="row">
            <div class="col-12">
                @if (!empty(Session::get('success')))
                <div class="alert alert-primary alert-success fade show" role="alert"><button class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><?php
                $message= Session::get('success');
                if($message){
                    echo $message;
                    Session::put('success',null);
                }
                ?></div>
                 @endif

                @if (!empty(Session::get('failed')))
                <div class="alert alert-danger alert-dismissible fade show" role="alert"><button class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><?php
                $message_failed= Session::get('failed');
                if($message_failed){
                    echo $message_failed;
                    Session::put('failed',null);
                    }
                ?></div>
                 @endif

                 <ul class="list-group">
                    <form>
                      <div class="form-row">
                        <div class="form-group col-9">
                            <input type="text" class="form-control form-control-sm" name="search_value" placeholder="Search Keywords....">
                        </div>
                        <div class="form-group col-1">
                          <button type="submit" class="btn btn-success btn-sm ml-1" id="market_search">Search</button>
                        </div>
                      </div>

                    </form>
                </ul>


                <ul class="list-group" id="market_data">
                    <?php foreach ($all_market as $marketvalue): ?>
                        <a href="{{ URL::to('market/'.$marketvalue->id) }}" title="<?php echo $marketvalue->market_name ; ?>">
                            <p class="market"><b>{{ $marketvalue->market_name }}</b></p>
                        </a>
                    <?php endforeach ?>
                </ul>

            </div>
        </div>
    </div><!-- END: Page content-->
@endsection
@section('js')
<script>
    $("#market_search").click(function(e){
        e.preventDefault() ;

        var search_keyword = $("[name=search_value]").val() ;

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            'url':"{{ url('/getMarketSearchResult') }}",
            'type':'post',
            'dataType':'text',
            data: {search_keyword : search_keyword},
            success:function(data){
                $("#market_data").empty().html(data) ;
            }
        });
    })
</script>
@endsection
