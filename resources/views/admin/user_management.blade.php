@extends('template/index')
@section('content')

<div class="content">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active">User Management</li>
                    </ol>
                </div>
                <h4 class="page-title">User Management</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="row  my-2 ">
                        <div class="col-lg-4">
                            <form action="" method="get">
                                <div class=" form-group">
                                    <input type="text" name="search" value="{{Request::input('search')}}"
                                        id="simpleinput" class="form-control"
                                        placeholder="Cari Email, Nama, Role, dll...">
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane show active" id="striped-rows-preview">
                            <div class="table-responsive-sm">
                                <table class="table table-striped table-centered mb-0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>Status</th>
                                            <th>Created At</th>
                                            <th>Created By</th>
                                            <th>Updated At</th>
                                            <th>Updated By</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php  $no = 15 * ( (Request::input('page') != '' ? Request::input('page') : 1) - 1) + 1; ?>
                                        @foreach($data as $datas)
                                        <tr data-row="{{ $no}}">
                                            <td>{{ $no++ }}</td>
                                            <td class="text-bold-500">{{$datas->nama}}</td>
                                            <td>{{$datas->email}}</td>
                                            <td class="text-bold-500">{{$datas->role}}</td>
                                            @if($datas->status == 1)
                                            <td><span class="badge badge-success">Aktif</span></td>
                                            @else
                                            <td><span class="badge badge-danger">Deactive</span></td>
                                            @endif
                                            <td>{{$datas->created_at}}</td>
                                            <td>{{$datas->created_by}}</td>
                                            <td>{{$datas->updated_at}}</td>
                                            <td>{{$datas->updated_by}}</td>
                                            <td>
                                                <a href="{{url('admin/detai_user_management')}}" type="button"
                                                    class="btn btn-success" title="Edit"> <i class="mdi mdi-pencil">
                                                    </i>
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {!! $data->appends(Request::all())->links() !!}
                            </div> <!-- end table-responsive-->
                        </div> <!-- end preview-->


                    </div> <!-- end tab-content-->

                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->

    </div>
    <!-- end row-->



    <!-- end row-->

</div> <!-- End Content -->
@endsection