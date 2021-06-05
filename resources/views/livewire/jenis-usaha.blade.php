<div>
    <x-jet-label for="jenis_usaha" value="{{ __('Jenis Usaha') }}" />
    <select class="form-control" name="jenis_usaha" wire:model.defer="state.jenis_usaha" autocomplete="jenis_usaha">
        <option disabled>--Pilih Jenis Usaha--</option>
        @foreach ($data as $item)
        <option value="{{ $item->id }}">{{ $item->kategori_usaha }}</option>
        @endforeach
    </select>
</div>
