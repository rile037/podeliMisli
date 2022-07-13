const toggleButton = document.getElementsByClassName("toggle-button")[0];
const navbarLinks = document.getElementsByClassName("navbar-links")[0];

let rotated = false;

toggleButton.addEventListener("click", () => {
  navbarLinks.classList.toggle("active");
  if (rotated == false) {
    toggleButton.style.transform = "rotate(90deg)";
    toggleButton.style.transition = "0.4s";
    rotated = true;
  } else {
    toggleButton.style.transform = "rotate(0deg)";
    toggleButton.style.transition = "0.4s";
    rotated = false;
  }
});

window.onload = function () {
  const filterBy = document.getElementById("filter");
  const filterName = document.getElementById("filterName");

  filterBy.onchange = function () {
    if (filterBy.selectedIndex === 1) {
      filterName.innerText = "Najnovije ispovesti";
      $.ajax({
        url: "index.php",
        type: "POST",
        data: {
          test: 0,
        },
        dataType: "txt",
        success: function (data) {
          alert("Data: " + data);
        },
        error: function (request, error) {
          alert("Request: " + JSON.stringify(request));
        },
      });

      if (filterBy.selectedIndex === 1) {
        filterName.innerText = "Najviše odobrene ispovesti";
      }
      if (filterBy.selectedIndex === 2) {
        filterName.innerText = "Najviše osuđene ispovesti";
      }
    }

    const togglePassword = document.querySelector("#togglePassword");
    const togglePassword1 = document.querySelector("#togglePassword1");
    const togglePassword2 = document.querySelector("#togglePassword1");

    const password = document.querySelector("#id_password");
    const password1 = document.querySelector("#id_password1");
    const password2 = document.querySelector("#id_password2");

    if (togglePassword) {
      togglePassword.addEventListener("click", function (e) {
        // toggle the type attribute
        console.log("test");
        const type =
          password.getAttribute("type") === "password" ? "text" : "password";
        password.setAttribute("type", type);
        // toggle the eye slash icon
        this.classList.toggle("fa-eye-slash");
      });
    }
    if (togglePassword1) {
      togglePassword1.addEventListener("click", function (e) {
        // toggle the type attribute
        console.log("test");
        const type =
          password1.getAttribute("type") === "password" ? "text" : "password";
        password1.setAttribute("type", type);
        // toggle the eye slash icon
        this.classList.toggle("fa-eye-slash");
      });
    }
    if (togglePassword2) {
      togglePassword2.addEventListener("click", function (e) {
        // toggle the type attribute
        console.log("test");
        const type =
          password2.getAttribute("type") === "password" ? "text" : "password";
        password2.setAttribute("type", type);
        // toggle the eye slash icon
        this.classList.toggle("fa-eye-slash");
      });
    }
  };
};

function comment_post(el) {
  const xmlhttp = new XMLHttpRequest();

  xmlhttp.onload = function () {
    alert("test");
    let id = el.getAttribute("data-post_id");
    let submit = el.getAttribute("comment_post");

    xmlhttp.open(
      "GET",
      "functions/comment.php?post_id=" + el.getAttribute("data-post_id")
    );
    xmlhttp.send();
  };
}

function approve_post(el) {
  const xmlhttp = new XMLHttpRequest();

  xmlhttp.onload = function () {
    let id = el.getAttribute("data-post_id");

    document.getElementById("approve_" + id).innerText =
      "Odobravanja: " + this.responseText;

    el.setAttribute("disabled", "disabled");
    el.style.background = "green";
    el.style.color = "white";
    setCookie("approved_" + id, id, 15);
  };

  xmlhttp.open(
    "GET",
    "functions/approve.php?post_id=" + el.getAttribute("data-post_id")
  );
  xmlhttp.send();

  if (getCookie("approved_") !== "") {
    document.querySelector(
      'button[data-post_id="' + getCookie("approved") + '"]'
    );
  }
}
function judge_post(el) {
  const xmlhttp = new XMLHttpRequest();

  xmlhttp.onload = function () {
    let id = el.getAttribute("data-post_id");

    document.getElementById("judge_" + id).innerText =
      "Osude: " + this.responseText;

    el.setAttribute("disabled", "disabled");
    el.style.background = "red";
    el.style.color = "white";
    setCookie("judged_" + id, id, 9999);
  };

  xmlhttp.open(
    "GET",
    "functions/judge.php?post_id=" + el.getAttribute("data-post_id")
  );
  xmlhttp.send();

  if (getCookie("judged") !== "") {
    document.querySelector(
      'button[data-post_id="' + getCookie("judged") + '"]'
    );
  }
}

function setCookie(name, value, days) {
  var expires = "";
  if (days) {
    var date = new Date();
    date.setTime(date.getTime() + days * 24 * 60 * 60 * 1000);
    expires = "; expires=" + date.toUTCString();
  }
  document.cookie = name + "=" + (value || "") + expires + "; path=/";
}

function getCookie(name) {
  var nameEQ = name + "=";
  var ca = document.cookie.split(";");
  for (var i = 0; i < ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == " ") c = c.substring(1, c.length);
    if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
  }
  return null;
}
function eraseCookie(name) {
  document.cookie = name + "=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;";
}
