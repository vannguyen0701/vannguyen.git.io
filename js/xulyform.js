function checkname() {
    var name = document.getElementById('fname').value;
    if (name.length < 2) {
        document.getElementById('fname').style.outlineColor = "red";
        return;
    } else {
        document.getElementById('fname').style.outlineColor = "green";
    }


}

function checkdata() {
    if (document.forms[0].fname.value == "" ||
        document.forms[0].mail.value == "" ||
        document.forms[0].pw.value == "" ||
        document.forms[0].repw.value == "") {
        alert("Vui lòng nhập thông tin!");
        return 1;
    }
    return 0;
}

function checkrpw() {
    var a = document.getElementById('pw').value;
    var b = document.getElementById('repw').value
    if (a != b) {
        document.getElementById('errorpw').innerHTML = "Nhập lại mật khẩu không đúng";
        return 0;
    }

}

function checkphone() {
    var phone = document.getElementById('phone').value;
    if (phone.length < 10 || phone.length > 11) {
        document.getElementById('phone').style.outlineColor = "red";
    } else {
        document.getElementById('phone').style.outlineColor = "green";
    }
}

function checkpw() {
    var x = document.getElementById('pw').value;
    if (x.length < 12 || x.length > 16) {
        if (x.length < 8) {
            document.getElementById('pw').style.outlineColor = "red";
            return;
        } else {
            document.getElementById('pw').style.outlineColor = "#ffcb3d";
            return;
        }
    } else {
        document.getElementById('pw').style.outlineColor = "green";
    }
}

function checkmail() {
    var a = document.getElementById('mail').value;
    var c = a.indexOf("@gmail.com");
    if (c == -1) {
        document.getElementById('mail').style.outlineColor = "red";
        return;
    } else {
        document.getElementById('mail').style.outlineColor = "green";
    }

}

// function check() {
//     // if (checkdata() == 1) {
//     //     return;
//     // }
//     if (checkrpw() == 1) {
//         return 0;
//     }
// }
//     i = ktsdt();
//     if (i == 1) {
//         alert("Đăng ký thất bại!");
//         return;
//     }
//     if (i == 0)
//         alert("Đăng ký thành công!");
//     return;
// }


// // function kttendn() {
// //     var a = document.forms[0].username.value;
// //     var c = a.indexOf(" ");
// //     var b = a.substr(0, 1);
// //     var i = 1;
// //     var d = b.charCodeAt();
// //     if ((d >= 65 && d <= 90) || (d >= 97 && d <= 122))
// //         i = 0;
// //     if (i == 1 || c != -1) {
// //         alert("Tên đăng nhập không được chứa khoảng trống và phải bất đầu là 1 ký tự!");
// //         return 1;
// //     }
// //     return 0;
// // }


// function ktsdt() {
//     var a = document.forms[0].sdt.value;
//     var b = a.length;
//     if (b != 12) {
//         alert("Sđt phải là 12 số!");
//         return 1;
//     }

//     for (i = 0; i < b; i++) {
//         t = a.substr(i, 1);
//         if (t.charCodeAt() > 57 || t.charCodeAt() < 48) {
//             alert("Sđt phải là 12 số!");
//             return 1;
//         }
//     }
//     return 0;
// }

// function ktmk2() {
//     var a = document.forms[0].pw.value;
//     var ten = document.forms[0].ten.value;
//     var b = a.length;
//     if (b < 8 || b > 16) {
//         alert("Mật khẩu phải có từ 8-16 ký tự!");
//         return 1;
//     }
//     var c = 0,
//         s = 0,
//         ch = 0,
//         kt = 0;
//     for (i = 0; i < b; i++) {
//         t = a.substr(i, 1);
//         so = t.charCodeAt();
//         if (so >= 65 && so <= 90)
//             ch += 1;
//         else {
//             if (so >= 97 && so <= 122)
//                 c += 1;
//             else {
//                 if (so >= 48 && so <= 57)
//                     s += 1;
//                 else
//                     kt += 1;
//             }
//         }
//     }
//     if (c == 0 || s == 0 || ch == 0 || kt == 0) {
//         alert("Mat khẩu phải chứa ký tự, ký số, ký tự đặc biệt , có chữ hoa và chữ thường!");
//         return 1;
//     }
//     if (a.indexOf(ten) != -1) {
//         alert("Mật khẩu không được chứa tên!");
//         return 1;
//     }
//     return 0;
// }