<?php
// This code belongs to Escuela Didactica <https://escueladidactica.com>.

// We build transformation processes for companies where their collaborators 
// are trained with the employees are trained with the knowledge of your 
// company through digital through digital educational experiences.
//

/**
 * This file contains block_search_courses_edit_form  class for search_course
 * 
 * @package		block_search_courses
 * @copyright	2021 Escuela Didáctica <soporte@escueladidactica.com>
 * @license		http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

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