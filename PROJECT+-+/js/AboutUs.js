document.addEventListener('DOMContentLoaded', () => {
    const menuToggle = document.querySelector('.menu-toggle');
    const navbar = document.querySelector('.navbar'); 

    if (menuToggle && navbar) {
        menuToggle.addEventListener('click', () => {
            // เพิ่ม/ลบคลาส nav-open ที่ Header เพื่อควบคุมการแสดงผลของเมนู
            navbar.classList.toggle('nav-open');
            
            // เปลี่ยนไอคอนจาก Hamburger เป็น X (ปิด)
            const icon = menuToggle.querySelector('i');
            if (navbar.classList.contains('nav-open')) {
                icon.classList.remove('fa-bars');
                icon.classList.add('fa-times'); // fa-times คือไอคอน X
            } else {
                icon.classList.remove('fa-times');
                icon.classList.add('fa-bars');
            }
        });
    }
});