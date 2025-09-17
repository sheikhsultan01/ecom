class Tags {

    tagCon;
    tagText
    tagFns = {};
    config = {
        listeners: {
            keyDown: {
                enter: true,
                backspace: true
            }
        },
        callbacks: {
            onTagRemove: null
        }
    };

    constructor(tagCon, config = {}) {

        this.tagCon = tagCon;
        this.config = $.extend(this.config, config);
        setTimeout(() => {
            this.init();
        }, 2000);
    }

    init() {
        this.tagText = this.tagCon.find(".tag-text");
        this.hiddenInput = this.tagCon.find('.iTags');

        Array.from(this.tagCon.find('.iTags')).forEach(function (e) {
            let value = $(e).val();
            if (value.length > 0) {
                value.split(',').forEach(function (item) {
                    this.createNewTag(item, true);
                }, this);
            }
        }, this);

        this.addEventListeners();
    }

    static loadTagsFromValue($elem) {
        $elem.find(".tag").remove();
        let value = $elem.find(".iTags").val().trim();
        if (value.length > 0) {
            value.split(",").forEach(val => {
                let el = '<span class="tag"><span class="text">' + val + '</span><i class="close-tag">&times;</i></span>',
                    $tagText = $elem.find(".tag-text");
                $tagText.before(el);
            });
        }
    }

    addEventListeners() {

        this.tagText.on("focus", () => {
            this.tagCon.addClass("active");
        });

        this.tagText.on("blur", () => {
            this.tagCon.removeClass("active");
        });

        this.tagCon.on("click", (e) => {
            let target = $(e.target);
            if (target.hasClass("close-tag")) {
                this.removeTag(target.parent());
            }
        });

        this.tagText.on("keydown", (e) => {
            let elem = $(e.currentTarget),
                val = elem.val();
            // On Press Enter
            if (e.keyCode === 13 && this.config.listeners.keyDown.enter) {
                this.tagKeyDown(val);
                e.preventDefault();

            } else if (e.keyCode === 8 && this.config.listeners.keyDown.backspace) {
                // On Press Backspace
                if (val.length < 1) {
                    this.removeTag(elem.prev());
                }
            }
        });

    }

    getTags() {
        let val = this.tagCon.find(".iTags").val();
        return val.length > 0 ? val.split(",") : [];
    }

    createNewTag(val, onlyHTML = false) {
        val = this.filterTag(val);
        let el = '<span class="tag"><span class="text">' + val + '</span><i class="close-tag">&times;</i></span>';
        this.tagText.before(el);
        this.tagText.val('');

        if (!onlyHTML) {
            let currentTags = this.getTags();
            currentTags.push(val);
            this.updateTags(currentTags);
        }
    }

    filterTag(str) {
        str = str.replace(/&/g, "&amp;");
        str = str.replace(/>/g, "&gt;");
        str = str.replace(/</g, "&lt;");
        str = str.replace(/"/g, "&quot;");
        str = str.replace(/'/g, "&#039;");
        return str;
    }

    updateTags(val) {
        this.tagCon.find(".iTags").val(val.join(","));
    }

    tagKeyDown(val) {
        if (val.length > 0) {
            // If tag not exist
            if (!this.getTags().includes(val)) {
                if (this.tagCon.attr("data-fn")) {
                    let fn = this.tagCon.attr("data-fn");
                    if (fn in this.tagFns) {
                        tagFns[fn](this.tagText, val, this.createNewTag);
                    }
                } else {
                    this.createNewTag(val);
                }
            }
        }
    }

    removeTag(tag) {
        tag = $(tag);
        if (tag) {
            let valToRemove = tag.find(".text").text(),
                oldVal = this.getTags(),
                newVal = "";
            valToRemove = trim(this.filterTag(valToRemove));

            newVal = oldVal.filter(e => trim(e) != valToRemove);

            this.updateTags(newVal);
            tag.remove();
            if (typeof this.config.callbacks.onTagRemove === "function") {
                this.config.callbacks.onTagRemove(newVal, tag, this.tagCon);
            }
        }
    }

}