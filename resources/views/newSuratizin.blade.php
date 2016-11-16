@extends('layouts.admin')

@section('content')

	<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="page-header">Surat Izin</h2>
                        {!!Form::open(array('route' => 'insertSuratizin'))!!}
	                        <div class="form-group">
							  	<div class="form-group">
								{!!Form::label('id_santri', 'Id Santri')!!}
								{!!Form::text('id_santri', '',array('class' => 'form-control', 'id' => 'autocomplete','required' => 'required'))!!}
							</div>
							</div>

							<div class="form-group">
								{!!Form::label('tgl_awal', 'Tanggal Mulai Izin')!!}
								{!!Form::date('tgl_awal', \Carbon\Carbon::now(), array('class' => 'form-control'))!!}
							</div>

							<div class="form-group">
								{!!Form::label('tgl_akhir', 'Tanggal Akhir Izin')!!}
								{!!Form::date('tgl_akhir',  \Carbon\Carbon::now(), array('class' => 'form-control'))!!}
							</div>

							<div class="form-group">
								{!!Form::label('keterangan', 'Keterangan')!!}
								{!!Form::textarea('keterangan', '',array('class' => 'form-control', 'required' => 'required'))!!}
							</div>

							{!!Form::submit('Create', array('class' => 'btn btn-primary'))!!}
							{!!Form::submit('Cancel', array('class' => 'btn btn-success'))!!}

							


							{!!Form::close()!!}



                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

        <?php 
			$id_santri = [];
			foreach ($santri as $santri) {
				$id_santri[] = $santri->nama." (".$santri->id_santri.")";
			} 
		?>

        <script type="text/javascript"> 
			var suratizin = <?php echo json_encode($id_santri); ?>;
			$( "#autocomplete" ).autocomplete({
				source: suratizin
			});
        </script>

@endsection 