@extends('layouts.master')

@section('title','首頁')

@section('header')
    <header class="masthead bg-primary text-white text-center">
        <div class="container d-flex align-items-center flex-column">
            <!-- Masthead Avatar Image-->
            <img class="masthead-avatar mb-5" src="{{ asset('images/fair.png') }}" alt="..." />
            <!-- Masthead Heading-->
            <h1 class="masthead-heading text-uppercase mb-0">彰化縣網界博覽會各校網站</h1>
            <!-- Icon Divider-->
            <div class="divider-custom divider-light">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            <!-- Masthead Subheading-->
            <p class="masthead-subheading font-weight-light mb-0">關懷本土，秀出彰化的生命與活力</p>
        </div>
    </header>
@endsection

@section('content')
    <!-- Portfolio Section-->
    <div id="articles"></div>
    <section class="page-section portfolio" id="portfolio">
        <div class="container">
            <!-- Portfolio Section Heading-->
            <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">歷次作品</h2>
            <!-- Icon Divider-->
            <div class="divider-custom">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            <div class="row">
                @foreach($years as $year)
                    <div class="card col-6 col-md-2" style="margin-right: 20px">
                        <img src="{{ asset('images/folder2.png') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                        <h5 class="card-title">{{ $year->year }}</h5>
                        <p class="card-text">本年度的作品集</p>
                        <a href="{{ route('show',$year->year) }}" class="btn btn-primary">查看</a>
                        </div>
                    </div>
                @endforeach
            </div>
            
        </div>
    </section>
@endsection