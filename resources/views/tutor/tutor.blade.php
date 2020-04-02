@extends('tutor/base')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1 class="m-0 text-dark">Manajemen Murid</h1><br>
                <div class="alert alert-info" style="font-size:14px">
                    <strong>INFO!</strong> Berikut data pengajuan dari murid yang mendaftar les.
                    Di kolom Status, silahkan klik tombol <button class="btn btn-sm btn-success"> <i
                            class="fas fa-check"></i> </button> , jika jadwal mengajar Anda sesuai dengan
                    jadwal yang diajukan dan tunggu hingga Pengelola menampilkan jadwal mengajar di halaman Jadwal
                    Mengajar.
                </div>
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
                <div class="card-body table-responsive-sm" style="overflow-x:auto;">
                        <table class="table table-bordered table-striped table-responsive-sm" id="jadwal">
                            <thead class="thead-dark">
                                <tr class="table-secondary" style="text-align:center; text-transform: uppercase">
                                    <th rowspan="2">No.</th>
                                    <th rowspan="2">Nama</th>
                                    <th rowspan="2">Jenis Kelamin</th>
                                    <th rowspan="2">Alamat</th>
                                    <th rowspan="2">Mata Pelajaran</th>
                                    <th colspan="3">Sesi</th>
                                    <th rowspan="2">Aksi</th>
                                </tr>
                                <tr class="table-secondary" style="text-align:center; text-transform: uppercase">
                                    <th>1</th>
                                    <th>2</th>
                                    <th style="border-right:1px solid">3</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    @php $no = 1; @endphp
                                    @foreach($jadwal as $d)

                                    <td>{{ $no++ }}</td>
                                    <td>
                                        {{ $d->nama_murid }}
                                    </td>
                                    <td>
                                        {{ $d->datas->jenis_kelamin }}
                                    </td>
                                    <td>
                                        {{ $d->datas->provinsi }},
                                        {{ $d->datas->kabupaten }},
                                        {{ $d->datas->kecamatan }}
                                    </td>
                                    <td>{{ $d->mata_pelajaran }}</td>
                                    <td>{{ $d->hari1 }} {{ $d->waktu_hari1 }}</td>
                                    <td>{{ $d->hari2 }} {{ $d->waktu_hari2 }}</td>
                                    <td>{{ $d->hari3 }} {{ $d->waktu_hari3 }}</td>
                                    <form action="{{ route('pendaftaranSiswa.update', $d->id) }}" method="post"
                                        enctype="multipart/form-data" id="formStatus" name="formStatus">
                                        {{ csrf_field() }}
                                        {{ method_field('PUT') }}

                                        <input style="display:none" type="text" class="form-control" id="tutor_id"
                                            name="tutor_id" value="{{ Auth::user()->id }}">
                                        <input style="display:none" type="text" class="form-control" id="nama_tutor"
                                            name="nama_tutor" value="{{ Auth::user()->name }}">

                                        <td class="d-flex">
                                                <a class="btn btn-sm btn-warning mr-2" data-toggle="tooltip"
                                                    data-placement="top" title="Detail Jadwal"
                                                    style="color:white" href="{{route('detailJadwal', $d->id)}}"><i
                                                        class="fas fa-calendar-alt"></i></a>
                                                <button value="DIPILIH TUTOR" id="status" name="btnSubmit"
                                                data-toggle="tooltip" data-placement="top" title="Ajukan" type="submit"
                                                class=" btn btn-sm btn-success mr-2 accept"> <i
                                                    class="fas fa-check"></i></button>
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

@endsection
<!-- @section('sweet')
<script>
    $(document).ready(function () {
        $('#jadwal').DataTable();
    });

    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
    </script>
    <script>
           $('.accept').submit(function(e){
            e.preventDefault();
          swal({
            title: 'Apakah anda yakin untuk mengajukan jadwal?',
            text : "Data akan diajukan secara permanen!",
            icon: "warning",
            buttons: {
                    cancel: "Batalkan!",
                    confirm: "Lanjutkan!",
                },
          }).then((result)=> {
              if (result.value){
                   swal(
                       
                   )
                   this.submit();
                }
                else {
                swal("Dibatalkan", "Data masih belum diajukan", "error");
            }
          })
        });
    </script>
    <script>
      var isiPesan = '{{Session::get('success') }}';
      var exist = '{{Session::has('success') }}';
      if(exist){
        swal(
          'Sukses!',
          isiPesan,
          'success'
        )
      }
    </script>


@endsection -->
