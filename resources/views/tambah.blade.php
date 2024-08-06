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
                    <option value="BPS Se-Aceh">BPS Se-Aceh</option>
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
                    <option value="BPS Aceh">BPS Aceh</option>
                    <option value="Aceh Barat">BPS Aceh Barat</option>
                    <option value="Aceh Barat Daya">BPS Aceh Barat Daya</option>
                    <option value="Aceh Besar">BPS Aceh Besar</option>
                    <option value="Aceh Jaya">BPS Aceh Jaya</option>
                    <option value="Aceh Selatan">BPS Aceh Selatan</option>
                    <option value="Aceh Singkil">BPS Aceh Singkil</option>
                    <option value="Aceh Tamiang">BPS Aceh Tamiang</option>
                    <option value="Aceh Tengah">BPS Aceh Tengah</option>
                    <option value="Aceh Tenggara">BPS Aceh Tenggara</option>
                    <option value="Aceh Timur">BPS Aceh Timur</option>
                    <option value="Aceh Utara">BPS Aceh Utara</option>
                    <option value="Banda Aceh">BPS Banda Aceh</option>
                    <option value="Bener Meriah">BPS Bener Meriah</option>
                    <option value="Bireuen">BPS Bireuen</option>
                    <option value="Gayo Lues">BPS Gayo Lues</option>
                    <option value="Langsa">BPS Langsa</option>
                    <option value="Lhokseumawe">BPS Lhokseumawe</option>
                    <option value="Nagan Raya">BPS Nagan Raya</option>
                    <option value="Pidie">BPS Pidie</option>
                    <option value="Pidie Jaya">BPS Pidie Jaya</option>
                    <option value="Sabang">BPS Sabang</option>
                    <option value="Simeulue">BPS Simeulue</option>
                    <option value="Subulussalam">BPS Subulussalam</option>
                </select>
            </div>     
        </div>
        <div class="mt-4">
            <label for="link">Link Aplikasi</label>
            <input type="text" name="link" class="w-full px-4 py-2 border border-[#CEABA5] rounded-lg focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-300">
        </div>
        <div class="mt-4">
            <label for="deskripsi">Deskripsi Aplikasi</label>
            <textarea name="deskripsi" id=""  class="w-full px-4 py-2 border border-[#CEABA5] rounded-lg focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-300" rows="3"></textarea>
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