<?php
//function render($templateName, $params = [])
//{
//    extract($params);
//    include TEMPLATES_DIR . "{$templateName}.php";
//}

/**
 * Функция отрисовывает лейаут (хэдер, футер ...), в который помещает нужный шаблон.
 * @param $template - нужный нам шаблон основного содержимого страницы.
 * @param array $params - массив параметров, которые нужно передать в шаблон.
 * @param bool $useLayout - если не нужен лейаут, то выводит только основное содержимое страницы.
 */
function render($template, $params = [], $useLayout = true){
    // Формируем шаблон основного содержимого страницы.
    $content = renderTemplate($template, $params);
    // Если нужен лейаут, то передаем отрисованный контент шаблона в функции отрисовки лейаута,
    // в противном случае выводим только шаблон.
    if($useLayout){
        $content = renderTemplate("layout/main", ['content' => $content]);
    }
    echo $content;
}

/**
 * Функция отрисовывает шаблон основного содержимого страницы.
 * @param $template - нужный нам шаблон основного содержимого страницы.
 * @param array $params - массив параметров, которые нужно передать в шаблон.
 * @return string - возвращает содержимое вывода шаблона в виде строки.
 */
function renderTemplate($template, $params = []){
    // Извлекаем параметры из массива в переменные.
    extract($params);
    // Запускаем буфер, чтобы содержимое пока не выводилось на страницу.
    ob_start(); // помещает выходной поток в буфер
    include TEMPLATES_DIR . "{$template}.php";
    return ob_get_clean(); // возвращает буфер и очищает его
}