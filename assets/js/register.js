document.addEventListener("DOMContentLoaded", () => {
    //при включенном флажке кнопка становится активной
    document.querySelector("#agreement").addEventListener("change", (e) => {
        btn = document.querySelector(".btn_reg")
        btn.disabled = !e.target.checked
    })
})