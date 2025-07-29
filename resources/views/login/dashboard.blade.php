<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>e‑Voting Pilkosis</title>
  <style>
    
    :root {
      --primary: #484361;
      --highlight: #EC9F1D;
      --accent: #761B16;
      --dark: #320F09;
      --bg: #f5f2ee;
      --white: #fff;
      --text: var(--dark);
    }
    * { margin:0; padding:0; box-sizing:border-box; }
    body { font-family:'Segoe UI',sans-serif; background:var(--bg); color:var(--text); }
    header { background:var(--primary); color:var(--white); padding:1rem; text-align:center; font-size:1.5rem; }
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
      display:none;
      font-size:.9rem;
      color:var(--accent);
    }
    .btn-vote {
      margin-top:1rem;
      padding:.7rem;
      background:var(--highlight);
      color:var(--dark);
      border:none;
      border-radius:6px;
      cursor:pointer;
      transition: background .3s ease;
    }
    .btn-vote:hover { background:var(--accent); color:var(--white); }
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
</head>
<body>

<header>e‑Voting Pilkosis</header>
<main>

  <!-- About Us -->
  <div class="about fade-in" id="about">
    <h2>Tentang Kami</h2>
    <p>
      e‑Voting Pilkosis adalah platform pemilihan Ketua & Wakil Ketua OSIS yang
      dikembangkan oleh <strong>OSSMENZA'57</strong>. Kami menawarkan antarmuka
      yang mudah, aman, dan modern agar siswa dapat memilih dengan cepat dan
      nyaman, lengkap dengan visi & program kandidat yang transparan.
    </p>
  </div>

  <!-- Calon Ketua -->
  <section class="fade-in" id="ketua">
    <h2>Calon Ketua OSIS</h2>
    <div class="cards">
      <div class="card"><div class="img" style="background-image:url('https://via.placeholder.com/300?text=Ketua+1');"></div><div class="card-body"><div class="card-title">Ketua 1</div><button class="btn-toggle">Lihat Visi/Misi & Proker</button><div class="details"><p><strong>Visi:</strong> Tingkatkan kreativitas siswa.</p><p><strong>Misi:</strong> Lomba seni tahunan.</p><p><strong>Proker:</strong> Workshop seni & budaya.</p></div><button class="btn-vote">Pilih</button></div></div>
      <div class="card"><div class="img" style="background-image:url('https://via.placeholder.com/300?text=Ketua+2');"></div><div class="card-body"><div class="card-title">Ketua 2</div><button class="btn-toggle">Lihat Visi/Misi & Proker</button><div class="details"><p><strong>Visi:</strong> Sosial & kepedulian.</p><p><strong>Misi:</strong> Baksos rutin.</p><p><strong>Proker:</strong> Program bakti sosial.</p></div><button class="btn-vote">Pilih</button></div></div>
      <div class="card"><div class="img" style="background-image:url('https://via.placeholder.com/300?text=Ketua+3');"></div><div class="card-body"><div class="card-title">Ketua 3</div><button class="btn-toggle">Lihat Visi/Misi & Proker</button><div class="details"><p><strong>Visi:</strong> Inovasi teknologi.</p><p><strong>Misi:</strong> Klub robotik.</p><p><strong>Proker:</strong> Kompetisi robot antar kelas.</p></div><button class="btn-vote">Pilih</button></div></div>
    </div>
  </section>

  <!-- Calon Wakil -->
  <section class="fade-in" id="wakil">
    <h2>Calon Wakil Ketua OSIS</h2>
    <div class="cards">
      <div class="card"><div class="img" style="background-image:url('https://via.placeholder.com/300?text=Wakil+1');"></div><div class="card-body"><div class="card-title">Wakil 1</div><button class="btn-toggle">Lihat Visi/Misi & Proker</button><div class="details"><p><strong>Visi:</strong> Mentoring siswa kuat.</p><p><strong>Misi:</strong> Peer mentoring.</p><p><strong>Proker:</strong> Sesi bimbingan belajar.</p></div><button class="btn-vote">Pilih</button></div></div>
      <div class="card"><div class="img" style="background-image:url('https://via.placeholder.com/300?text=Wakil+2');"></div><div class="card-body"><div class="card-title">Wakil 2</div><button class="btn-toggle">Lihat Visi/Misi & Proker</button><div class="details"><p><strong>Visi:</strong> Kepemimpinan siswa.</p><p><strong>Misi:</strong> Pelatihan rutin.</p><p><strong>Proker:</strong> Diskusi siswa.</p></div><button class="btn-vote">Pilih</button></div></div>
      <div class="card"><div class="img" style="background-image:url('https://via.placeholder.com/300?text=Wakil+3');"></div><div class="card-body"><div class="card-title">Wakil 3</div><button class="btn-toggle">Lihat Visi/Misi & Proker</button><div class="details"><p><strong>Visi:</strong> Literasi sekolah.</p><p><strong>Misi:</strong> Klub jurnalistik.</p><p><strong>Proker:</strong> Pelatihan menulis & jurnal.</p></div><button class="btn-vote">Pilih</button></div></div>
    </div>
  </section>

</main>

<footer>&copy; 2025 — Ciptaan <a href="#">OSSMENZA'57</a></footer>

<script>
  window.addEventListener('load', () => {
    document.querySelectorAll('.fade-in').forEach((el, i) => {
      setTimeout(() => el.classList.add('visible'), i * 200);
    });
    document.querySelectorAll('.card').forEach((c, i) => {
      setTimeout(() => c.classList.add('visible'), 600 + i * 120);
    });
    document.querySelectorAll('.btn-toggle').forEach(btn => {
      btn.addEventListener('click', () => {
        const det = btn.nextElementSibling;
        det.style.display = det.style.display === 'block' ? 'none' : 'block';
        btn.textContent = det.style.display === 'block' ? 'Sembunyikan Details' : 'Lihat Visi/Misi & Proker';
      });
    });
  });
</script>

</body>
</html>
