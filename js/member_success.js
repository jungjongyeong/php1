document.addEventListener("DOMContentLoaded", () => { // DOMContentLoaded: DOM을 다 읽고 실행하는 기능
    const btn_login = document.querySelector('#btn_login');
    btn_login.addEventListener('click', function () {
        self.location.href = './login.php';
    });
})