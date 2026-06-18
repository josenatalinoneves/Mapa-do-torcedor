// Busca os locais do banco de dados
fetch('http://localhost/mapa-do-torcedor/api/locais.php')
  .then(response => response.json())
  .then(locais => {
    const container = document.querySelector('.places');
    container.innerHTML = '';

    locais.forEach(local => {
      container.innerHTML += `
        <a href="detalheLocal.html" class="place-card">
          <img src="https://images.unsplash.com/photo-1552566626-52f8b828add9?w=500" alt="${local.nome}" />
          <div class="card-content">
            <h3>${local.nome}</h3>
            <div class="info">
              <span>📍 ${local.endereco}</span>
            </div>
            <div class="info">
              <span>${local.tipo} • ${local.torcida_predominante}</span>
            </div>
          </div>
        </a>
      `;
    });
  });