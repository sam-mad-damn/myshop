document.addEventListener("DOMContentLoaded", () => {
    modalWork(".add_prod", ".modal-wrapper", ".modal__close");
    modalWork(".change_prod", ".modal-wrapper_change_product", ".modal__close_change_product");
    modalWork(".del_prod", ".modal-wrapper_del_products", ".modal__close_del_products");
    product_id=0
    document.querySelectorAll(".change_prod").forEach(item => {
        item.addEventListener("click", async (e) => {
            let res = await postJSON("/app/admin/tables/products/products.work.php",e.target.dataset.productId,"find" );
            console.log(res)
            document.querySelector("#id").value=res.result.id
            document.querySelector("#name").value=res.result.name
            document.querySelector("#price").value=res.result.price
            document.querySelector("#count").value=res.result.count
            document.querySelector("#year").value=res.result.release_year
            document.querySelector("#color").value=res.result.color
            document.querySelector("#country").textContent=res.result.country
            document.querySelector("#category").textContent=res.result.category
            document.querySelector(".image").src=res.result.image
        })
    })
    document.querySelectorAll(".del_prod").forEach(item => {
        item.addEventListener("click", async (e) => {
            product_id=e.target.dataset.productId;
            let res = await postJSON("/app/admin/tables/products/products.work.php",e.target.dataset.productId,"find" );
            console.log(res)
            document.querySelector("#info_id").textContent=res.result.id
            document.querySelector("#info_status").textContent=res.result.status
            document.querySelector("#info_image").src=res.result.image
            document.querySelector("#inp_product_id").value=res.result.id
            // document.querySelector("#id").value=res.result.id
            // document.querySelector("#name").value=res.result.name
            // document.querySelector("#price").value=res.result.price
            // document.querySelector("#count").value=res.result.count
            // document.querySelector("#year").value=res.result.release_year
            // document.querySelector("#color").value=res.result.color
            // document.querySelector("#country").textContent=res.result.country
            // document.querySelector("#category").textContent=res.result.category
            // document.querySelector(".image").textContent=res.result.image
        })
    })
    // document.querySelector(".del_product").addEventListener("click",async(e)=>{
    //     let res = await postJSON("/app/admin/tables/products.work.php",product_id,"del" );
    //     location.reload()
    // })


})