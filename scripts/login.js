import { makeToastNotification } from "./helper.js";

export function loadLogin() {
    const template = /* html */`
    <section id="login" class="form-box">
        <form id="login-form">
            <p id="login-form-message" class="form__message">Welcome</p>
            <div id="login-form-inputs" class="form__inputs">

                <div class="form__inputs-container normal">

                    <div class="icon-container">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" id="at"><g data-name="Layer 2"><path d="M13 2a10 10 0 0 0-5 19.1 10.15 10.15 0 0 0 4 .9 10 10 0 0 0 6.08-2.06 1 1 0 0 0 .19-1.4 1 1 0 0 0-1.41-.19A8 8 0 1 1 12.77 4 8.17 8.17 0 0 1 20 12.22v.68a1.71 1.71 0 0 1-1.78 1.7 1.82 1.82 0 0 1-1.62-1.88V8.4a1 1 0 0 0-1-1 1 1 0 0 0-1 .87 5 5 0 0 0-3.44-1.36A5.09 5.09 0 1 0 15.31 15a3.6 3.6 0 0 0 5.55.61A3.67 3.67 0 0 0 22 12.9v-.68A10.2 10.2 0 0 0 13 2zm-1.82 13.09A3.09 3.09 0 1 1 14.27 12a3.1 3.1 0 0 1-3.09 3.09z" data-name="at"></path></g></svg>
                    </div>

                    <input
                        type="email"
                        class="form__inputs-container__input"
                        id="email-input"
                        placeholder="Pedro@gmail.com"
                        required
                        maxlength="255">
                </div>

                <div class="form__inputs-container password">

                    <div class="icon-container">
                        <svg id="lock" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M17,9V7A5,5,0,0,0,7,7V9a3,3,0,0,0-3,3v7a3,3,0,0,0,3,3H17a3,3,0,0,0,3-3V12A3,3,0,0,0,17,9ZM9,7a3,3,0,0,1,6,0V9H9Zm9,12a1,1,0,0,1-1,1H7a1,1,0,0,1-1-1V12a1,1,0,0,1,1-1H17a1,1,0,0,1,1,1Z"/></svg>
                    </div>

                    <input
                        type="password"
                        class="form__inputs-container__input"
                        id="password-input"
                        placeholder="Password"
                        required
                        maxlength="255">

                    <div class="icon-container">
                        <svg id="eye" version="1.0" xmlns="http://www.w3.org/2000/svg" width="700.000000pt" height="700.000000pt" viewBox="0 0 700.000000 700.000000" preserveAspectRatio="xMidYMid meet"><metadata>Created by potrace 1.12, written by Peter Selinger 2001-2015</metadata><g transform="translate(0.000000,700.000000) scale(0.100000,-0.100000)" fill="#000000" stroke="none"><path d="M3235 5364 c-687 -67 -1302 -310 -1895 -747 -186 -137 -308 -243 -506 -441 -295 -296 -520 -588 -719 -935 -127 -222 -139 -276 -86 -386 71 -152 240 -204 388 -119 51 29 75 61 138 179 248 465 663 936 1125 1277 166 122 310 210 515 313 330 167 645 264 995 305 711 85 1425 -118 2080 -588 484 -348 927 -845 1188 -1332 50 -93 77 -126 126 -155 142 -83 308 -34 384 114 57 113 46 167 -81 387 -194 337 -416 623 -715 924 -319 322 -595 537 -947 740 -251 145 -632 304 -865 360 -339 83 -477 101 -805 105 -154 1 -298 1 -320 -1z"></path><path d="M3370 4304 c-14 -3 -64 -11 -111 -19 -385 -64 -752 -331 -942 -686 -49 -92 -105 -245 -130 -358 -30 -131 -31 -402 -3 -536 84 -404 340 -744 702 -932 387 -202 855 -198 1242 8 351 187 593 508 684 908 30 131 32 402 4 536 -113 544 -537 962 -1074 1061 -85 16 -323 27 -372 18z m326 -565 c507 -132 755 -710 500 -1163 -144 -255 -403 -406 -696 -406 -408 0 -738 292 -790 699 -50 393 203 766 590 870 107 28 287 29 396 0z"></path></g></svg>
                        <svg id="eye-close" version="1.0" xmlns="http://www.w3.org/2000/svg" width="700.000000pt" height="700.000000pt" viewBox="0 0 700.000000 700.000000" preserveAspectRatio="xMidYMid meet"> <metadata> Created by potrace 1.12, written by Peter Selinger 2001-2015 </metadata> <g transform="translate(0.000000,700.000000) scale(0.100000,-0.100000)" fill="#000000" stroke="none"> <path d="M420 5084 c-111 -48 -159 -193 -97 -291 82 -129 501 -532 715 -687 28 -21 52 -42 52 -47 0 -5 -67 -96 -148 -202 -81 -106 -220 -286 -307 -401 -88 -114 -192 -250 -232 -301 -39 -51 -79 -108 -89 -127 -21 -41 -22 -134 -1 -174 20 -39 75 -90 110 -103 40 -16 132 -13 170 3 47 21 64 39 157 161 46 61 136 178 199 260 63 83 170 220 236 307 66 86 153 199 193 252 l73 96 52 -29 c275 -152 529 -258 862 -356 28 -8 72 -20 99 -25 27 -6 56 -15 66 -20 20 -11 22 3 -75 -465 -30 -148 -74 -358 -96 -465 -66 -322 -73 -369 -60 -418 35 -127 180 -188 301 -127 84 43 96 69 157 368 29 144 71 352 94 462 22 110 57 281 77 380 l37 180 45 0 c25 -1 145 -7 267 -14 181 -10 264 -10 450 0 125 7 246 13 268 14 l40 0 37 -180 c20 -99 55 -270 77 -380 23 -110 65 -318 94 -462 61 -299 73 -325 157 -368 121 -61 266 0 301 127 13 49 6 96 -60 418 -22 107 -66 317 -96 465 -31 149 -64 312 -74 363 l-18 94 21 8 c11 5 66 21 121 35 361 94 789 281 1075 469 30 20 60 36 66 36 7 0 30 -35 51 -77 534 -1049 526 -1033 559 -1067 38 -39 83 -56 148 -56 66 0 102 12 139 48 51 48 69 88 70 151 0 55 -7 71 -183 417 -101 197 -209 409 -240 469 -145 279 -192 377 -184 385 5 4 42 36 83 70 172 147 443 425 498 513 47 74 29 191 -39 254 -57 53 -159 68 -233 34 -25 -11 -75 -57 -134 -122 -467 -514 -973 -854 -1581 -1061 -734 -250 -1634 -252 -2370 -3 -173 58 -243 87 -410 167 -441 211 -822 500 -1181 897 -59 66 -109 111 -134 122 -48 22 -127 24 -175 3z"></path> </g></svg>
                    </div>

                </div>

            </div>
            <div id="login-form-options" class="form__options">
                <p id="login-form-options-title" class="form__options__form-title">Login</p>
                <button id="login-form-options-submit" class="form__options__form-submit">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M15.54,11.29,9.88,5.64a1,1,0,0,0-1.42,0,1,1,0,0,0,0,1.41l4.95,5L8.46,17a1,1,0,0,0,0,1.41,1,1,0,0,0,.71.3,1,1,0,0,0,.71-.3l5.66-5.65A1,1,0,0,0,15.54,11.29Z"/></svg>
                </button>
            </div>
            <p id="forgot-password">Forgot Password?</p>
        </form>
        <p id="to-register" class="redirect">Don't have an account yet? Login now</p>
    </section>
    `;

    document.body.innerHTML += template;

    const loginSection = document.getElementById("login");

    setTimeout(() => {
        loginSection.classList.add("active");
        if (document.getElementById("register")) {
            setTimeout(() => {
                document.getElementById("register").remove();
            }, 500);
        }
    }, 200);

    document.getElementById("login-form-options-submit").onclick = (event) => {

        event.preventDefault();

        const password = document.getElementById("password-input").value;
        const email = document.getElementById("email-input").value;

        if (email.trim() === "") {
            makeToastNotification("Email cannot be empty");
            return;
        }

        if (!email.trim().includes("@")) {
            makeToastNotification("Missing '@'");
            return;
        }

        if (email.trim().length > 255) {
            makeToastNotification("Cannot be greater than 255");
            return;
        }

        if (password.trim() === "") {
            makeToastNotification("Password cannot be empty");
            return;
        }
        if (password.trim().length > 255) {
            makeToastNotification("Cannot be greater than 255");
            return;
        }

        const formData = new FormData();
        formData.append("email", email);
        formData.append("password", password);

        fetch("views/login.php", {
            method: "POST",
            body: formData,
        })
            .then((response) => response.json())
            .then((data) => {
                if (data.status === "error") {
                    makeToastNotification(data.message);
                }

                if (data.status === "success") {
                    makeToastNotification(data.message);
                    var delay = 1000;
                    setTimeout(function () {
                        window.location = "dashboard.php";
                    }, delay);
                }
            })
            .catch(function (error) {
                console.error("Error:", error);
            });
    };
}
