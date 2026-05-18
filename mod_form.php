<?php

defined('MOODLE_INTERNAL') || die();
require_once($CFG->dirroot . '/course/moodleform_mod.php');

class mod_cykalgorithm_mod_form extends moodleform_mod {

    public function definition()
    {
        $mform = $this->_form;

        $mform->addElement('text', 'name', get_string('name'));
        $mform->setType('name', PARAM_TEXT);
        $mform->addRule('name', null, 'required');


        // -------------------------
        // Main table field: inputstring
        // -------------------------
        $mform->addElement('text', 'inputstring', get_string('inputstring', 'cykalgorithm'));
        $mform->setType('inputstring', PARAM_TEXT);
        $mform->addRule('inputstring', null, 'required');

        // -------------------------
        // Rules table fields: ONE rule only
        // -------------------------
        $mform->addElement('text', 'lhs', get_string('lhs', 'cykalgorithm'));
        $mform->setType('lhs', PARAM_TEXT);
        $mform->addRule('lhs', null, 'required');

        $mform->addElement('text', 'rhs', get_string('rhs', 'cykalgorithm'));
        $mform->setType('rhs', PARAM_TEXT);
        $mform->addRule('rhs', null, 'required');

        // -------------------------
        // Standard action buttons
        // -------------------------
        $this->standard_coursemodule_elements();
        $this->add_action_buttons();
    }
}
