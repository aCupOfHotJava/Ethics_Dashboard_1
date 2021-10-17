var main = function() {
    
    var options = document.getElementById("optionsWrapper");
    var input = document.createElement("textarea");
    var newOption = document.getElementById("newOption");
    var submitOption = document.getElementById("submitOption");

    newOption.onclick = function() {
        input.className = "option";
        options.appendChild(input);
    }

    submitOption.onclick = function() {
        var text = document.createElement("div");
        text.className = "option";
        text.innerHTML = input.value;
        options.removeChild(input);
        options.appendChild(text);
    }

}