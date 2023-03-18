document.addEventListener("DOMContentLoaded", () => {
    modalWork(".add_category",".modal-wrapper_collection_add",".modal__close_collection_add");
    modalWork(".del_category",".modal-wrapper_del_collection",".modal__close_del_collection");
    let category_id=0;
    document.querySelectorAll(".del_category").forEach(item=>{
        item.addEventListener("click", async(e)=>{
            console.log(e.target.dataset.categoryId)
            let res = await postJSON("/app/admin/tables/categories/categories.work.php",e.target.dataset.categoryId,"find" );
            console.log(res)
            category_id=res.result.id
            document.querySelector('#cat_name').textContent=res.result.name
        })
    })
    document.querySelector(".del_cat").addEventListener("click",async(e)=>{
        let res = await postJSON("/app/admin/tables/categories/categories.work.php",category_id,"del" );
        location.reload()
    })
})