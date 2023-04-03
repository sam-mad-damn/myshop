document.addEventListener("DOMContentLoaded", () => {
    modalWork(".add_show",".modal-wrapper",".modal__close");
    modalWork(".del_show",".modal-wrapper_del_show",".modal__close_del_show");
    let collection_id=0;
    document.querySelectorAll(".del_show").forEach(item=>{
        item.addEventListener("click", async(e)=>{
            console.log(e.target.dataset.collectionId)
            let res = await postJSON("/app/admin/tables/shows/shows.work.php",e.target.dataset.collectionId,"find" );
            console.log(res)
            collection_id=res.result.id
            document.getElementById('col_id').textContent=res.result.id
            document.getElementById('col_name').textContent=res.result.name
            document.getElementById('col_photo').src=res.result.main_photo
        })
    })
    document.querySelector(".delete_show").addEventListener("click",async(e)=>{
        let res = await postJSON("/app/admin/tables/shows/shows.work.php",collection_id,"del" );
        location.reload()
    })
})