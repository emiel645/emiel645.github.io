document.getElementById("start").addEventListener("click", function () {
    let startTime = new Date().getTime();
    document.getElementById("result").innerText = "Wacht op groen...";

    setTimeout(function () {
        document.getElementById("result").innerText = "KLIK NU!";
        document.getElementById("start").onclick = function () {
            let endTime = new Date().getTime();
            let reaction = endTime - startTime;
            document.getElementById("result").innerText = `Je reactietijd was ${reaction} ms`;
        };
    }, Math.random() * 3000 + 2000);
});