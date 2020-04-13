@extends('layouts.adminmain')

@section('content')
<section class="section">
  
  <div class="section-header">
    <h1>Barang</h1>
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
            <a href="{{ route('barang.index') }}" class="pull-right">
              <button type="button" class="btn btn-info">All Data</button>
            </a>
          </div>
          <div class="card-header">
            <a href="{{ url('/barang/create') }}">
              <button type="button" class="btn btn-primary">Add New</button>
              <a href="{{ url('/barang/export') }}">
              <button type="button" class="btn btn-success">Export</button>
            </a>
            </a>
          </div>
          <div class="card-body">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th scope="col">Id</th>
                  <th scope="col">Nama Ruangan</th>
                  <th scope="col">Nama Barang</th>
                  <th scope="col">Total</th>
                  <th scope="col">Rusak</th>
                  <th scope="col">Dibuat</th>
                  <th scope="col">Diupdate</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
               @forelse($barang as $key =>$b)
                <tr>
                  <td>{{$barang->firstItem()+$key}}</td>
                  <td>{{$b->ruangan->nama_ruangan}}</td>
                  <td>{{$b->nama_barang}}</td>
                  <td>{{ $b->total }}</td>
                  <td>{{ $b->broken }}</td>
                  <td> @foreach($user as $us)
                      @if($us->id == $b->created_by)
                      {{ $us->nama_user }}
                      @endif
                      @endforeach</td>
                  <td> @foreach($user as $us)
                      @if($us->id == $b->updated_by)
                      {{ $us->nama_user }}
                      @endif
                      @endforeach</td>
                  <td><a href="{{url('barang/'.$b->id.'/edit')}}" class="btn btn-warning btn-sm">EDIT</a>
                    <a href="{{url('barang/'.$b->id.'/delete')}}" class="btn btn-danger btn-sm">DELETE</a></td>
                </tr>
               @empty
                <tr>
                  <td colspan="3"><center>Data kosong</center></td>
                </tr>
                @endforelse
              </tbody>
            </table>
            {{$barang->links()}}
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