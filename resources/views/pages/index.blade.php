@extends('.test')

@section('content')
    <ul class="nav flex-column">
        @foreach($pages as $page)
            <li class="nav-item">
                <a class="nav-link" href="{{route('pages.show', ['slug' => $page->slug])}}">{{$page->title}}</a>
            </li>
        @endforeach
    </ul>
    <hr>
    {!! $pages->render() !!}
@endsection