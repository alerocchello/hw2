

function searchPlayer(event){
    event.preventDefault();
    const player_input = document.querySelector("#player");
    const player_value = encodeURIComponent(player_input.value);
    rest_url = 'https://www.balldontlie.io/api/v1/players?search=' + player_value;
    fetch(rest_url).then(onResponse).then(onJson);
}

function onResponse(response) {
    return response.json();
}

function onJson(json) {
    //Svuoto il div dove spunteranno i giocatori
    const players = document.querySelector('#players-view');
    players.innerHTML = '';
    //Uso il for nel caso ci dovessero essere più giocatori con stesso nome e cognome
    for(let i=0; i<json.data.length; i++){
        const nome = 'Nome: ' + json.data[i].first_name;
        const cognome = 'Cognome: ' + json.data[i].last_name;
        const altezza = 'Altezza: ' + json.data[i].height_feet + ' piedi';
        const posizione = 'Posizione: ' + json.data[i].position;
        const squadra = 'Squadra: ' + json.data[i].team.full_name;
        const girone = 'Girone: ' + json.data[i].team.conference;
        const divisione = 'Divisione: ' + json.data[i].team.division;

        const player = document.createElement('div');
        player.classList.add('player');

        const name = document.createElement('span');
        name.textContent = nome;
        const last_name = document.createElement('span');
        last_name.textContent = cognome;
        const height = document.createElement('span');
        height.textContent = altezza;
        const position = document.createElement('span');
        position.textContent = posizione;
        const team = document.createElement('span');
        team.textContent = squadra;
        const conference = document.createElement('span');
        conference.textContent = girone;
        const division = document.createElement('span');
        division.textContent = divisione;

        player.appendChild(name);
        player.appendChild(last_name);
        player.appendChild(height);
        player.appendChild(position);
        player.appendChild(team);
        player.appendChild(conference);
        player.appendChild(division);

        players.appendChild(player);
    }
}

const search_player = document.querySelector("#search_player");
search_player.addEventListener("submit", searchPlayer);







generateTeams();

function generateTeams(){
    fetch("nba_teams").then(onResponse).then(onNBAJson);
}

function onNBAJson(json) {
    const teams = document.querySelector("#teams")
    teams.innerHTML = "";
    console.log(json);

    for (const team of json) {
        const name = document.createElement("p");
        name.textContent = team;

        teams.appendChild(name);
    }
}