document.addEventListener("DOMContentLoaded", () => {
    modalWork(".cancel_order",".modal-wrapper_del_orders",".modal__close")
    
    document.querySelectorAll(".cancel_order").forEach(item => {
        item.addEventListener("click", async (e) => {
            let res = await postJSON("/app/admin/tables/orders/orders.work.php",e.target.dataset.orderId,"find" );
            console.log(res)
            document.querySelector("#info_id").textContent=res.result.id
            document.querySelector("#info_status").textContent=res.result.status
            document.querySelector("#info_user").textContent=res.result.user
            document.querySelector("#order_id").value=res.result.id
        })
    })
    document.querySelectorAll(".confirm_order").forEach(item => {
        item.addEventListener("click", async (e) => {
            let res = await postJSON("/app/admin/tables/orders/orders.work.php",e.target.dataset.orderId,"confirm" );
            location.reload();
        })
    })
})