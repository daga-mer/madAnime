const base_url = "https://api.jikan.moe/v3";


function searchAnime(event) {

    event.preventDefault();

    const form = new FormData(this);
    const query = form.get("search");

    fetch(`${base_url}/search/anime?q=${query}&page=1`)
        .then(res => res.json())
        .then(updateDom)
        .catch(err => console.warn(err.message));
}

function updateDom(data) {

    const searchResults = document.getElementById('search-results');

    const animeByCategories = data.results
        .reduce((acc, anime) => {

            const { type } = anime;
            if (acc[type] === undefined) acc[type] = [];
            acc[type].push(anime);
            return acc;

        }, {});

    searchResults.innerHTML = Object.keys(animeByCategories).map(key => {

        const animesHTML = animeByCategories[key]
            .sort((a, b) => a.episodes - b.episodes)
            .map(anime => {
                return `
                    <div id='${anime.title}' class="card">                        
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Listas creadas</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div id="reset" class="modal-body">
                                    <iframe src="./listasUsuarios.php?titulo=${anime.title}&sinopsis=${anime.synopsis}&img=${anime.image_url}" frameborder="0"></iframe>
                                </div>
                            </div>
                        </div>
                        </div>

                        <button style="align-self: flex-end;" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">                        
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16" style='float:right'>
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                </svg>
                        </button>

                        <div class="card-image">
                            <img src="${anime.image_url}">
                        </div>
                        <div class="card-content">
                            <span class="card-title">${anime.title}</span>
                            <p>${anime.synopsis}</p>
                        </div>
                        <div class="card-action">
                            <a href="${anime.url}" target="_blank" >Más información</a>
                        </div>
                    </div>
                `
            }).join("");


        return `
                <section>
                    <h3>${key.toUpperCase()}</h3>
                    <div class="kemicofa-row">${animesHTML}</div>
                </section>
            `
    }).join("");
}

function pageLoaded() {
    const form = document.getElementById('search_form');
    form.addEventListener("submit", searchAnime);
}


window.addEventListener("load", pageLoaded);