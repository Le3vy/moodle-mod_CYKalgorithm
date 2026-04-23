<?php

defined('MOODLE_INTERNAL') || die();
require_once($CFG->dirroot . '/course/moodleform_mod.php');

class mod_cykalgorithm_mod_form extends moodleform_mod
{
    public function definition()
    {
        $mform = $this->_form;

        $mform->addElement('textarea', 'grammar', get_string('grammar', 'cyk'), 'wrap="virtual" rows="10" cols="60"');
        $mform->setType('grammar', PARAM_RAW);
        $mform->addRule('grammar', null, 'required');

        $mform->addElement('text', 'inputstring', get_string('inputstring', 'cyk'));
        $mform->setType('inputstring', PARAM_TEXT);
        $mform->addRule('inputstring', null, 'required');

        $this->add_action_buttons();
    }
}
