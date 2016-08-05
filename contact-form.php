
          <form class="col s12" action="">
            <div class="row">
              <div class="input-field col s6">
                [text* first-name id:first_name]
                <label for="first_name">苗字</label>
              </div>
              <div class="input-field col s6">
                [text* last-name id:last_name]
                <label for="last_name">名前</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                [email* your-email id:email class:validate]
                <label for="email">E-mail</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                [tel* your-email id:icon_telephone class:validate]
                <label for="icon_telephone">電話番号</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                [textarea* your-message id:textarea1 class:materialize-textarea]
                <label for="textarea1">お問い合わせ内容</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s6">
                [acceptance accept-this-3 invert default:on] 確認
              </div>
              <div class="input-field col s6 offset-s6">
                [submit "送信"]
              </div>
            </div>
          </form>



<div class="row">
  <div class="input-field offset-s1 s6">
    [text name id:name]
    <label for="name">お名前</label>
  </div>
</div>
<div class="row">
  <div class="input-field offset-s1 s6">
    [email email id:email class:validate]
    <label for="email">E-mail</label>
  </div>
</div>
<div class="row">
  <div class="input-field s12">
    [textarea textarea id:textarea class:materialize-textarea]
    <label for="textarea">お問い合わせ内容</label>
  </div>
</div>
<div class="row">
  <div class="input-field offset-s8 s4">
    [submit class:btn class:pink class:accent-1 "送信"]
  </div>
</div>
