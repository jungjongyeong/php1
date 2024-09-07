document.addEventListener("DOMContentLoaded", () => {
    const btn_search = document.querySelector("#btn_search");
    btn_search.addEventListener("click", () => {
        const sf = document.querySelector("#sf");
        if (sf.value == "") {
            alert('검색어를 입력해 주세요.')
            sf.focus()
            return false
        }

        const sn = document.querySelector("#sn");

        self.location.href = './member.php?sn=' + sn.value + '&sf=' + sf.value;
    });


    const mem_edit_btn = document.querySelectorAll(".mem_edit_btn");
    mem_edit_btn.forEach((box) => {
        box.addEventListener("click", () => {
            const idx = box.dataset.idx;
            self.location.href = './member_edit.php?idx=' + idx;
        });
    });

    const mem_del_btn = document.querySelectorAll(".mem_del_btn");
    mem_del_btn.forEach((box) => {
        box.addEventListener("click", () => {
            // AJAX
            // const idx = box.dataset.idx;
            // self.location.href = './member_del.php?idx=' + idx;
            const f1 = new FormData();
            const idx = box.dataset.idx;
            f1.append('idx', idx);
    
            const xhr = new XMLHttpRequest();
            xhr.open("POST", "./member_del.php", "true");
            
            if(confirm("정말 삭제 하시겠습니까?")){
                
            }else{
                alert("삭제 취소되었습니다.")
            }
            
            xhr.onload = () => {
                if (xhr.status == 200) {
                    const data = JSON.parse(xhr.responseText);
                    console.log(data);
                    if (data.result == "success") {                
                        alert("삭제 되었습니다.")
                    } else if (data.result == "fail") {
                        alert("error")
                    }

                }
            }

            xhr.send(f1);

            
        });
    });

    const btn_excel = document.querySelector("#btn_excel");
    btn_excel.addEventListener("click", () => {
        self.location.href = './member_excel.php';
    });

    
})





