<h1>Surat Izin</h1>

@foreach($suratizinById as $suratizin)
	<p>Nama : {{$suratizin->id_santri}}</p>
	<p>Nama : {{$suratizin->santri->nama}}</p>
	<p>Tgl mulai izin : {{$suratizin->tgl_awal}}</p>
	<p>Tgl mulai izin : {{$suratizin->tgl_akhir}}</p>
	<p>Keterangan : {{$suratizin->kerterangan}}</p>
@endforeach