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
                    <option value="BPS Se-Aceh"  {{ $apps->pengguna =="BPS Se-Aceh" ? "selected" : "" }}>BPS Se-Aceh</option>
                    <option value="BPS Provinsi Saja"  {{ $apps->pengguna =="BPS Provinsi Saja" ? "selected" : "" }}>BPS Provinsi Saja</option>
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
                    <option value="BPS Aceh" {{ $apps->pembuat =="BPS Aceh" ? "selected" : "" }}>BPS Aceh</option>
                    <option value="Aceh Barat" {{ $apps->pembuat =="BPS Se-Aceh" ? "selected" : "" }}>BPS Aceh Barat</option>
                    <option value="Aceh Barat Daya" {{ $apps->pembuat == "Aceh Barat Daya" ? "selected" : "" }}>BPS Aceh Barat Daya</option>
                    <option value="Aceh Besar" {{ $apps->pembuat == "Aceh Besar" ? "selected" : "" }}>BPS Aceh Besar</option>
                    <option value="Aceh Jaya" {{ $apps->pembuat == "Aceh Jaya" ? "selected" : "" }}>BPS Aceh Jaya</option>
                    <option value="Aceh Selatan" {{ $apps->pembuat == "Aceh Selatan" ? "selected" : "" }}>BPS Aceh Selatan</option>
                    <option value="Aceh Singkil" {{ $apps->pembuat == "Aceh Singkil" ? "selected" : "" }}>BPS Aceh Singkil</option>
                    <option value="Aceh Tamiang" {{ $apps->pembuat == "Aceh Tamiang" ? "selected" : "" }}>BPS Aceh Tamiang</option>
                    <option value="Aceh Tengah" {{ $apps->pembuat == "Aceh Tengah" ? "selected" : "" }}>BPS Aceh Tengah</option>
                    <option value="Aceh Tenggara" {{ $apps->pembuat == "Aceh Tenggara" ? "selected" : "" }}>BPS Aceh Tenggara</option>
                    <option value="Aceh Timur" {{ $apps->pembuat == "Aceh Timur" ? "selected" : "" }}>BPS Aceh Timur</option>
                    <option value="Aceh Utara" {{ $apps->pembuat == "Aceh Utara" ? "selected" : "" }}>BPS Aceh Utara</option>
                    <option value="Banda Aceh" {{ $apps->pembuat == "Banda Aceh" ? "selected" : "" }}>BPS Banda Aceh</option>
                    <option value="Bener Meriah" {{ $apps->pembuat == "Bener Meriah" ? "selected" : "" }}>BPS Bener Meriah</option>
                    <option value="Bireuen" {{ $apps->pembuat == "Bireuen" ? "selected" : "" }}>BPS Bireuen</option>
                    <option value="Gayo Lues" {{ $apps->pembuat == "Gayo Lues" ? "selected" : "" }}>BPS Gayo Lues</option>
                    <option value="Langsa" {{ $apps->pembuat == "Langsa" ? "selected" : "" }}>BPS Langsa</option>
                    <option value="Lhokseumawe" {{ $apps->pembuat == "Lhokseumawe" ? "selected" : "" }}>BPS Lhokseumawe</option>
                    <option value="Nagan Raya" {{ $apps->pembuat == "Nagan Raya" ? "selected" : "" }}>BPS Nagan Raya</option>
                    <option value="Pidie" {{ $apps->pembuat == "Pidie" ? "selected" : "" }}>BPS Pidie</option>
                    <option value="Pidie Jaya" {{ $apps->pembuat == "Pidie Jaya" ? "selected" : "" }}>BPS Pidie Jaya</option>
                    <option value="Sabang" {{ $apps->pembuat == "Sabang" ? "selected" : "" }}>BPS Sabang</option>
                    <option value="Simeulue" {{ $apps->pembuat == "Simeulue" ? "selected" : "" }}>BPS Simeulue</option>
                    <option value="Subulussalam" {{ $apps->pembuat == "Subulussalam" ? "selected" : "" }}>BPS Subulussalam</option>
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