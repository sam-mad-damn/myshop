document.addEventListener("DOMContentLoaded", () => {
    modalWork(".add_show",".modal-wrapper",".modal__close");
    modalWork(".del_show",".modal-wrapper_del_show",".modal__close_del_show");
    let show_id=0;
    
    document.querySelectorAll(".del_show").forEach(item=>{
        item.addEventListener("click", async(e)=>{
            console.log(e.target.dataset.showId)
            let res = await postJSON("/app/admin/tables/shows/shows.work.php",e.target.dataset.showId,"find" );
            console.log(res)
            show_id=res.result.id
            document.getElementById('show_id').textContent=res.result.id
            document.getElementById('show_name').textContent=res.result.title
            document.getElementById('inp_show_id').value=res.result.id
            res.photos.forEach(item => {
                document.querySelector(".photos").insertAdjacentHTML("afterbegin",`<img class="del_photo" src="${item.photo}" alt="" >`)
            });
        })
    })
})