
@extends('layouts.master')
@section('content')
    <!-- Left Sidebar Start -->
    <div class="left side-menu">
        <div class="slimscroll-menu" id="remove-scroll">
            <!--- Sidemenu -->
            <div id="sidebar-menu">
                <!-- Left Menu Start -->
                <ul class="metismenu" id="side-menu">
                    <li class="menu-title">Menu</li>
                    <li>
                        <a href="{{ route('home') }}" class="waves-effect">
                            <i class="dripicons-meter"></i><span class="badge badge-info badge-pill float-right"></span> <span> Dashboard </span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="waves-effect mm-active"><i class="dripicons-to-do"></i><span> Pages Maintenance<span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                        <ul class="submenu">
                            <li class="mm-active">
                                <a href="user/management">User Maintenance</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="waves-effect"><i class="dripicons-document"></i><span> Forms </span></a>
                        <ul class="submenu">
                            <li><a href="{{ route('form/information/new') }}">Information Input</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" class="waves-effect  mm-active"><i class="dripicons-list"></i><span> Reporting <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                        <ul class="submenu">
                            <li class="mm-active">
                                <a href="{{ route('form/information/show') }}">Report Form Information</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <!-- Sidebar -left -->
    </div>
    <!-- Left Sidebar End -->
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container-fluid">
                <div class="page-title-box">
                    <div class="row align-items-center ">
                        <div class="col-md-8">
                            <div class="page-title-box">
                                <h4 class="page-title">Dashboard</h4>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item active">User / Management</li>
                                </ol>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="float-right d-none d-md-block app-datepicker">
                                <input type="text" class="form-control" data-date-format="MM dd, yyyy" readonly="readonly" id="datepicker">
                                <i class="mdi mdi-chevron-down mdi-drop"></i>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- message --}}
                {!! Toastr::message() !!}
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="mt-0 header-title">User Mangagement Datatable</h4>
                                </p>
                                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Full Name</th>
                                            <th>Profile</th>
                                            <th>Email Address</th>
                                            <th>Phone Number</th>
                                            <th>Status</th>
                                            <th>Role Name</th>
                                            <th class="text-center">Modify</th>
                                        </tr>    
                                    </thead>

                                    <tbody>
                                    @foreach ($user as $key => $item)
                                        <tr>
                                            <td class="id">{{ ++$key }}</td>
                                            <td class="name">{{ $item->name }}</td>
                                            <td class="name">
                                                <div class="d-flex mr-3 rounded-circle thumb-md">
                                                    <img class="d-flex mr-3 rounded-circle thumb-md" src="{{ URL::to('/images/'. $item->avatar) }}" alt="{{ $item->avatar }}">
                                                </div>
                                            </td>
                                            <td class="email">{{ $item->email }}</td>
                                            <td class="phone_number">{{ $item->phone_number }}</td>
                                            @if($item->status =='Active')
                                            <td class="status"><span class="badge bg-success" style="font-size: 12px;">{{ $item->status }}</span></td>
                                            @endif
                                            @if($item->status =='Disable')
                                            <td class="status"><span class="badge bg-danger" style="font-size: 12px;">{{ $item->status }}</span></td>
                                            @endif
                                            @if($item->status ==null)
                                            <td class="status"><span class="badge bg-danger" style="font-size: 12px;">{{ $item->status }}</span></td>
                                            @endif
                                            @if($item->role_name =='Admin')
                                            <td class="role_name"><span  class="badge bg-success" style="font-size: 12px;">{{ $item->role_name }}</span></td>
                                            @endif
                                            @if($item->role_name =='Super Admin')
                                            <td class="role_name"><span  class="badge bg-info" style="font-size: 12px;">{{ $item->role_name }}</span></td>
                                            @endif
                                            @if($item->role_name =='Normal User')
                                            <td class="role_name"><span  class=" badge bg-warning" style="font-size: 12px;">{{ $item->role_name }}</span></td>
                                            @endif
                                            
                                            <td class="text-center">
                                                <a href="{{ route('user/add/new') }}">
                                                    <i class="fas fa-user-plus" style="font-size: 20px;color:#0e86e7"></i>
                                                </a>
                                                <a href="{{ url('view/detail/'.$item->id) }}">
                                                    <i class="fas fa-edit" style="font-size: 20px;color:#20d4b6"></i>
                                                </a>  
                                                <a href="{{ url('delete_user/'.$item->id) }}" onclick="return confirm('Are you sure to want to delete it?')"><i class="fas fa-trash-alt" style="font-size: 20px;color:#fb4365"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- end col -->
                </div>
                <!-- end page-title -->
            </div>
            <!-- container-fluid -->
        </div>
    </div>
    <!-- content --> 
    <footer class="footer">
        © 2021 Soeng <span class="d-none d-sm-inline-block"> - Crafted with <i class="mdi mdi-heart text-danger"></i> by SoengSouy</span>.
    </footer>
@endsection
