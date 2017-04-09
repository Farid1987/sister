@if ($note!==null)
  <!-- Modal -->
    <div class="modal fade" id="modal_form_vertical" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Edit Note</h4>
          </div>
          <div class="modal-body">
            <form method="POST" action="/newUpdate/{{$note->id}}">

                <div class="form-group row">
                    <label for="name" class="col-md-2 control-label">Title</label>

                    <div class="col-md-7">
                        <input id="title" type="text" class="form-control" name="title" value="{{$note->judul}}" required autofocus>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="description" class="col-md-2 control-label">Description</label>

                    <div class="col-md-7">
                        <textarea id="description" class="form-control" name="description" rows="8" cols="80">{{$note->deskripsi}}</textarea>
                        {{-- <input id="description" type="t" class="form-control" name="email" value="{{ old('email') }}" required> --}}
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-7 col-md-offset-2">
                        <button type="submit" class="btn btn-primary" value="Save" id="save">
                            Save
                        </button>
                        <button type="button" class="pull-right btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
                <input type="hidden" name="_method" value="PUT">
                {{csrf_field()}}
            </form>
          </div>
          <div class="modal-footer">


          </div>
        </div>

      </div>
    </div>
@endif
