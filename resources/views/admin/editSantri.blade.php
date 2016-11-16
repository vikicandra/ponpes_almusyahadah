@extends('layouts.admin')

@section('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="page-header">Santri Baru</h2>
						{!!Form::open(array('route' => 'editSantri', 'files' => true, 'method' => 'PUT'))!!}
						@foreach($santri as $santri)
							@if($santri->detailSantri->foto == "")
								<img src="{{asset('img/user-default.png')}}" alt="..." class="img-thumbnail" width="150" height="150">
							@else
								<img src="{{asset('img/'.$santri->detailSantri->foto.'')}}" alt="..." class="img-thumbnail" width="150" height="150">
							@endif
							<div class="form-group">
								{!!Form::label('img', 'Gambar')!!}
								{!!Form::file('img','', array('class' => 'form-control'))!!}
							</div>

							<div class="form-group">
								{!!Form::label('tgl_masuk', 'Tangal Masuk')!!}
								<br>
								<small>Jika lupa tanggal masuk, masukan saja tanggal 1 pada bulan dan tahun pendafaran.</small>
								<br>
								{!!Form::date('tgl_masuk', \Carbon\Carbon::createFromFormat( 'd/m/Y', date('d/m/Y',strtotime($santri->daftar->tgl_masuk))), array('class' => 'form-control'))!!}
							</div>

							<div class="form-group">
								{!!Form::label('nama', 'Nama')!!}
								{!!Form::text('nama', $santri->nama ,array('class' => 'form-control', 'required' => 'required'))!!}
								{!!Form::hidden('id', $santri->id_santri ,array('class' => 'form-control'))!!}
							</div>
							<div class="form-group">
								{!!Form::label('tempat_lahir', 'Tempat Lahir')!!}
								{!!Form::text('tempat_lahir', $santri->tempat_lahir ,array('class' => 'form-control', 'required' => 'required'))!!}
							</div>
							<div class="form-group">
								{!!Form::label('tgl_lahir', 'Tangal Lahir')!!}
								<br>
								{!!Form::date('tgl_lahir', \Carbon\Carbon::createFromFormat( 'd/m/Y', date('d/m/Y',strtotime($santri->tgl_lahir))), array('class' => 'form-control', 'required' => 'required'))!!}
							</div>
							<div class="form-group">
								{!!Form::label('jk', 'Jenis Kelamin')!!}
								<br>
								<label class="radio-inline">
								 	<input type="radio" name="jk" value="L" 
									 	@if($santri->jenis_kelamin == 'L')
									 		{{'checked="checked"'}}
									 	@endif
								 	> Laki-laki
								</label>
								<label class="radio-inline">
								 	<input type="radio" name="jk" value="P"
								 		@if($santri->jenis_kelamin == 'P')
									 		{{'checked="checked"'}}
									 	@endif
								 	> Perempuan
								</label>
							</div>							

							<div class="form-group">
								{!!Form::label('gol_darah', 'Golongan Darah')!!}
								<br>
								<label class="radio-inline">
								 	<input type="radio" name="gol_darah" value="A"
								 		@if($santri->detailSantri->golongan_darah == 'A')
									 		{{'checked="checked"'}}
									 	@endif								 	
									> A
								</label>
								<label class="radio-inline">
								 	<input type="radio" name="gol_darah" value="B"
								 		@if($santri->detailSantri->golongan_darah == 'B')
									 		{{'checked="checked"'}}
									 	@endif
								 	> B
								</label>
								<label class="radio-inline">
								 	<input type="radio" name="gol_darah" value="AB"
								 		@if($santri->detailSantri->golongan_darah == 'AB')
									 		{{'checked="checked"'}}
									 	@endif
								 	> AB
								</label>
								<label class="radio-inline">
								 	<input type="radio" name="gol_darah" value="O"
								 		@if($santri->detailSantri->golongan_darah == 'O')
									 		{{'checked="checked"'}}
									 	@endif
								 	> O
								</label>
							</div>

							<div class="form-group">
								{!!Form::label('alamat', 'Alamat Rumah')!!}
								{!!Form::textarea('alamat', $santri->alamat,array('class' => 'form-control', 'required' => 'required'))!!}
							</div>

							<div class="form-group">
							  	<label for="pendidikan">Pendidikan Sekarang</label>
							  	<select class="form-control" id="pendidikan" name="pendidikan">
							  		<option value="{{$santri->detailSantri->jenjang_pendidikan}}">{{$santri->detailSantri->jenjang_pendidikan}}</option>
								  	@foreach($pendidikan as $pendidikan)
								  		@if($pendidikan != $santri->detailSantri->jenjang_pendidikan)
								  			<option value="{{$pendidikan}}" >{{$pendidikan}}</option>
								  		@endif
								  	@endforeach							  								    
							  	</select>
							</div>	
							<div class="form-group">
								{!!Form::label('tempat_pendidikan', 'Nama Tempat Pendidikan Sekarang')!!}
								{!!Form::text('tempat_pendidikan',$santri->detailSantri->nama_tempat_pendidikan ,array('class' => 'form-control'))!!}
							</div>

							<div class="form-group">
								{!!Form::label('penyakit', 'Penyakit yang diderita')!!}
								{!!Form::textarea('penyakit', $santri->detailSantri->penyakit,array('class' => 'form-control'))!!}
							</div>

							<div class="form-group">
								{!!Form::label('no_telp', 'No Telepon')!!}
								{!!Form::text('no_telp', $santri->detailSantri->no_telpon ,array('class' => 'form-control'))!!}
							</div>		


							<!-- DATA ORTU -->
							<br><br>
							<h3 class="page-header">Data Orang Tua</h3>
							<div class="form-group">
								{!!Form::label('nama_ayah', 'Nama Ayah')!!}
								{!!Form::text('nama_ayah', $santri->orangTua->nama_ayah,array('class' => 'form-control', 'required' => 'required'))!!}
							</div>
							<div class="form-group">
								{!!Form::label('no_ktp_ayah', 'No KTP Ayah')!!}
								{!!Form::number('no_ktp_ayah', $santri->orangTua->no_ktp_ayah,array('class' => 'form-control'))!!}
							</div>
							<div class="form-group">
							  	<label for="pendidikan">Pendidikan Ayah</label>
							  	<select class="form-control" id="pendidikan_ayah" name="pendidikan_ayah">
								    <option value="{{$santri->orangTua->pendidikan_ayah}}" >{{$santri->orangTua->pendidikan_ayah}}</option>
									    @foreach($pendidikanOrtu as $pendidikan)
									    	@if($pendidikan != $santri->orangTua->pendidikan_ayah)
									    		<option value="{{$pendidikan}}" >{{$pendidikan}}</option>
									    	@endif
										@endforeach
							  	</select>
							</div>
							<div class="form-group">
								{!!Form::label('pekerjaan_ayah', 'Pekerjaan Ayah')!!}
								{!!Form::text('pekerjaan_ayah', $santri->orangTua->pekerjaan_ayah ,array('class' => 'form-control'))!!}
							</div>

							<br><br>
							<div class="form-group">
								{!!Form::label('nama_ibu', 'Nama Ibu')!!}
								{!!Form::text('nama_ibu', $santri->orangTua->nama_ibu ,array('class' => 'form-control', 'required' => 'required'))!!}
							</div>
							<div class="form-group">
								{!!Form::label('no_ktp_ibu', 'No KTP Ibu')!!}
								{!!Form::number('no_ktp_ibu', $santri->orangTua->no_ktp_ibu ,array('class' => 'form-control'))!!}
							</div>
							<div class="form-group">
							  	<label for="pendidikan">Pendidikan Ibu</label>
							  	<select class="form-control" id="pendidikan_ibu" name="pendidikan_ibu">
								    <option value="{{$santri->orangTua->pendidikan_ibu}}" >{{$santri->orangTua->pendidikan_ibu}}</option>
									    @foreach($pendidikanOrtu as $pendidikan)
									    	@if($pendidikan != $santri->orangTua->pendidikan_ibu)
									    		<option value="{{$pendidikan}}" >{{$pendidikan}}</option>
									    	@endif
										@endforeach
							  	</select>
							</div>
							<div class="form-group">
								{!!Form::label('pekerjaan_ibu', 'Pekerjaan Ibu')!!}
								{!!Form::text('pekerjaan_ibu', $santri->orangTua->pekerjaan_ayah ,array('class' => 'form-control'))!!}
							</div>


							<br><br>
							<div class="form-group">
								{!!Form::label('penghasilan_ortu', 'Penghasilan Orang Tua')!!}
								{!!Form::number('penghasilan_ortu', $santri->orangTua->penghasilan_ortu,array('class' => 'form-control'))!!}
							</div>
							<div class="form-group">
								{!!Form::label('alamat_ortu', 'Alamat Orang Tua')!!}
								{!!Form::text('alamat_ortu', $santri->orangTua->alamat_ortu,array('class' => 'form-control', 'required' => 'required'))!!}
							</div>

								{!!Form::submit('Update', array('class' => 'btn btn-primary'))!!}
								{!!Form::submit('Cancel', array('class' => 'btn btn-success'))!!}

						@endforeach
							
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