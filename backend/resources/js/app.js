
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
const { onCreateQuizInit } = require('./create_quiz');

const createQuizPage = $("#create-quiz-page");

$(document).ready(function () {
    if (createQuizPage != null) {
        onCreateQuizInit();
    }
});
