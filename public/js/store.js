function onResponse(response) {
    if (!response.ok) return null;
    return response.json();
}

function generateProducts(event) {
        event.preventDefault();
        const team_input = document.querySelector("#team");
        fetch(TSHIRT_ROUTE+"/team_name/"+encodeURIComponent(team_input.value)).then(onResponse).then(onJson);
    }


function onJson(json) {
    const store = document.querySelector("#divstore") 
    store.innerHTML = "";

    for (const product of json) {
        const divproduct = document.createElement("div");
        divproduct.classList.add("product");

        const image = document.createElement("img");
        image.src = product.url_copertina;
        image.classList.add("image");
        const team = document.createElement("h3");
        team.textContent = product.team;
        const price = document.createElement("p");
        price.textContent = "Prezzo: " + product.prezzo + "€";
        const productid = document.createElement("span");
        productid.textContent = product.id;
        productid.classList.add("hidden");
        productid.classList.add("id");

        const add_cart = document.createElement("img");
        add_cart.src = "./images/aggiungi_al_carrello.png";
        add_cart.classList.add("button_cart");
        add_cart.addEventListener("click", addToCart);

        divproduct.appendChild(image);
        divproduct.appendChild(team);
        divproduct.appendChild(price);
        divproduct.appendChild(add_cart);
        divproduct.appendChild(productid);

        store.appendChild(divproduct);
    }
}

function addToCart(event) {
    const id = event.currentTarget.parentNode.querySelector(".id");
    fetch(ADD_ROUTE+"/id/"+id.textContent);
    alert("Maglietta inserita nel carrello");
}

const search_team = document.querySelector("#search_team");
search_team.addEventListener("submit", generateProducts);