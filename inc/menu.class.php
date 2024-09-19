<?php

/**
 * -------------------------------------------------------------------------
 * Fields plugin for GLPI
 * -------------------------------------------------------------------------
 *
 * LICENSE
 *
 * This file is part of Fields.
 *
 * Fields is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * Fields is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Fields. If not, see <http://www.gnu.org/licenses/>.
 * -------------------------------------------------------------------------
 * @copyright Copyright (C) 2013-2023 by Fields plugin team.
 * @license   GPLv2 https://www.gnu.org/licenses/gpl-2.0.html
 * @link      https://github.com/pluginsGLPI/fields
 * -------------------------------------------------------------------------
 */

class PluginUpdateemailMenu extends CommonGLPI
{
    public static $rightname = 'entity';

    public static function getMenuName()
    {
        return  __('Update Email from CSV', 'updateemail');
    }

    public static function getMenuContent()
    {
        if (!Session::haveRight('entity', READ)) {
            return;
        }

        $front_fields = Plugin::getPhpDir('updateemail', false) . "/front";
        $menu = [
            'title' => self::getMenuName(),
            'page'  =>  "$front_fields/updateemail.php",
            'icon'  =>"fa-fw ti ti-mail",
        ];

        return $menu;
    }
}
