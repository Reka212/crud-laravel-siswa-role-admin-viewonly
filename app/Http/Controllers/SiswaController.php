<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    // READ
	
    public function index(Request $request)
		{
			$keyword = $request->keyword;

			$siswa = Siswa::when($keyword, function ($query) use ($keyword) {
					$query->where('nama', 'like', "%{$keyword}%")
						  ->orWhere('alamat', 'like', "%{$keyword}%")
						  ->orWhere('no_hp', 'like', "%{$keyword}%");
				})
				->orderBy('id', 'desc')
				->paginate(5)
				->withQueryString()  
				->onEachSide(1);

			return view('siswa.index', compact('siswa', 'keyword'));
		}


    // FORM TAMBAH
    public function create()
    {
        return view('siswa.create');
    }

    // SIMPAN DATA (CREATE)
    public function store(Request $request)
    {
       $request->validate([
        'nama'   => 'required|min:3',
        'alamat' => 'required',
        'no_hp'  => 'required|numeric'
		]);

		Siswa::create([
        'nama'   => $request->nama,
        'alamat' => $request->alamat,
        'no_hp'  => $request->no_hp,
    ]);

   return redirect('/siswa')->with('success', 'Data siswa berhasil disimpan');

    }
	public function edit($id)
	{
		$siswa = Siswa::findOrFail($id);
		return view('siswa.edit', compact('siswa'));
	}
	 public function update(Request $request, $id)
    {
        $request->validate([
            'nama'   => 'required|min:3',
            'alamat' => 'required',
            'no_hp'  => 'required|numeric'
        ]);

        $siswa = Siswa::findOrFail($id);

        $siswa->update([
            'nama'   => $request->nama,
            'alamat' => $request->alamat,
            'no_hp'  => $request->no_hp,
        ]);

        return redirect('/siswa')
               ->with('success', 'Data siswa berhasil diupdate');
    }
	
	

	public function destroy($id)
	{
		$siswa = Siswa::findOrFail($id);
		$siswa->delete();
		return redirect()->route('siswa.index')
			->with('success', 'Data siswa berhasil dihapus');
	}

}
