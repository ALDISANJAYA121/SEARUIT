@extends('layout_admin')

@section('content')
<p class="font-semibold mb-4 text-center text-lg">Tambah Aplikasi Baru</p>
<form action="/tambah" enctype="multipart/form-data" method="post">
    @csrf
    <div class="grid grid-cols-2 gap-x-4">
        <div>
            <label for="nama">Nama Aplikasi</label>
            <input type="text" name="nama" class="w-full px-4 py-2 border border-[#CEABA5] rounded-lg focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-300">
        </div>
        <div>
            <label className="block mb-2 font-medium">Pengguna</label>
            <select id="pengguna" name="pengguna" class="block w-full px-4 py-2 border border-[#CEABA5] bg-white rounded-lg shadow-sm focus:outline-none focus:ring-1 focus:ring-blue-300 focus:border-blue-500">
                <option value="" disabled selected>Pilih Pengguna</option>
                <option value="BPS Selindo">BPS Selindo</option>
                <option value="BPS Se-Lampung">BPS Se-Lampung</option>
                <option value="BPS Provinsi Saja">BPS Provinsi Saja</option>
                <option value="BPS satker kako pembuat saja">BPS satker kako pembuat saja</option>
            </select>
        </div>
    </div>
    <div class="grid grid-cols-2 gap-x-4">
        <div class="mt-4">
            <label className="block mb-2 font-medium">Akses</label>
            <select id="akses" name="akses" class="block w-full px-4 py-2 border border-[#CEABA5] bg-white rounded-lg shadow-sm focus:outline-none focus:ring-1 focus:ring-blue-300 focus:border-blue-500">
                <option value="" disabled selected>Pilih Akses</option>
                <option value="publik">Publik</option>
                <option value="vpn">VPN</option>
            </select>
        </div>
        <div class="mt-4">
            <label className="block mb-2 font-medium">Pengembang</label>
            <select id="pembuat" name="pembuat" class="block w-full px-4 py-2 border border-[#CEABA5] bg-white rounded-lg shadow-sm focus:outline-none focus:ring-1 focus:ring-blue-300 focus:border-blue-500">
                <option value="" disabled selected>Pilih Kabupaten/Kota</option>
                <option value="BPS RI">BPS RI</option>
                <option value="BPS Provinsi Lampung">BPS Provinsi Lampung</option>
                <option value="Lampung Timur">BPS Lampung Timur</option>
                <option value="Lampung Barat">BPS Lampung Barat</option>
                <option value="Lampung Selatan">BPS Lampung Selatan</option>
                <option value="Lampung Tengah">BPS Lampung Tengah</option>
                <option value="Lampung Utara">BPS Lampung Utara</option>
                <option value="Kota Metro">BPS Kota Metro</option>
                <option value="Kota Bandar Lampung">BPS Kota Bandar Lampung</option>
                <option value="Tulang Bawang">BPS Tulang Bawang</option>
                <option value="Tulang Bawang Barat">BPS Tulang Bawang Barat</option>
                <option value="Pesisir Barat">BPS Pesisir Barat</option>
                <option value="Pringsewu">BPS Pringsewu</option>
                <option value="Tanggamus">BPS Tanggamus</option>
                <option value="Way Kanan">BPS Way Kanan</option>
                <option value="Pesawaran">BPS Pesawaran</option>
                <option value="Mesuji">BPS Mesuji</option>
            </select>
        </div>
    </div>
    <div class="mt-4">
        <label for="link">Link Aplikasi</label>
        <input type="text" name="link" class="w-full px-4 py-2 border border-[#CEABA5] rounded-lg focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-300">
    </div>
    <div class="mt-4">
        <label for="deskripsi">Deskripsi Aplikasi</label>
        <textarea name="deskripsi" id="" class="w-full px-4 py-2 border border-[#CEABA5] rounded-lg focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-300" rows="3"></textarea>
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