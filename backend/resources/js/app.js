
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

const FULL_DASH_ARRAY = 283;
const WARNING_THRESHOLD = 10; // need to be automatized
const ALERT_THRESHOLD = 5; // need to be automatized

const COLOR_CODES = {
    info: {
        color: "green"
    },
    warning: {
        color: "yellow",
        threshold: WARNING_THRESHOLD
    },
    alert: {
        color: "red",
        threshold: ALERT_THRESHOLD
    }
};

const TIME_LIMIT = 20;
let timePassed = 0;
let timeLeft = TIME_LIMIT;
let timerInterval = null;
let remainingPathColor = COLOR_CODES.info.color;

document.getElementById("countdown").innerHTML = `
<div class="base-timer">
  <svg class="base-timer__svg" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
    <g class="base-timer__circle">
      <circle class="base-timer__path-elapsed" cx="50" cy="50" r="45"></circle>
      <path
        id="base-timer-path-remaining"
        stroke-dasharray="283"
        class="base-timer__path-remaining ${remainingPathColor}"
        d="
          M 50, 50
          m -45, 0
          a 45,45 0 1,0 90,0
          a 45,45 0 1,0 -90,0
        "
      ></path>
    </g>
  </svg>
  <span id="base-timer-label" class="base-timer__label">
${formatTime(timeLeft)}
</span>
</div>
`;

startTimer();

function onTimesUp() {
    clearInterval(timerInterval);
}

function startTimer() {
    timerInterval = setInterval(() => {
        timePassed = timePassed += 1;
        timeLeft = TIME_LIMIT - timePassed;
        document.getElementById("base-timer-label").innerHTML = formatTime(
            timeLeft
        );
        setCircleDasharray();
        setRemainingPathColor(timeLeft);

        if (timeLeft === 0) {
            onTimesUp();
        }
    }, 1000);
}

function formatTime(time) {
    const minutes = Math.floor(time / 60);
    let seconds = time % 60;

    if (seconds < 10) {
        seconds = `0${seconds}`;
    }

    return `${minutes}:${seconds}`;
}

function setRemainingPathColor(timeLeft) {
    const { alert, warning, info } = COLOR_CODES;
    if (timeLeft <= alert.threshold) {
        document
            .getElementById("base-timer-path-remaining")
            .classList.remove(warning.color);
        document
            .getElementById("base-timer-path-remaining")
            .classList.add(alert.color);
    } else if (timeLeft <= warning.threshold) {
        document
            .getElementById("base-timer-path-remaining")
            .classList.remove(info.color);
        document
            .getElementById("base-timer-path-remaining")
            .classList.add(warning.color);
    }
}

function calculateTimeFraction() {
    const rawTimeFraction = timeLeft / TIME_LIMIT;
    return rawTimeFraction - (1 / TIME_LIMIT) * (1 - rawTimeFraction);
}

function setCircleDasharray() {
    const circleDasharray = `${(
        calculateTimeFraction() * FULL_DASH_ARRAY
    ).toFixed(0)} 283`;
    document
        .getElementById("base-timer-path-remaining")
        .setAttribute("stroke-dasharray", circleDasharray);
}
