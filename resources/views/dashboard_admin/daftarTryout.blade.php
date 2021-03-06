@extends('dashboard_admin/base')
@section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 id="div1" name="div1" class="m-0 text-dark">Daftar Tryout</h1>
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
              <div class="card-body">
             <form action="{{route('tambahTryout')}}"> <button class=" btn btn-md btn-success" style="float:right">Tambah Tryout</button></form>
              <br>
              <br>
              <table class="table table-bordered table-striped table-responsive-md" id="siswa"> 
              <thead class="thead-dark">
                <tr class="table-secondary" style="text-align:center; text-transform: uppercase">
                        <th>No.</th>
                        <th>Nama Tryout</th>
                        <th>Jumlah Soal</th>
                        <th>Kategori</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                      
                    @php $no = 1; @endphp
                    @foreach($data as $d)
                    <tr>   
                        <td>{{ $no++ }}</td>
                        <td>{{ $d->nama }}</td>
                        <td>{{ $d->jumlah_soal }}</td>
                        <td>{{ $d->kategori }}</td>
                        <td>
                            <form action="{{ route('tryout.destroy', $d->id) }}" method="post" class="destroy">
                            <a type="button" class="btn btn-success" href="{{route('tryout.edit',$d->id)}}">Lihat Soal</a>
                            <a type="button" class="btn btn-primary" href="{{route('tryout.edit',$d->id)}}">Edit</a>
                              {{ csrf_field() }}
                              {{ method_field('DELETE') }}       
                            <button type="submit" class="btn btn-md btn-danger" style="color:white">Hapus</button>
                            </form>
                        </td>
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
    </div>
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  
  <script
      src="https://code.jquery.com/jquery-3.4.1.min.js"
      integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
      crossorigin="anonymous"></script>
  @endsection
  @section('sweet')
  <script>
         $(document).ready( function () {
           $('#siswa').DataTable();
           });
      </script>
  @endsection