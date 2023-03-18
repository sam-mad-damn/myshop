document.addEventListener("DOMContentLoaded", () => {
  document.querySelectorAll(".size").forEach(inp => {
    if (inp.checked) {
      document.querySelector(`[for='${inp.id}']`).classList.add("active")
    }
  })
  
}); 