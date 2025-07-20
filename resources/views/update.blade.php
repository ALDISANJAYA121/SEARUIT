@extends('layout_admin')

@section('content')
<p class="font-semibold mb-4 text-center text-lg">Tambah Aplikasi Baru</p>
<form action="/update/{{ $apps->id }}" enctype="multipart/form-data" method="post">
    @csrf
    @method('PUT')
    <div class="grid grid-cols-2 gap-x-4">
        <div>
            <label for="nama">Nama Aplikasi</label>
            <input type="text" name="nama" value="{{ $apps->nama }}" class="w-full px-4 py-2 border border-[#CEABA5] rounded-lg focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-300">
        </div>
        <div>
            <label className="block mb-2 font-medium">Pengguna</label>
            <select id="pengguna" name="pengguna" class="block w-full px-4 py-2 border border-[#CEABA5] bg-white rounded-lg shadow-sm focus:outline-none focus:ring-1 focus:ring-blue-300 focus:border-blue-500">
                <option value="" disabled selected>Pilih Pengguna</option>
                <option value="BPS Selindo" {{ $apps->pengguna =="BPS Selindo" ? "selected" : "" }}>BPS Selindo</option>
                <option value="BPS Se-Lampung" {{ $apps->pengguna =="BPS Se-Lampung" ? "selected" : "" }}>BPS Se-Lampung</option>
                <option value="BPS Provinsi Saja" {{ $apps->pengguna =="BPS Provinsi Saja" ? "selected" : "" }}>BPS Provinsi Saja</option>
                <option value="BPS satker kako pembuat saja" {{ $apps->pengguna =="BPS satker kako pembuat saja" ? "selected" : "" }}>BPS satker kako pembuat saja</option>
            </select>
        </div>
    </div>
    <div class="grid grid-cols-2 gap-x-4">
        <div class="mt-4">
            <label className="block mb-2 font-medium">Akses</label>
            <select id="akses" name="akses" class="block w-full px-4 py-2 border border-[#CEABA5] bg-white rounded-lg shadow-sm focus:outline-none focus:ring-1 focus:ring-blue-300 focus:border-blue-500">
                <option value="" disabled selected>Pilih Akses</option>
                <option value="publik" {{ $apps->akses == "publik" ? "selected" : "" }}>Publik</option>
                <option value="vpn" {{ $apps->akses == "vpn" ? "selected" : "" }}>VPN</option>
            </select>
        </div>
        <div class="mt-4">
            <label className="block mb-2 font-medium">Pengembang</label>
            <select id="pembuat" name="pembuat" class="block w-full px-4 py-2 border border-[#CEABA5] bg-white rounded-lg shadow-sm focus:outline-none focus:ring-1 focus:ring-blue-300 focus:border-blue-500">
                <option value="" disabled selected>Pilih Kabupaten/Kota</option>
                <option value="BPS RI" {{ $apps->pembuat =="BPS RI" ? "selected" : "" }}>BPS RI</option>
                <option value="BPS Provinsi Lampung" {{ $apps->pembuat =="BPS Provinsi Lampung" ? "selected" : "" }}>BPS Provinsi Lampung</option>
                <option value="Kota Metro" {{ $apps->pembuat =="BPS Kota Metro" ? "selected" : "" }}>BPS Kota Metro</option>
                <option value="Kota Bandar Lampung?" {{ $apps->pembuat == "Lampung Barat Daya" ? "selected" : "" }}>BPS Lampung Barat Daya</option>
                <option value="Lampung Timur" {{ $apps->pembuat == "Lampung Timur" ? "selected" : "" }}>BPS Lampung Timur</option>
                <option value="Lampung Utara" {{ $apps->pembuat == "Lampung Utara" ? "selected" : "" }}>BPS Lampung Utara</option>
                <option value="Lampung Selatan" {{ $apps->pembuat == "Lampung Selatan" ? "selected" : "" }}>BPS Lampung Selatan</option>
                <option value="Lampung Barat" {{ $apps->pembuat == "Lampung Barat" ? "selected" : "" }}>BPS Lampung Barat</option>
                <option value="Lampung Tengah" {{ $apps->pembuat == "Lampung Tengah" ? "selected" : "" }}>BPS Lampung Tengah</option>
                <option value="Pesisir Barat" {{ $apps->pembuat == "Pesisir Barat" ? "selected" : "" }}>BPS Pesisir Barat</option>
                <option value="Tulang Bawang" {{ $apps->pembuat == "Tulang Bawang" ? "selected" : "" }}>BPS Tulang Bawang</option>
                <option value="Tulang Bawang Barat" {{ $apps->pembuat == "Tulang Bawang Barat" ? "selected" : "" }}>BPS Tulang Bawang Barat</option>
                <option value="Tanggamus" {{ $apps->pembuat == "Tanggamus" ? "selected" : "" }}>BPS Tanggamus</option>
                <option value="Way Kanan" {{ $apps->pembuat == "Way Kanan" ? "selected" : "" }}>BPS Way Kanan</option>
                <option value="Mesuji" {{ $apps->pembuat == "Mesuji" ? "selected" : "" }}>BPS Mesuji</option>
                <option value="Pesisir Barat" {{ $apps->pembuat == "Pesisir Barat" ? "selected" : "" }}>BPS Pesisir Barat</option>
                <option value="Pringsewu" {{ $apps->pembuat == "Pringsewu" ? "selected" : "" }}>BPS Pringsewu</option>
            </select>
        </div>
    </div>
    <div class="mt-4">
        <label for="link">Link Aplikasi</label>
        <input type="text" value="{{ $apps->link }}" name="link" class="w-full px-4 py-2 border border-[#CEABA5] rounded-lg focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-300">
    </div>
    <div class="mt-4">
        <label for="deskripsi">Deskripsi Aplikasi</label>
        <textarea name="deskripsi" id="" class="w-full px-4 py-2 border border-[#CEABA5] rounded-lg focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-300" rows="3">
        {{ $apps->deskripsi }}
        </textarea>
    </div>
    <div class="mt-4">
        <label for="logo">Logo Aplikasi</label>
        <input type="file" name="logo" class="w-full px-4 py-2 border border-[#CEABA5] rounded-lg focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-300">
        @error('logo')
        <p class="text-red-600 text-sm">{{ $message }}</p>
        @enderror
    </div>
    <button type="submit" class="w-full bg-blue-500 rounded-lg mt-4 py-2 text-white">Submit</button>
</form>
@endsection