function onResponse(response) {
    if (!response.ok) return null;
    return response.json();
}

// NEWS

function generateNews() {
    fetch(NEWS_ROUTE).then(onResponse).then(onNewsJson);
}

function onNewsJson(json) {
    const all_news = document.querySelector("#news") 
    all_news.innerHTML = "";

    for (let i=0; i<3; i++) {

        const divnews = document.createElement("div");
        divnews.classList.add("news");
        const divimg = document.createElement("div");
        divimg.classList.add("image");

        const image = document.createElement("img");
        image.src = json[i].url_copertina;
        const title = document.createElement("h3");
        title.textContent = json[i].titolo;
        const content = document.createElement("p");
        content.textContent = json[i].contenuto;
        content.classList.add("hidden");

        divimg.appendChild(image);

        divnews.appendChild(divimg);
        divnews.appendChild(title);
        divnews.appendChild(content);

        all_news.appendChild(divnews);


        divnews.addEventListener("click", seeContent);

    }
    
}

function seeContent(event) {

    const all_news = document.querySelector("#news") 
    all_news.innerHTML = "";
    const all_events = document.querySelector("#events") 
    all_events.innerHTML = "";
    const spotify = document.querySelector("#spotify") 
    spotify.innerHTML = "";
    const buttons2 = document.querySelector("#buttons2");
    buttons2.innerHTML = "";
    const second = document.querySelector("#second");
    second.innerHTML = "";
    const logo_spotify = document.querySelector("#logo_spotify");
    logo_spotify.classList.add("hidden");

    let div =event.path[2];
    div.lastChild.classList.remove("hidden");

    event.currentTarget.removeEventListener("click", seeContent);
    event.currentTarget.style.width = '60%';

    all_news.appendChild(div);

}

// MATCHES

function generateMatches() {
    fetch(MATCHES_ROUTE).then(onResponse).then(onMatchesJson);
}

function onMatchesJson(json) {
    const matches = document.querySelector("#events");
    matches.innerHTML = "";

    for (let i=0; i<3; i++) {

        const divmatch = document.createElement("div");
        divmatch.classList.add("event");

        const image = document.createElement("img");
        image.src = json[i].url_copertina;
        const title = document.createElement("h3");
        title.textContent = json[i].titolo;
        title.classList.add("title_event");
        const details = document.createElement("p");
        details.textContent = json[i].dettagli;
        details.classList.add("subtitle_event");

        divmatch.appendChild(image);
        divmatch.appendChild(title);
        divmatch.appendChild(details);

        matches.appendChild(divmatch);
    }
}

// SPOTIFY 

function searchMusic(event){
    event.preventDefault();
    const song_input = document.querySelector('#album');
    console.log(song_input);
    const song_value = encodeURIComponent(song_input.value);
    console.log(song_value);
    fetch("spotify/song/"+song_value).then(onResponse).then(onSongJson);
}

function onSongJson(json)
{
    const library = document.querySelector('#album-view');
    library.innerHTML='';
    const results = json.tracks.items;
    let n_results = results.length;
    if(n_results > 5)
        n_results = 5;

    for(let i=0; i<n_results; i++)
    {
        const album_data = results[i];
        const title = album_data.name;
        const img = album_data.album.images[0].url;

        const album = document.createElement('div');
        album.classList.add('album');
        const copertina = document.createElement('img');
        copertina.src = img;
        const titolo = document.createElement('span');
        titolo.textContent = title;

        album.appendChild(copertina);
        album.appendChild(titolo);

        library.appendChild(album);
    }

}

const search_album = document.querySelector("#spotify");
search_album.addEventListener("submit", searchMusic);

generateNews();

generateMatches();