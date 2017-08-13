<?php
session_start();
if (isset($_SESSION['user_id'])){
    if ($_SESSION['user_id'] !== 6){
        exit;
    }
} else {
    echo "You have no rights!!";
    exit;
}


?>

<h1>Admin punnel</h1>
<div>
    <h3>Изменить фон сайта</h3>
    <form >
        <input type="color" name="color_site">
        <input id="submit" type="submit">
    </form>


    <h3>Изменить фон шапки</h3>
    <form >
        <input type="color" name="color_header">
        <input id="submit2" type="submit">
    </form>

</div>


<script>
    document.getElementById('submit').addEventListener('click', func);

    function func() {
        var val = document.getElementsByTagName('form')[0].children[0].value;
        if ('localstorage' in window || window['localStorage'] !== null) {
            localStorage.setItem('bg', val);
        }
    }

    document.getElementById('submit2').addEventListener('click', func2);

    function func2() {
        var val = document.getElementsByTagName('form')[1].children[0].value;
        if ('localstorage' in window || window['localStorage'] !== null) {
            localStorage.setItem('header', val);
        }
    }

</script>




