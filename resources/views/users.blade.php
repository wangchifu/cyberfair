@extends('layouts.master')

@section('title','帳號管理')

@section('content')
    <!-- Portfolio Section-->
    <div id="articles"></div>
    <section class="page-section portfolio" id="portfolio" style="margin-top: 30px">
        <div class="container">
            <!-- Portfolio Section Heading-->
            <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">帳號管理</h2>
            <!-- Icon Divider-->
            <div class="divider-custom">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            <div class="row">
                <h5 class="card-title">帳號列表</h5>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>學校</th>
                                <th>帳號</th>
                                <th>職稱</th>
                                <th>姓名</th>
                                <th>動作</th>
                                <th>上次登入</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>
                                    @if($user->admin)
                                    <i class="fas fa-crown text-warning"></i>
                                    @endif
                                    {{ $user->school }}
                                </td>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->title }}</td>
                                <td>@if($user->admin)
                                    <i class="fas fa-user-cog text-primary"></i>
                                    @endif
                                    
                                    {{ $user->name }}
                                </td>
                                <td>
                                    <a href="{{ route('sims.impersonate',$user->id) }}" class="btn btn-secondary btn-sm" onclick="return confirm('確定模擬？')"><i class="fas fa-user-ninja"></i> 模擬登入</a>
                                    @if($user->admin)
                                    <a href="{{ route('ch_admin',$user->id) }}" class="btn btn-warning btn-sm" onclick="if(confirm('您確定要取消此帳號嗎?')) return true;else return false">取消管理者</a>
                                    @else
                                    <a href="{{ route('ch_admin',$user->id) }}" class="btn btn-primary btn-sm" onclick="if(confirm('您確定要設為管理者嗎?')) return true;else return false">設為管理者</a>
                                    @endif
                                    
                                </td>
                                <td class="small">{{ $user->updated_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $users->links() }}
            </div>
        </div>
    </section>
@endsection