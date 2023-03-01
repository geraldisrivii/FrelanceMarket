<?php
$dirPath = './../html';
$files_data = [];
$page_data = [];
if($handle = opendir($dirPath)) {
    while(($entry = readdir($handle))) {
        if($entry != '.' && $entry != '..') {
            if($handleInto = opendir("$dirPath/$entry")) {
                while(($entryInto = readdir($handleInto))) {
                    if($entryInto != '.' && $entryInto != '..') {
                        $files_data[] =  file_get_contents("$dirPath/$entry/$entryInto");
                    }
                }
                closedir($handleInto);
            }
        }
        if($files_data[0] != ''){
            $page_data[$entry] = $files_data;
        }
        $files_data = [];
    }
    closedir($handle);
}
function replaceToString($key){
    global $page_data;
    $out = '';
    for ($i=0; $i < count($page_data[$key]); $i++) { 
        $out .= $page_data[$key][$i];
    }
    return $out;
}
if (isset($_POST['action']) and !empty($_POST['action'])) {
    /* $convertedUrl = substr($_POST['action'], strpos($_POST['action'], '#') + 1); */
    echo replaceToString($_POST['action']);
    echo '<br>';
}





























/* $page = "<div class=\"page first-page\">
<h1>Первая страница</h1>
<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis reprehenderit similique, quis itaque corrupti tempora laboriosam veniam sed eveniet quisquam laudantium, debitis, explicabo facilis cumque consequatur aliquam vel quod voluptatum?
Commodi quaerat soluta facere fugiat. Ab non fugiat corrupti molestias culpa beatae quia nam velit dolores cum nisi animi, eius distinctio error repellat dolorum quibusdam, necessitatibus voluptatibus quaerat aliquid placeat!
Inventore laboriosam tempora nam accusamus quia, soluta qui quisquam dolores iure, voluptatum nemo, beatae totam atque at saepe explicabo amet. Ipsum animi natus sint sed atque consectetur cupiditate aspernatur fugiat?
Nemo expedita, et veniam aspernatur consequatur, ullam laboriosam soluta facere voluptate harum, debitis rem optio? Neque veniam magni eum labore dolores quaerat maxime non sequi, autem ea perferendis at accusamus?
Id delectus deleniti voluptatibus? Qui magnam labore culpa in voluptatum nobis error illum necessitatibus eaque illo neque deleniti doloribus voluptates nihil tempore reprehenderit sapiente ipsum maiores, voluptas nesciunt consectetur! Corporis.
Voluptatibus quia sunt, accusamus tenetur eum totam atque deleniti ea sed iure, officiis reprehenderit, natus dolore ad corporis nihil tempore odio vero! Totam ipsam mollitia quod quae, dolor blanditiis voluptates!
Nesciunt placeat, tenetur quos reiciendis maiores atque voluptates, consequuntur deserunt quo nihil vitae deleniti. Delectus velit doloribus optio similique nesciunt consequatur eius quisquam quo necessitatibus corporis, esse, nostrum aliquam accusamus.
Est error modi nemo perferendis iste, fuga quis eligendi maxime totam cum corporis voluptates dicta ad odio ratione. Distinctio, consequuntur quam fugiat dolores non cum aliquam quisquam accusamus debitis omnis.
Debitis alias incidunt esse accusantium ex aliquid nemo consectetur eius aperiam, recusandae vel beatae vitae assumenda omnis quaerat inventore molestias? Explicabo provident, porro autem id eligendi quo non praesentium velit.
Numquam esse accusantium dolor saepe libero unde voluptates doloremque? Harum doloribus architecto distinctio officia id accusantium doloremque, exercitationem nihil optio natus porro adipisci praesentium, eaque quidem iure corporis voluptatibus molestias!</p>
</div>";
$page1 = "<div class=\"page second-page\">
<h1>Вторая страница</h1>
<form action=\"index.php\">
    <input type=\"text\" name=\"name\" placeholder=\"Введите имя\">
    <input type=\"text\" name=\"surname\" placeholder=\"Введите фамилию\">
    <button type=\"submit\">Отправить</button>
</form>
</div>";
$page2 = "<div class=\"page third-page\">
<h1>Третья страница</h1>
<h2>Добро пожаловать</h2>
</div>"; */
?>