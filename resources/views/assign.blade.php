@extends('layouts.master')

@section('title','指派上傳')

@section('before_plugin')
<script src="https://www.hdes.chc.edu.tw/js/jquery-3.7.1.min.js"></script>        
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@endsection

@section('content')
    <!-- Portfolio Section-->
    <section class="page-section portfolio" id="portfolio" style="margin-top: 30px">
        <div class="container">
            <!-- Portfolio Section Heading-->
            <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">指派學校上傳網站</h2>
            <!-- Icon Divider-->
            <div class="divider-custom">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>    
            <div class="row justify-content-center">
                <div class="card col-6">
                    <div class="card-header">                        
                        挑選年度及學校
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">指定的學校將可在當年度上傳網站</h5>
                        <p class="card-text"><span class="text-danger">*</span>參加網博的年度(4碼)</p>
                        <form method="post" action="{{ route('do_assign') }}">
                            @csrf
                            <div class="mb-3">                        
                                <input type="text" class="form-control" name="year" placeholder="2024" maxlength="4" required>
                            </div>
                            <p class="card-text"><span class="text-danger">*</span>指定學校(可多選)</p>
                            <select class="js-example-start js-states form-control" name="schools[]" id="id_label_multiple" multiple="multiple" required></select>                    
                            <button class="btn btn-primary" style="margin-top: 20px" onclick="if(confirm('您確定送出嗎?')) return true;else return false">送出</button>
                            @include('layouts.errors')    
                        </form>
                    </div>
                </div>     
            </div>                               
                
            

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
        <optgroup label="Alaskan/Hawaiian Time Zone">
          <option value="AK">Alaska</option>
          <option value="HI">Hawaii</option>
        </optgroup>
        <optgroup label="Pacific Time Zone">
          <option value="CA">California</option>
          <option value="NV">Nevada</option>
          <option value="OR">Oregon</option>
          <option value="WA">Washington</option>
        </optgroup>
        <optgroup label="Mountain Time Zone">
          <option value="AZ">Arizona</option>
          <option value="CO">Colorado</option>
          <option value="ID">Idaho</option>
          <option value="MT">Montana</option>
          <option value="NE">Nebraska</option>
          <option value="NM">New Mexico</option>
          <option value="ND">North Dakota</option>
          <option value="UT">Utah</option>
          <option value="WY">Wyoming</option>
        </optgroup>
        <optgroup label="Central Time Zone">
          <option value="AL">Alabama</option>
          <option value="AR">Arkansas</option>
          <option value="IL">Illinois</option>
          <option value="IA">Iowa</option>
          <option value="KS">Kansas</option>
          <option value="KY">Kentucky</option>
          <option value="LA">Louisiana</option>
          <option value="MN">Minnesota</option>
          <option value="MS">Mississippi</option>
          <option value="MO">Missouri</option>
          <option value="OK">Oklahoma</option>
          <option value="SD">South Dakota</option>
          <option value="TX">Texas</option>
          <option value="TN">Tennessee</option>
          <option value="WI">Wisconsin</option>
        </optgroup>
        <optgroup label="Eastern Time Zone">
          <option value="CT">Connecticut</option>
          <option value="DE">Delaware</option>
          <option value="FL">Florida</option>
          <option value="GA">Georgia</option>
          <option value="IN">Indiana</option>
          <option value="ME">Maine</option>
          <option value="MD">Maryland</option>
          <option value="MA">Massachusetts</option>
          <option value="MI">Michigan</option>
          <option value="NH">New Hampshire</option>
          <option value="NJ">New Jersey</option>
          <option value="NY">New York</option>
          <option value="NC">North Carolina</option>
          <option value="OH">Ohio</option>
          <option value="PA">Pennsylvania</option>
          <option value="RI">Rhode Island</option>
          <option value="SC">South Carolina</option>
          <option value="VT">Vermont</option>
          <option value="VA">Virginia</option>
          <option value="WV">West Virginia</option>
        </optgroup>
      </select>
@endsection