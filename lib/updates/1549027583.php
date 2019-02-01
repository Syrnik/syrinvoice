<?php
$plugin_path = wa('shop')->getConfig()->getPluginPath('syrinvoice');
foreach (array(
             $plugin_path . '/img/label-en.png',
             $plugin_path . '/img/label-ru.png',
             $plugin_path . '/img/screenshot_1.png',
             $plugin_path . '/img/screenshot_2.png',
             $plugin_path . '/img/screenshot_3.png',
             $plugin_path . '/img/screenshot_4.png',
         ) as $file) {
    try {
        waFiles::delete($file);
    } catch (Exception $e) {
        waLog::log("Ошибка при выполнении удаления ненужных файлов в скрипте обновления " . __FILE__ . ": " . $e->getMessage(), 'sdekint.log');
    }
};
