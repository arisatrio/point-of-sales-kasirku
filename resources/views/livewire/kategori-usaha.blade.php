<div>
    <select class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" name="kategori_usaha" id="kategori_usaha">
        <option selected disabled>Pilih Tipe Bisnis</option>
        @foreach($kategori_usaha as $data)
        <option  value="{{ $data->id }}">{{ $data->nama_kategori }}</option>
        @endforeach
    </select>
</div>