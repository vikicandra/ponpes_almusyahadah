@extends('layouts.admin')

@section('content')
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                <div class="col-lg-12">
                    <br/>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3>
                                Santri
                                <a class="btn btn-primary" href="{{url('admin/santri/addNew')}}" role="button">Tambah Santri</a>
                            </h3>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Nama</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Tgl Lahir</th>
                                            <th>#</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($santri as $santri)
                                            <tr class="gradeA">
                                                <td>{{$santri->id_santri}}</td>
                                                <td>{{$santri->nama}}</td>
                                                <td>{{$santri->jenis_kelamin}}</td>
                                                <td>{{$santri->tgl_lahir}}</td>
                                                <td>
                                                    <a class="btn btn-success" href="{{url('admin/santri/edit/'.$santri->id_santri.'')}}" role="button">Ubah </a>
                                                    <a class="btn btn-danger" href="{{url('admin/santri/delete/'.$santri->id_santri.'')}}" role="button">Hapus </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
    </div>
@endsection