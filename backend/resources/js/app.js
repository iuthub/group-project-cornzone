
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
const { onCreateQuizInit } = require('./create_quiz');

const createQuizPage = $("#create-quiz-page");
const teacherIndexPage = $("#teacher-quizzes");

$(document).ready(function () {
    if (createQuizPage != null) {
        onCreateQuizInit();
    }

    if (teacherIndexPage != null) {
        const copyButtons = $(".copy-button");
        const linkInput = $("#link-input");

        for (const button of copyButtons) {
            $(button).on("click", function (e) {
                e.preventDefault();

                $('#copy-link').modal({ show: true });

                linkInput.val(`https://quizzes/${$(button).attr("quizid")}`)
            });
        }
    }
});
