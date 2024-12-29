const bar = document.getElementById('bar');
const nav = document.getElementById('navbar');
const close = document.getElementById('close');

if (bar) {
    bar.addEventListener('click', () => {
       nav.classList.add('active');
    })

}

if (close) {
    close.addEventListener('click', () => {
       nav.classList.remove('active');
    })
}

function createSnowflake() {
    const snowflake = document.createElement('i');
    snowflake.classList.add('snowflake');
    snowflake.textContent = '❄'; // Biểu tượng tuyết
    snowflake.style.left = Math.random() * window.innerWidth + 'px';
    snowflake.style.animationDuration = Math.random() * 3 + 2 + 's'; // 2-5 giây
    snowflake.style.fontSize = Math.random() * 10 + 10 + 'px'; // Kích thước từ 10-20px
    snowflake.style.opacity = Math.random();

    document.querySelector('.snowfall').appendChild(snowflake);

    setTimeout(() => {
        snowflake.remove();
    }, 5000); // Xóa sau 5 giây
}

setInterval(createSnowflake, 200); // Tạo bông tuyết mới mỗi 200ms


