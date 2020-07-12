<?php


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'PagesController@welcome');

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('home', function(){
    return view('home');
});

Route::get('data_mahasiswa', 'MahasiswaController@data_mahasiswa');

// Route::get('data_mahasiswa', function(){
//     $halaman = 'data_mahasiswa';
//     return view('mahasiswa/data_mahasiswa', compact('halaman'));
// });


Route::get('lihat_data_mahasiswa', 'MahasiswaController@lihat_data_mahasiswa');

// Route::get('lihat_data_mahasiswa', function(){
//     $halaman = 'lihat_data_mahasiswa';
//     $mahasiswa = ['Budiman',
//     'Mardiyono',
//     'Dina',
//     'Rusli'];
//     return view('mahasiswa/lihat_data_mahasiswa', compact('halaman','mahasiswa'));
// });


Route::get('lihat_data_mahasiswa2', 'MahasiswaController@lihat_data_mahasiswa2');

// Route::get('lihat_data_mahasiswa2', function(){
//     $mahasiswa = ['Budiman',
//     'Mardiyono',
//     'Dina',
//     'Rusli'];
//     return view('mahasiswa/lihat_data_mahasiswa2')->with('mahasiswa',$mahasiswa);
// });

Route::get('input_mahasiswa','MahasiswaController@input_mahasiswa');

Route::post('mahasiswa2', 'MahasiswaController@store');

Route::get('simpan_data', function(){
    DB::table('mahasiswa')->insert([
        [
            'nim' => '1001',
            'nama' => 'Lutfiana Khoirunnisa',
            'tanggal_lahir' => '2000-05-20',
            'jenis_kelamin' => 'P'
        ],
        [
            'nim' => '1002',
            'nama' => 'Wahyuwantika Khoirinina',
            'tanggal_lahir' => '1999-10-31',
            'jenis_kelamin' => 'P'
        ],
        [
            'nim' => '1003',
            'nama' => 'Dina Ayu Saras Wati',
            'tanggal_lahir' => '2001-12-02',
            'jenis_kelamin' => 'P'
        ],
    ]);
});

Route::get('create', 'MahasiswaController@create');

Route::get('mahasiswa/{mahasiswa}', 'MahasiswaController@show');

Route::post('mahasiswa', 'MahasiswaController@store');

Route::get('mahasiswa/{mahasiswa}/edit', 'MahasiswaController@edit');

Route::patch('mahasiswa/{mahasiswa}', 'MahasiswaController@update');

Route::delete('mahasiswa/{mahasiswa}', 'MahasiswaController@destroy');

Route::get('coba_collection', 'MahasiswaController@cobaCollection');

Route::get('collection_first', 'MahasiswaController@collection_first');

Route::get('collection_last', 'MahasiswaController@collection_last');

Route::get('collection_count', 'MahasiswaController@collection_count');

Route::get('collection_take', 'MahasiswaController@collection_take');

Route::get('collection_pluck', 'MahasiswaController@collection_pluck');

Route::get('collection_where', 'MahasiswaController@collection_where');

Route::get('collection_wherein', 'MahasiswaController@collection_wherein');

Route::get('collection_toarray', 'MahasiswaController@collection_toarray');

Route::get('collection_tojson', 'MahasiswaController@collection_tojson');

Route::get('date_mutator','MahasiswaController@date_mutator');