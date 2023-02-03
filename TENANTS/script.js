"use strict";

(function () {
  document.body.dataset.theme = "dark";
  query(`.setting > button`).onclick = () => {
    query(`.setting`).classList.toggle(`setting--show`);
    query(`.setting button i`).classList.toggle(`fa-cog`);
    query(`.setting button i`).classList.toggle(`fa-times`);
  };
  const _languages = {
    persian: {
      login: {
        title: `ورود`,
        description: `اگر حساب کاربری دارید، از اینجا وارد شوید`,
        username: `تلفن همراه`,
        password: `گذرواژه`,
        submit: `وارد شدن`,
        spliter: `یا`,
        options: [`فراموشی گذرواژه`, `ساختن حساب جدید`]
      },
      signin: {
        title: `نام نویسی`,
        description: `همچنین شما میتوانید از اینجا نام‌نویسی کنید`,
        username: `تلفن همراه`,
        password: `گذرواژه`,
        submit: `ایجاد کردن`,
        spliter: `یا`,
        options: [`میتوانید از اینجا وارد شوید`]
      }
    },
    english: {
      login: {
        title: `Login`,
        description: ` If you have any account, Log in `,
        username: `phone number`,
        password: `password`,
        submit: `Login`,
        spliter: `OR`,
        options: [`Forgot Password`, `Create Accounts`]
      },
      signin: {
        title: `Sign-In`,
        description: `If you have not any account, Sign in`,
        username: `phone number`,
        password: `password`,
        submit: `Register`,
        spliter: `OR`,
        options: [`Are you have any account`]
      }
    }
  };
  const _elements = {
    login: {
      title: query(`.login__title`),
      description: query(`.login__desc`),
      username: query(`.login__field--username > .login__input`),
      password: query(`.login__field--password > .login__input`),
      submit: query(`.login__btn--login > strong`),
      spliter: query(`.login__seprate_text`),
      options: [query(`.login__btn--forgot`), query(`.login__btn--register`)]
    },
    signin: {
      title: query(`.signin__title`),
      description: query(`.signin__desc`),
      username: query(`.signin__field--username > .signin__input`),
      password: query(`.signin__field--password > .signin__input`),
      submit: query(`.signin__btn--signin > strong`),
      spliter: query(`.signin__seprate_text`),
      options: [query(`.signin__btn--exist`)]
    }
  };
  const $language = query(`.language`);
  const $checkbox = query(`#samak-side-controller`);
  const $cover = query(`.samak__cover`).firstElementChild;
  const field_password = {
    login: query(`.login__field--password`),
    signin: query(`.signin__field--password`)
  };
  const $login_trailing = field_password.login.lastElementChild;
  const $signin_trailing = field_password.signin.lastElementChild;

  // NOTE : to set default language as 'persian'
  // should first input[value="language-persian"] checking, then language change, then another trigger enabling
  Promise.all([
    query(`#language-persian`).setAttribute(`checked`, ``),
    updateLanguage(_elements, _languages)
  ]).then(() => {
    listener($login_trailing, "click", () =>
      _trailing_(field_password.login.lastElementChild)
    );
    listener($signin_trailing, "click", () =>
      _trailing_(field_password.signin.lastElementChild)
    );
    listener($checkbox, "change", () => {
      let isUserExist = $checkbox.checked;
      $cover.src = isUserExist
        ? // show login cover
          `https://i.pinimg.com/564x/c3/34/e3/c334e3014be8b52e0845b57a304a85f9.jpg`
        : // show sign-in cover
          `https://i.pinimg.com/564x/6b/ee/21/6bee21249cd5ef1f48623c4c14630267.jpg`;
    });
    listener($language, "click", () => updateLanguage(_elements, _languages));
  });
})();

function _trailing_($target) {
  let $input = $target.firstElementChild;
  let $icon = $target.lastElementChild.firstElementChild;
  $icon.classList.toggle(`fa-eye`);
  $icon.classList.toggle(`fa-eye-slash`);
  $input.setAttribute(
    `type`,
    $input.getAttribute(`type`) == `password` ? `input` : `password`
  );
}

// MULTI-LANGUAGE //

// NOTE : non-return just change dom
function changeLanguage({ login: $login, signin: $signin }, { login, signin }) {
  updateContent($login, login);
  updateContent($signin, signin);
}
function updateContent(
  {
    title: $title,
    description: $description,
    username: $username,
    password: $password,
    submit: $submit,
    spliter: $spliter,
    options: $options
  },
  { title, description, username, password, submit, spliter, options }
) {
  updateText($title, title);
  updateText($description, description);
  updatePlaceholder($username, username);
  updatePlaceholder($password, password);
  updateText($submit, submit);
  updateText($spliter, spliter);
  $options.forEach(($element, index) => {
    updateText($element, options[index]);
  });
}
function updateText($target, text) {
  $target.innerHTML = text;
}
function updatePlaceholder($target, text) {
  $target.setAttribute(`placeholder`, text);
}
function updateLanguage(elements, languages) {
  let $body = document.body;
  let $lang_selected = query(`input[name="lang-select"]:checked`).value;
  $body.dataset.language = $lang_selected;
  changeLanguage(elements, languages[$lang_selected]);
}