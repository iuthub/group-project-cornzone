
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
const { onCreateQuizInit } = require('./create_quiz');
const { onTakeQuizInit } = require('./take_quiz');

const createQuizPage = $("#create-quiz-page");
const teacherIndexPage = $("#teacher-quizzes");
const takeQuizPage = $("#take-quiz");

function showToast(message) {
    const toast = $(".toast");

    $(toast.children(".toast-body")[0]).text(message);
    toast.toast("show");
}

window.showToast = showToast;

$(document).ready(function () {
    $(".toast").toast({delay: 4000, autohide: true});

    if (createQuizPage != null) {
        onCreateQuizInit();
    }

    if (takeQuizPage != null) {
        onTakeQuizInit();
    }

    if (teacherIndexPage != null) {
        const copyButtons = $(".copy-button");
        const linkInput = $("#link-input");

        for (const button of copyButtons) {
            $(button).on("click", function (e) {
                e.preventDefault();

                linkInput.val(`https://quizify.uz/quizzes/${$(button).attr("quizId")}`)

                $('#copy-link').modal({ show: true });
            });
        }
    }
});

