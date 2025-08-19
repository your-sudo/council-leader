<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>e‑Voting Pilkosis</title>
  {{-- This is the correct way to pass the CSRF token to JavaScript --}}
  <meta name="csrf-token" content="{{ csrf_token() }}">
  
   @vite('resources/css/dashboard.css')
</head>
<body>

<header>
  <nav>
    <a href="#" class="brand">e-Voting Pilkosis</a>
    <a href="/logout" class="logout-btn">Log Out</a>
  </nav>
</header>

<main>
  <div class="about fade-in" id="about">
    <h2>Tentang Kami</h2>
    <p>
      e‑Voting Pilkosis adalah platform pemilihan Ketua & Wakil Ketua OSIS yang
      dikembangkan oleh <strong>OSSMENZA'58</strong>. Kami menawarkan antarmuka
      yang mudah, aman, dan modern agar siswa dapat memilih dengan cepat dan
      nyaman, lengkap dengan visi & program kandidat yang transparan.
    </p>
  </div>

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
              
              {{-- You can add the program kerja here --}}
              <p><strong>Program Kerja:</strong> {{ $kandidat->proker ?? 'Belum ada data.' }}</p>
            </div>
            {{-- Unified button class for easier selection in JS --}}
            <button class="btn-vote" data-paslonid="{{ $kandidat->id }}">Pilih</button>
          </div>
        </div>
      @empty
        <p>Belum ada kandidat yang terdaftar.</p>
      @endforelse
    </div>
  </section>
  
</main>



<footer>&copy; 2025 — Ciptaan <a href="#">OSSMENZA'58</a></footer>

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


  let sudahvote = @json($user->vote_status === 'sudah');

if (sudahvote === true) {
    $('.btn-vote').prop('disabled', true).text('Sudah Memilih');
}
</script>
@vite(["resources/js/vote.js"])
</body>
</html>