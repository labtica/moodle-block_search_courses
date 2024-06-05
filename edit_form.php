<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Class block_search_courses_edit_form
 * 
 * The function that this file fulfills in the plugin is to add to the
 * block configuration form, a field to change the name of the block.
 * 
 * @package		block_search_courses
 * @copyright	2021 Escuela Didáctica <soporte@escueladidactica.com>
 * @license		http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class block_search_courses_edit_form extends block_edit_form {
 
    /**
     * Specific function to define the structure of the block editing form.
     *
     * @param [type] $mform The Moodle form object.
     * @return void
     */
    protected function specific_definition($mform) {
 
        // Section title to modify block
        $mform->addElement('header', 'config_header', get_string('blocksettings', 'block'));
 
        // Field to modify the title of the block
        $mform->addElement('text', 'config_title', get_string('config_title', 'block_search_courses'));
        $mform->setDefault('config_title', get_string('title', 'block_search_courses'));
        $mform->setType('config_title', PARAM_TEXT);
 
    }
}