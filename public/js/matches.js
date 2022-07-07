// SCHERMATA MATCH
function generateMatches() {
    fetch(MATCHES_ROUTE).then(onResponse).then(onJson);
}

function onResponse(response) {
    if (!response.ok) return null;
    return response.json();
}

function onJson(json) {
    const matches = document.querySelector("#matches") 
    matches.innerHTML = "";

    for (match of json) {

        const divmatch = document.createElement("div");
        divmatch.classList.add("event");

        const id = document.createElement("span");
        id.textContent = match.id;
        id.classList.add("hidden");
        const image = document.createElement("img");
        image.src = match.url_copertina;
        const title = document.createElement("h3");
        title.textContent = match.titolo;
        title.classList.add("title_event");
        const details = document.createElement("p");
        details.textContent = match.dettagli;
        details.classList.add("subtitle_event");

        divmatch.appendChild(id)
        divmatch.appendChild(image);
        divmatch.appendChild(title);
        divmatch.appendChild(details);

        matches.appendChild(divmatch);


        divmatch.addEventListener("click", watchMatch);
    }
}

// SINGOLO MATCH

function watchMatch(event) {
    const id = event.currentTarget.childNodes[0].innerText;
    console.log(id);
    fetch("getMatch/id/"+id).then(onResponse).then(onOneMatchJson);
}

function onOneMatchJson(json) {
    const matches = document.querySelector("#matches") 
    matches.innerHTML = "";
    document.querySelector(".title").innerHTML="";

    const match = document.createElement("div");
    match.classList.add("match");

    const image = document.createElement("img");
    image.src = json.url_copertina;
    const title = document.createElement("h3");
    title.textContent = json.titolo;
    title.classList.add("title");
    const id = document.createElement("span");
    id.textContent = json.id;
    id.classList.add("hidden");

    match.appendChild(title);
    match.appendChild(image);
    match.appendChild(id);
    
    matches.appendChild(match);

    const form = document.querySelector("form");
    form.classList.remove("hidden");
    form.addEventListener('submit', addComment);
    fetch("load_comments/id/"+json.id).then(onResponse).then(onCommentsJson);
}

// VISUALIZZA COMMENTI

function onCommentsJson(json){
    commenti=document.querySelector('#comments');
    commenti.innerHTML='';
    console.log(json);
    
    for (comment of json) {
        div=document.createElement('div');
        div.classList.add('box_comment');
        username=document.createElement('span');
        username.textContent=comment.username_utente + " ";
        username.classList.add('user');
        date = document.createElement('span');
        date.textContent = comment.data;
        date.classList.add('date');
        text=document.createElement('p');
        text.textContent=comment.commento;

        div.appendChild(username);
        div.appendChild(date);
        div.appendChild(text);
        commenti.appendChild(div);
    }
}

// AGGIUNGI COMMENTO

function addComment(event) {
    event.preventDefault();
    const id_match = event.currentTarget.parentNode.childNodes[11].childNodes[0].children[2].innerText; 
    const comment = document.querySelector('#comment').value;
    fetch("/add_comment/id_match/" + id_match + "/comment/" + encodeURIComponent(comment));
    fetch("load_comments/id/"+id_match).then(onResponse).then(onCommentsJson);
}



generateMatches();