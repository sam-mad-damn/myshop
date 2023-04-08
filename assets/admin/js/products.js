document.addEventListener("DOMContentLoaded", () => {
    modalWork(".add_prod", ".modal-wrapper", ".modal__close");
    modalWork(".change_prod", ".modal-wrapper_change_product", ".modal__close_change_product");
    modalWork(".del_prod", ".modal-wrapper_del_products", ".modal__close_del_products");
    product_id = 0
    // добавление товара
    document.querySelector(".add_prod").addEventListener("click",(e)=>{
        
            // показать/скрыть поле для ввода количества
            document.querySelectorAll("[type='checkbox']").forEach(item => {
                item.addEventListener("click", (e) => {
                    if (e.target.checked) {
                        document.querySelectorAll(".counts").forEach(element => {
                            if (element.id == item.value) {
                                element.hidden = false
                            }
                        });
                    } else {
                        document.querySelectorAll(".counts").forEach(element => {
                            if (element.id == item.value) {
                                element.hidden = true
                             
                            }
                        });
                    }
                })
            })
            // чтобы нужные поля для количества сразу были включены
            document.querySelectorAll("[type='checkbox']:checked").forEach(item => {
                document.querySelectorAll(".counts").forEach(element => {
                    if (element.id == item.value) {
                        element.hidden = false
                    }
                });
            })
    })
    // изменение товара
    document.querySelectorAll(".change_prod").forEach(item => {
        item.addEventListener("click", async (e) => {
            let { product, sizes } = await postJSON("/app/admin/tables/products/products.work.php", { "product_id": e.target.dataset.productId }, "find");

            document.querySelector("#name").value = product.name
            document.querySelector("#price").value = product.price
            document.querySelector("#desc").value = product.description
            document.querySelector("#material").value = product.material
            document.querySelector("#photo").src = product.photo
            document.getElementById(`${product.collection}-c`).checked = true
            document.querySelector("[name='product_id']").value=product.id

            sizes.forEach(item => {
                // чтобы размеры которые есть в базе сразу были включены
                document.getElementById(`${item.size}-c`).checked = true
                // сразу задаем инпутам кол-во товара размера на складе
                document.querySelectorAll(`.count`).forEach(number => {
                    if (number.id == item.size_id) {
                        number.value=item.count
                        number.disabled=false
                    }
                })
            });

             // показать/скрыть поле для ввода количества
             document.querySelectorAll("[type='checkbox']").forEach(item => {
                item.addEventListener("click", (e) => {
                    // если флажок включен
                    if (e.target.checked) {
                        document.querySelectorAll(".counts").forEach(element => {
                            if (element.id == item.value) {
                                // показываем нужное поле
                                element.hidden = false
                            }
                        });
                        document.querySelectorAll(`.count`).forEach(input=>{
                            if (input.id == item.value) {
                                input.disabled=false
                            }
                        })
                    // если флажок выключен
                    } else {
                        document.querySelectorAll(".counts").forEach(element => {
                            if (element.id == item.value) {
                                // прячем поле 
                                element.hidden = true
                                // element.disabled = true
                            }
                        });
                        document.querySelectorAll(`.count`).forEach(input=>{
                            if (input.id == item.value) {
                                input.disabled=true
                                
                            }
                        })
                    }
                })
            })
            // чтобы нужные поля для количества сразу были включены
            document.querySelectorAll("[type='checkbox']:checked").forEach(item => {
                document.querySelectorAll(".counts").forEach(element => {
                    if (element.id == item.value) {
                        element.hidden = false
                    }
                });
            })
        })
    })
    // удаление товара
    document.querySelectorAll(".del_prod").forEach(item => {
        item.addEventListener("click", async (e) => {
            product_id = e.target.dataset.productId;
            console.log(product_id)
            let { product, sizes } = await postJSON("/app/admin/tables/products/products.work.php", { "product_id": product_id }, "find");
            console.log(product)
            document.querySelector("#info_id").textContent = product.id
            document.querySelector("#info_image").src = product.photo
            document.querySelector("#info_status").textContent = product.name
            document.querySelector("#inp_product_id").value = product.id
        })
    })
    // document.querySelector(".del_product").addEventListener("click",async(e)=>{
    //     let res = await postJSON("/app/admin/tables/products.work.php",product_id,"del" );
    //     location.reload()
    // })


})