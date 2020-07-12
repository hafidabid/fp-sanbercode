@extends('master')

@section('judul')
edit pertanyaan
@endsection

@section('button1')
<a href="{{url('/pertanyaan/')}}"><button type="button" class="btn btn-block btn-danger btn-sm">Back to front</button></a>
@endsection

@section('tabel')
<div class="card-body">
                
                <form role="form" action="/pertanyaan/{{$pertanyaanku->id}}" method="post">
                {{csrf_field()}}
                @method('PUT')
                  <div class="row">
                    <div class="col-sm-12">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Judul</label>
                        <input type="text" class="form-control" placeholder="Enter ..." id ="judul" name="judul" value="{{$pertanyaanku->judul}}">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12">
                      <!-- textarea -->
                      <div class="form-group">
                        <label>isi</label>
                        <textarea class="form-control" rows="3" placeholder="Enter ..." id="isi" name="isi">{{$pertanyaanku->isi}}</textarea>
                      </div>
                    </div>
                  </div>

                  <!-- input states -->
                    <div class="row">
                    <div class="col-sm-6">                    
                    <button type="submit" class="btn btn-block btn-primary btn-flat">Submit</button> </div>
                    <div class="col-sm-6">
                    <button type="reset" class="btn btn-block btn-danger btn-flat">Cancel</button>
                    </div>
                    </div>
                  </div>
                </form>
              </div>
@endsection