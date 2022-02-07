$(function() {
    $('header').css({ height: $(window).innerHeight() });
    // $(window).resize(function() {
    //     $('header').css({ height: $(window).innerHeight() });
    // });
});


document.addEventListener('DOMContentLoader', function() {
    const form = document.querySelector('.form-content')
    form.addEventListener('submit', formSend)

    async function formSend(e) {
        e.preventDefault()

        let formData = new FormData(form);

        let response = await fetch('sendmail.php', {
            method: 'POST',
            body: formData
        });
        if (response.ok) {
            let result = await response.json();
            alert(result.message);
            form.reset();
        } else {
            alert("Ошибка");
        }


    }
})