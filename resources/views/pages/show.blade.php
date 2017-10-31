@extends('.test')

@section('content')
    <h3><a href="{{route('pages.index')}}">All pages</a></h3>
    <h1>{{$page->title}}</h1>
    <hr>
    <div class="col-md-12">
        {!! $page->text !!}
    </div>
@endsection