const { createNewQuestion } = require("./question_constructor");

class QuestionElement {
    constructor(type, points, element) {
        this.type = type;
        this.points = points;
        this.element = element;
    }
}

function getQuestionData(element) {
    const answers = [];

    const questionText = $($($(element).children(".question-title")[0]).children(".question-input")[0]).val();
    const answerElements = $(element).children(".question-answer-variant");

    for (const element of answerElements) {
        const answerText = $($(element).children(".answer-input")[0]).val();
        const isRightAnswer = $(element).children(".radio-btn")[0].classList.contains("checked");

        answers.push({ answerText, isRightAnswer });
    }

    return { questionText, answers }
}

function onCreateQuizInit() {
    const questionsElement = $("#questions");
    const typeSelector = $("#type-selector");
    const addQuestionButton = $("#add-question");
    const questionPoints = $("#question-points");
    const createQuizForm = $("#create-quiz-form");
    const hiddenQuestionsInput = $("#hidden-questions-input");
    const questions = [];

    let formCalculated = false;

    addQuestionButton.on("click", function (_) {
        const selected = typeSelector.children("option:selected").val();

        if (selected !== "null") {
            const question = new QuestionElement(selected, questionPoints.val(), createNewQuestion(questions.length + 1, selected));
            questions.push(question);

            questionsElement.empty();

            for (const question of questions) {
                questionsElement.append(question.element);
            }

            typeSelector.val("null")
            questionPoints.val("1");
            questionsElement.show();
        }
    })

    createQuizForm.submit(function (e) {
        if (!formCalculated) {
            e.preventDefault();

            if (questions.length === 0) {
                window.showToast("You have not added questions to the quiz");
                return;
            }

            const _questions = [];

            for (const question of questions) {
                _questions.push({
                    type: question.type,
                    points: question.points,
                    ...getQuestionData(question.element),
                });
            }

            hiddenQuestionsInput.val(JSON.stringify(_questions));

            formCalculated = true;
            createQuizForm.submit();
        } else {
            formCalculated = false;
        }
    });

    if (questionsElement.children().length === 1) {
        questionsElement.hide();
    }
}

module.exports = { onCreateQuizInit }
