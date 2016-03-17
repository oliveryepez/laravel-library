@extends('layouts.master')

@section('title')
    Home
@endsection

@section('content')
    <body class="skin-black">
        <div class="wrapper">
            @include('layouts.header')
            @include('layouts.sidebar')

            <div class="content-wrapper">
                <section class="content-header">
                    <h1>
                        @yield("page_title")
                        <small>@yield("page_description")</small>
                    </h1>
                </section>

                <section class="content">
                    @yield('page_content')
                </section>
            </div>
        </div>
    </body>
@endsection
