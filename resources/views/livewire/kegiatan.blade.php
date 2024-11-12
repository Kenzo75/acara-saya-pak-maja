<div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-dark text-white">Acara Saya</div>

                    <div class="card-body">
                        <h3>Aplikasi Acara Saya Hari Ini</h3>
                        <hr>
                        <div class="form-group">
                            <label for="kegiatan">Kegiatan</label>
                            <input type="text" id="kegiatan" class="form-control" wire:model='kegiatan'
                                placeholder="Sila Masukan Kegiatan">
                            @error('kegiatan')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        @if ($kegiatan_id)
                            <button class="btn btn-warning mt-3" wire:click='editKegiatan'>Edit Kegiatan</button>
                        @else
                            <button class="btn btn-primary mt-3" wire:click='tambahkegiatan'>Tambah Kegiatan</button>
                        @endif
                        <br>
                        <br>
                        <table class="table table-bordered table_hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kegiatan</th>
                                    <th>Acara</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($acara as $a)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $a->kegiatan }}</td>
                                        <td>
                                            <button class="btn btn-warning"
                                                wire:click='edit({{ $a->id }})'>Edit</button>
                                            <button class="btn btn-danger"
                                                wire:click='hapus({{ $a->id }})'>Hapus</button>
                                            <button wire:click='gantistatus({{ $a->id }}, "BELUM")'
                                                class="btn {{ $a->status == 'BELUM' ? 'btn-success' : 'btn-outline-success' }}">BELUM</button>
                                            <button wire:click='gantistatus({{ $a->id }}, "PROSES")'
                                                class="btn {{ $a->status == 'PROSES' ? 'btn-success' : 'btn-outline-success' }}">PROSES</button>
                                            <button wire:click='gantistatus({{ $a->id }}, "SUDAH")'
                                                class="btn {{ $a->status == 'SUDAH' ? 'btn-success' : 'btn-outline-success' }}">SUDAH</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
