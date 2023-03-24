document.addEventListener("DOMContentLoaded", () => {
    document.addEventListener("click", async (e) => {
            if (e.target.classList.contains("change_profile")) {
                document.querySelectorAll(".form_inp").forEach(item=>{
                    item.hidden=false
                })
                document.querySelectorAll(".form_label").forEach(item=>{
                    item.hidden=true
                })
                e.target.hidden=true
                document.querySelector(".save_profile").hidden=false
                document.querySelector("#exit").hidden=true
            }
        })
})