document.addEventListener("DOMContentLoaded", () => {
    modalWork(".add_art", ".modal-wrapper", ".modal__close");
    modalWork(".change_article", ".modal-wrapper_change_product", ".modal__close_change_product");
    modalWork(".del_article", ".modal-wrapper_del_products", ".modal__close_del_products");
    // удаление статьи
    document.querySelectorAll(".del_article").forEach(item => {
        item.addEventListener("click", async (e) => {
            console.log(e.target.dataset.articleId)
            let res = await postJSON("/app/admin/tables/articles/article.work.php", e.target.dataset.articleId, "find");
            console.log(res)
            document.getElementById('info_id').textContent = res.result.id
            document.getElementById('info_head').textContent = res.result.head
            document.getElementById('info_title').textContent = res.result.title
            document.getElementById('info_text').textContent = res.result.text
            document.getElementById("inp_article_id").value = res.result.id
        })
    })
    // изменение статьи
    document.querySelectorAll(".change_article").forEach(item => {
        item.addEventListener("click", async (e) => {
            let res = await postJSON("/app/admin/tables/articles/article.work.php", e.target.dataset.articleId, "find");
            console.log(res.result)
            document.getElementById('info_id').textContent = res.result.id
            document.getElementById('art_head').value = res.result.head_id
            document.getElementById('art_name').value = res.result.title
            document.getElementById('art_desc').value = res.result.text
            if(res.photo!=false){
                document.getElementById("art_photo").src=res.photo.photo
                document.getElementById("art_photo").style.display="block"
            }else{
                document.getElementById("art_photo").style.display="none"
            }
            document.querySelector("[name='article_id'").value=res.result.id
            // document.getElementById("art_photo").src=
        })
    })
})