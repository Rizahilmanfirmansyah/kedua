
@extends('pegawais.layout')
@section('content')
<body>
    <div class="row">
        <div class="col-lg-12 margin-tb mt-3 mb-3">
            <div class="text-center">
                <h2>KELOLA DATA PEGAWAI</h2>
            </div>
            <div class="text-left">
                <a class="btn btn-success" href="{{ route('pegawais.create') }}">Tambah Pegawai</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong><p>{{ $message }}</p></strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    @endif
   
    <div class="container-fluid">
    <table class="table table-striped table-bordered">
        <tr class="d-flex">
            <th class="col-1">No</th>
            <th class="col-5">Foto</th>
            <th class="col-3">Nama</th>
            <th class="col-3">Jabatan</th>
            <th class="col-1">Jenis Kelamin</th>
            <th class="col-5">No ktp</th>
            <th class="col-5">NPWP</th>
            <th class="col-5">NO BPJS Kas</th>
            <th class="col-5">NO KK</th>
            <th class="col-5">Tempat Tanggal Lahir</th>
            <th class="col-5">Alamat KTP</th>
            <th class="col-5">Alamat Domisili</th>
            <th class="col-5">Gaji</th>
            <th class="col-5">Tanggal Gajian</th>
            <th class="col-5">NO REK</th>
            <th class="col-5">BANK</th>
            <th class="col-5">Email</th>
            <th class="col-3">No Hp</th>
            <th class="col-3">Tanggal Awal Masuk</th>
            <th class="col-3">Status</th>
            <th class="col-3">Tanggungan</th>
            <th class="col-3">Awal Masa Kerja</th>
            <th class="col-3">Tanggal Masuk</th>
            <th class="col-3">Berakhir Masa Kerja</th>
            <th class="col-3">Action</th>

        </tr>
        @foreach ($pegawais as $key => $pegawai)
        <tr class="d-flex"> 
            <td class="col-1">{{ $key+1 }}</td>
            <td class="col-5"> <img width="120px" src="{{ url('/data_file/'.$pegawai->foto)}}"> </td>
            <td class="col-3">{{ $pegawai->nama }}</td>
            <td class="col-3">{{ $pegawai->jabatan}}</td>
            <td class="col-1">{{ $pegawai->jk }}</td>
            <td class="col-5">{{ $pegawai->noktp }}</td>
            <td class="col-5">{{ $pegawai->npwp}}</td>
            <td class="col-5">{{ $pegawai->nobpjs }}</td>
            <td class="col-5">{{ $pegawai->nokk }}</td>
            <td class="col-5">{{ $pegawai->ttl }}</td>
            <td class="col-5">{{ $pegawai->alamatktp}}</td>
            <td class="col-5">{{ $pegawai->domisili}}</td>
            <td class="col-5">{{ $pegawai->gaji }}</td>
            <td class="col-5">{{ $pegawai->tanggalgaji }}</td>
            <td class="col-5">{{ $pegawai->norek}}</td>
            <td class="col-5">{{ $pegawai->bank}}</td>
            <td class="col-5">{{ $pegawai->email}}</td>
            <td class="col-3">{{ $pegawai->nohp }}</td>
            <td class="col-3">{{ $pegawai->tanggalawal }}</td>
            <td class="col-3">{{ $pegawai->status}}</td>
            <td class="col-3">{{ $pegawai->tanggungan}}</td>
            <td class="col-3">{{ $pegawai->awalmasuk}}</td>
            <td class="col-3">{{ $pegawai->tanggalmasuk}}</td>
            <td class="col-3">{{ $pegawai->berakhir }}</td>
            <td class="col-3">
                <form action="{{ route('pegawais.destroy',$pegawai->id) }}" method="POST">
 
                    <a class="btn btn-primary" href="{{ route('pegawais.edit',$pegawai->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    </div>
<br>
<br>
<br>
   <!-- <div class="container-fluid">
    <table id="productSizes" class="table table-striped table-bordered">
        <thead>
            <tr class="d-flex">
                <th class="col-1">Size</th>
                <th class="col-3">Bust</th>
                <th class="col-3">Waist</th>
                <th class="col-5">Hips</th>
                <th class="col-3">Waist</th>
                <th class="col-3">Waist</th>
                <th class="col-3">Waist</th>

            </tr>
        </thead>
        <tbody>
            <tr class="d-flex">
                <td class="col-1">6</td>
                <td class="col-3">79 - 81</td>
                <td class="col-3">61 - 63</td>
                <td class="col-5">89 - 91</td>
            </tr>
            <tr class="d-flex">
                <td class="col-1">8</td>
                <td class="col-3">84 - 86</td>
                <td class="col-3">66 - 68</td>
                <td class="col-5">94 - 96</td>
                <td class="col-3">61 - 63</td>
                <td class="col-3">61 - 63</td>
                <td class="col-3">61 - 63</td>
            </tr>
        </tbody>
    </table>
    -->
    <br>
    <br>
   <!-- <form >
        <div class ="row" >
        
            <div class="col-md-3">
                <div class="form-group">
                    <label for="namadepan" class="control-label">Nama Depan</label>
                    <input type="text" class="form-control" id="namadepan" placeholder="Nama Depan">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="namadepan" class="control-label">Nama Belakang</label>
                    <input type="text" class="form-control" id="namadepan" placeholder="Nama Depan">
                </div>
            </div>
        
        </div>
    
        <div class="row">
            <div class="col-md-3">
                <div class = "form-group">
                    <label for = "name">Jenis Kelamin</label>
                    <select class = "form-control">
                        <option>Laki-laki</option>
                        <option>Perempuan</option>
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class = "form-group">
                    <label for = "name">Status</label>
                    <div class="radio">
                        <label><input type="radio" name="optradio">Menikah</label>
                    </div>
                    <div class="radio">
                        <label><input type="radio" name="optradio">Belum Menikah</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="alamatanda" class="control-label">Alamat</label>
                    <input type="email" class="form-control" id="alamatanda" placeholder="Alamat lengkap">
                </div>
                <div class="form-group">
                    <label for="komentaranda" class="control-label">Komentar</label>
                    <textarea class="form-control" id="komentaranda" placeholder="Komentar anda" rows="3"></textarea>
                </div>
                <div class="checkbox">
                    <label><input type="checkbox">Berlangganan</label>
                </div>
                <button type="submit" class="btn btn-primary">Send</button>
            </div>
        </div>
        </form>
    </div>
    </body>
    </html> 
-->
</body>
      
@endsection