document.addEventListener("DOMContentLoaded", () => { // DOMContentLoaded: DOM을 다 읽고 실행하는 기능
    const btn_login = document.querySelector("#btn_login");
    btn_login.addEventListener("click", () => {
        const f_id = document.querySelector("#f_id");
        if (f_id.value == '') {
            alert('아이디를 입력해 주세요.');
            f_id.focus();
            return false
        }

        const f_pw = document.querySelector("#f_pw");
        if (f_pw.value == '') {
            alert('비밀번호를 입력해 주세요.');
            f_pw.focus();
            return false
        }

        // Ajax 에이젝스
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "./pg/login_process.php", "true")

        const f1 = new FormData();
        f1.append("id", f_id.value);
        f1.append("pw", f_pw.value);

        xhr.send(f1);

        xhr.onload = function () {
            if (xhr.status == 200) {
                const data = JSON.parse(xhr.responseText); // xhr.responseText만 출력하면 문자열이기때문에 JSON.parse()메서드를 통해 json형식으로 변환시켜야함
                if (data.result == "login_fail") {
                    f_id.value = '';
                    f_pw.value = '';
                    f_id.focus();
                    alert("로그인이 실패하였습니다.");
                    return false
                } else if (data.result == "login_success") {
                    alert("로그인이 성공하였습니다.");
                    self.location.href = "./index.php"; // 로그인이 성공했을때 이동하는 URI
                }

            } else {
                alert('통신에 실패했습니다. 다음에 다시 시도해 주시기 바랍니다.')
            }
        }


    })
})