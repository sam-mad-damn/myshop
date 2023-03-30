document.addEventListener("DOMContentLoaded", () => {
    document.querySelector("#change_profile").addEventListener("click",(e)=>{
        document.querySelector("#user_email").disabled=false;
        document.querySelector("#user_name").disabled=false;
        document.querySelector("#user_login").disabled=false;
        document.querySelector("#user_surname").disabled=false;
        //document.querySelector("#user_patronimyc").disabled=false;
        document.querySelector("#save_profile").hidden=false;
        e.target.hidden=true;
    })
    modalWork(".add_admin", ".modal-wrapper", ".modal__close")
})