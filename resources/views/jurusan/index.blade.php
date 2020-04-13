@extends('layouts.adminmain')

@section('content')
<section class="section">
  
  <div class="section-header">
    <h1>Jurusan</h1>
  </div> 

  <div class="section-body">
    <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
          <div class="card-header">
            <form method="GET" action="{{ url ('/jurusan/search')}}" class="form-inline">
              <div class="form-group">
                <input type="text" name="search" class="form-control" placeholder="Search">
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary">Search</button>
              </div>
            </form>
            <a href="{{ route('jurusan.index') }}" class="pull-right">
              <button type="button" class="btn btn-info">All Data</button>
            </a>
          </div>
          <div class="card-header">
            <a href="{{ url('/jurusan/create') }}">
              <button type="button" class="btn btn-primary">Add New</button>
            </a>
            <a href="{{ url('/jurusan/export') }}">
              <button type="button" class="btn btn-success">Export</button>
            </a>
          </div>
          <div class="card-body">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th scope="col">Id</th>
                  <th scope="col">Nama Fakultas</th>
                  <th scope="col">Nama Jurusan</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $nomor=1;?>
               @forelse($data as $key =>$jurusan)
                <tr>
                  <td>{{$data->firstItem()+$key}}</td>
                  <td>
                      @foreach($datafakultas as $fakultas)
                      @if($fakultas->id == $jurusan->fakultas_id)
                      {{ $fakultas->nama_fakultas }}
                      @endif
                      @endforeach
                                </td>

                  <td>{{ $jurusan->nama_jurusan }}</td>
                  <td><a href="{{url('jurusan/'.$jurusan->id.'/edit')}}" class="btn btn-warning btn-sm">EDIT</a>
                    <a href="{{url('jurusan/'.$jurusan->id.'/delete')}}" class="btn btn-danger btn-sm">DELETE</a></td>
                </tr>
               @empty
                <tr>
                  <td colspan="3"><center>Data kosong</center></td>
                </tr>
                @endforelse
              </tbody>
            </table>
            {{$data->links()}}
          </div>
          <div class="card-footer text-right">
            <nav class="d-inline-block">
              
            </nav>
          </div>
        </div>
      </div>  
  </div>

</section>
@endsection()