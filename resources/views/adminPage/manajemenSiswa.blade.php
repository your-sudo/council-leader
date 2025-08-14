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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: #f8f9fa;
            padding: 20px;
            line-height: 1.6;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
            font-weight: 600;
            opacity: 0;
            transform: translateY(-20px);
            animation: fadeInDown 0.6s ease forwards;
        }

        .table-container {
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            opacity: 0;
            transform: translateY(20px);
            animation: fadeInUp 0.6s ease 0.2s forwards;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 16px 20px;
            text-align: left;
            border-bottom: 1px solid #eee;
        }

        th {
            background: #f8f9fa;
            font-weight: 600;
            color: #555;
            position: sticky;
            top: 0;
        }

        tr {
            opacity: 0;
            transform: translateX(-10px);
            animation: slideIn 0.4s ease forwards;
            transition: background-color 0.2s ease;
        }

        tr:nth-child(1) { animation-delay: 0.3s; }
        tr:nth-child(2) { animation-delay: 0.4s; }
        tr:nth-child(3) { animation-delay: 0.5s; }
        tr:nth-child(4) { animation-delay: 0.6s; }
        tr:nth-child(5) { animation-delay: 0.7s; }
        tr:nth-child(6) { animation-delay: 0.8s; }
        tr:nth-child(7) { animation-delay: 0.9s; }
        tr:nth-child(8) { animation-delay: 1.0s; }

        tbody tr:hover {
            background: #f8f9fa;
            transform: translateX(2px);
            transition: all 0.2s ease;
        }

        .nis-column {
            font-family: 'Courier New', monospace;
            font-weight: 500;
            color: #666;
        }

        .name-column {
            color: #333;
            font-weight: 500;
        }

        .action-container {
            text-align: center;
            margin-top: 30px;
            opacity: 0;
            animation: fadeIn 0.6s ease 1.2s forwards;
        }

        .remove-btn {
            background: #dc3545;
            color: white;
            border: none;
            padding: 6px 12px;
            border-radius: 4px;
            font-size: 12px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.2s ease;
            text-transform: uppercase;
            letter-spacing: 0.3px;
        }

        .remove-btn:hover {
            background: #c82333;
            transform: translateY(-1px);
            box-shadow: 0 2px 8px rgba(220, 53, 69, 0.3);
        }

        .remove-btn:active {
            transform: translateY(0);
        }

        .action-column {
            text-align: center;
            width: 100px;
        }

        .stats {
            text-align: center;
            margin-top: 20px;
            color: #666;
            font-size: 14px;
            opacity: 0;
            animation: fadeIn 0.6s ease 1.4s forwards;
        }

        @keyframes fadeInDown {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideIn {
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes fadeIn {
            to {
                opacity: 1;
            }
        }

        @media (max-width: 600px) {
            .container {
                padding: 0 10px;
            }
            
            th, td {
                padding: 12px 16px;
            }
            
            h1 {
                font-size: 24px;
            }
        }
    </style>
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
                    @foreach ($siswa as $student)
                        <tr>
                            <td class="nis-column">{{ $student->nis }}</td>
                            <td class="name-column">{{ $student->nama }}</td>
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

    <script>
        let students = [
            { nis: "2024001", nama: "Ahmad Pratama" },
            { nis: "2024002", nama: "Siti Nurhaliza" },
            { nis: "2024003", nama: "Budi Santoso" },
            { nis: "2024004", nama: "Dewi Lestari" },
            { nis: "2024005", nama: "Eko Wijaya" },
            { nis: "2024006", nama: "Fitri Maharani" },
            { nis: "2024007", nama: "Gunawan Susilo" },
            { nis: "2024008", nama: "Hani Kartika" }
        ];

        function populateTable() {
            const tableBody = document.getElementById('tableBody');
            const stats = document.getElementById('stats');
            
            tableBody.innerHTML = '';
            
           

            stats.innerHTML = `Total: ${students.length} students registered`;
        }

        function removeStudent(index) {
            const studentName = students[index].nama;
            
            students.splice(index, 1);
            
            populateTable();
            
            console.log(`Removed student: ${studentName}`);
        }

        document.addEventListener('DOMContentLoaded', function() {
            populateTable();
        });
    </script>
</body>
</html>
@endsection