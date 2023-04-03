document.addEventListener("DOMContentLoaded", () => {
    modalWork(".add_collection",".collection_add",".modal__close");
    modalWork(".del_collection",".modal-wrapper_del_collection",".modal__close_del_collections");
    let collection_id=0;
    document.querySelectorAll(".del_collection").forEach(item=>{
        item.addEventListener("click", async(e)=>{
            console.log(e.target.dataset.collectionId)
            let res = await postJSON("/app/admin/tables/collections/collections.work.php",e.target.dataset.collectionId,"find" );
            console.log(res)
            collection_id=res.result.id
            document.getElementById('col_id').textContent=res.result.id
            document.getElementById('col_name').textContent=res.result.name
            document.getElementById('col_photo').src=res.result.main_photo
        })
    })
    document.querySelector(".del_col").addEventListener("click",async(e)=>{
        document.querySelector("[name='collect_id']").value=collection_id
        // location.reload()
    })
})