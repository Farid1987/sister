<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Note;
use Auth;
class noteController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (Auth::guest()) {
          return view('auth/login2');
        }
        $id_user = Auth::user()->id;
        if (Note::where('id_user', $id_user)->first()==null) {
          $view = Note::where('id_user', $id_user)->orderBy('created_at')->first();
        }else {
          $view = Note::where('id_user', $id_user)->orderBy('created_at')->get();
        }
        // dd($view);
        return view('home',['note'=>$view]);
    }

    public function addNote(Request $request)
    {
      $this->validate($request,[
        'title' => 'required',
        'description' => 'required'
      ]);
      $id_user = Auth::user()->id;
      $insert = new Note;
      $insert->id_user = $id_user;
      $insert->judul = $request->title;
      $insert->deskripsi = $request->description;
      $insert->save();

      return redirect('/home');
    }

    public function deleteNote($id)
    {
      $delete = Note::find($id);
      // dd($delete);
      $delete->delete();
      return redirect('/home');
    }

    public function edit($id)
    {
        dd($id);
        $note = Note::find($id);
        // dd($note);
        return view('home',compact('note'));
    }

    public function newUpdate(Request $request)
    {
        $note = Note::find($request->id);
        $note->judul = $request->title;
        $note->deskripsi = $request->description;
        $note->save();
        return redirect('/home');
    }
}
