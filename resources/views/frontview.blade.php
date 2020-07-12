@extends('master')

@section('judul')
Daftar Pertanyaan dan jawaban
@endsection

@section('button1')
<a href="{{url('/pertanyaan/create')}}"><button type="button" class="btn btn-block btn-info btn-sm">New Question</button></a>
@endsection
@section('tabel')
<div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <!-- Post -->
                    @foreach ($listask as $li)
                    <div class="post">
                      <div class="">
                        <span class="username">
                          <a href="/pertanyaan/{{$li->id}}">{{$li->judul}}</a>
                          <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                        </span>
                        <br>
                        <span class="description">Question By - {{$li->penulis}}</span><br>
                        <span class="description">Shared publicly - {{$li->updated_at}}</span>
                        
                        <br><br>
                      </div>
                      <!-- /.user-block -->
                      <p>
                        {!! $li->isi !!}
                      </p>

                      <p>
                      @if(Auth::check())
                      @if(Auth::user()->id==$li->id_user)
                        <a href="/pertanyaan/{{$li->id}}/edit" class="link-black text-sm mr-2"><i class="fas fa-share mr-1"></i> edit</a>
                      @else
                        <a href="#" class="link-black text-sm"><i class="far fa-thumbs-up mr-1"></i> Like</a>
                        <a href="#" class="link-black text-sm"><i class="far fa-thumbs-down mr-1"></i>dislike</a>
                      @endif
                      @endif
                        <span class="float-right">
                          <a href="/jawaban/{{$li->id}}" class="text-sm">
                            <i class="far fa-comments mr-1"></i> Lihat jawaban ({{$li->jmlh_jawaban}})
                          </a>
                        </span>
                      </p>

                      <button type="button" class="btn btn-block btn-info btn-sm" data-toggle="modal" data-target="#modal-default"> Add New Answer</button>
                      <div class="modal fade" id="modal-default">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">give answer for {{$li->judul}}</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form role="form" action="/jawaban/{{$li->id}}" method="post">
                              {{csrf_field()}}
                              <div class="form-group">
                                <label>Judul</label>
                                <input type="text" class="form-control" placeholder="Enter ..." id="judul" name="judul">
                              </div>
                              <div class="form-group">
                                <label>isi</label>
                                <textarea class="form-control" rows="3" placeholder="Enter ..." id="isi" name="isi"></textarea>
                              </div>
                            </div>
                            <div class="modal-footer justify-content-between">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-primary">apply answer</button>
                              </form>
                            </div>
                          </div>
                          <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                      </div>
                      <!-- /.modal -->
      </div>
                    <br>
                    <script>
                      $('#document').ready(function(){
                        $('#isi').summernote({
                          height: 150,
                        })
                      })
                    </script>

                    @yield('jawabanku')
                    </div>
                    <!-- /.post -->
                    @endforeach
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
@endsection