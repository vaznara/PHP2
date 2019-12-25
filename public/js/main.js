/***** Функции для GET и POST *****/

function postData(url, postData) { // Функция для поста данных на сервер.

    return fetch(`${url}`, {
        headers: {
            "Content-Type": "application/json; charset=utf-8"
        },
        method: "POST",
        body: JSON.stringify(postData)
    })
        .then(res => res.json())
        .catch(error => console.log(error))
}

function getData(url) { // Функция для поста данных на сервер.

    return fetch(`${url}`)
        .then(res => res.json())
        .catch(err => console.log(err))
}

/***** ДОбавления товара в заказ *****/

function addGoodToCart(idGoods, nCount, fPrice) { // Добавляем товар в корзину

    let data = {};
    const varToString = varObj => Object.keys(varObj)[0]; // Преобразовываем название переменной в текст.
    data[varToString({nCount})] = nCount;
    data[varToString({idGoods})] = idGoods;
    data[varToString({fPrice})] = fPrice;

    postData(`/cart/add/?id=${idGoods}`, data)
        .then(response => updateCartCount(response))
        .catch(error => console.log(error))
}

function deleteGoods(id) {
    getData(`/cart/delete/?id=${id}`)
        .then(response => {
            if(response.countSum === 0) {
                document.querySelector('.goods__cart').lastElementChild.innerHTML = `<div style="background: white; padding: 20px 0;"><p style="text-align: center;"><strong>Корзина пуста</strong></p></div>`;
                document.querySelector('.goods__cart').lastElementChild.classList.remove('goods__cart-item');
            }
            return response;
        })
        .then(response => updateCartCount(response))
        .catch(error => console.log(error))
}

function deleteGoodsRow(id) {
    let rowDiv = document.querySelectorAll('.goods__cart-delete');
    for(item of rowDiv) {
        if(item.dataset.id === id) {
            item.parentNode.remove();
        }
    }
}

function updateCartCount(arr) { // Обновляем кол-во товара в корзине
    let countSumDiv = document.querySelector('#cart-sum');
    let countCountDiv = document.querySelector('#cart-count');
    let mainCountDiv = document.querySelector('#main-count');
console.log(arr);
    if(countSumDiv) {
        countSumDiv.innerHTML = `<strong>${arr.priceSum} руб.</strong>`;
    }

    if(countCountDiv) {
        countCountDiv.innerHTML = `<strong>${arr.countSum}</strong>`;
    }

    if(mainCountDiv) {
        mainCountDiv.innerHTML = arr.countSum;
    }
}




buyBtn = document.querySelector('.goods__catalog');
if(buyBtn) {
    buyBtn.addEventListener('click', (e) => {
        let quantityDiv = document.querySelectorAll(`input[name="nCount"]`);
        let nCount = 1;
        let fPriceDiv = document.querySelectorAll('.goods__price');
        let fPrice = 0;

        quantityDiv.forEach((item) => {
            if (item.dataset.id === e.target.dataset.id) {
                nCount = item.value;
            }
        });

        fPriceDiv.forEach((item) => {
            if (item.dataset.id === e.target.dataset.id) {
                fPrice = item.innerHTML.replace(' руб.', '');
                fPrice = parseFloat(fPrice);
            }
        });

        if (e.target.classList.contains('buy-btn')) {
            addGoodToCart(e.target.dataset.id, nCount, fPrice);
        }
    });
}

goodsCart = document.querySelector('.goods__cart');
if(goodsCart) {
    goodsCart.addEventListener('click', (e) => {
        if (e.target.classList.contains('goods__cart-delete')) {
            deleteGoods(e.target.dataset.id);
            deleteGoodsRow(e.target.dataset.id);
        }
    });
}

orderButton = document.querySelector('.order-btn');
if(orderButton) {
    orderButton.addEventListener('click', (e) => {
        postData(`/cart/order`)
            .then(response => {
                document.querySelector("body").insertAdjacentHTML("afterbegin", `
                    <div class="overlay">
                        <p style="text-align: center">Заказ оформлен успешно!<br> Подождите, страница будет обновлена!</p>
                    </div>
                    `)
                setTimeout(function() {
                    window.location.replace(`/order/view/?id=${response['id']}`)
                }, 2000);
            })
            .catch(error => console.log(error))
    });
}