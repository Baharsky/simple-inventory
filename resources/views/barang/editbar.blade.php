@extends('layouts.adminmain')

@section('content')
<section class="section">
  
  <div class="section-header">
    <h1>
      Barang <small>Edit Data</small>
    </h1>
  </div>

  <div class="section-body">
    <div class="col-12 col-md-6 col-lg-6">
        <div class="card">
          <div class="card-header">
            <a href="{{ url('barang') }}"> 
              <button type="button" class="btn btn-outline-info">
                <i class="fas fa-arrow-circle-left"></i> Back
              </button>
          </a>
          </div>
          <div class="card-body">
            <form action="{{url('barang/'.$barang->id.'/update')}}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                <input type="text" class="form-control" name="id" id="id" placeholder="Masukan Nama Barang" value="{{ $barang->id }}" hidden>
              </div>
              <div class="form-group">
                <label>Nama Ruangan</label>
                <select class="form-control" id="id_ruangan" name="id_ruangan">
                  <option value="" hidden>Select Ruangan</option>
                  @foreach($ruangan as $r)
                  <option value="{{ $r->id }}" {{ ($barang->id_ruangan == $r->id) ? 'selected' : ''}} >{{ $r->nama_ruangan }}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label>Nama Barang</label>
                <input type="text" name="nama_barang" class="form-control" value="{{ $barang->nama_barang }}">
              </div>
              <div class="form-group">
                <label>Total</label>
                <input type="text" name="total" class="form-control" value="{{ $barang->total }}">
              </div>
              <div class="form-group">
                <label>Rusak</label>
                <input type="text" name="broken" class="form-control" value="{{ $barang->broken }}">
              </div>
              <div class="form-group">
                <label>Created By</label>
                <input type="text" name="created_by" class="form-control" value="{{ $barang->created_by }}">
              </div>
              <div class="form-group">
                <label>Updated By</label>
                <input type="text" name="updated_by" class="form-control" value="{{ $barang->updated_by }}">
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