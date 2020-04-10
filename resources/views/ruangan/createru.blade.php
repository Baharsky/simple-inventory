@extends('layouts.adminmain')

@section('content')
<section class="section">
  
  <div class="section-header">
    <h1>Ruangan<small>Add Data</small></h1>
  </div>

  <div class="section-body">
    <div class="col-12 col-md-6 col-lg-6">
        <div class="card">
          <div class="card-header">
            <a href="{{ url('ruangan') }}"> 
              <button type="button" class="btn btn-outline-info">
                <i class="fas fa-arrow-circle-left"></i> Back
              </button>
          </a>
          </div>
          <div class="card-body">
            <form action="{{ url('/ruangan/store') }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                <label>Nama Jurusan</label>
                  <select class="form-control" id="id_jurusan" name="id_jurusan">
                    <option value="" hidden> -- Pilih Jurusan -- </option>
                      @foreach($jurusan as $j)
                      <option value="{{ $j->id }}">{{ $j->nama_jurusan }}</option>
                      @endforeach
                       </select>
                       </div>
              <div class="form-group">
                <label>Nama Ruangan</label>
                <input type="text" name="nama_ruangan" class="form-control">
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary">SAVE</button>
              </div>
              </form>
          </div>
        </div>
      </div>  
  </div>

</section>
@endsection()