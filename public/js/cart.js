function generateCart(){
    fetch(CART_ROUTE).then(onResponse).then(onJson);
}

function onResponse(response) {
    return response.json();
}

function onJson(json){
    const cart = document.querySelector("#products-view");
    cart.innerHTML = "";

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

        const rem_cart = document.createElement("img");
        rem_cart.src = "./images/rimuovi_dal_carrello.png";
        rem_cart.classList.add("button_cart");
		rem_cart.addEventListener("click", removeByCart);

        divproduct.appendChild(image);
        divproduct.appendChild(team);
        divproduct.appendChild(price);
		divproduct.appendChild(rem_cart);
		divproduct.appendChild(productid);

        cart.appendChild(divproduct);
	}
}

function removeByCart(event) {
    const id = event.currentTarget.parentNode.querySelector(".id");
    fetch(REMOVE_ROUTE+"/id/"+id.textContent);
    alert("Maglietta rimossa dal carrello");
	generateCart();
}

generateCart();