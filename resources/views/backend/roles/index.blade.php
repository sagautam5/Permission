@extends('layouts.master')
@section('title','Roles')
@section('css')
    @parent
    <!-- DataTables -->
    <link href="{{asset('assets/plugins/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/plugins/datatables/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="{{asset('assets/plugins/datatables/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('sidebar')
    @include('layouts.sidebar')
@endsection

@section('page-title','Roles')

@section('content')
    <div class="page-content-wrapper">
        <div class="container">
            @include('common.partials.errors')
            <div class="row">
                <div class="col-12">
                    <div class="card m-b-20">
                        <div class="card-block">

                            <table id="rolesTable" class="table table-bordered">
                                <thead>
                                <tr>
                                    <th> S.N.</th>
                                    <th> Role</th>
                                    <th> Action</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($roles as $role)
                                    <tr>
                                        <th>{{$loop->iteration}}</th>
                                        <th>{{$role->display_name}}</th>
                                        <th>
                                            <a href="{{route('roles.edit',$role->id)}}" class="m-r-15 text-muted" title="Edit"><i class="mdi mdi-pencil font-18"></i></a>
                                            <a href="{{route('roles.delete',$role->id)}}" class="m-l-15 text-muted" title="Delete" onclick="return confirm('Are you sure you would like to delete this role ?');"><i class="mdi mdi-close font-18"></i></a>
                                        </th>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer')
    @include('layouts.footer')
@endsection

@section('javascripts')
    @parent

    <!-- Required datatable js -->
    <script src="{{asset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>
    <!-- Buttons examples -->
    <script src="{{asset('assets/plugins/datatables/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables/jszip.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables/pdfmake.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables/vfs_fonts.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables/buttons.html5.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables/buttons.print.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables/buttons.colVis.min.js')}}"></script>
    <!-- Responsive examples -->
    <script src="{{asset('assets/plugins/datatables/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables/responsive.bootstrap4.min.js')}}"></script>

    <!-- Datatable init js -->
    <script src="{{asset('assets/pages/datatables.init.js')}}"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            $('#rolesTable').DataTable();
        });
    </script>

@endsection

