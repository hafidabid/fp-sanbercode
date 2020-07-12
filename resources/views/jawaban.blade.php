@extends('frontview')

@section('jawabanku')

@php
    use App\User;
@endphp
<div class="card-footer card-comments">

    @foreach($listanswer as $li)
        <div class="card-comment">
            <!-- User image -->
            <img class="img-circle img-sm"
                src="{{ asset('adminlteres/dist/img/user3-128x128.jpg') }}" alt="User Image">

            <div class="comment-text">
                <span class="username">
                    {{ User::find($li->id_user)->name }}
                    <span class="text-muted float-right">{{ $li->updated_at }}</span>
                </span><!-- /.username -->
                <h5>{{ $li->judul }}</h5>
                {!!$li->isi!!}
            </div>
            <span class="float-right">
                <a href="" data-toggle="modal" data-target="#modal-komentarJawaban" data-id="{{ $li->id }}"
                    class="text-sm mr-2">
                    <i class="fas fa-comment-medical mr-1"></i>Add comment
                </a>
            </span>
            @php
                $usercom = \App\komentar_jawaban::where('id_jawaban', $li->id)->get();;
                // var_dump($usercom);
            @endphp
            <div class=" mt-3 text-sm">
                <ul>
                    @foreach ($usercom as $item)
                        <li><b>{{ User::find($item->id_user)->name }}</b> - {{ $item->isi}}</li>
                    @endforeach                          
                </ul>                        
            </div>

            <!-- /.comment-text -->
        </div>
        <!-- /.card-comment -->
        
    @endforeach
    <div class="modal fade" id="modal-komentarJawaban">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Komentar</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form role="form" action="/pertanyaan/komentarjawab/" method="post">
                        {{ csrf_field() }}
                        <input type="text" name="id_jawaban" id="id_jawaban">
                        <div class="form-group">
                            <label>Komentar</label>
                            <textarea class="form-control" rows="3" placeholder="Enter ..." id="isi"
                                name="isi"></textarea>
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
@endsection