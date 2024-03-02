@extends('layouts.master')

@section('title','指派上傳')

@section('content')
    <section class="page-section portfolio" id="portfolio" style="margin-top: 30px">
        <div class="container">
            <!-- Portfolio Section Heading-->
            <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">指派上傳</h2>
            <!-- Icon Divider-->
            <div class="divider-custom">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>    
            <div class="row justify-content-center">
                <div class="card col-6">
                    <div class="card-header">                        
                        建立年度
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">1.第一步驟要先有年度</h5>
                        <p class="card-text"><span class="text-danger">*</span>參加網博的年度(4碼)</p>
                        <form method="post" action="{{ route('do_year') }}">
                            @csrf
                            <div class="mb-3">                        
                                <input type="text" class="form-control" name="year" maxlength="4" required>
                            </div>                  
                            <button class="btn btn-primary" style="margin-top: 20px" onclick="if(confirm('您確定送出嗎?')) return true;else return false">送出</button>
                            @include('layouts.errors')    
                        </form>
                        <hr>
                        <h5 class="card-title">2.第二步驟選一個年度</h5>
                        @if(count($years)>0)
                        <div class="row">
                            @foreach($years as $year)
                                <div class="col-md-6 col-lg-4 mb-5">
                                    <div class="portfolio-item mx-auto" id="data{{ $year->year }}" data-bs-toggle="modal" data-bs-target="#portfolioModal1">
                                        <a href="{{ route('assign',$year->id) }}">
                                        <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                                            <div class="portfolio-item-caption-content text-center text-white"><i class="fas fa-plus fa-3x"></i>{{ $year->year }}</div>
                                        </div>
                                        </a>
                                        <figure class="figure">
                                        <img class="img-fluid" src="{{ asset('images/folder.png') }}" alt="{{ $year->year }}" />
                                            <figcaption class="figure-caption text-end">{{ $year->year }}</figcaption>
                                        </figure>
                                    </div>
                                </div>
                            @endforeach
                        </div>    
                        @else
                            目前沒有任何年度可選...
                        @endif
                    </div>
                </div>     
            </div>                               
        </div>
    </section>
@endsection