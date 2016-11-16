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
                                Surat Izin
                                <a class="btn btn-primary" href="{{url('admin/suratizin/addNew')}}" role="button">Tambah Surat Izin</a>
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
                                            <th>Tgl mulai</th>
                                            <th>Tgl akhir</th>
                                            <th>Keterangan</th>
                                            <th>#</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($suratizin as $suratizin)
                                            <tr class="gradeA">
                                                <td>{{$suratizin->id_santri}}</td>
                                                <td>{{$suratizin->santri->nama}}</td>
                                                <td>{{$suratizin->tgl_awal}}</td>
                                                <td>{{$suratizin->tgl_akhir}}</td>
                                                <td>{{$suratizin->keterangan}}</td>
                                                <td>
                                                    <a class="btn btn-success" href="{{url('admin/suratizin/print/'.$suratizin->id_surat_izin.'')}}" role="button">Print</a>
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