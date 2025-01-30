document.getElementById("add-car-form").addEventListener("submit", function (event) {
    event.preventDefault();

    const carTitle = document.getElementById("car-title").value;
    const carPrice = document.getElementById("car-price").value;
    const carhorsepower = document.getElementById("car-horsepower").value;
    const carImage = document.getElementById("car-image").files[0];

    if (!carImage) {
        alert("Please upload an image.");
        return;
    }

    const reader = new FileReader();
    reader.onload = function () {
       
        const carList = document.getElementById("car-list");

        const carItem = document.createElement("div");
        carItem.classList.add("car-item");

        const img = document.createElement("img");
        img.src = reader.result;
        img.alt = carTitle;

        const title = document.createElement("h3");
        title.textContent = carTitle;
        const horsepower = document.createElement("p");
        horsepower.textContent = `${parseInt(carhorsepower).toLocaleString()} PS`;
        const price = document.createElement("p");
        price.textContent = `$${parseInt(carPrice).toLocaleString()}`;

        carItem.appendChild(img);
        carItem.appendChild(title);
        carItem.appendChild(horsepower);
        carItem.appendChild(price);
        carList.appendChild(carItem);

     
        document.getElementById("add-car-form").reset();
    };

   
    reader.readAsDataURL(carImage);
});

