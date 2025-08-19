@extends('layouts.main')

@section('title', 'Tambah Kandidat')

@section('content')
    <header class="header">
        <div style="display: flex; align-items: center; gap: 1rem;">
            <button class="menu-toggle"
                    id="menuToggle">
                <i class="fas fa-bars"></i>
            </button>
            <h1 class="header-title">Manajemen Kandidat</h1>
        </div>
        <div style="display: flex; align-items:right; gap: 1rem;">
        <a href="{{ route('tambahkandidat') }}" class="btn-add">
                    <span>Tambah Kandidat</span>
                </a>   
      </div>
    </header>

    <div class="dashboard-content">
          <style>
    :root {
      --primary: #484361;
      --highlight:#EC9F1D;
      --accent: #761B16;
      --dark: #320F09;
      --bg: #f5f2ee;
      --white: #fff;
      --text: var(--dark);
    }
    * { margin:0; padding:0; box-sizing:border-box; }
    body { font-family:'Segoe UI',sans-serif; background:var(--bg); color:var(--text); }
    header { background:var(--primary); color:var(--white); padding:1rem; text-align:center; font-size:1.5rem; }

.btn-add {
    padding: 0.7rem 1rem;
    background: var(--highlight);
    color: var(--dark);
    border: none;
    border-radius: 6px;
    cursor: pointer;
    transition: background 0.3s ease, opacity 0.3s ease;
}

.btn-add:hover {
    background: var(--accent);
    color: var(--white);
}
    .fade-in {
      opacity: 0;
      transform: translateY(20px);
      transition: opacity .6s ease-out, transform .6s ease-out;
    }
    .fade-in.visible {
      opacity:1;
      transform: translateY(0);
    }
    main { max-width:1100px; margin:1rem auto; padding:0 1rem; }
    .about {
      background: var(--white);
      border-radius:10px;
      padding:2rem;
      box-shadow:0 4px 8px rgba(0,0,0,0.08);
      text-align:center;
      margin-bottom:2rem;
    }
    .about h2 { font-size:1.6rem; margin-bottom:1rem; color:var(--accent); }
    .about p {
      font-size:1rem; color:var(--dark);
      max-width:800px;
      margin:auto;
      line-height:1.6;
    }
    section { margin-bottom:2rem; }
    section h2 {
      color:var(--accent);
      border-bottom:2px solid var(--highlight);
      padding-bottom:.4rem;
      margin-bottom:1rem;
    }
    .cards {
      display:grid;
      grid-template-columns:repeat(auto-fit,minmax(240px,1fr));
      gap:1.2rem;
    }
    .card {
      background:var(--white);
      border-radius:10px;
      box-shadow:0 2px 5px rgba(0,0,0,0.08);
      overflow:hidden;
      opacity:0;
      transform: translateY(20px);
      transition: transform .5s ease-out, opacity .5s ease-out, box-shadow .3s ease;
    }
    .card.visible { transform: translateY(0); opacity:1; }
    .card:hover { transform: translateY(-4px); box-shadow:0 6px 12px rgba(0,0,0,0.12); }
    .card .img {
      width:100%;
      padding-bottom:100%;
      background-size:cover;
      background-position:center;
      border-bottom:3px solid var(--highlight);
    }
    .card-body { padding:1rem; display:flex; flex-direction:column; }
    .card-title { font-size:1.1rem; margin-bottom:.5rem; color:var(--primary); }
    .btn-toggle {
      align-self:flex-start;
      margin-top:.5rem;
      background:none;
      border:none;
      color:var(--highlight);
      cursor:pointer;
      transition: color .2s;
    }
    .btn-toggle:hover { color:var(--accent); }
    .details {
      margin-top:.5rem;
      display:none; /* Initially hidden */
      font-size:.9rem;
      color:var(--accent);
    }
.btn-edit,
.btn-delete {
    display: inline-block; /* biar berdampingan */
    margin: 0.3rem 0.1rem 0.3rem 0; /* jarak antar tombol lebih rapat */
    padding: 0.7rem 1rem;
    background: var(--highlight);
    color: var(--dark);
    border: none;
    border-radius: 6px;
    cursor: pointer;
    transition: background 0.3s ease, opacity 0.3s ease;
    text-align: center;
}

.btn-edit:hover,
.btn-delete:hover {
    background: var(--accent);
    color: var(--white);
}

.btn-edit:disabled,
.btn-delete:disabled {
    background: #ccc;
    color: #666;
    cursor: not-allowed;
    opacity: 0.7;
}



    footer {
      background:var(--primary);
      color:var(--white);
      text-align:center;
      padding:1rem;
      font-size:.9rem;
      margin-top:2rem;
    }
    footer a {
      color:var(--highlight);
      text-decoration:none;
      position:relative;
    }
    footer a::after {
      content:''; position:absolute; left:0; bottom:-2px;
      width:100%; height:2px;
      background:var(--highlight);
      transform:scaleX(0);
      transform-origin:left;
      transition:transform .3s ease;
    }
    footer a:hover::after { transform:scaleX(1); }
  </style>
        <section class="fade-in" id="paslon">
    <h2>Pasangan Calon</h2>
    <div class="cards">
      @forelse ($paslon as $kandidat)
        <div class="card">
          <div class="img" style="background-image: url('{{ asset("storage/" . $kandidat->foto) }}');"></div>
          <div class="card-body">
            <div class="card-title">{{ $kandidat->nama }}</div>
            <button class="btn-toggle">Lihat Visi/Misi & Proker</button>
            <div class="details">
              <p><strong>Visi:</strong> {{ $kandidat->visi }}</p>
              <p><strong>Misi:</strong> {{ $kandidat->misi }}</p>
              <p><strong>Program Kerja:</strong> {{ $kandidat->proker ?? 'Belum ada data.' }}</p>
            </div>
            <table border="0">
                <tr>
                    <td>
                <a  class="btn-edit" data-paslonid="{{ $kandidat->id }}" href="{{ route('editKandidat', $kandidat->id) }}">Edit</a>
                </td>
                <td>
               <a  class="btn-edit" data-paslonid="{{ $kandidat->id }}" href="{{ route('hapusKandidat', $kandidat->id) }}">Hapus</a>                </td>
            </tr>
            </table>
            
          </div>
        </div>
      @empty
        <p>Belum ada kandidat yang terdaftar.</p>
      @endforelse
    </div>
  </section>
    </div>
    <script>
  document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.fade-in').forEach((el, i) => {
      setTimeout(() => el.classList.add('visible'), i * 200);
    });
    document.querySelectorAll('.card').forEach((c, i) => {
      setTimeout(() => c.classList.add('visible'), 400 + i * 120);
    });

    document.querySelectorAll('.btn-toggle').forEach(btn => {
      btn.addEventListener('click', () => {
        const details = btn.nextElementSibling;
        const isVisible = details.style.display === 'block';
        
        details.style.display = isVisible ? 'none' : 'block';
        btn.textContent = isVisible ? 'Lihat Visi/Misi & Proker' : 'Sembunyikan Detail';
      });
    });
  });
</script>
@endsection