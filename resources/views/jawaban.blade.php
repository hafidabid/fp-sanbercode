@extends('frontview')

@section('jawabanku')

@php
use App\User;
@endphp
<div class="card-footer card-comments">

                @foreach($listanswer as $li)               
                <div class="card-comment">
                  <!-- User image -->
                  <img class="img-circle img-sm" src="{{asset('adminlteres/dist/img/user3-128x128.jpg')}}" alt="User Image">

                  <div class="comment-text">
                    <span class="username">
                      {{User::find($li->id_user)->name}}
                      <span class="text-muted float-right">{{$li->updated_at}}</span>
                    </span><!-- /.username -->
                    <h5>{{$li->judul}}</h5>
                    {{$li->isi}}
                  </div>
                  <!-- /.comment-text -->
                </div>
                <!-- /.card-comment -->
                @endforeach


              </div>
@endsection