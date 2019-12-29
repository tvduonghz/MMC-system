@extends('layouts.backend')
@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Quản lý Chương trình đào tạo</h2>
            <span><a href="{{route('home')}}">Home</a> > Quản lý chương trình đào tạo </span>
        </div>
    </div>
    <div class="wrapper wrapper-content  animated fadeInRight blog">
        @if (Session::has('flash_message'))
            <div class="container col-md-12 error">
                <div class="alert alert-success">
                    {{ Session::get('flash_message') }}
                </div>
            </div>
        @endif
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">Quản lý chương trình đào tạo</div>
                    <div class="card-body">
                        <a href="{{route('educationprogram.create')}}" class="btn btn-primary btn-sm" title="Thêm mới ngành">
                            <i class="fa fa-plus" aria-hidden="true"></i> Thêm mới
                        </a>
                        <a href="{{route('subject.index')}}" class="btn btn-primary btn-sm" title="Quản lý môn học">
                           Quản lý môn học
                        </a>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table" id="education">
                                <thead>
                                <tr>
                                    <th>Ngành</th>
                                    <th>Khóa bắt đầu thực hiện</th>
                                    <th>Tổng số tín chỉ</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($education as $item)
                                    <tr>
                                        <td><a href="{{route('educationprogram.show',$item->id)}}" style="color: gray">{{\App\Http\Controllers\Admin\ClassController::getmajor($item->mmc_majorid)}}</a></td>
                                        <td><a href="{{route('educationprogram.show',$item->id)}}" style="color: gray">{{$item->mmc_course}}</a></td>
                                        <td>{{$item->mmc_total}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="pagination justify-content-center"> {!! $education->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


