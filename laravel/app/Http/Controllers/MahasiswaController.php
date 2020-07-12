<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Mahasiswa;

use Validator;

class MahasiswaController extends Controller
{
    public function data_mahasiswa(){
    $halaman = 'data_mahasiswa';
    return view('mahasiswa/data_mahasiswa', compact('halaman'));
}

    public function lihat_data_mahasiswa(){
        $halaman = 'lihat_data_mahasiswa';
        $mahasiswa_list = Mahasiswa::orderBy('nim', 'asc')->Paginate(3);
        $jumlah_mahasiswa = Mahasiswa::count();
        return view('mahasiswa/lihat_data_mahasiswa', compact('halaman', 'mahasiswa_list', 'jumlah_mahasiswa'));
    }

    public function lihat_data_mahasiswa2(){
        $mahasiswa = ['Budiaman',
                        'Maryono',
                        'Dina',
                        'Rusli'];
        return view('mahasiswa/lihat_data_mahasiswa2')->with('mahasiswa',$mahasiswa);
    }

    public function input_mahasiswa(){
        $halaman = 'input_mahasiswa';
        return view('mahasiswa/input_mahasiswa', compact('halaman'));
    }

    // public function store(Request $request){
    //     $mahasiswa2 = $request->all();
    //     return $mahasiswa2;
    // }

    public function store(Request $request){
        $input = $request->all();

        $validator = Validator::make($input,[
            'nim' => 'required|string|size:4|unique:mahasiswa,nim',
            'nama' => 'required|string|max:100',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
        ]);
        if($validator->fails()){
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }
        mahasiswa::create($input);
        return redirect('lihat_data_mahasiswa');
    }

    public function show($id){
        $halaman = 'mahasiswa';
        $mahasiswa = mahasiswa::findOrFail($id);
        return view('mahasiswa.show', compact('halaman', 'mahasiswa'));
    }

    public function create(){
        $halaman = 'create';
        return view('mahasiswa/create', compact('halaman'));
    }

    public function edit($id){
        $mahasiswa = Mahasiswa::findOrFail($id);
        return view('mahasiswa/edit', compact('mahasiswa'));
    }

    public function update($id, Request $request){
        $mahasiswa = Mahasiswa::findOrFail($id);
        $input = $request->all();

        $validator = Validator::make($input,[
            'nim' => 'required|string|size:4|unique:mahasiswa,nim,' . $request->input('id'),
            'nama' => 'required|string|max:100',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
        ]);

        if($validator->fails()){
            return redirect('mahasiswa/'. $id .'/edit')->withInput()
            ->withErrors($validator);
        }
        $mahasiswa->update($request->all());
        return redirect('lihat_data_mahasiswa');
    }

    public function destroy($id){
        $mahasiswa = mahasiswa::findOrFail($id);
        $mahasiswa->delete();
        return redirect('lihat_data_mahasiswa');
    }

    public function cobaCollection(){
        $daftar = ['Budi Pranoto',
                    'Amy Delia',
                    'Cakra Lukman',
                    'Dewi Nova',
                    'Kartini Indah'
                ];
        $collection = collect($daftar)->map(function($nama){
                return ucwords($nama);
    });
    return $collection;

    }

    public function collection_first(){
        $collection = Mahasiswa::all()->first();
        return $collection;
    }

    public function collection_last(){
        $collection = Mahasiswa::all()->last();
        return $collection;
    }

    public function collection_count(){
        $collection = Mahasiswa::all();
        $jumlah = $collection->count();
        return 'Jumlah mahasiswa : '. $jumlah;
    }

    public function collection_take(){
        $collection = Mahasiswa::all()->take(3);
        return $collection;
    }

    public function collection_pluck(){
        $collection = Mahasiswa::all()->pluck('nama');
        return $collection;
    }

    public function collection_where(){
        $collection = Mahasiswa::all()->where('nim', '1001');
        return $collection;
    }

    public function collection_wherein(){
        $collection = Mahasiswa::all()->whereIn('nim', ['1001', '1010', '1011']);
        return $collection;
    }

    public function collection_toarray(){
        $collection = Mahasiswa::select('nim', 'nama')->take(4)->get();
        $koleksi = $collection->toarray();
        foreach($koleksi as $mahasiswa){
            echo $mahasiswa['nim'].' - '.$mahasiswa['nama'].'<br>';
        }
    }

    public function collection_tojson(){
        $data = [
            ['nim' => '1001', 'nama' => 'Lutfiana Khoirunnisa'],
            ['nim' => '1002', 'nama' => 'Wahyuwantika Khoirinina'],
            ['nim' => '1003', 'nama' => 'Dina Ayu Saras Wati'],
            ['nim' => '1004', 'nama' => 'Gavin Pratama'],
        ];
        $collection = collect($data)->tojson();
        return $collection;
    }

    public function date_mutator(){
        $mahasiswa = Mahasiswa::findOrFail(2);
        $nama = $mahasiswa->nama;
        $tanggal_lahir = $mahasiswa->tanggal_lahir->format('d-m-Y');
        $ulang_tahun = $mahasiswa->tanggal_lahir->addYears(25)->format('d-m-Y');
        return "Mahasiswa {$nama} lahir pada {$tanggal_lahir}.<br>Ulang tahun ke-25 akan jatuh pada {$ulang_tahun}.";
    }

}