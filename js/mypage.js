document.addEventListener("DOMContentLoaded", () => { // DOMContentLoaded: DOM을 다 읽고 실행하는 기능
    //가입 버튼 클릭시
    const btn_submit = document.getElementById('btn_submit');
    btn_submit.addEventListener('click', () => {
        const f = document.input_form

        // 이름 중복확인 여부 체크 
        if (f.name.value == 0) {
            alert('이름을 입력 해주시기 바랍니다.')
            return false
        }

        //비밀번호 확인
        if (f.password.value != '' && f.password2.value == '') {
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

        if (f.email.value == '') {
            alert('이메일을 입력해 주세요.')
            f.email.focus();
            return false;
        }
        if (f.old_email.value != f.email.value) {
            if (f.email_chk.value == 0) {
                alert('이메일 중복확인을 해주세요.')
                return false
            }
        }

        // 우편번호 입력확인
        if (f.zipcode.value == '') {
            alert('우편번호를 입력해주세요')
        }

        // 주소 여부 확인
        if (f.addr1.value == 0) {
            alert('주소를 입력 해주시기 바랍니다.')
            return false
        }
        if (f.addr2.value == 0) {
            alert('상세주소를 입력 해주시기 바랍니다.')
            return false
        }

        // 이미지 여부 확인
        // if (f.photo.value == "") {
        //     alert('이미지를 추가 해주시기 바랍니다.')
        //     return false
        // }

        f.submit();
    })


    //EMAIL 체크
    const btn_email_check = document.querySelector("#btn_email_check");
    btn_email_check.addEventListener("click", function () {
        const f_email = document.querySelector("#f_email");

        if (f_email.value == '') {
            alert('이메일을 입력해 주세요.')
            f_email.focus();
            return false
        }

        if (document.input_form.old_email.value == f_email.value) {
            alert('이메일을 변경하지 않으셨습니다.')
            return false
        }

        // AJAX
        const f1 = new FormData();

        f1.append('email', f_email.value);
        f1.append('mode', 'email_chk');

        const xhr = new XMLHttpRequest();
        xhr.open("POST", "./pg/member_process.php", "true");

        xhr.onload = () => {
            if (xhr.status == 200) {
                const data = JSON.parse(xhr.responseText);
                if (data.result == "success") {
                    alert("사용이 가능한 이메일입니다.");
                    document.input_form.email_chk.value = "1";
                } else if (data.result == "fail") {
                    document.input_form.email_chk.value = "0";
                    alert("이미 사용중인 이메일입니다. 다른 이메일을 입력해 주세요.")
                    f_email.value = '';
                    f_email.focus();
                } else if (data.result == "empty_email") {
                    alert("이메일이 비어 있습니다.");
                } else if (data.result == "email_format_wrong") {
                    alert("이메일 형식이 맞지 않습니다.")
                    f_email.value = '';
                    f_email.focus();
                }

            }
        }

        xhr.send(f1);

    });

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

    // 사진 미리보기 기능
    const f_photo = document.querySelector("#f_photo");
    f_photo.addEventListener("change", function (e) {
        const reader = new FileReader();
        reader.readAsDataURL(e.target.files[0]);

        reader.onload = function (e) {
            const f_preview = document.querySelector("#f_preview");
            f_preview.setAttribute('src', e.target.result);
        };
    });

})