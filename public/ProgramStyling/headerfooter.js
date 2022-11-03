///////     HEADER & FOOTER SECTION     ///////
//NAVBAR SECTION
//CHANGE NAVBAR STYLES ON SCROLL
window.addEventListener('scroll', () => {
    document.querySelector('nav').classList.toggle('window_scroll', window.scrollY > 0)
})

//SHOW/HIDE NAVMENU(TABLET)
const menu = document.querySelector(".nav_menu");
const menuBtn = document.querySelector("#open_menu_btn");
const closeBtn = document.querySelector("#close_menu_btn");

menuBtn.addEventListener('click', () => {
    menu.style.display = "flex";
    closeBtn.style.display = "inline-block";
    menuBtn.style.display = "none";
})

closeBtn.addEventListener('click', () => {
    menu.style.display = "none";
    closeBtn.style.display = "none";
    menuBtn.style.display = "inline-block";
});

///////     QUESTIONS SECTION     ///////
//SHOW RESPONSE ON CLICK 
const qns = document.querySelectorAll('.qn');
qns.forEach(qn => {
    qn.addEventListener('click', () => {
        qn.classList.toggle('open');

        //CHANGE ICON
        const icon = qn.querySelector('.qn_icon i');
        if (icon.className === 'bx bx-plus') {
            icon.className = 'bx bx-minus'
        } else {
            icon.className = 'bx bx-plus'
        }
    })
})

