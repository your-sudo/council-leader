@extends('layouts.main')

@section('title', 'Edit Kandidat')

@section('content')
    <header class="header">
        <div style="display: flex; align-items: center; gap: 1rem;">
            <button class="menu-toggle"
                    id="menuToggle">
                <i class="fas fa-bars"></i>
            </button>
            <h1 class="header-title">Manajemen Siswa</h1>
        </div>
    </header>
@vite('resources/css/siswa.css')
<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa</title> -->
    
</head>
<body>
    <div class="container">
        <h1>Data Siswa</h1>
        
        <div class="table-container">
            <table id="studentTable">
                <thead>
                    
                    <tr>
                        <th>NIS</th>
                        <th>Nama</th>
                        <th>Action</th>
                    </tr>
                    
              
                    
                </thead>
                <tbody id="tableBody">
                    @foreach ($sisw lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa</title> -->
    
</head>
<body>
    <div class="container">
        <h1>Data Siswa</h1>
        
        <div class="tabla as $siswa)
                        <tr>
                            <td class="nis-column">{{ $siswa->nis }}</td>
                            <td class="name-column">{{ $siswa->nama }}</td>
                            <td class="action-column">
                                <button class="remove-btn" >Remove</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <p>{{ $siswa->count() }} siswa terdaftar</p>
        



        <div class="stats" id="stats">
        </div>
    </div>

 
        
</body>
</html>
@endsection