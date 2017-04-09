@extends('layouts.app')

@section('content')


  <div class=" main">

    <div class="row">
      <div class="col-lg-12">
        <h2 align="center">My Notes</h2>
      </div>
      <div class="col-md-12 text-center title">
        <h1 class="title-font">My Note</h1>
      </div>
      <div class="col-md-12">
        <div class="pane pane-default">
          <div class="pane-body tabs">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab1" data-toggle="tab">My Notes</a></li>
              <li><a href="#tab2" data-toggle="tab">Add Note</a></li>
            </ul>

            <div class="tab-content">
              <div class="tab-pane fade in active" id="tab1">
                <div class="note">
                  @if ($note!==null)
                    @foreach ($note as $note)
                        <form class="form" action="/delete/{{$note->id}}" method="post">
                          <div class="note-dlm">
                            <div class="kotak">
                              <button type="submit" name="submit"><img src="/{{Config::get('path.images')}}/delete.png" alt=""></button>
                              <a href="" role="button" data-toggle="modal" data-target="#modal_form_vertical"><img src="/{{Config::get('path.images')}}/edit.png" alt=""></a>
                              <h2>{{$note->judul}}</h2>
                              <p>{{$note->deskripsi}}</p>
                              <input type="hidden" name="_method" value="DELETE">
                              {{csrf_field()}}
                            </div>
                          </div>
                        </form>
                    @endforeach
                  @endif

                </div>
              </div>
              <div class="tab-pane add-note fade" id="tab2">
                <div class="form-note">
                  <form class="form-horizontal" role="form" method="POST" action="/addNote">
                      {{ csrf_field() }}

                      <div class="form-group">
                          <label for="name" class="col-md-1 control-label">Title</label>

                          <div class="col-md-7">
                              <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}" required autofocus>

                              {{-- @if ($errors->has('title'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('title') }}</strong>
                                  </span>
                              @endif --}}
                          </div>
                      </div>

                      <div class="form-group">
                          <label for="description" class="col-md-1 control-label">Description</label>

                          <div class="col-md-7">
                              <textarea id="description" class="form-control" name="description" rows="8" cols="80" value="{{ old('description') }}"></textarea>

                              {{-- @if ($errors->has('description'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('description') }}</strong>
                                  </span>
                              @endif --}}
                          </div>
                      </div>

                      <div class="form-group">
                          <div class="col-md-7 col-md-offset-1">
                              <button type="submit" class="btn btn-primary">
                                  Add Note
                              </button>
                              <a href="#" class="btn btn-danger pull-right">Cancel</a>
                          </div>
                      </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div><!--/.panel-->
      </div><!--/.col-->

    </div><!-- /.row -->

  </div><!--/.main-->
@include('noteModal')
@endsection
