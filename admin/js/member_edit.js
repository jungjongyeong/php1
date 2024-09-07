document.addEventListener("DOMContentLoaded", () => {


    // 우편번호 찾기
    const btn_zipcode = document.querySelector('#btn_zipcode');
    const zipcode = document.querySelector('#zipcode');
    const Inputaddress = document.querySelector('#Inputaddress');

    btn_zipcode.addEventListener('click', () => {
        new daum.Postcode({
            oncomplete: function (data) {
                // 팝업에서 검색결과 항목을 클릭했을때 실행할 코드를 작성하는 부분입니다.
                // 예제를 참고하여 다양한 활용법을 확인해 보세요.
                console.log(data);
                zipcode.value = data.zonecode;
                Inputaddress.value = data.address;
                document.input_form.address_chk.value = "1";
            }
        }).open();
    })


    const btn_email_check = document.querySelector("#btn_email_check");
    btn_email_check.addEventListener("click", function () {
        const f_email = document.querySelector("#f_email");

        if (f_email.value == '') {
            alert('이메일을 입력해 주세요.')
            return false
        }

        // AJAX
        const f1 = new FormData();
        f1.append('email', f_email.value);
        f1.append('mode', 'email_chk');

        const xhr = new XMLHttpRequest();
        xhr.open("POST", "../pg/member_process.php", "true");

        xhr.onload = () => {
            if (xhr.status == 200) {
                const data = JSON.parse(xhr.responseText);
                // console.log(data);
                if (data.result == "success") {                    
                    document.input_form.email_chk.value = "1";
                    alert("사용이 가능한 아이디입니다.");
                } else if (data.result == "fail") {
                    alert("이미 사용중인 아이디입니다. 다른 아이디를 입력해 주세요.")
                    f_id.value = '';
                    f_id.focus();
                } else if (data.result == "empty_id") {
                    alert("아이디가 비어 있습니다.");
                    f_id.focus();
                }

            }
        }

        xhr.send(f1);
    })

    const btn_submit = document.querySelector("#btn_submit");
    btn_submit.addEventListener("click", function () {
        const f = document.input_form
        if (f.id.value == '') {
            alert('아이디를 입력해 주세요.')
            f.id.focus();
            return false
        }
        
        //비밀번호 확인
        if (f.password.value == '') {
            alert('비밀번호를 입력해 주세요.')
            f.password.focus()
            return false
        }

        if (f.password2.value == '') {
            alert('확인용 비밀번호를 입력해 주세요.')
            f.password2.focus()
            return false
        }

        // 비밀번호 일치여부 확인
        if (f.password.value != f.password2.value) {
            alert('비밀번호가 서로 일치하지 않습니다.');
            f.password.value = '';
            f.password2.value = '';
            f.password.focus();
            return false;
        }

        // 이메일 중복 여부 확인
        if (f.email_chk.value == 0) {
            alert('이메일 중복확인을 해주시기 바랍니다.')
            return false
        }

        // 주소 여부 확인
        if (f.address_chk.value == 0) {
            alert('우편번호를 입력 해주시기 바랍니다.')
            return false
        }

        // 이미지 여부 확인
        if (f.photo.value == "") {
            alert('이미지를 추가 해주시기 바랍니다.')
            return false
        }

        f.submit();
    })
})





