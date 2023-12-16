


<?php 
$menu_code = "member";
$js_array = ['js/member.js'];

$g_title = '약관';

include 'inc_header.php';

?>
    <main class="p-5 border rounded-5">
        <h1 class="text-center">
            회원 약관 및 개인정보 취급방침 동의
        </h1>
        <h4 class="mt-3">
            회원 약관
        </h4>
        <textarea name="" id="" cols="30" rows="10" class="form-control">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit quod iure, excepturi nihil illum eius tempore! Ut voluptates, dolorem repellat tempora eveniet aliquam iste repellendus dicta in quibusdam quae sint distinctio molestias assumenda quas ipsum laudantium vel! Mollitia ad vitae reiciendis voluptatem quos? Eum non accusantium molestias blanditiis maiores, repellat delectus est, accusamus dolore doloribus voluptate recusandae qui nulla praesentium veritatis exercitationem? Sint minima quis veritatis possimus eveniet rerum expedita obcaecati recusandae modi dolorem ab ratione laudantium architecto voluptatibus quod deleniti, optio, facere adipisci? Nihil, quasi earum. Tempora recusandae aspernatur delectus dignissimos, neque facere, animi quos est perferendis iusto error excepturi repudiandae cupiditate. Tempore doloribus repellat voluptas ullam at deserunt ipsum eius culpa cum et odio nam aut obcaecati, iure dicta dolorum quos provident velit odit iusto quasi animi magnam ex? Repudiandae ratione pariatur quam totam optio. Tempora hic inventore ipsa ea voluptate a quam labore reprehenderit mollitia est quasi, necessitatibus cumque iusto ratione quis rem dignissimos exercitationem! Est rem, quasi iusto dolor itaque labore reprehenderit? Optio unde fugiat sunt velit blanditiis. Quaerat accusantium error, est at ipsam cupiditate quam quae dolorem quisquam odit voluptatem alias. Deserunt assumenda at iure quisquam magni laboriosam animi possimus minus quaerat esse rem accusamus debitis, amet facilis beatae reprehenderit maxime id sint, quae alias quos aliquid? Est omnis debitis eaque corrupti vitae doloribus harum dolor possimus ex soluta enim magnam, dolores porro vel placeat ducimus laboriosam, pariatur repellat eos incidunt? Reprehenderit laboriosam maxime illum, molestias accusamus alias sunt. Ea voluptates illum rerum dolores exercitationem. Aperiam sequi exercitationem maiores tenetur cum impedit, quibusdam ipsum accusamus dolore iure, esse ab labore eius, vero soluta quam dignissimos. Dicta magni eveniet reprehenderit dignissimos temporibus rerum suscipit ad nihil similique officia quaerat expedita atque impedit magnam iusto alias adipisci laboriosam provident iure illo a in neque, mollitia sapiente. Aperiam?
        </textarea>
        <div class="form-check mt-2">
            <input class="form-check-input" type="checkbox" value="" id="chk_member1">
            <label class="form-check-label" for="chk_member1">
                위 약관에 동의하시겠습니까?
            </label>
        </div>
        <h4 class="mt-3">
            개인정보 취급방침
        </h4>
        <textarea name="" id="" cols="30" rows="10" class="form-control">
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Repellendus voluptates dolorem exercitationem dicta magni labore optio aliquam pariatur praesentium aperiam molestias minima sint, voluptatem corrupti quo debitis unde. Ex, perspiciatis? A quam modi ipsa ratione quia accusantium voluptatibus ea debitis, minus, cum fugit quibusdam dignissimos rerum. Soluta, ipsam. Nostrum, cum quasi. Eos ipsa, inventore provident, unde quia mollitia dolores rem consequuntur adipisci excepturi molestiae quidem. Nesciunt ex et reprehenderit voluptatem quos odit minima. Tempore quasi at, aspernatur quos suscipit magni perspiciatis assumenda ipsa odio error molestiae perferendis quod corporis! Sunt, molestias nihil quas aspernatur quaerat magnam amet alias ipsam. Maiores at, ea, nisi vel quod optio blanditiis, dolorum officia voluptatibus culpa in provident rem possimus quia atque! Corporis, nihil rem! Ipsa tenetur necessitatibus accusantium ipsam rerum saepe repellendus non atque molestias consectetur dolor ea blanditiis quos sequi sint fuga id harum, modi explicabo? Exercitationem velit, doloribus, tempora laboriosam deleniti quas distinctio eum molestiae consequuntur numquam perspiciatis mollitia beatae incidunt, fugit quibusdam dolore voluptatibus ullam maxime error cum consequatur optio delectus voluptate. Mollitia atque asperiores impedit at laudantium unde provident fugiat consequuntur assumenda obcaecati laboriosam officiis praesentium, quasi deserunt doloremque sapiente ex soluta fuga blanditiis illum magnam quo. Expedita provident neque eveniet itaque voluptatibus quia in excepturi quam, distinctio iusto laudantium eum odit tempore unde. Enim deleniti exercitationem odio, temporibus sit consequatur laboriosam error quasi blanditiis aliquam molestiae impedit saepe. Placeat quod quasi minus beatae ipsam suscipit quas veritatis, nihil voluptas repellendus numquam nisi perspiciatis amet vel cumque tenetur facere repellat? Nisi, porro voluptatem. Ipsam suscipit esse expedita voluptatum laborum sed magni, libero excepturi minima quia cum deleniti. Sapiente pariatur quae tenetur magnam ad sit ducimus, beatae nesciunt alias aliquid, id cumque quas corporis deleniti esse porro similique nisi libero! Vero placeat maxime laudantium doloribus debitis. Inventore quibusdam corporis minus qui!
        </textarea>
        <div class="form-check mt-2">
            <input class="form-check-input" type="checkbox" value="" id="chk_member2">
            <label class="form-check-label" for="chk_member2">
                위 개인정보 취급방침에 동의하시겠습니까?
            </label>
        </div>
        <div class="mt-4 d-flex justify-content-start gap-2">
            <button class="btn btn-primary w-50" id="btn_member">회원가입</button>
            <button class="btn btn-secondary w-50">가입취소</button>
        </div>

        <form method="post" name="stipulation_form" action="member_input.php" >
            <input type="hidden" name="chk" value="0">
        </form>            
            
            
    </main>
    <

<?php include 'inc_footer.php'; ?>
