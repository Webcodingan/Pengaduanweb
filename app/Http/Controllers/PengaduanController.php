<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengaduan;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Support\Facades\Auth;

class PengaduanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengaduans = Pengaduan::get();
        return view('pengaduan.index', compact('pengaduans'));
    }

    public function pengaduanUser()
    {
        $pengaduans = Pengaduan::where('user_id', Auth::user()->id)->get();
        return view('pengaduan.index', compact('pengaduans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pengaduan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'tgl_pengaduan'=>'required',
            'user_id'=>'required',
            'isi_laporan'=>'required',
            'image'=>'required|mimes:png,jpeg,jpg',
        ],[

            'tgl_pengaduan.required' => 'tanggal harus diisi dengan benar',
            'isi_laporan.required' => 'deskripsi harus diisi terlebih dahulu',
        ]);

        $image = $request->file('image');
        $name =
        time() . '.' . $image->getClientOriginalExtension();
        $destinationPath = public_path('/image');
        $image->move($destinationPath, $name);

        Pengaduan::create([
            'tgl_pengaduan' => $request->get('tgl_pengaduan'),
            'user_id' => $request->get('user_id'),
            'isi_laporan' => $request->get('isi_laporan'),
            'image' => $name
        ]);

        if (Auth::user()->role != 0) {
            return redirect('pengaduan')->with('message', 'Data berhasil diupdate');
        } else {
            return redirect('user/pengaduan')->with('message', 'Data berhasil diupdate');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pengaduan = Pengaduan::find($id);
        return view('pengaduan.detail', compact('pengaduan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pengaduan = Pengaduan::find($id);
        return view('pengaduan.edit', compact('pengaduan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'tgl_pengaduan' => 'required',
            'user_id' => 'required',
            'isi_laporan' => 'required',
            'image' => 'mimes:jpg,jpeg,png',
        ]);

        $pengaduan = Pengaduan::find($id);
        $name = $pengaduan->image;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name =

                time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/image');
            $image->move($destinationPath, $name);
        }

        $pengaduan->tgl_pengaduan = $request->get('tgl_pengaduan');
        $pengaduan->user_id = $request->get('user_id');
        $pengaduan->isi_laporan = $request->get('isi_laporan');
        $pengaduan->image = $name;
        $pengaduan->save();

        return redirect('pengaduan')->with('message', 'Pengaduan berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pengaduan = Pengaduan::find($id);
        $pengaduan->delete();
        return redirect('pengaduan')->with('message', 'Data pengaduan berhasil di hapus');
    }

    public function laporan()
    {
        $pengaduans = Pengaduan::latest()->get();
        return view('pengaduan.laporan', compact('pengaduans'));
    }

    public function pdf()
    {
        $pengaduans = Pengaduan::latest()->get();
        $pdf = PDF::loadview('pengaduan.pdf', compact('pengaduans'));
        return $pdf->download('laporan.pdf');
    }


}
