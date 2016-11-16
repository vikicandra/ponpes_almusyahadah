@extends('layouts.admin')

@section('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="page-header">Santri Baru</h2>
						{!!Form::open(array('route' => 'insertSantri', 'files' => true))!!}

							<div class="form-group">
								{!!Form::label('tgl_masuk', 'Tangal Masuk')!!}
								<br>
								<small>Jika lupa tanggal masuk, masukan saja tanggal 1 pada bulan dan tahun pendafaran.</small>
								<br>
								{!!Form::date('tgl_masuk', \Carbon\Carbon::now(), array('class' => 'form-control'))!!}
							</div>

							<div class="form-group">
								{!!Form::label('nama', 'Nama')!!}
								{!!Form::text('nama', '',array('class' => 'form-control', 'required' => 'required'))!!}
							</div>
							<div class="form-group">
								{!!Form::label('tempat_lahir', 'Tempat Lahir')!!}
								{!!Form::text('tempat_lahir', '',array('class' => 'form-control', 'required' => 'required'))!!}
							</div>
							<div class="form-group">
								{!!Form::label('tgl_lahir', 'Tangal Lahir')!!}
								<br>
								{!!Form::date('tgl_lahir', \Carbon\Carbon::now(), array('class' => 'form-control', 'required' => 'required'))!!}
							</div>
							<div class="form-group">
								{!!Form::label('jk', 'Jenis Kelamin')!!}
								<br>
								<label class="radio-inline">
								 	<input type="radio" name="jk" value="L" checked> Laki-laki
								</label>
								<label class="radio-inline">
								 	<input type="radio" name="jk" value="P"> Perempuan
								</label>
							</div>							

							<div class="form-group">
								{!!Form::label('gol_darah', 'Golongan Darah')!!}
								<br>
								<label class="radio-inline">
								 	<input type="radio" name="gol_darah" value="A" checked> A
								</label>
								<label class="radio-inline">
								 	<input type="radio" name="gol_darah" value="B"> B
								</label>
								<label class="radio-inline">
								 	<input type="radio" name="gol_darah" value="AB"> AB
								</label>
								<label class="radio-inline">
								 	<input type="radio" name="gol_darah" value="O"> O
								</label>
							</div>

							<div class="form-group">
								{!!Form::label('alamat', 'Alamat Rumah')!!}
								{!!Form::textarea('alamat', '',array('class' => 'form-control', 'required' => 'required'))!!}
							</div>

							<div class="form-group">
							  	<label for="pendidikan">Pendidikan Sekarang</label>
							  	<select class="form-control" id="pendidikan" name="pendidikan">
								    <option value="SD" >SD</option>
								    <option value="SMP" >SMP</option>
								    <option value="SMA" >SMA</option>
								    <option value="Universitas" >Universitas</option>
								    <option value="Lainnya" >Lainnya</option>
							  	</select>
							</div>	
							<div class="form-group">
								{!!Form::label('tempat_pendidikan', 'Nama Tempat Pendidikan Sekarang')!!}
								{!!Form::text('tempat_pendidikan', '',array('class' => 'form-control'))!!}
							</div>

							<div class="form-group">
								{!!Form::label('penyakit', 'Penyakit yang diderita')!!}
								{!!Form::textarea('penyakit', '',array('class' => 'form-control'))!!}
							</div>

							<div class="form-group">
								{!!Form::label('no_telp', 'No Telepon')!!}
								{!!Form::text('no_telp', '',array('class' => 'form-control'))!!}
							</div>		


							<div class="form-group">
								{!!Form::label('img', 'Gambar')!!}
								{!!Form::file('img','', array('class' => 'form-control'))!!}
							</div>


							<!-- DATA ORTU -->
							<br><br>
							<h3 class="page-header">Data Orang Tua</h3>
							<div class="form-group">
								{!!Form::label('nama_ayah', 'Nama Ayah')!!}
								{!!Form::text('nama_ayah', '',array('class' => 'form-control', 'required' => 'required'))!!}
							</div>
							<div class="form-group">
								{!!Form::label('no_ktp_ayah', 'No KTP Ayah')!!}
								{!!Form::number('no_ktp_ayah', '',array('class' => 'form-control'))!!}
							</div>
							<div class="form-group">
							  	<label for="pendidikan">Pendidikan Ayah</label>
							  	<select class="form-control" id="pendidikan_ayah" name="pendidikan_ayah">
								    <option value="SD" >SD</option>
								    <option value="SMP" >SMP</option>
								    <option value="SMA" >SMA</option>
								    <option value="S1" >S1</option>
								    <option value="S2" >S2</option>
								    <option value="S3" >S3</option>
								    <option value="tidak_bersekolah" >Tidak bersekolah</option>
							  	</select>
							</div>
							<div class="form-group">
								{!!Form::label('pekerjaan_ayah', 'Pekerjaan Ayah')!!}
								{!!Form::text('pekerjaan_ayah', '',array('class' => 'form-control'))!!}
							</div>

							<br><br>
							<div class="form-group">
								{!!Form::label('nama_ibu', 'Nama Ibu')!!}
								{!!Form::text('nama_ibu', '',array('class' => 'form-control', 'required' => 'required', ))!!}
							</div>
							<div class="form-group">
								{!!Form::label('no_ktp_ibu', 'No KTP Ibu')!!}
								{!!Form::number('no_ktp_ibu', '',array('class' => 'form-control'))!!}
							</div>
							<div class="form-group">
							  	<label for="pendidikan">Pendidikan Ibu</label>
							  	<select class="form-control" id="pendidikan_ibu" name="pendidikan_ibu">
								    <option value="SD" >SD</option>
								    <option value="SMP" >SMP</option>
								    <option value="SMA" >SMA</option>
								    <option value="S1" >S1</option>
								    <option value="S2" >S2</option>
								    <option value="S3" >S3</option>
								    <option value="tidak_bersekolah" >Tidak bersekolah</option>
							  	</select>
							</div>
							<div class="form-group">
								{!!Form::label('pekerjaan_ibu', 'Pekerjaan Ibu')!!}
								{!!Form::text('pekerjaan_ibu', '',array('class' => 'form-control'))!!}
							</div>


							<br><br>
							<div class="form-group">
								{!!Form::label('penghasilan_ortu', 'Penghasilan Orang Tua')!!}
								{!!Form::number('penghasilan_ortu', '',array('class' => 'form-control'))!!}
							</div>
							<div class="form-group">
								{!!Form::label('alamat_ortu', 'Alamat Orang Tua')!!}
								{!!Form::text('alamat_ortu', '',array('class' => 'form-control', 'required' => 'required'))!!}
							</div>
							
								{!!Form::submit('Create', array('class' => 'btn btn-primary'))!!}
								{!!Form::submit('Cancel', array('class' => 'btn btn-success'))!!}
							
						{!!Form::close()!!}

						<br><br>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

       
@endsection   