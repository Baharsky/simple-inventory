@extends('layouts.adminmain')

@section('content')
<section class="section">
  
  <div class="section-header">
    <h1>Fakultas</h1>
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
            <a href="{{ route('fakultas.index') }}" class="pull-right">
              <button type="button" class="btn btn-info">All Data</button>
            </a>
          </div>
          <div class="card-header">
            <a href="{{ url('/fakultas/create') }}">
              <button type="button" class="btn btn-primary">Add New</button>
              <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Import</button>
            </a>
          </div>

          

          <div class="card-body">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Name</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $nomor=1;?>
               @forelse($data as $key =>$fakultas)
                <tr>
                  <td>{{$data->firstItem()+$key}}</td>
                  <td>{{ $fakultas->nama_fakultas }}</td>
                  <td><a href="{{url('fakultas/'.$fakultas->id.'/edit')}}" class="btn btn-warning btn-sm">EDIT</a>
                    <a href="{{url('fakultas/'.$fakultas->id.'/delete')}}" class="btn btn-danger btn-sm">DELETE</a></td>
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

<!-- IMPORT Modal -->
 <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
     <div class="modal-content">
        <form method="post" action="{{ url('fakultas/import') }}" autocomplete="off" enctype="multipart/form-data">
         @csrf
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Import Data Fakultas</h5>
          </div>
            <div class="modal-body">
              <div class="form-group">
                <label>File Excel</label><br>
                <input type="file" name="excel" id="excel" accept=".xlsx" required>
              </div>
            </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary" type="submit">Submit</button>
                </div>
        </form>
       </div>
    </div>
 </div>