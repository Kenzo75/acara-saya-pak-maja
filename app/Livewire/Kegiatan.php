<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Acara;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Kegiatan extends Component
{
    use LivewireAlert;
    public $kegiatan, $kegiatan_id;

    public function gantistatus($id, $ket)
    {
        $status = Acara::find($id);
        $status->status = $ket;
        $status->save();
        $this->alert('info', 'Sukses !', [
            'position' => 'center',
            'timer' => 3000,
            'toast' => false,
            'text' => 'Anda berhasil Mengganti Status',
            'showConfirmButton' => true,
            'onConfirmed' => '',
            'confirmButtonText' => 'Lanjutkan !',
        ]);
    }

    public function editKegiatan()
    {
        $this->validate([
            'kegiatan' => 'required',
        ], [
            'kegiatan.reguired' => 'kolom kegiatan tidak boleh kosong'
        ]);

        $simpan = $this->kegiatan_id;
        $simpan->kegiatan = $this->kegiatan;
        $simpan->save();
        $this->alert('success', 'Sukses !', [
            'position' => 'center',
            'timer' => 3000,
            'toast' => false,
            'text' => 'Anda berhasil Mengubah Kegiatan',
            'showConfirmButton' => true,
            'onConfirmed' => '',
            'confirmButtonText' => 'Lanjutkan !',
        ]);
        $this->reset(['kegiatan', 'kegiatan_id']);
    }

    public function edit($id)
    {
        $this->kegiatan_id = Acara::find($id);
        $this->kegiatan = $this->kegiatan_id->kegiatan;
    }

    public function hapus($id)
    {
        Acara::find($id)->delete();
        $this->alert('warning', 'Sukses !', [
            'position' => 'center',
            'timer' => 3000,
            'toast' => false,
            'text' => 'Anda berhasil Menghapus Kegiatan',
            'showConfirmButton' => true,
            'onConfirmed' => '',
            'confirmButtonText' => 'Lanjutkan !',
        ]);
    }

    public function tambahkegiatan()
    {
        $this->validate([
            'kegiatan' => 'required',
        ], [
            'kegiatan.reguired' => 'kolom kegiatan tidak boleh kosong'
        ]);

        $simpan = new Acara();
        $simpan->kegiatan = $this->kegiatan;
        $simpan->status = 'BELUM';
        $simpan->user_id = auth()->user()->id;
        $simpan->save();
        $this->alert('success', 'Sukses !', [
            'position' => 'center',
            'timer' => 3000,
            'toast' => false,
            'text' => 'Anda berhasil Menambahkan Kegiatan',
            'showConfirmButton' => true,
            'onConfirmed' => '',
            'confirmButtonText' => 'Lanjutkan !',
        ]);
        $this->reset('kegiatan');
    }

    public function render()
    {
        return view('livewire.kegiatan')->with([
            'acara' => Acara::where('user_id', auth()->user()->id)->get()
        ]);
    }
}
