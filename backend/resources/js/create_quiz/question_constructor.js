class CreateAnswerOptions {
    constructor(selected, marginTop, inputValue, inputDisabled, canBeDeleted) {
        this.selected = selected;
        this.marginTop = marginTop;
        this.inputValue = inputValue;
        this.inputDisabled = inputDisabled;
        this.canBeDeleted = canBeDeleted;
    }
}

const createAnswerVariant = (options) => {
    const parent = document.createElement("div");
    $(parent).addClass(["question-answer-variant", "d-flex", options.marginTop ? "mt-2" : ""]);

    const checkDiv = document.createElement("div");
    $(checkDiv).addClass(["radio-btn", "d-flex", "justify-content-center", "align-items-center"]);
    if (options.selected) $(checkDiv).addClass("checked");
    $(checkDiv).append('<i class="fa fa-check" aria-hidden="true"></i>');

    $(checkDiv).on("click", function (_) {
        $(checkDiv).addClass("checked");

        const initialSiblings = $(checkDiv).parent().siblings();
        const siblings = $(checkDiv).parent().siblings().filter((i) => {
            return $(initialSiblings[i]).attr("class").split(/\s+/).includes("question-answer-variant");
        });

        for (const sibling of siblings) {
            $(sibling).children()[0].classList.remove("checked");
        }
    });

    $(parent).append(checkDiv);

    $(parent).append(`
        <input
            type="text"
            class="answer-input"
            placeholder="Answer text..."
            ${options.inputDisabled ? 'disabled' : ''}
            value="${options.inputValue}"
        >
    `);

    if (options.canBeDeleted) {
        const deleteButton = document.createElement("button");
        $(deleteButton).attr("type", "button");
        $(deleteButton).addClass(["app-raised-button", "red", "ripple"]);
        $(deleteButton).append('<i class="fa fa-trash" aria-hidden="true"></i>');
        $(deleteButton).on('click', () => $(parent).remove());

        $(parent).append(deleteButton);
    }

    return parent;
};

const createAddButton = (destination, createOption) => {
    const parent = document.createElement("div");
    $(parent).addClass(["d-flex", "my-2"]);

    const addAnswerButton = document.createElement("button");
    $(addAnswerButton).attr("type", "button");
    $(addAnswerButton).addClass(["app-raised-button", "green", "ripple", "ml-auto"]);
    $(addAnswerButton).append('<i class="fa fa-plus" aria-hidden="true"></i>');
    $(addAnswerButton).on("click", () => $(destination).append(createAnswerVariant(createOption)));
    parent.append(addAnswerButton);

    return parent;
}

const createNewQuestion = (index, type) => {
    const parent = document.createElement("div");
    $(parent).addClass(["question-constructor","mt-3"]);

    const questionTitle = document.createElement("div");
    $(questionTitle).addClass(["question-title", "d-flex", "justify-content-center", "align-items-center", "mb-3"]);

    $(questionTitle).append(`<div class="question-number">${index}</div>`);
    $(questionTitle).append(`
       <textarea
        rows="2"
        class="question-input"
        placeholder="Type a question..."
       ></textarea>
    `);

    $(parent).append(questionTitle);

    if (type === "1") {
        $(parent).append(createAnswerVariant(new CreateAnswerOptions(
            true,
            false,
            "",
            false,
            false
        )));
    }

    if (type === "2") {
        $(parent).append(createAnswerVariant(new CreateAnswerOptions(
            true,
            false,
            "True",
            true,
            false
        )));

        $(parent).append(createAnswerVariant(new CreateAnswerOptions(
            false,
            true,
            "False",
            true,
            false
        )));
    }

    if (type === "3") {
        $(parent).append(createAddButton(parent,
            new CreateAnswerOptions(
                false,
                true,
                "",
                false,
                true
            )
        ));

        $(parent).append(createAnswerVariant(new CreateAnswerOptions(
            true,
            false,
            "",
            false,
            false
        )));

        $(parent).append(createAnswerVariant(new CreateAnswerOptions(
            false,
            true,
            "",
            false,
            false
        )));
    }

    return parent;
};

module.exports = {
    createNewQuestion,
}
