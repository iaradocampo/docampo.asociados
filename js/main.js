const toggle = document.querySelectorAll(".toggle-card-btn");
const toggleInfo = document.querySelectorAll(".toggle-card-info"); 
// toggle.forEach(t => t.addEventListener("click", () => {
//     toggleInfo.classList.toggle("visible")
// }))
// toggle.addEventListener("click", () => { 
//     toggleInfo.classList.toggle(".visible"); 
// });

toggle.forEach(function(e){
    e.addEventListener("click", function(){
        toggleInfo.classList.toggle("visible")
    })
})