@extends('layout_admin')

@section('content')

<h1 class="text-xl font-semibold mb-6 text-center">Daftar Seluruh Aplikasi BPS Se-Lampung</h1>
<div class="mb-6">
  <a href="/tambah" class="bg-blue-500 text-white p-2 rounded-lg text-center">Tambah Aplikasi</a>
</div>
<table id="example" class="w-screen table-auto">
  <thead>
    <tr class="bg-gray-2 text-left border-b bg-neutral-200">
      <th class="py-4 px-4 font-medium text-black xl:pl-11 text-center">
        Nama
      </th>
      <th class="py-4 px-4 font-medium text-black text-center">
        Link
      </th>
      <th class="py-4 px-4 font-medium text-black text-center">
        Deskripsi
      </th>
      <th class="py-4 px-4 font-medium text-black text-center">
        Pengguna
      </th>
      <th class="py-4 px-4 font-medium text-black text-center">
        Pengembang
      </th>
      <th class="py-4 px-4 font-medium text-black text-center">
        Akses
      </th>
      <th class="py-4 px-4 font-medium text-black text-center">
        Hits
      </th>
      <th class="py-4 px-4 font-medium text-black text-center">
        Aksi
      </th>
    </tr>
  </thead>
  <tbody>
    @forelse ($apps as $item)
    <tr>
      <td class="border-b border-[#eee]">
        <p class="text-black">{{ $item->nama }}</p>
      </td>
      <td class="border-b border-[#eee]">
        <p class="text-black">{{ $item->link }}</p>
      </td>
      <td class="border-b border-[#eee]">
        <p class="text-black">{{ $item->deskripsi }}</p>
      </td>
      <td class="border-b border-[#eee]">
        <p class="text-black">{{ $item->pengguna }}</p>
      </td>
      <td class="border-b border-[#eee]">
        <p class="text-black">{{ $item->pembuat }}</p>
      </td>
      <td class="border-b border-[#eee]">
        <p class="text-black">{{ $item->akses }}</p>
      </td>
      <td class="border-b border-[#eee]">
        <p class="text-black">{{ $item->hits }}</p>
      </td>
      <td class="border-b border-[#eee]">
        <div class="cursor-pointer">
          <a href="edit/{{ $item->id }}" class="bg-yellow-500 text-white px-2 text-sm rounded-lg">Ubah</a>
          <form method="post" action="delete/{{ $item->id }}">
            @csrf
            @method("DELETE")
            <button type="submit" class="bg-red-500 text-white px-2 text-sm rounded-lg">Hapus</button>
          </form>
        </div>
      </td>
    </tr>
    @empty

    @endforelse
  </tbody>
</table>
</div>

<link rel="stylesheet" href="/css/jquery.dataTables.min.css">
<script src="/js/jquery.dataTables.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script>
  $(document).ready(function() {
    $('#example').DataTable({
      // Add any customization options here
    });
  });
</script>

@endsection