@extends('dashboard_admin/baseJadwal')
@section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Daftar Pengajuan Jadwal Tutor</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
            <div class="card-body table-responsive-m"  style="overflow-x:auto;" >             
              <strong>INFO!</strong>Tombol <strong>DIPILIH TUTOR</strong> pada status, jika jadwal tutor sudah diterima dari pihak pengelola.
              <table class="table table-bordered table-striped table-responsive-md" id="datakaryawan"> 
              <thead class="thead-dark"> 
              <tr class="table-secondary" style="text-align:center; text-transform: uppercase">
                        <th>No.</th>
                        <th>Nama Tutor</th>
                        <th>Nama Siswa</th>
                        <th>Program</th>
                        <th>Kelas</th>
                        <th>Mata Pelajaran</th>
                        <th>Sesi 1</th>
                        <th>Sesi 2</th>
                        <th>Sesi 3</th>
                        <th>Status</th>
                        <th>Aksi</th>

                    </tr>
                </thead>
                <tbody>
                    @php $no = 1; @endphp
                    @foreach($data as $d)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $d->tutor->name }}</td>
                        <td>{{ $d->jadwal->name }}</td>
                        <td>{{ $d->program }}</td>
                        <td>{{ $d->kelas }}</td>
                        <td>{{ $d->mata_pelajaran }}</td>
                        <td>{{ $d->hari1 }}, PUKUL {{ $d->waktu_hari1 }}</td>
                        <td>{{ $d->hari2 }}, PUKUL {{ $d->waktu_hari2 }}</td>
                        <td>{{ $d->hari3 }}, PUKUL {{ $d->waktu_hari3 }}</td>
                        <td>
                        {{ $d->status }}
                        </td>
                        <form action="{{ route('pendaftaranSiswa.update', $d->id) }}" method="post" enctype="multipart/form-data">
                          {{ csrf_field() }}
                          {{ method_field('PUT') }}
                        <td>
                        <input type="text" class="form-control" id="nama_tutor" name="nama_tutor" style="display:none" value="{{ $d->nama_tutor }}">
                        <input type="text" class="form-control" id="tutor_id" name="tutor_id" style="display:none" value="{{ $d->tutor_id }}">
                        <button type="submit" value="AKTIF" id="status" name="status" class=" btn btn-sm btn-success"><i class="fas fa-check"></i>
                        </button>
                        </td>
                        
                        </form>
                    </tr>
                    @endforeach
                </tbody>
          </table>
              </div>
            </div>

            
          </div>
          <!-- /.col-md-6 -->
          
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @endsection
  @section('sweet')
  <script>
         $(document).ready( function () {
           $('#datakaryawan').DataTable();
           });
      </script>
  @endsection