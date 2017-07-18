@extends('app')

@section('title')
    MetroGistics :: Get a Quote!
@endsection

@section('javascript')
    <meta name="csrf-token" content="{!! csrf_token() !!}" />
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.5/angular.min.js"></script>
    <script src="/js/main.js"></script>
    <link href="/js/select2-3.4.8/select2.css" rel="stylesheet"/>
    <link href="/js/select2-3.4.8/select2bootstrap.css" rel="stylesheet"/>
    <script src="/js/select2-3.4.8/select2.js"></script>
    <script src="/js/quoteform.js"></script>
    <script type="text/javascript">
$(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        });
    </script>
@endsection

@section('content')
    <div class="container">

        @if($errors->has())
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <h3 class="panel-title">Errors on Submission - Please Correct</h3>
                </div>
                <div class="panel-body">

                    <div class="row">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endif


        <div ng-controller="QuoteController">

            <div class="row">
                <br />
                <div class="col-xs-12 col-md-12">

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">MetroGistics - Quote Response</h3>
                        </div>
                        <div class="panel-body ">
                            <h1>Send Quote</h1>
                            <br />
                            <strong>Send To:</strong><br />
                            {!! $QuickQuote->FirstName !!} {!! $QuickQuote->LastName !!} - {!! $QuickQuote->EmailAddress !!} ({!! $QuickQuote->PhoneNumber !!} {!! $QuickQuote->PhoneNumberExt !!})
                            <br />
                            {!! $QuickQuote->oAreaName !!} to {!! $QuickQuote->dAreaName !!}<br />
                            {!! $QuickQuote->oTerm !!} to {!! $QuickQuote->dTerm !!}<br />
                            <br />
                            {!! BootForm::open()->action('/SendQuote/' . $QuickQuote->id)->post() !!}
                            {!! BootForm::text('Quote Amount', 'Quote')->placeholder('$XXX.XX') !!}
                            {!! BootForm::text('Quoted By', 'QuotedBy')->placeholder('Your Name') !!}

                        </div>
                        <div class="panel-footer">
                            {!! BootForm::submit('Send Quote') !!}

                        </div>
                    </div>
                </div>
            </div>
            {!! BootForm::close() !!}
        </div>
    </div>


@endsection
