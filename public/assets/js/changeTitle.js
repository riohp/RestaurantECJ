let title = document.title;
document.addEventListener("visibilitychange", function() {
    if (document.visibilityState === 'hidden') {
        document.title = "¡Vuelve Pronto!";
    } else {
        document.title = title;
    }
});