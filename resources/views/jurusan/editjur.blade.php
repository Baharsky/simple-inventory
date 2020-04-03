@extends('layouts.adminmain')

@section('content')
<section class="section">
  
  <div class="section-header">
    <h1>
      Jurusan <small>Edit Data</small>
    </h1>
  </div>

  <div class="section-body">
    <div class="col-12 col-md-6 col-lg-6">
        <div class="card">
          <div class="card-header">
            <a href="{{ url('jurusan') }}"> 
              <button type="button" class="btn btn-outline-info">
                <i class="fas fa-arrow-circle-left"></i> Back
              </button>
          </a>
          </div>
          <div class="card-body">
            <form action="{{url('jurusan/'.$jurusan->id.'/update')}}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                <input type="text" class="form-control" name="id" id="id" placeholder="Masukan Nama Fakultas" value="{{ $jurusan->id }}" hidden>
              </div>
              <div class="form-group">
                <label>Nama Fakultas</label>
                <select class="form-control" id="fakultas_id" name="fakultas_id">
                  <option value="" hidden>Select Fakultas</option>
                  @foreach($datafakultas as $fak)
                  <option value="{{ $fak->id }}" {{ ($jurusan->fakultas_id == $fak->id) ? 'selected' : ''}} >{{ $fak->nama_fakultas }}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label>Nama Jurusan</label>
                <input type="text" name="nama_jurusan" class="form-control" value="{{ $jurusan->nama_jurusan }}">
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