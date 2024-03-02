@extends('layouts.master')

@section('title','上傳網站')

@section('content')
    <!-- Portfolio Section-->
    <section class="page-section portfolio" id="portfolio" style="margin-top: 30px">
        <div class="container">
            <!-- Portfolio Section Heading-->
            <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">上傳網站</h2>
            <!-- Icon Divider-->
            <div class="divider-custom">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            <div class="row justify-content-center">
                <div class="card col-6">
                    <div class="card-header">
                      網站上傳
                    </div>
                    <div class="card-body">
                      <h5 class="card-title">選一個年度上傳</h5>
                      <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class=col-2>年度</th>
                                <th class=col-8>動作</th>
                                <th class=col-2>連結</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($uploads as $upload)
                                <tr>
                                    <td>{{ $upload->year->year }}</td>
                                    <td>
                                        <form action="{{ route('upload_file') }}" method="post" id="uploadForm" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="mb-3 col-9">
                                                    <input class="form-control" type="text" name="my_site" placeholder="網站名稱" required onkeyup="this.value=this.value.replace(/[^\w_]/g,'');">
                                                </div>
                                                <div class="mb-3 col-9">
                                                    <input class="form-control" type="file" name="my_file" id="my_file" accept=".zip" required>
                                                    <input type="hidden" name="year_id" value="{{ $upload->year->id }}">
                                                </div>
                                                <div class="mb-3 col-3">
                                                    <button class="btn btn-primary btn-sm" onclick="if(confirm('您確定送出嗎?會先刪除已上傳過的喔！！')) return true;else return false">上傳</button>
                                                </div>
                                            </div>
                                            <div class="row" style="margin-left:2px;margin-right:2px">
                                                <div id="progress-bar" class="mb-3 col-10"></div>
                                            </div>
                                        </form>
                                        @include('layouts.errors')
                                    </td>
                                    <td>
                                        @if(isset($site_data[$upload->year->id]['site']))
                                            <a href="{{ env('APP_URL').'/'.$upload->year->year.'/'.$eng_schools[auth()->user()->code].'/'.$site_data[$upload->year->id]['site'] }}" target="_blank" style="text-decoration:none"><i class="fas fa-link"></i> {{ $site_data[$upload->year->id]['site'] }}</a>
                                        @else
                                            尚無
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <p>
                        <ul>
                            <li>網站名稱限英文及數字</li>
                            <li>請上傳小於 50MB 的 ZIP 檔</li>
                            <li>本站不負責保管檔案，請自行備份</li>
                            <li>上傳的檔案自負全責，請勿涉及版權問題</li>
                        </ul>
                    </p>
                    </div>
                  </div>
            </div>   
        </div>
    </section>
    <style>
        #progress-bar {
                background-color: #12CC1A;
                color: #FFFFFF;
                width: 0%;
                -webkit-transition: width .3s;
                -moz-transition: width .3s;
                transition: width .3s;
                border-radius: 5px;
            }
    </style>
@endsection