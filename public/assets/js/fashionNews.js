const apiKey = 'pub_7827326ea968202b2ff65446b447e2669c505'; // Replace with your NewsData.io API key
const apiUrl = `https://newsdata.io/api/1/news?apikey=${apiKey}&category=fashion&language=en`;

fetch(apiUrl)
  .then(res => res.json())
  .then(data => {
    const container = document.getElementById("news-container");

    if (!data.results || data.results.length === 0) {
      document.getElementById("news-error").classList.remove("d-none");
      return;
    }

    data.results.forEach(article => {
      const col = document.createElement("div");
      col.className = "col";
      col.innerHTML = `
        <div class="card news-card h-100 shadow-sm">
          ${article.image_url ? `<img src="${article.image_url}" class="card-img-top" alt="News Image">` : ''}
          <div class="card-body d-flex flex-column">
            <h5 class="card-title">${article.title}</h5>
            <p class="card-text">${article.description || ''}</p>
            <a href="${article.link}" target="_blank" class="btn btn-outline-dark mt-auto">Read More</a>
          </div>
          <div class="card-footer small text-muted">
            ${new Date(article.pubDate).toLocaleDateString()}
          </div>
        </div>
      `;
      container.appendChild(col);
    });
  })
  .catch(err => {
    console.error("News Fetch Error:", err);
    document.getElementById("news-error").classList.remove("d-none");
  });
