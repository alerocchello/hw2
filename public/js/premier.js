function classification(){
    fetch("classific_premier").then(onResponse).then(onNBAJson);
}

function onResponse(response) {
    return response.json();
}

function onNBAJson(json) {
    console.log(json);
    console.log(json.table.length);

    const classification = document.querySelector("#classification tbody");
    classification.innerHTML = "";

    for(let i=0; i<json.table.length; i++) {
        const team = json.table[i];

        const row = document.createElement('tr');

        const Pos = document.createElement('td');
        Pos.textContent = team.rank;
        const Logo = document.createElement('td');
        const img = document.createElement('img');
        img.src = team.clubImage;
        const Squadra = document.createElement('td');
        Squadra.textContent = team.clubName;
        const PT = document.createElement('td');
        PT.textContent = team.points;
        const G = document.createElement('td');
        G.textContent = team.matches;
        const V = document.createElement('td');
        V.textContent = team.wins;
        const N = document.createElement('td');
        N.textContent = team.losses;
        const P = document.createElement('td');
        P.textContent = team.draw;
        const GF = document.createElement('td');
        GF.textContent = team.goals;
        const GS = document.createElement('td');
        GS.textContent = team.goalsConceded;
        const DR = document.createElement('td');
        DR.textContent = team.goalDifference;

        Logo.appendChild(img);

        row.appendChild(Pos);
        row.appendChild(Logo);
        row.appendChild(Squadra);
        row.appendChild(PT);
        row.appendChild(G);
        row.appendChild(V);
        row.appendChild(N);
        row.appendChild(P);
        row.appendChild(GF);
        row.appendChild(GS);
        row.appendChild(DR);

        classification.appendChild(row);
        
    }
    
}

classification()