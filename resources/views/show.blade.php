@extends('layouts.master')

@section('title','本次作品')

@section('content')
    <!-- Portfolio Section-->
    <section class="page-section portfolio" id="portfolio" style="margin-top: 30px">
        <div class="container">
            <!-- Portfolio Section Heading-->
            <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">{{ $year->year }}作品集</h2>
            <!-- Icon Divider-->
            <div class="divider-custom">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            <div class="row">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{ route('index') }}/index#articles">歷次作品</a></li>
                      <li class="breadcrumb-item active" aria-current="page">{{ $year->year }}作品</li>
                    </ol>
                  </nav>
                @foreach($sites as $site)
                    <div class="card col-6 col-md-2" style="margin-right: 20px">
                        <img src="{{ asset('images/website.png') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                        <h5 class="card-title">{{ $site->school }}</h5>
                        <p class="card-text">
                            教師：{{ $site->user->name }}<br>
                            名稱：{{ $site->site_name }}
                        </p>
                        <a href="{{ env('APP_URL').'/'.$site->year->year.'/'.$eng_schools[$site->code].'/'.$site->site_name }}" class="btn btn-primary" target="_blank">查看網站</a>
                        </div>
                    </div>
                @endforeach
            </div>
            
        </div>
    </section>
@endsection