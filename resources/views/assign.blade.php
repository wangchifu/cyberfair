@extends('layouts.master')

@section('title','指派學校')

@section('before_plugin')
<script src="{{ asset('js/jquery-3.7.1.js') }}"></script>  
<link href="{{ asset('css/select2.min.css') }}" rel="stylesheet" />
<script src="{{ asset('js/select2.min.js') }}"></script>
@endsection

@section('content')
<section class="page-section portfolio" id="portfolio" style="margin-top: 30px">
    <div class="container">
        <!-- Portfolio Section Heading-->
        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">{{ $year->year }}年度可上傳的學校</h2>
        <!-- Icon Divider-->
        <div class="divider-custom">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>    
        <div class="row justify-content-center">
            <div class="card col-11 col-md-6">
                <div class="card-header">                        
                    挑選{{ $year->year }}年度的學校
                </div>
                <div class="card-body">
                    <h5 class="card-title">指定的學校將可在當年度上傳網站</h5>
                    <form method="post" action="{{ route('do_assign') }}">
                        @csrf
                        <input type="hidden" name="year_id" value="{{ $year->id }}">
                        <p class="card-text"><span class="text-danger">*</span>指定學校(可多選)</p>
                        <select class="js-example-start js-states form-control" name="schools[]" id="id_label_multiple" multiple="multiple" required></select>                    
                        <br><br>
                        <div style="margin-top: 20px">
                            <a href="{{ route('year') }}" class="btn btn-secondary">返回</a> <button class="btn btn-primary" onclick="if(confirm('您確定送出嗎?')) return true;else return false">送出</button>
                        </div>
                        @include('layouts.errors')    
                    </form>
                </div>
            </div>     
        </div>  
        <hr>
        <div class="row justify-content-center">
            <div class="card col-11 col-md-6">
                <div class="card-header">                        
                    已指定的學校
                </div>
                <div class="card-body">
                    <h5 class="card-title">已指定的學校</h5>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>學校</th>
                                <th>上傳者</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($uploads as $upload)
                            <tr>
                                <td><a href="{{ route('delete_school',$upload->id) }}" class="text-danger" onclick="if(confirm('您確定刪除嗎?已上傳的網站也會刪除喔！！')) return true;else return false"><i class="fas fa-times-circle"></i></a> {{ $upload->school }}</td>
                                <td>
                                    <?php
                                        $sites = \App\Models\Site::where('year_id',$upload->year_id)->where('code',$upload->code)->get();    
                                    ?>
                                    @foreach($sites as $site)
                                    {{ $site->user->name }} 於 {{ $site->created_at }}<br>
                                    上傳 <a href="{{ env('APP_URL').'/'.$site->year->year.'/'.$eng_schools[$site->code].'/'.$site->site_name }}" target="_blank" class="h3 badge bg-success" style="text-decoration:none">{{ $site->site_name }}</a> --------<a href="{{ route('delete_site',$site->id) }}" class="text-danger" onclick="if(confirm('您確定刪這個已上傳的網站嗎？')) return true;else return false"><i class="fas fa-trash-alt"></i></a>
                                    @endforeach
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>     
        </div>   
        <a href="" class="btn btn-danger">刪除整個年度所有資料</a>                          
    </div>
</section>
<script>	
    $(document).ready(function() {
        $('.js-example-start').select2({
            multiple: true,
            tags: true,
            tokenSeparators: [',', '/', ';', ' '],
            createTag: function(params) {
                    return undefined;
            }
        });            
    });        
    $(document).ready(function() {
        // Initialize "states" example
        var $states = $(".js-source-states");
        var statesOptions = $states.html();
         $states.remove();       
        $(".js-states").append(statesOptions);
        });
</script>
<select class="js-source-states">
    <option value="all_school">全部學校</option>
    @foreach(config('app.schools') as $k=>$v)
        <option value="{{ $k }}">{{ $v }}</option>
    @endforeach        
</select>  
@endsection