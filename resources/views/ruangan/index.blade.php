@extends('layouts.adminmain')

@section('content')
<section class="section">
  
  <div class="section-header">
    <h1>Ruangan</h1>
  </div> 

  <div class="section-body">
    <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
          <div class="card-header">
             <form method="GET" class="form-inline">
              <div class="form-group">
                <input type="text" name="search" class="form-control" placeholder="Search" value="{{ request()->get('search') }}">
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary">Search</button>
              </div>
            </form>
            <a href="{{ route('ruangan.index') }}" class="pull-right">
              <button type="button" class="btn btn-info">All Data</button>
            </a>
          </div>
          <div class="card-header">
            <a href="{{ url('/ruangan/create') }}">
              <button type="button" class="btn btn-primary">Add New</button>
            </a>
          </div>
          <div class="card-body">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th scope="col">Id</th>
                  <th scope="col">Id Jurusan</th>
                  <th scope="col">Nama Ruangan</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
               @forelse($ruangan as $key =>$r)
                <tr>
                  <td>{{$ruangan->firstItem()+$key}}</td>
                  <td>
                      @foreach($jurusan as $j)
                      @if($j->id == $r->id_jurusan)
                      {{ $j->nama_jurusan }}
                      @endif
                      @endforeach
                                </td>

                  <td>{{ $r->nama_ruangan }}</td>
                  <td><a href="{{url('ruangan/'.$r->id.'/edit')}}" class="btn btn-warning btn-sm">EDIT</a>
                    <a href="{{url('ruangan/'.$r->id.'/delete')}}" class="btn btn-danger btn-sm">DELETE</a></td>
                </tr>
               @empty
                <tr>
                  <td colspan="3"><center>Data kosong</center></td>
                </tr>
                @endforelse
              </tbody>
            </table>
            {{$ruangan->links()}}
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