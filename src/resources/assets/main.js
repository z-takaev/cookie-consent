document.addEventListener("DOMContentLoaded", () => {

  sc_options = {
    text: 'Мы используем файлы cookie, чтобы вам было удобнее пользоваться нашим сайтом. Продолжая использование сайта, вы соглашаетесь c использованием нами файлов cookies.',
    textButton: "Принять",
  };

  function getCookie(name) {
    let matches = document.cookie.match(
      new RegExp(
        "(?:^|; )" +
          name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, "\\$1") +
          "=([^;]*)",
      ),
    );
    return matches ? decodeURIComponent(matches[1]) : undefined;
  }

  function setCookie(name, value, options = {}) {
    options = {
      path: "/",
      // при необходимости добавьте другие значения по умолчанию
      ...options,
    };

    if (options.expires instanceof Date) {
      options.expires = options.expires.toUTCString();
    }

    let updatedCookie =
      encodeURIComponent(name) + "=" + encodeURIComponent(value);

    for (let optionKey in options) {
      updatedCookie += "; " + optionKey;
      let optionValue = options[optionKey];
      if (optionValue !== true) {
        updatedCookie += "=" + optionValue;
      }
    }

    document.cookie = updatedCookie;
  }

  let sc_widget = function (options) {
      let sc_widget = document.querySelector(".sc-widget");
      let sc_agree_button = document.querySelector(".sc-widget__button");

      sc_widget.classList.add('show');

      sc_agree_button.onclick = () => {
        setCookie('sc_cookies', true);
        sc_widget.remove();
      }
  };

  if (!getCookie("sc_cookies")) {
    sc_widget(sc_options);
  } else {
    console.log(getCookie("sc_cookies"));
  }
});