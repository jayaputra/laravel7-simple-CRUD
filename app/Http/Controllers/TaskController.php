<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Kontak;
use App\Http\Requests\TambahKontakRequest;

class TaskController extends Controller
{
    public function show(){
    $task = Task::all();
    
    return $task;
        /*return view('post')->with([
            'post' => $task
        ]);*/
    }


    
    public function kontak()
    {
        //$kontaks = Kontak::latest('id')->get();
        $kontaks = Kontak::latest('id')->paginate(5);
        //return $task;
        //return view('kontak')->withKontakas($kontaks);
        return view('kontak', ["kontakas" => $kontaks]);
    }

    public function tambahkontak()
    {
        return view('tambahkontak');
    }

    public function prosestambah(TambahKontakRequest $request)
    {
        //dd($request->all());
        Kontak::create([
            'nama' => $request -> nama,
            'telp' => $request -> telp,
            'alamat' => $request -> alamat
        ]);
        return redirect('/');
    }
    
    public function editkontak(Kontak $kontak)
    {
        //dd($kontak);
        return view('tambahkontak')->withKontak($kontak);
    }

    public function prosesedit(TambahKontakRequest $request, Kontak $kontak)
    {
        //dd($request->all());
        $kontak->update([
            'nama' => $request -> nama,
            'telp' => $request -> telp,
            'alamat' => $request -> alamat
        ]);
        return redirect('/');
    }

    public function hapuskontak(Kontak $kontak)
    {
        $kontak->delete();
        return redirect('/');
    }
}
