document.addEventListener('DOMContentLoaded', () => {
    const backgrounds = [
        document.getElementById('bg1'),
        document.getElementById('bg2'),
        document.getElementById('bg3')
    ];
    let current = 0;

    // ตรวจสอบว่ามี element อยู่จริงก่อนเริ่มทำงาน
    if (backgrounds.every(bg => bg !== null)) {
        setInterval(() => {
            const prev = backgrounds[current];
            current = (current + 1) % backgrounds.length;
            const next = backgrounds[current];

            // สลับ class เพื่อ fade
            prev.classList.remove('active');
            next.classList.add('active');

            // จัด z-index ให้ภาพใหม่อยู่บน
            backgrounds.forEach((bg, i) => {
                bg.style.zIndex = (i === current) ? 1 : 0;
            });
        }, 8000); // เปลี่ยนทุก 8 วินาที
    }
});