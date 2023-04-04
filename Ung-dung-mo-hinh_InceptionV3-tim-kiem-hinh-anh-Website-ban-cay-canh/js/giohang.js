
    function tempAlert(msg, duration) {
        var el = document.getElementById('alertdiv');
        var str = '';
        // str += '<div><i class="fa fa-check" style="font-size:48px;color:green"></i></div>';
        str += '<div><p><strong>Đã thêm vào giỏ</strong></p></div>';

        el.innerHTML = str;
        el.style.display = "unset";
        setTimeout(function () {
            el.innerHTML = "";
            el.style.display = "none";
        }, duration);
        document.body.appendChild(el);
    }