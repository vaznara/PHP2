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
        .then()
        .catch(err => console.log(err))
}

/***** ДОбавления товара в заказ *****/

function addGoodToCart(idGoods, nCount) { // Добавляем товар в корзину

    let data = {};
    const varToString = varObj => Object.keys(varObj)[0]; // Преобразовываем название переменной в текст.
    data[varToString({nCount})] = nCount;
    data[varToString({idGoods})] = idGoods;

    postData(`/cart/add/?id=${idGoods}`, data)
        .then(response => console.log(response))
        .catch(error => console.log(error))
}

function updateCartCount(int) { // Обновляем кол-во товара в корзине
    let countDiv = document.querySelector('#cart-count');
    countDiv.innerHTML = int;
}

buyBtn = document.querySelector('.goods__catalog');

buyBtn.addEventListener('click', (e) => {
    let quantityDiv = document.querySelectorAll(`input[name="nCount"]`);
    let nCount = 1;

    quantityDiv.forEach((item) => {
        if (item.dataset.id === e.target.dataset.id) {
            nCount = item.value;
        }
    });

    if (e.target.classList.contains('buy-btn')) {
        addGoodToCart(e.target.dataset.id, nCount);
    }
});