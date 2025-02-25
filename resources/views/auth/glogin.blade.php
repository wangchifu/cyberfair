@extends('layouts.master')

@section('title','系統登入')

@section('content')
        <!-- Contact Section-->
        <section class="page-section" id="contact" style="margin-top: 30px">
            <div class="container">
                <!-- Contact Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">系統登入</h2>
                <!-- Icon Divider-->
                <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- Contact Section Form-->
                <div class="row justify-content-center">
                    <div class="col-lg-8 col-xl-7">
                        <!-- * * * * * * * * * * * * * * *-->
                        <!-- * * SB Forms Contact Form * *-->
                        <!-- * * * * * * * * * * * * * * *-->
                        <!-- This form is pre-integrated with SB Forms.-->
                        <!-- To make this form functional, sign up at-->
                        <!-- https://startbootstrap.com/solution/contact-forms-->
                        <!-- to get an API token!-->
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                              <a class="nav-link active" aria-current="page" href="#">彰化 GSuite 登入</a>
                              <form id="contactForm" data-sb-form-api-token="API_TOKEN" method="post" action="{{ route('gauth') }}">
                                @csrf
                                <!-- Name input-->
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="name" name="username" type="text" placeholder="" data-sb-validations="required" autofocus />
                                    <label for="name">GSuite 帳號</label>
                                    <div class="invalid-feedback" data-sb-feedback="name:required">必填，不須填 @chc.edu.tw</div>
                                </div>                            
                                <!-- Phone number input-->
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="phone" name="password" type="password" placeholder="" data-sb-validations="required" />
                                    <label for="phone">OpenID 密碼</label>
                                    <div class="invalid-feedback" data-sb-feedback="phone:required">同 cloudschool 校務系統密碼</div>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="phone" name="chaptcha" type="text" placeholder="" data-sb-validations="required" />
                                    <label for="chaptcha">驗證碼</label>
                                    <div class="invalid-feedback" data-sb-feedback="captcha:required" required>底下圖片中的數字</div>
                                </div>
                                <div class="form-group position-relative has-icon-left mb-4">
                                    <img src="{{ route('pic') }}" class="img-fluid" id="captcha_img">
                                </div>                           
                                <!-- Submit success message-->
                                <!---->
                                <!-- This is what your users will see when the form-->
                                <!-- has successfully submitted-->
                                <div class="d-none" id="submitSuccessMessage">
                                    <div class="text-center mb-3">
                                        <div class="fw-bolder">Form submission successful!</div>
                                        To activate this form, sign up at
                                        <br />
                                        <a href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
                                    </div>
                                </div>                            
                                <!-- Submit error message-->
                                <!---->
                                <!-- This is what your users will see when there is-->
                                <!-- an error submitting the form-->
                                <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3">Error sending message!</div></div>
                                <!-- Submit Button-->
                                <button class="btn btn-primary" type="submit">登入</button>
                                @include('layouts.errors')
                            </form>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" href="{{ route('sso') }}">彰化縣教育雲端帳號登入</a>
                            </li>
                          </ul>                                                
                    </div>
                </div>
            </div>
        </section>
@endsection
