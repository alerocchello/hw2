//  VISUALIZZA TUTTE LE NEWS
function generateNews() {
    fetch(NEWS_ROUTE).then(onResponse).then(onJson);
}

function onResponse(response) {
    if (!response.ok) return null;
    return response.json();
}

function onJson(json) {
    const all_news = document.querySelector("#news") 
    all_news.innerHTML = "";

    for (news of json) {

        const divnews = document.createElement("div");
        divnews.classList.add("news");
        const divimg = document.createElement("div");
        divimg.classList.add("image");

        const id = document.createElement("span");
        id.textContent = news.id;
        id.classList.add("hidden");
        const image = document.createElement("img");
        image.src = news.url_copertina;
        const title = document.createElement("h3");
        title.textContent = news.titolo;

        divimg.appendChild(image);

        divnews.appendChild(divimg);
        divnews.appendChild(title);
        divnews.appendChild(id);

        all_news.appendChild(divnews);


        divnews.addEventListener("click", seeContent);

    }
    
}

//  VISUALIZZA LA SINGOLA NEWS

function seeContent(event) {
    const id = event.currentTarget.childNodes[2].innerText;
    fetch("getOneNews/id/"+id).then(onResponse).then(onOneNewsJson);
}

function onOneNewsJson(json) {
    const all_news = document.querySelector("#news") 
    all_news.innerHTML = "";
    document.querySelector(".title").innerHTML="";

    const news = document.createElement("div");
    news.classList.add("one_news");

    const image = document.createElement("img");
    image.src = json.url_copertina;
    const title = document.createElement("h3");
    title.textContent = json.titolo;
    const content = document.createElement("p");
    content.textContent = json.contenuto;

    news.appendChild(image);
    news.appendChild(title);
    news.appendChild(content);

    all_news.appendChild(news);
}


generateNews();