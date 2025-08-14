@extends('layouts.main')

@section('title', 'Tambah Kandidat')

@section('content')
    <header class="header">
        <div style="display: flex; align-items: center; gap: 1rem;">
            <button class="menu-toggle"
                    id="menuToggle">
                <i class="fas fa-bars"></i>
            </button>
            <h1 class="header-title">Tambah Kandidat</h1>
        </div>
    </header>

    <div class="dashboard-content">
        <div class="form-card fade-in">
            <form action="{{ route('tambahkandidat') }}"
            method="POST" 
            enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="nama">Nama Paslon</label>
                    <input type="text"
                           id="nama"
                           name="nama"
                           class="form-control"
                           required>
                </div>
                @vite('resources/css/kandidat.css')
                

                <div class="form-group">
                    <label for="visi">Visi</label>
                    <textarea id="visi"
                              name="visi"
                              class="form-control"
                              rows="3"
                              required></textarea>
                </div>

                <div class="form-group">
                    <label for="misi">Misi</label>
                    <textarea id="misi"
                              name="misi"
                              class="form-control"
                              rows="4"
                              required></textarea>
                </div>

                <div class="form-group">
                    <label for="proker">Program Kerja</label>
                    <textarea id="proker"
                              name="program_kerja"
                              class="form-control"
                              rows="5"
                              required>
                          
                            </textarea>
                </div>

                <div class="form-group">
                    <label for="foto">Foto Kandidat</label>
                    <input type="file"
                           id="foto"
                           name="foto"
                           class="form-control-file"
                           required>
                </div>

                <button type="submit"
                        class="btn-submit">
                    <i class="fas fa-plus-circle"></i> Simpan Kandidat
                </button>
            </form>
        </div>
    </div>
@endsection