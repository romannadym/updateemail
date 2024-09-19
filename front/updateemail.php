<?php

include ('../../../inc/includes.php');

Session::checkRight("config", READ);
Html::header(__('Update Email from CSV', 'updateemail'), $_SERVER['PHP_SELF'], 'config', 'pluginupdateemailmenu');
if (isset($_POST['submit'])) {
    $csvFile = $_FILES['csv_file']['tmp_name'];

    if (($handle = fopen($csvFile, 'r')) !== FALSE) {
        while (($data = fgetcsv($handle, 1000, ';')) !== FALSE) {
            $login = $data[0]; // Логин пользователя в первой колонке
            $email = $data[1]; // Новый email во второй колонке
            // Поиск пользователя по логину
            $user = new User();
            $user_data = $user->find(['name' => $login]);
          //  die(json_encode($user->fields['name']));
            // Проверка, что пользователь найден
           if (!empty($user_data)) {
               $user_id = key($user_data); // Получение ID пользователя
            //   die(json_encode($user_data));
               $post = [
                 "id" => $user_id,
                 "update"=>1,
                 "_useremails" => [
                   "-1" => $email
                 ]
               ];
                $user = new User();
                   // Сохранение изменений
                   if ( $user->update($post)) {
                       echo "Updated email for user $login to $email<br>";
                   } else {
                       echo "Failed to update email for user $user_id<br>";
                   }

           } else {
               echo "User $login not found<br>";
           }
        }
        fclose($handle);
    }
}



// Форма для загрузки CSV файла
echo '<form method="post" enctype="multipart/form-data">';
echo Html::hidden('_glpi_csrf_token', ['value' => Session::getNewCSRFToken()]);
echo '<input type="file" name="csv_file" />';
echo '<input type="submit" name="submit" value="Upload" />';
echo '</form>';

Html::footer();
