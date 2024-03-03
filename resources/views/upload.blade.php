@extends('layouts.master')

@section('title','上傳網站')

@section('before_plugin')
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>  
@endsection

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
                <div class="card col-11 col-md-6">
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
                                        <form action="{{ route('upload_file') }}" method="post" id="uploadForm{{ $upload->year_id }}" enctype="multipart/form-data" onsubmit="go{{ $upload->year_id }}()">
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
                                                    <button class="btn btn-primary btn-sm" id="submit_button{{ $upload->year_id }}" onclick="if(confirm('您確定送出嗎?會先刪除已上傳過的喔！！')) return true;else return false">上傳</button>
                                                    <img src="{{ asset('images/LoaderIcon.gif') }}" id="loader-icon{{ $upload->year_id }}" width="50" style="display: none;" />
                                                </div>
                                            </div>
                                        </form>
                                        <script>
                                            function go{{ $upload->year_id }}(){
                                                $('#submit_button{{ $upload->year_id }}').hide();
                                                $('#loader-icon{{ $upload->year_id }}').show();
                                            }
                                            $('#my_file').bind('change', function() {
                                                if(this.files[0].size > 51200000){
                                                    $('#my_file').val('');
                                                    alert('檔案超過 50 MB');
                                                }
                                            });
                                        </script>
                                        @include('layouts.errors')
                                    </td>
                                    <td>
                                        @if(isset($site_data[$upload->year->id]['site']))
                                            <a href="{{ env('APP_URL').'/'.$upload->year->year.'/'.$eng_schools[auth()->user()->code].'/'.$site_data[$upload->year->id]['site'] }}" target="_blank" style="text-decoration:none"><i class="fas fa-link"></i> {{ $site_data[$upload->year->id]['site'] }}</a>
                                            <br><br><br>
                                            <a href="{{ route('delete_my_site',$upload->year_id) }}" onclick="if(confirm('您確定刪這個已上傳的網站嗎？')) return true;else return false"><i class="fas fa-times-circle text-danger"></i></a>
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
                            <li>一個帳號在一個年度只能上傳一個網站</li>
                            <li>網站名稱限英文及數字</li>
                            <li>ZIP 檔的建立方式請參考[<a href="{{ env('YT_TEACH') }}" target="_blank">這裡</a>]</li>
                            <li>請上傳小於 50MB 的 ZIP 檔</li>
                            <li>上傳時請耐心等候，不要重複點擊、重新整理</li>
                            <li>本站不負責保管檔案，請自行備份</li>
                            <li>上傳的檔案自負全責，請勿涉及版權問題</li>
                        </ul>
                    </p>
                    </div>
                  </div>
            </div>   
        </div>
    </section>
@endsection