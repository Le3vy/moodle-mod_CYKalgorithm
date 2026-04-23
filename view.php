<?php

require('../../config.php');
require_once($CFG->dirroot . '/mod/cykalgorithm/classes/output/table_renderer.php');

$cmid = required_param('id', PARAM_INT);

$cm = get_coursemodule_from_id('cykalgorithm', $cmid, 0, false, MUST_EXIST);
$course = $DB->get_record('course', ['id' => $cm->course], '*', MUST_EXIST);
$cyk = $DB->get_record('cykalgorithm', ['id' => $cm->instance], '*', MUST_EXIST);

require_login($course, false, $cm);

$PAGE->set_url('/mod/cykalgorithm/view.php', ['id' => $cm->id]);
$PAGE->set_title(format_string($cyk->name));
$PAGE->set_heading(format_string($course->fullname));

$table = new \mod_cykalgorithm\output\table_renderer($cyk->inputstring);

echo $OUTPUT->header();
echo $OUTPUT->render($table);
echo $OUTPUT->footer();
