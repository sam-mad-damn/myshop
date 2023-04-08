function modalWork(btnName,modalName,closeName){
    function closeModalWindow(wrapper) {
        wrapper.style.display = 'none';
        location.reload()
        document.querySelectorAll(".del_photo").forEach(item => {
            item.remove()
        });
    }
    let modal=document.querySelector(modalName);
    
    document.querySelectorAll(btnName).forEach(item => item.addEventListener("click", (e) => {
        modal.style.display = 'block'
    }))
    document.querySelector(closeName).addEventListener('click', () => {
        location.reload()
    })
    modal.addEventListener('click', (e) => {
        if (e.target == e.currentTarget)
            closeModalWindow(modal);
    })
    document.addEventListener('keydown', (e) => {
        if (e.code == 'Escape') closeModalWindow(modal);
    })
}