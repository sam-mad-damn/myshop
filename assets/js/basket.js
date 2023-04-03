document.addEventListener("DOMContentLoaded", () => {
    modalWork(".change_address",".modal-wrapper",".modal__close");
    isBasketEmpty()
    //функция проверки пустоты корзины, вывод Корзина пуста
    async function isBasketEmpty() {
        if (document.querySelector('.total_cost').textContent != 0 && document.querySelector('.total_count').textContent != 0) {
            document.querySelector(".empty_basket").hidden = true;
            document.querySelector(".main_block").hidden = false;
        }
        else {
            document.querySelector(".empty_basket").hidden = false;
            document.querySelector(".main_block").hidden = true;
        }
    }
    //функция для вывода общего кол-ва, стоимости
    async function outOnPage(action, data) {
        let { product_in_basket, total_cost, total_count } = await postJSON("/app/tables/baskets/work.basket.php", data, action);
        if (product_in_basket) {
            document.querySelector(`#count-${data["product_id"]}`).textContent = product_in_basket.quantity;
        }
        console.log(product_in_basket)

        document.querySelector('.total_cost').textContent = Number(total_cost) ?? 0;
        document.querySelector('.total_count').textContent = total_count ?? 0;
        isBasketEmpty();
    }
    document.addEventListener("click", async (e) => {
        //добавление кол-ва продукта
        if (e.target.classList.contains("add")) {
            outOnPage("add", {"product_id":e.target.dataset.productId,"size_id":e.target.dataset.sizeId})
        }
        //уменьшение кол-ва продукта
        if (e.target.classList.contains("del")) {
            outOnPage("dec", {"product_id":e.target.dataset.productId,"size_id":e.target.dataset.sizeId})
        }
        //удаление продукта из корзины
        if (e.target.classList.contains("delete")) {
            outOnPage("del", {"product_id":e.target.dataset.productId,"size_id":e.target.dataset.sizeId})
            //удаление карточки товара со страницы, если он удален из базы
            e.target.closest(".product").remove()
        }
        //кнопка очистить корзину
        if (e.target.classList.contains("clean_basket")) {
            outOnPage("clean", e.target.dataset.productId)
            location.reload()
        }
        //кнопка оформить заказ
        if (e.target.classList.contains("make-order")) {
            let payType=document.querySelector(".pay").value
            if (payType=="cart"){payType="карта"}
            else {payType="наличные"}
            //отправляем запрос на создание заказа
            outOnPage("add_order", {"user_id":e.target.dataset.user,"point":e.target.dataset.point,"pay_type": payType});
            //Надпись Заказ оформлен
            document.querySelector(".basket_is_empty").innerHTML = "Заказ успешно оформлен!";
            //очистка всей корзины
            document.querySelectorAll(".item").forEach(item => item.remove())
        }
    })
})