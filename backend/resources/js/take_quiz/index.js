const { quizTimerInit } = require("./timer")

function onTakeQuizInit() {
    const questionElements = $(".question-constructor");
    const answersInput = $("#answers-input");
    const submitButton = $("#submit-quiz");
    const quizTimer = $("#quiz-timer");
    const quizForm = $("#quiz-form");
    const questionAnswers = {};

    submitButton.on("click", function (e) {
        if (Object.keys(questionAnswers).length !== questionElements.length) {
            window.showToast("You haven't answered all the questions");
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

    quizTimerInit(parseInt(quizTimer.attr("timeLimit")) * 60);
}

module.exports = { onTakeQuizInit }
