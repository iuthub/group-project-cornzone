
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
const { onCreateQuizInit } = require('./create_quiz');

const createQuizPage = $("#create-quiz-page");
const teacherIndexPage = $("#teacher-quizzes");
const takeQuizPage = $("#take-quiz");

function showToast(message) {
    const toast = $(".toast");

    $(toast.children(".toast-body")[0]).text(message);
    toast.toast("show");
}

$(document).ready(function () {
    $(".toast").toast({delay: 4000, autohide: true});

    if (createQuizPage != null) {
        onCreateQuizInit();
    }

    if (takeQuizPage != null) {
        const questionElements = $(".question-constructor");
        const submitButton = $("#submit-quiz");
        const answersInput = $("#answers-input");
        const quizForm = $("#quiz-form");
        const questionAnswers = {};

        submitButton.on("click", function (e) {
            if (Object.keys(questionAnswers).length !== questionElements.length) {
                showToast("You haven't answered all the questions")
            } else {
                answersInput.val(JSON.stringify(questionAnswers));

                quizForm.submit();
            }
        });

        for (const questionElement of questionElements) {
            const questionId = $(questionElement).attr("questionId");

            const answerElements = $($(questionElement).children(".answers")[0]).children(".col-6").children(".answer");
            const answerInput = $($(questionElement).children(".answers")[0]).children(".col-12").children(".answer")[0];

            for (const answerElement of answerElements) {
                const answer = $(answerElement);

                answer.on("click", function(_) {
                    questionAnswers[questionId] = answer.text().trim();

                    for (const sibling of answer.parent().siblings()) {
                        $(sibling).children(".answer").removeClass("highlight");
                    }

                    answer.addClass("highlight");
                });
            }

            if (answerInput) {
                $($(answerInput).children("input")[0]).on("change", function(e) {
                    questionAnswers[questionId] = e.target.value;
                    $(e.target).addClass("highlight")
                });
            }
        }
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
